<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hospital_Controller extends CI_Controller {

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
        $this->load->model('Hospital_model');
    }
	
	public function index(){
		//load session library
		$data['hospital']=$this->Hospital_model->getAll();  
         //return the data in view   
		$this->load->view('lab/header');
		$this->load->view('lab/hospital/index',$data);
		 $this->load->view('lab/footer');
	}
	public function create(){
		//load session library
		$data['user']=$this->Hospital_model->display();  
         //return the data in view  
		$this->load->view('lab/header');
		$this->load->view('lab/hospital/create',$data);
		 $this->load->view('lab/footer');
	}
	
	public function donation(){
		//load session library
		$data['donors']=$this->Donor_model->donation();  
         //return the data in view   
		$this->load->view('lab/header');
		$this->load->view('lab/donation/index',$data);
		 $this->load->view('lab/footer');
	}
	
	public function store()
    {
		$this->form_validation->set_rules('name', 'Hospital name', 'trim|required');
		$this->form_validation->set_rules('region', 'region', 'trim|required');
        $this->form_validation->set_rules('wereda', 'wereda', 'trim|required');
		$this->form_validation->set_rules('city', 'city', 'trim|required');
        $this->form_validation->set_rules('phone', 'phone', 'trim|required');

        if($this->form_validation->run() == FALSE)
        {
            // failed
              $this->index();
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
                redirect(base_url('lab/donor/get_all'));    
            }
            else
            {
                $this->session->set_flashdata('error','Something Went Wrong.!');
                redirect(base_url('lab/donor/get_all'));
            }
		   }
			else{
				 $this->session->set_flashdata('error','You have already registered!');
                redirect(base_url('lab/donor/get_all'));
			}
			
        }
}
	public function edit($id){
		//load session library
	     $data['hospital']=$this->Hospital_model->edit($id); 
         //return the data in view  
		$this->load->view('lab/header');
		$this->load->view('lab/hospital/edit',$data);
		 $this->load->view('lab/footer');
	}
	public function emailEdit($id){
		//load session library
	     $data['donors']=$this->Donor_model->edit($id); 
		$data['user']=$this->Donor_model->display();  
         //return the data in view  
		$this->load->view('lab/header');
		$this->load->view('lab/donor/edit',$data);
		 $this->load->view('lab/footer');
	}
	public function update($id)
    {
		$this->form_validation->set_rules('name', 'hospital name', 'trim|required');
		$this->form_validation->set_rules('region', 'region', 'trim|required');
		$this->form_validation->set_rules('wereda', 'wereda', 'trim|required');
        $this->form_validation->set_rules('city', 'city', 'trim|required');
		$this->form_validation->set_rules('phone', 'phone', 'trim|required');
        if($this->form_validation->run() == FALSE)
        {
            // failed
			$this->session->set_flashdata('error','check validation.!');
              $this->edit($id);
        }
        else
        {
			 
			$email=$this->input->post('email');
			$user=$this->Hospital_model->searchUser($email);
            if(empty($email)){
				$data = array(
				'h_name' => $this->input->post('name'),
				'region' => $this->input->post('region'),
                'wereda' => $this->input->post('wereda'),
                'city' => $this->input->post('city'),
				'h_phone' => $this->input->post('phone'),
            );
             $update = $this->Hospital_model->hospitalUpdate($data,$id);
			  if($update==true){
				
			      $this->session->set_flashdata('success','hospital updated successfully');
                redirect(base_url('lab/hospital'));
           
				}
				else
				{
					$this->session->set_flashdata('error','Something went wrong');
                redirect(base_url('lab/hospital'));
				}
				//
			    
            }
            else
            {
				if($user){
					$email=$this->input->post('email');
            $users = $this->Hospital_model->getId($email);
					foreach ($users as $row)  
               $uid=$row->user_id;
               $data = array(
				 'user_id'=>$uid,  
				'h_name' => $this->input->post('name'),
				'region' => $this->input->post('region'),
                'wereda' => $this->input->post('wereda'),
                'city' => $this->input->post('city'),
				'h_phone' => $this->input->post('phone'),
            );
             $updated = $this->Hospital_model->hospitalUpdate($data,$id);
			  if($updated==true){
				
			      $this->session->set_flashdata('success','hospital updated successfully');
                redirect(base_url('lab/hospital'));
           
				}
				else
				{
					$this->session->set_flashdata('error','Something went wrong');
                redirect(base_url('lab/hospital'));
				}
				}
				else{
					$this->session->set_flashdata('error','No user registered with that email');
                redirect(base_url('lab/hospital'));
				}
						
            }
			
        }
}

 
	public function logout(){
		//load session library
		$this->load->library('session');
		$this->session->unset_userdata('user');
		redirect('/');
	}}
