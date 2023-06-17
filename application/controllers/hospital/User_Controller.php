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
		$this->load->view('hospital/header');
		$this->load->view('hospital/change_password',$data);
		 $this->load->view('hospital/footer');
	}
	
	
public function changePassword($id)
    {
        $this->form_validation->set_rules('oldpass', 'old password', 'required');
        $this->form_validation->set_rules('newpass', 'new password', 'required');
        $this->form_validation->set_rules('passconf', 'confirm password', 'required|matches[newpass]');
        if($this->form_validation->run() == false) {
           redirect(base_url('hospital/user/change/'.$id));
        }
        else {
			 $oldpass=$this->input->post('oldpass');
			$user = $this->User_model->get_user($id);
        if($user->password != md5($oldpass)) {
			
            $this->session->set_flashdata('error','You entered wrong data!');
                redirect(base_url('hospital/user/change/'.$id));
        }
			else{
				
				$newpass = $this->input->post('newpass');
            $this->User_model->update_user($id, array('password' => md5($newpass)));
         $this->session->set_flashdata('success','Password Updated Successfully!');
                redirect(base_url('hospital/user/change/'.$id));
			}

    }

            
        }

}
