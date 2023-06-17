<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Controller extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('User_model');
    }
	public function index(){
		//load session library
		$this->load->library('session');
 
		//restrict users to go back to login if session has been set
		if($this->session->userdata('user')){
			redirect('admin_home');
		}
		else{
		$data['events']=$this->User_model->fourEvent();
			$this->load->view('homepage',$data);
		}
	}
	
	public function loginpage()
	{
		$this->load->view('login');
	}
	public function passwordReset()
	{
         //return the data in view  
    			$this->load->view('reset_password');

	}
	
	public function login(){
		//load session library
		$this->load->library('session');
		 $this->form_validation->set_rules('email', 'Email ID', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
		if($this->form_validation->run() == FALSE)
        {
            // failed
             redirect(base_url('#login'));
        }
		else {
			$email = $this->input->post('email');
		$password = md5($this->input->post('password'));
 
		$data = $this->User_model->login($email, $password);
			$user=$this->User_model->userEmail($email);
			foreach($user as $row)
				$account=$row->account_type;
 
		if($data){
			if($account=='admin'){
				$this->session->set_userdata('user', $data);
			redirect('admin_home');
				
			}
			elseif($account=='donor'){
				$this->session->set_userdata('user', $data);
			redirect('donor_home');
				
			}
						elseif($account=='inventory manager'){
				$this->session->set_userdata('user', $data);
			redirect('inventory_home');
				
			}

			elseif($account=='hospital'){
				$this->session->set_userdata('user', $data);
			redirect('hospital_home');
				
			}
			elseif($account=='nurse'){
				$this->session->set_userdata('user', $data);
			redirect('nurse_home');
				
			}
			elseif($account=='lab technician'){
				$this->session->set_userdata('user', $data);
			redirect('lab_home');
				
			}
			else{
				eader('location:'.base_url('#login'));
			$this->session->set_flashdata('error','Contact the admin!');
			}
		
		}
		else{
			header('location:'.base_url('#login'));
			$this->session->set_flashdata('error','Email or password is wrong!');
		}
			
		}
 
		 
	}

	public function signup()
	{
		$this->load->view('signup');
	}
	public function register()
    {
        $this->form_validation->set_rules('fname', 'First Name', 'trim|required|alpha');
        $this->form_validation->set_rules('lname', 'Last Name', 'trim|required|alpha');
		$this->form_validation->set_rules('address', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('mobile', 'Last Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email ID', 'trim|required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('cpassword', 'Confirm Password', 'trim|required|matches[password]');
        if($this->form_validation->run() == FALSE)
        {
            // failed
             redirect(base_url('#signup'));
        }
        else
        {
			$dob=$this->input->post('dob');
          $age = (date('Y') - date('Y',strtotime($dob))); 
            $data = array(
				'bb_id'=>1,
                'fname' => $this->input->post('fname'),
                'lname' => $this->input->post('lname'),
				'age' => $age,
				'sex' => $this->input->post('sex'),
                'address' => $this->input->post('address'),
                'dob' => $this->input->post('dob'),
                'mobile' => $this->input->post('mobile'),
                'email' => $this->input->post('email'),
                'password' => md5($this->input->post('password')),
				 'created_at' => date('Y-m-d'),
                'account_type' => 'donor'

            );
            $register_user = new User_model;
            $checking = $register_user->registerUser($data);
            if($checking)
            {
                $this->session->set_flashdata('success','Registered Successfully.! Go to Login');
                redirect(base_url('#signup'));
            }
            else
            {
                $this->session->set_flashdata('error','Something Went Wrong.!');
                redirect(base_url('#signup'));
            }
        }
}
public function ForgotPassword()
   {
	     $this->load->library('phpmailer_lib');
         $email = $this->input->post('email');      
         $findemail = $this->User_model->ForgotPassword($email);  
         if($findemail){
          $this->User_model->sendpassword($findemail);        
           }else{
          $this->session->set_flashdata('error',' Email not found!');
          redirect(base_url().'forgot_password','refresh');
      }
}
	public function logout(){
		//load session library
		$this->load->library('session');
		$this->session->unset_userdata('user');
		redirect('/');
	}
public function contact(){
	 $this->form_validation->set_rules('email', 'Email ID', 'trim|required|valid_email');
	if($this->form_validation->run() == FALSE)
        {
            // failed
              $this->load->view('#contact');
        }
        else
        {
			$email = $this->input->post('email');  
			  $findemail = $this->User_model->userEmail($email);  
			foreach($findemail as $row)
				$id=$row->user_id;
			  if($findemail){
				  $data = array(
               'user_id' =>$id,
                'subject' => $this->input->post('subject'),
                'message' => $this->input->post('message'),
				 'date' => date('Y-m-d'),
            );
         $this->User_model->contact($data);  
        $this->session->set_flashdata('success','Message send successfully.!');
                redirect(base_url('#contact'));
			  }
			else{
				 $this->session->set_flashdata('error','Please, registered first to contact us.!');
                redirect(base_url('#contact'));
			}
			
		}
}}
