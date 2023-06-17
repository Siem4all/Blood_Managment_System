<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Controller extends CI_Controller {

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
        $this->load->helper('form','url');
        $this->load->library('form_validation');
        $this->load->model('User_model');
    }
	public function index(){
		//load session library
		$this->load->library('session');
 
		//restrict users to go back to login if session has been set
		if($this->session->userdata('user')){
			redirect('donor_home');
		}
		else{
			$this->load->view('homepage');
		}
	}
	
	public function userAccount(){
		//load session library
	      $data['users']=$this->User_model->account();  
         //return the data in view  
		$this->load->view('donor/header');
		$this->load->view('donor/account',$data);
		 $this->load->view('donor/footer');
	}
	
	public function edit($id){
		//load session library
	      $data['users']=$this->User_model->userId($id);  
         //return the data in view  
		$this->load->view('donor/header');
		$this->load->view('donor/profile',$data);
		 $this->load->view('donor/footer');
	}
	public function update($id){
		//load session library
		$data = array(
		'account_type'=>$this->input->post('at')
		);
		$update = $this->User_model->userUpdate($data,$id);
       if($update==true){
			      $this->session->set_flashdata('success','Updated Successfully');
                redirect(base_url('donor/account'));
            }
            else
            {
                $this->session->set_flashdata('error','Something Went Wrong.!');
                redirect(base_url('donor/account'));
            } 
	}
	
	public function updateProfile($id){
		//load session library
		$data = array(
		'fname'=>$this->input->post('fname'),
		'lname'=>$this->input->post('lname'),
		'mobile'=>$this->input->post('mobile'),
		'address'=>$this->input->post('address'),
		'email'=>$this->input->post('email')

		);
		$update = $this->User_model->userUpdate($data,$id);
       if($update==true){
			      $this->session->set_flashdata('success','Updated Successfully');
                redirect(base_url('donor/profile/'.$id));
            }
            else
            {
                $this->session->set_flashdata('error','Something Went Wrong.!');
                redirect(base_url('donor/profile/'.$id));
            } 
	}
	public function displayEvent(){
		
	}
	public function addEvent(){
       $this->form_validation->set_rules('name', 'Event name', 'trim|required');
		$this->form_validation->set_rules('place', 'Event place', 'trim|required');
        $this->form_validation->set_rules('date', 'Event date', 'trim|required');

        if($this->form_validation->run() == FALSE)
        {
            // failed
              redirect(base_url(''));
        }
        else
        {
			$email=$this->input->post('emaill');
            $user = $this->Hospital_model->getId($email);
			foreach ($user as $row)  
               $id=$row->user_id;
			$existed = $this->Hospital_model->checkId($id);
           if($existed==false){
			   $data = array(
                'user_id' => $id,
				'h_name' => $this->input->post('name'),
				'region' => $this->input->post('region'),
                'wereda' => $this->input->post('wereda'),
				'city' => $this->input->post('city'),
                'h_phone' => $this->input->post('phone'),
                'h_date' => date('Y-m-d'),
            );
			$insert = $this->Hospital_model->registerHospital($data);
            if($insert){
				$this->session->set_flashdata('success','Registered Successfully');
                redirect(base_url('donor/donor/get_all'));    
            }
            else
            {
                $this->session->set_flashdata('error','Something Went Wrong.!');
                redirect(base_url('donor/donor/get_all'));
            }
		   }
			else{
				 $this->session->set_flashdata('error','You have already registered!');
                redirect(base_url('donor/donor/get_all'));
			}
			
        }
	}
	public function editEvent(){
		
	}
	public function updateEvent(){
		
	}
	public function deletEvent(){
		
	}
	
 public function displayNews(){
		
	}
	public function addNews(){
		
	}
	public function editNews(){
		
	}
	public function updateNews(){
		
	}
	public function deletNews(){
		
	}
	public function logout(){
		//load session library
		$this->load->library('session');
		$this->session->unset_userdata('user');
		redirect('/');
	}}
