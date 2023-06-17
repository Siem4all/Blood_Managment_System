<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_Controller extends CI_Controller {

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
			redirect('donor');
		}
		else{
			$this->load->view('homepage');
		}
	}
	
public function adminHome(){
		//load session library
		$this->load->library('session');
 
		//restrict users to go to home if not logged in

		if($this->session->userdata('user')){
			$data['stock']=$this->User_model->getRecord(); 
			$data['events']=$this->User_model->notification(); 
			$data['contacts']=$this->User_model->comments(); 

			$this->load->view('admin/header',$data);
			$this->load->view('admin/dashboard',$data);
		  $this->load->view('admin/footer');

		}
		else{
			redirect('/');
		}
 
	}
	
	public function inventoryHome(){
		//load session library
		$this->load->library('session');
 
		//restrict users to go to home if not logged in

		if($this->session->userdata('user')){
			$data['stock']=$this->User_model->getRecord(); 
			$data['events']=$this->User_model->notification(); 
			$data['contacts']=$this->User_model->comments(); 

			$this->load->view('inventory/header',$data);
			$this->load->view('inventory/dashboard',$data);
		  $this->load->view('inventory/footer');

		}
		else{
			redirect('/');
		}
 
	}
	
	public function donorHome(){
		//load session library
		$this->load->library('session');
 
		//restrict users to go to home if not logged in

		if($this->session->userdata('user')){
			$data['stock']=$this->User_model->getRecord(); 

			$this->load->view('donor/header');
			$this->load->view('donor/dashboard',$data);
		  $this->load->view('donor/footer');

		}
		else{
			redirect('/');
		}
	}
	public function hospitalHome(){
		//load session library
		$this->load->library('session');
 
		//restrict users to go to home if not logged in

		if($this->session->userdata('user')){
						$data['events']=$this->User_model->notification(); 
			$data['stock']=$this->User_model->getRecord(); 
			$this->load->view('hospital/header',$data);
			$this->load->view('hospital/dashboard',$data);
		  $this->load->view('hospital/footer');

		}
		else{
			redirect('/');
		}
 
	}
	public function labHome(){
		//load session library
		$this->load->library('session');
 
		//restrict users to go to home if not logged in

		if($this->session->userdata('user')){
           $data['stock']=$this->User_model->getRecord(); 
			$data['events']=$this->User_model->notification(); 
			$data['contacts']=$this->User_model->comments(); 
			$this->load->view('lab/header',$data);
			$this->load->view('lab/dashboard',$data);
		  $this->load->view('lab/footer');

		}
		else{
			redirect('/');
		}
 
	}
	public function nurseHome(){
		//load session library
		$this->load->library('session');
 
		//restrict users to go to home if not logged in

		if($this->session->userdata('user')){
			$data['stock']=$this->User_model->getRecord(); 
			$data['events']=$this->User_model->notification(); 
			$data['contacts']=$this->User_model->comments();  
			$this->load->view('nurse/header',$data);
			$this->load->view('nurse/dashboard',$data);
		  $this->load->view('nurse/footer');

		}
		else{
			redirect('/');
		}
 
	}
 
	public function logout(){
		//load session library
		$this->load->library('session');
		$this->session->unset_userdata('user');
		redirect('/');
	}}
