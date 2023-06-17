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
	
	public function passwordReset($id)
	{
         //return the data in view  
		$data['user_id']=$id;
		$data['events']=$this->User_model->notification(); 
			$data['contacts']=$this->User_model->comments();
		$this->load->view('inventory/header',$data);
		$this->load->view('inventory/change_password',$data);
		 $this->load->view('inventory/footer');
	}
	
	public function messages(){
		$data['events']=$this->User_model->notification(); 
		$data['contacts']=$this->User_model->comments();
		$data['comments']=$this->User_model->messages();
		$this->load->view('inventory/header',$data);
		$this->load->view('inventory/message',$data);
		 $this->load->view('inventory/footer');
		
	}
	public function show($id){
		//load session library
	      $data['messages']=$this->User_model->contactId($id); 
		$data['events']=$this->User_model->notification(); 
			$data['contacts']=$this->User_model->comments();
         //return the data in view  
		$this->load->view('inventory/header',$data);
		$this->load->view('inventory/messageshow',$data);
		 $this->load->view('inventory/footer');
	}
	
public function changePassword($id)
    {
        $this->form_validation->set_rules('oldpass', 'old password', 'required');
        $this->form_validation->set_rules('newpass', 'new password', 'required');
        $this->form_validation->set_rules('passconf', 'confirm password', 'required|matches[newpass]');
        if($this->form_validation->run() == false) {
           redirect(base_url('inventory/user/change/'.$id));
        }
        else {
			 $oldpass=$this->input->post('oldpass');
			$user = $this->User_model->get_user($id);
        if($user->password != md5($oldpass)) {
			
            $this->session->set_flashdata('error','You entered wrong data!');
                redirect(base_url('inventory/user/change/'.$id));
        }
			else{
				
				$newpass = $this->input->post('newpass');
            $this->User_model->update_user($id, array('password' => md5($newpass)));
         $this->session->set_flashdata('success','Password Updated Successfully!');
                redirect(base_url('inventory/user/change/'.$id));
			}

    }

            
        }
	public function distroy($id){
		//load session library
		$this->User_model->delete_row($id);
			$this->session->set_flashdata('success','Deleted Successfully');
                redirect(base_url('inventory/user/message'));
	}

}
