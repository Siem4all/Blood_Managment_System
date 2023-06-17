<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {

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
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        $this->load->model('Event_model');
		        $this->load->model('User_model');

    }
	public function index(){
		//load session library
		$data['events']=$this->Event_model->displayEvent();  
         //return the data in view  
			$data['contacts']=$this->User_model->comments();
		$this->load->view('inventory/header',$data);
		$this->load->view('inventory/events/index',$data);
		 $this->load->view('inventory/footer');
	}
	public function create(){
		//load session library
         //return the data in view  
		$data['events']=$this->User_model->notification(); 
			$data['contacts']=$this->User_model->comments();
		$this->load->view('inventory/header',$data);
		$this->load->view('inventory/events/create');
		 $this->load->view('inventory/footer');
	}
public function store(){
	$date = $this->input->post('date');
       $this->form_validation->set_rules('name', 'event name', 'trim|required');
		$this->form_validation->set_rules('place', 'event place', 'trim|required');
        $this->form_validation->set_rules('date', 'event date', 'trim|required|callback_check_equal_less[$date]');

        if($this->form_validation->run() == FALSE)
        {
            // failed
              		$this->create();

        }
        else
        {
			
			   $data = array(
				   'bb_id'=1,
				'event_name' => $this->input->post('name'),
				'event_place' => $this->input->post('place'),
                'event_date' => $this->input->post('date'),
            );
			$insert = $this->Event_model->addEvent($data);
            if($insert){
				$this->session->set_flashdata('success','Registered Successfully');
                redirect(base_url('inventory/donor/get_all'));    
            }
            else
            {
                $this->session->set_flashdata('error','Something Went Wrong.!');
                redirect(base_url('inventory/donor/get_all'));
            }
			
        }
	}
	public function edit($id){
		//load session library
	      $data['event']=$this->Event_model->editEvent($id);  
         //return the data in view
			$data['contacts']=$this->User_model->comments();
		$this->load->view('inventory/header',$data);
		$this->load->view('inventory/events/edit',$data);
		 $this->load->view('inventory/footer');
	}

	public function update($id){
		//load session library
		$data = array(
		       'event_name' => $this->input->post('name'),
				'event_place' => $this->input->post('place'),
                'event_date' => $this->input->post('date'),
		);
		$update = $this->Event_model->updateEvent($data,$id);
       if($update==true){
			      $this->session->set_flashdata('success','Updated Successfully');
                redirect(base_url('inventory/event'));
            }
            else
            {
                $this->session->set_flashdata('error','Something Went Wrong.!');
                redirect(base_url('inventory/event'));
            } 
	}
	
	public function distroy($id){
		//load session library
		$this->Event_model->delete_row($id);
			$this->session->set_flashdata('success','Deleted Successfully');
                redirect(base_url('inventory/event'));
	}
	public function check_equal_less($date){
    $today = strtotime(date("Y-m-d"));

    $first_date = strtotime($date);

    if ( ($date != "") && ($first_date < $today) )
    {
        $this->form_validation->set_message('check_equal_less', 'The Event date must be greater than today!');
        return false;       
    }
    else
    {
        return true;
    }
}
	
	public function logout(){
		//load session library
		$this->load->library('session');
		$this->session->unset_userdata('user');
		redirect('/');
	}}