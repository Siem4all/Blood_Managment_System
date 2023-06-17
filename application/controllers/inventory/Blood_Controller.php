<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blood_Controller extends CI_Controller {

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
        $this->load->library('form_validation','date');
        $this->load->model('Blood_model');
		 $this->load->model('User_model');
    }
	public function index(){
		//load session library
		$data['blood']=$this->Blood_model->display();  
		$data['events']=$this->User_model->notification(); 
			$data['contacts']=$this->User_model->comments();
         //return the data in view  
		$this->load->view('inventory/header',$data);
		$this->load->view('inventory/blood/index',$data);
		 $this->load->view('inventory/footer');
	}
	public function create($id){
		//load session library
		$data['id']=$id;  
		$data['events']=$this->User_model->notification(); 
			$data['contacts']=$this->User_model->comments();
		$this->load->view('inventory/header',$data);
		$this->load->view('inventory/blood/create',$data);
		 $this->load->view('inventory/footer');
	}
	public function show(){
		//load session library
		$data['donors']=$this->Blood_model->getAll();
		$data['events']=$this->User_model->notification(); 
			$data['contacts']=$this->User_model->comments();
         //return the data in view   
		$this->load->view('inventory/header',$data);
		$this->load->view('inventory/donor/index',$data);
		 $this->load->view('inventory/footer');
	}
	
	public function donation(){
		//load session library
		$data['donors']=$this->Donor_model->donation(); 
		$data['events']=$this->User_model->notification(); 
			$data['contacts']=$this->User_model->comments();
         //return the data in view   
		$this->load->view('inventory/header',$data);
		$this->load->view('inventory/donation/index',$data);
		 $this->load->view('inventory/footer');
	}
	
	public function store($id)
    {
        $this->form_validation->set_rules('unit', 'unit', 'trim|required');
        if($this->form_validation->run() == FALSE)
        {
            // failed
              $this->index();
        }
        else
        {
			$r=date('Y-m-d');
			$e=date('Y-m-d', strtotime("+0 years +1 months +5 days", strtotime($r)));
			$data = array(
                'donor_id' => $id,
			    'blood_type' => $this->input->post('blood'),
				'disease' => $this->input->post('disease'),
				'wbc_count' => $this->input->post('wbc'),
				'rbc_count' => $this->input->post('rbc'),
				'platelet_count' => $this->input->post('pc'),
				 'unit' => $this->input->post('unit'),
				 'recieved_date'=>$r,
				'expiration_date'=>$e
            );
			$existed = $this->Blood_model->checkId($id);
           if($existed==false){
			   
			$insert = $this->Blood_model->addBlood($data);
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
			else
			{
			$blood = $this->Blood_model->checkBloodId($id);
			foreach ($blood as $row)
				$old_date=$row->recieved_date;
						
				$date1=date_create($old_date);
                 $date2=date_create($r);
             $diff = date_diff($date1,$date2);
				$b=$diff->format("%a");
				$c=$b-90;
				$cc=abs($c);
				$d='Sorry, You have left '.$cc.' days to donate blood!';
				if($c >= 0){
			 $add = $this->Blood_model->updateBlood($data,$id);
			  if($add==true){
				$h = array(
                'donor_id' => $id,
			    'blood_type' => $this->input->post('blood'),
				'disease' => $this->input->post('disease'),
				 'unit' => $this->input->post('unit'),
				 'date'=>$r,
            );
				 $this->Blood_model->bloodHistory($h);
			      $this->session->set_flashdata('success','Blood donated successfully');
                redirect(base_url('inventory/donor/get_all'));
            }
            else
            {
                $this->session->set_flashdata('error','Something Went Wrong.!');
                redirect(base_url('inventory/donor/get_all'));
            }
				}
				else
				{
					$this->session->set_flashdata('error',$d);
                redirect(base_url('inventory/donor/get_all'));
				}

			}
			
        }
}
	public function edit($id){
		//load session library
	     $data['blood']=$this->Blood_model->edit($id); 
		$data['events']=$this->User_model->notification(); 
			$data['contacts']=$this->User_model->comments();
         //return the data in view  
		$this->load->view('inventory/header',$data);
		$this->load->view('inventory/blood/edit',$data);
		 $this->load->view('inventory/footer');
	}
	public function emailEdit($id){
		//load session library
	     $data['donors']=$this->Donor_model->edit($id); 
		$data['user']=$this->Donor_model->display();  
		$data['events']=$this->User_model->notification(); 
			$data['contacts']=$this->User_model->comments();
         //return the data in view  
		$this->load->view('inventory/header',$data);
		$this->load->view('inventory/donor/edit',$data);
		 $this->load->view('inventory/footer');
	}
	public function update($id)
    {
		$this->form_validation->set_rules('unit', 'Unit', 'trim|required');
		$this->form_validation->set_rules('disease', 'disease', 'trim|required');
		$this->form_validation->set_rules('wbc', 'wbc', 'trim|required');
        $this->form_validation->set_rules('rbc', 'rbc', 'trim|required');
		$this->form_validation->set_rules('pc', 'pc', 'trim|required');
        if($this->form_validation->run() == FALSE)
        {
            // failed
			$this->session->set_flashdata('error','Blood did not add.!');
              $this->edit($id);
        }
        else
        {
			 $data = array(
			    'blood_type' => $this->input->post('blood'),
				'disease' => $this->input->post('disease'),
				'wbc_count' => $this->input->post('wbc'),
				'rbc_count' => $this->input->post('rbc'),
				'platelet_count' => $this->input->post('pc'),
				 'unit' => $this->input->post('unit'),
            );
			
		  $updated = $this->Blood_model->bloodUpdate($data,$id);
            if($updated==true){	
              	$sid=1;	
				//a
				$ap1=$this->Blood_model->selectAp();
				$ap2=$this->Blood_model->selectApp();
				$ap=$ap1-$ap2;
				
				$an1=$this->Blood_model->selectAn();
				$an2=$this->Blood_model->selectAnn();
				$an=$an1-$an2;
				//b
				$bp1=$this->Blood_model->selectBp();
				$bp2=$this->Blood_model->selectBpp();
				$bp=$bp1-$bp2;
				
				$bn1=$this->Blood_model->selectBn();
				$bn2=$this->Blood_model->selectBnn();
				$bn=$bn1-$bn2;
				//ab
				$abp1=$this->Blood_model->selectABp();
				$abp2=$this->Blood_model->selectABpp();
				$abp=$abp1-$abp2;
				
				$abn1=$this->Blood_model->selectABn();
				$abn2=$this->Blood_model->selectABnn();
				$abn=$abn1-$abn2;
				//o
				$op1=$this->Blood_model->selectOp();
				$op2=$this->Blood_model->selectOpp();
				$op=$op1-$op2;
				
				$on1=$this->Blood_model->selectOn();
				$on2=$this->Blood_model->selectOnn();
				$on=$on1-$on2;
				$new = array(
				    'Ap'=>$ap,
					'An'=>$an,
					'Bp'=>$bp,
					'Bn'=>$bn,
					'ABp'=>$abp,
					'ABn'=>$abn,
					'Op'=>$op,
					'On'=>$on
				);
				$this->Blood_model->stockUpdate($new,$sid);
				$this->session->set_flashdata('success','Updated successfully!');
                redirect(base_url('inventory/blood'));
            }
            else
            {
                $this->session->set_flashdata('error','Something Went Wrong.!');
                redirect(base_url('inventory/blood'));
            }
			
        }
}

 
	public function logout(){
		//load session library
		$this->load->library('session');
		$this->session->unset_userdata('user');
		redirect('/');
	}}
