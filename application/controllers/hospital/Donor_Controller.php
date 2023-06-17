<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Donor_Controller extends CI_Controller {

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
        $this->load->model('Donor_model');
    }
	public function index(){
		//load session library
		$data['user']=$this->Donor_model->display();  
         //return the data in view  
		$this->load->view('hospital/header');
		$this->load->view('hospital/donor/create',$data);
		 $this->load->view('hospital/footer');
	}
	public function show(){
		//load session library
		$data['donors']=$this->Donor_model->getAll();  
         //return the data in view   
		$this->load->view('hospital/header');
		$this->load->view('hospital/donor/index',$data);
		 $this->load->view('hospital/footer');
	}
	
	public function donation(){
		//load session library
		$data['donors']=$this->Donor_model->donation();  
         //return the data in view   
		$this->load->view('hospital/header');
		$this->load->view('hospital/donation/index',$data);
		 $this->load->view('hospital/footer');
	}
	
	public function store()
    {
		$this->form_validation->set_rules('work', 'Work', 'trim|required');
		$this->form_validation->set_rules('health', 'health', 'trim|required');
        $this->form_validation->set_rules('wieght', 'wieght', 'trim|required');
        if($this->form_validation->run() == FALSE)
        {
            // failed
              $this->index();
        }
        else
        {
			$email=$this->input->post('emaill');
			$wieght=$this->input->post('wieght');
            $user = $this->Donor_model->getId($email);
			foreach ($user as $row){
			 $id=$row->user_id;
			   $age=$row->age;	
			}  
			$existed = $this->Donor_model->checkId($id);
           $allowed=$this->input->post('health');
           if($allowed =='nothing' and $age >= 18 and $age < 65 and $wieght >= 45){
			   $data = array(
                'user_id' => $id,
				'work' => $this->input->post('work'),
				'health_status' => $this->input->post('health'),
                'wieght' => $this->input->post('wieght'),
                'date' => $this->input->post('date'),
                'status' => 'Pending...',
            );
			$insert = $this->Donor_model->addDonor($data);
            if($insert){
				$this->session->set_flashdata('success','Registered Successfully');
                redirect(base_url('hospital/donor/get_all'));    
            }
            else
            {
                $this->session->set_flashdata('error','Something Went Wrong.!');
                redirect(base_url('hospital/donor/get_all'));
            }
		   }
			else{
				 $this->session->set_flashdata('error','Sorry,you are eligible to donate blood!');
                redirect(base_url('hospital/donor/get_all'));
			}
			
        }
}
	public function edit($id){
		//load session library
	     $data['donors']=$this->Donor_model->edit($id); 
		$data['user']=$this->Donor_model->display();  
         //return the data in view  
		$this->load->view('hospital/header');
		$this->load->view('hospital/donor/edit',$data);
		 $this->load->view('hospital/footer');
	}
	public function emailEdit($id){
		//load session library
	     $data['donors']=$this->Donor_model->edit($id); 
		$data['user']=$this->Donor_model->display();  
         //return the data in view  
		$this->load->view('hospital/header');
		$this->load->view('hospital/donor/edit',$data);
		 $this->load->view('hospital/footer');
	}
	public function update($id)
    {
		$this->form_validation->set_rules('work', 'Work', 'trim|required');
		$this->form_validation->set_rules('health', 'health', 'trim|required');
        $this->form_validation->set_rules('wieght', 'wieght', 'trim|required');
		$this->form_validation->set_rules('pressure', 'pressure', 'trim|required');
        $this->form_validation->set_rules('temp', 'temp', 'trim|required');
        $this->form_validation->set_rules('pulse', 'pulse', 'trim|required');
		$this->form_validation->set_rules('rate', 'rate', 'trim|required');

        if($this->form_validation->run() == FALSE)
        {
            // failed
			$this->session->set_flashdata('error','Blood did not add.!');
              $this->edit($id);
        }
        else
        {
			 $data = array(
				'work' => $this->input->post('work'),
				'health_status' => $this->input->post('health'),
                'wieght' => $this->input->post('wieght'),
				'b_pressure' => $this->input->post('pressure'),
                'pulse' => $this->input->post('pulse'),
				'r_rate' => $this->input->post('rate'),
                'temp' => $this->input->post('temp'),
                'status' => 'Approved',
            );
			
		  $update = $this->Donor_model->donorUpdate($data,$id);
            if($update==true){
			     $this->session->set_flashdata('success','Donor Updated successfully');
                redirect(base_url('hospital/donor/get_all'));
           
				}
				
            else
            {
                $this->session->set_flashdata('error','Something Went Wrong.!');
                redirect(base_url('hospital/donor/get_all'));
            }
			
        }
}

 
	public function logout(){
		//load session library
		$this->load->library('session');
		$this->session->unset_userdata('user');
		redirect('/');
	}}
