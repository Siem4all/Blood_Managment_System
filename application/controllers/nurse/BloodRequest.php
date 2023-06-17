<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BloodRequest extends CI_Controller {

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
        $this->load->model('BloodRequest_model');
    }
	
	public function index(){
		//load session library
		$data['request']=$this->BloodRequest_model->getAll();  
         //return the data in view   
		$this->load->view('nurse/header');
		$this->load->view('nurse/bloodrequest/index',$data);
		 $this->load->view('nurse/footer');
	}
	public function stockDisplay(){
		//load session library
		$data['stock']=$this->BloodRequest_model->getStock();  
         //return the data in view   
		$this->load->view('nurse/header');
		$this->load->view('nurse/index',$data);
		 $this->load->view('nurse/footer');
	}
	public function create(){
		//load session library
		$data['hospital']=$this->BloodRequest_model->display();  
         //return the data in view  
		$this->load->view('nurse/header');
		$this->load->view('nurse/bloodrequest/create',$data);
		 $this->load->view('nurse/footer');
	}
	
	
	public function store()
    {
		$this->form_validation->set_rules('hospital', 'Hospital name', 'trim|required');
		$this->form_validation->set_rules('blood', 'region', 'trim|required');
        $this->form_validation->set_rules('unit', 'wereda', 'trim|required');

        if($this->form_validation->run() == FALSE)
        {
            // failed
              $this->index();
        }
        else
        {   $name=$this->input->post('hospital');
			$unit = $this->input->post('unit');
			$blood=$this->input->post('blood');
		  $hospital = $this->BloodRequest_model->getId($name);
			foreach ($hospital as $row)  
               $id=$row->h_id;
			   $data = array(
                'h_id' => $id,
				'blood_type' => $this->input->post('blood'),
				'unit' => $this->input->post('unit'),
				 'status' => 'pending',
				  'reason' => $this->input->post('reason'),
                'requested_date' => date('Y-m-d'),
            );
			if($blood=='A+'){
				$stock=$this->BloodRequest_model->getStock();
				foreach ($stock as $row)  
               $amount=$row->Ap;
				if($amount>=$unit)
				{
           
			$this->BloodRequest_model->addRequest($data);
          
				$this->session->set_flashdata('success','Requested Successfully');
                redirect(base_url('nurse/donor/get_all'));    
            
            }
				
				else{
					$this->session->set_flashdata('error','Sorry,We do not have that much unit of blood A+.!');
                redirect(base_url('nurse/donor/get_all'));
				}
			}
				elseif($blood=='A-'){
					$stock=$this->BloodRequest_model->getStock();
				foreach ($stock as $row)  
               $amount=$row->An;
				if($amount>=$unit)
				{
           
			$this->BloodRequest_model->addRequest($data);
          
				$this->session->set_flashdata('success','Requested Successfully');
                redirect(base_url('nurse/donor/get_all'));    
            
            }
				
				else{
					$this->session->set_flashdata('error','Sorry,We do not have that much unit of blood A-.!');
                redirect(base_url('nurse/donor/get_all'));
				}
				}
					elseif($blood=='B+'){
						$stock=$this->BloodRequest_model->getStock();
				foreach ($stock as $row)  
               $amount=$row->Bp;
				if($amount>=$unit)
				{
            
			$this->BloodRequest_model->addRequest($data);
          
				$this->session->set_flashdata('success','Requested Successfully');
                redirect(base_url('nurse/donor/get_all'));    
            
            }
				
				else{
					$this->session->set_flashdata('error','Sorry,We do not have that much unit of blood B+.!');
                redirect(base_url('nurse/donor/get_all'));
				}
					}
						elseif($blood=='B-'){
						$stock=$this->BloodRequest_model->getStock();
				foreach ($stock as $row)  
               $amount=$row->Bn;
				if($amount>=$unit)
				{
            
			$this->BloodRequest_model->addRequest($data);
          
				$this->session->set_flashdata('success','Requested Successfully');
                redirect(base_url('nurse/donor/get_all'));    
            
            }
				
				else{
					$this->session->set_flashdata('error','Sorry,We do not have that much unit of blood B-.!');
                redirect(base_url('nurse/donor/get_all'));
				}
						}
							elseif($blood=='AB+'){
								$stock=$this->BloodRequest_model->getStock();
				foreach ($stock as $row)  
               $amount=$row->ABp;
				if($amount>=$unit)
				{
           
			$this->BloodRequest_model->addRequest($data);
          
				$this->session->set_flashdata('success','Requested Successfully');
                redirect(base_url('nurse/donor/get_all'));    
            
            }
				
				else{
					$this->session->set_flashdata('error','Sorry,We do not have that much unit of blood AB+.!');
                redirect(base_url('nurse/donor/get_all'));
				}
							}
								elseif($blood=='AB-'){
								$stock=$this->BloodRequest_model->getStock();
				foreach ($stock as $row)  
               $amount=$row->ABn;
				if($amount>=$unit)
				{
            
			$this->BloodRequest_model->addRequest($data);
          
				$this->session->set_flashdata('success','Requested Successfully');
                redirect(base_url('nurse/donor/get_all'));    
            
            }
				
				else{
					$this->session->set_flashdata('error','Sorry,We do not have that much unit of blood AB-.!');
                redirect(base_url('nurse/donor/get_all'));
				}
								}
									elseif($blood=='O+'){
									$stock=$this->BloodRequest_model->getStock();
				foreach ($stock as $row)  
               $amount=$row->Op;
				if($amount>=$unit)
				{
            
			$this->BloodRequest_model->addRequest($data);
          
				$this->session->set_flashdata('success','Requested Successfully');
                redirect(base_url('nurse/donor/get_all'));    
            
            }
				
				else{
					$this->session->set_flashdata('error','Sorry, We do not have that much unit of blood O+.!');
                redirect(base_url('nurse/donor/get_all'));
				}	
									}
										elseif($blood=='O-'){
											$stock=$this->BloodRequest_model->getStock();
				foreach ($stock as $row)  
               $amount=$row->On;
				if($amount>=$unit)
				{
            
			$this->BloodRequest_model->addRequest($data);
          
				$this->session->set_flashdata('success','Requested Successfully');
                redirect(base_url('nurse/donor/get_all'));    
            
            }
				
				else{
					$this->session->set_flashdata('error','Sorry, We do not have that much unit of blood O-.!');
                redirect(base_url('nurse/donor/get_all'));
				}
										}
											else
											{
					$this->session->set_flashdata('error','Sorry, Something Went Wrong!');
                redirect(base_url('nurse/donor/get_all'));
											}
										
				
			
        }
}
	public function approve($id){
		//load session library
	     $approve=$this->BloodRequest_model->requestId($id);
       foreach($approve as $row)
	   {
		   $num=$row->unit;
			 $s=$row->status;
		    $b=$row->blood_type;
	   }
			$sid=1;
			 if($s=='pending'){
				 $cd=array(
				 'status'=>'Approved');
				 if($b=='A+' ){
					$stock=$this->BloodRequest_model->getStock();
		               foreach($stock as $row)
						   $amount1=$row->Ap;
					 if($amount1>=$num){
						 
						$ap=$amount1-$num; 
						 $dd=array(
						 'Ap'=>$ap);
						 $this->BloodRequest_model->stockUpdate($dd,$sid);
						 				 $this->BloodRequest_model->requestUpdate($cd,$id);
					$this->session->set_flashdata('success',$num.' amount is deducted from stock!');
                redirect(base_url('nurse/bloodrequest'));
					 }
					 else{
						$this->session->set_flashdata('error','Sorry, We have finished that blood!');
                redirect(base_url('nurse/bloodrequest')); 
					 }
				 }
				 elseif($b=='A-'){
					 $stock=$this->BloodRequest_model->getStock();
		               foreach($stock as $row)
						   $amount1=$row->An;
					 if($amount1>=$num){
						 
						$an=$amount1-$num; 
						 $dd=array(
						 'An'=>$an);
						 $this->BloodRequest_model->stockUpdate($dd,$sid);
						 				 $this->BloodRequest_model->requestUpdate($cd,$id);
					$this->session->set_flashdata('success',$num.' amount is deducted from stock!');
                redirect(base_url('nurse/bloodrequest'));
					 }
					 else{
						$this->session->set_flashdata('error','Sorry, We have finished that blood!');
                redirect(base_url('nurse/bloodrequest')); 
					 }
				 }
				 elseif($b=='B+'){
					 $stock=$this->BloodRequest_model->getStock();
		               foreach($stock as $row)
						   $amount2=$row->Bp;
					 if($amount2 >= $num){
						 
						$bpp=$amount2-$num; 
						 $dd=array(
						 'Bp'=>$bpp);
						 $this->BloodRequest_model->stockUpdate($dd,$sid);
						 				 $this->BloodRequest_model->requestUpdate($cd,$id);
					$this->session->set_flashdata('success',$num.' amount is deducted from stock!');
                redirect(base_url('nurse/bloodrequest'));
					 }
					 else{
						$this->session->set_flashdata('error','Sorry, We have finished B+ blood!');
                redirect(base_url('nurse/bloodrequest')); 
					 }
				 }
				 elseif($b=='B-'){
					 $stock=$this->BloodRequest_model->getStock();
		               foreach($stock as $row)
						   $amount1=$row->Bn;
					 if($amount1>=$num){
						 
						$bn=$amount1-$num; 
						 $dd=array(
						 'Bn'=>$bn);
						 $this->BloodRequest_model->stockUpdate($dd,$sid);
						 				 $this->BloodRequest_model->requestUpdate($cd,$id);
					$this->session->set_flashdata('success',$num.' amount is deducted from stock!');
                redirect(base_url('nurse/bloodrequest'));
					 }
					 else{
						$this->session->set_flashdata('error','Sorry, We have finished that blood!');
                redirect(base_url('nurse/bloodrequest')); 
					 }
				 }
				 elseif($b=='AB+'){
					 $stock=$this->BloodRequest_model->getStock();
		               foreach($stock as $row)
						   $amount1=$row->ABp;
					 if($amount1>=$num){
						 
						$abp=$amount1-$num; 
						 $dd=array(
						 'ABp'=>$abp);
						 $this->BloodRequest_model->stockUpdate($dd,$sid);
						 				 $this->BloodRequest_model->requestUpdate($cd,$id);
					$this->session->set_flashdata('success',$num.' amount is deducted from stock!');
                redirect(base_url('nurse/bloodrequest'));
					 }
					 else{
						$this->session->set_flashdata('error','Sorry, We have finished that blood!');
                redirect(base_url('nurse/bloodrequest')); 
					 }
				 }
				 elseif($b=='AB-'){
					 $stock=$this->BloodRequest_model->getStock();
		               foreach($stock as $row)
						   $amount1=$row->ABn;
					 if($amount1>=$num){
						 
						$abn=$amount1-$num; 
						 $dd=array(
						 'ABn'=>$abn);
						 $this->BloodRequest_model->stockUpdate($dd,$sid);
						 				 $this->BloodRequest_model->requestUpdate($cd,$id);
					$this->session->set_flashdata('success',$num.' amount is deducted from stock!');
                redirect(base_url('nurse/bloodrequest'));
					 }
					 else{
						$this->session->set_flashdata('error','Sorry, We have finished that blood!');
                redirect(base_url('nurse/bloodrequest')); 
					 }
				 }
				 elseif($b=='O+'){
					 $stock=$this->BloodRequest_model->getStock();
		               foreach($stock as $row)
						   $amount1=$row->Op;
					 if($amount1>=$num){
						 
						$op=$amount1-$num; 
						 $dd=array(
						 'Op'=>$op);
						 $this->BloodRequest_model->stockUpdate($dd,$sid);
						 				 $this->BloodRequest_model->requestUpdate($cd,$id);
					$this->session->set_flashdata('success',$num.' amount is deducted from stock!');
                redirect(base_url('nurse/bloodrequest'));
					 }
					 else{
						$this->session->set_flashdata('error','Sorry, We have finished that blood!');
                redirect(base_url('nurse/bloodrequest')); 
					 }
				 }
				 elseif($b=='O-'){
					 $stock=$this->BloodRequest_model->getStock();
		               foreach($stock as $row)
						   $amount1=$row->On;
					 if($amount1>=$num){
						 
						$on=$amount1-$num; 
						 $dd=array(
						 'On'=>$on);
						 $this->BloodRequest_model->stockUpdate($dd,$sid);
						 				 $this->BloodRequest_model->requestUpdate($cd,$id);
					$this->session->set_flashdata('success',$num.' amount is deducted from stock!');
                redirect(base_url('nurse/bloodrequest'));
					 }
					 else{
						$this->session->set_flashdata('error','Sorry, We have finished that blood!');
                redirect(base_url('nurse/bloodrequest')); 
					 }
				 }
				 else{
					$this->session->set_flashdata('error','Sorry, You have already clicked one!');
                redirect(base_url('nurse/bloodrequest')); 
				 }
				 
			 }
			 else{
				 $this->session->set_flashdata('error','Sorry, You have already deducted blood!');
                redirect(base_url('nurse/bloodrequest'));
			 }
	}
	public function reject($id){
		//load session library
	      $cd=array(
			'status'=>'rejected');
		$this->BloodRequest_model->requestUpdate($cd,$id);
		$this->session->set_flashdata('success','Request is rejected successfully!');
                redirect(base_url('nurse/bloodrequest'));

	}
	public function emailEdit($id){
		//load session library
	     $data['donors']=$this->Donor_model->edit($id); 
		$data['user']=$this->Donor_model->display();  
         //return the data in view  
		$this->load->view('nurse/header');
		$this->load->view('nurse/donor/edit',$data);
		 $this->load->view('nurse/footer');
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
                redirect(base_url('nurse/hospital'));
           
				}
				else
				{
					$this->session->set_flashdata('error','Something went wrong');
                redirect(base_url('nurse/hospital'));
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
                redirect(base_url('nurse/hospital'));
           
				}
				else
				{
					$this->session->set_flashdata('error','Something went wrong');
                redirect(base_url('nurse/hospital'));
				}
				}
				else{
					$this->session->set_flashdata('error','No user registered with that email');
                redirect(base_url('nurse/hospital'));
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
