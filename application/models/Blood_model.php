<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blood_model extends CI_Model {

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
	
	public function addDonor($data)
    {
        return $this->db->insert('donors', $data);
    }
	
	public function display(){
	$this->db->select('blood.blood_id,blood.blood_type,blood.disease,blood.wbc_count,blood.rbc_count,blood.platelet_count,blood.unit,blood.recieved_date,blood.expiration_date,donors.status')
         ->from('blood')
         ->join('donors', 'blood.donor_id = donors.donor_id');
$query = $this->db->get();

    if($query->num_rows() != 0)
    {
        return $query->result();
    }
    else
    {
        return false;
    }
}
	
	public function getAll(){
	$this->db->select('donors.user_id,donors.donor_id,donors.health_status,donors.status,donors.wieght,donors.date,users.fname,users.lname,users.sex,users.age,users.address,users.mobile,users.email')
         ->from('donors')
         ->join('users', 'donors.user_id = users.user_id');
$query = $this->db->get();

    if($query->num_rows() != 0)
    {
        return $query->result();
    }
    else
    {
        return false;
    }
}
	
	public function donation(){
		$this->db->select('donors.user_id,donors.donor_id,donors.health_status,donors.status,donors.wieght,donors.date,users.fname,users.lname,users.sex,users.age,users.address,users.mobile,users.email,blood.blood_type,blood.unit,blood.expiration_date')
         ->from('donors')
         ->join('users', 'donors.user_id = users.user_id')
			->join('blood', 'donors.donor_id = blood.donor_id');
$query = $this->db->get();

    if($query->num_rows() != 0)
    {
        return $query->result();
    }
    else
    {
        return false;
    }
	}
	
	public function getId($email){
		$this->db->like('email',$email);
        $query  =   $this->db->get('users');
        return $query->result();
	}
	
	public function checkId($id){
		 $this->db->where('donor_id', $id);
    $query = $this->db->get('blood');
    if ($query->num_rows() > 0) {
        return true;
    } else {
        return false;
    }
	}
	
	public function bloodDonorId($id){
		 $this->db->where('donor_id', $id);
    $query = $this->db->get('blood');
    if ($query->num_rows() > 0) {
        return true;
    } else {
        return false;
    }
	}
	public function donorStock($df){
			$query = $this->db->get_where('bloodstock', array('donor_id'=>$df));
			return $query->row_array();
	}
	public function addBloodStock($don)
    {
        return $this->db->insert('bloodstock', $don);
    }
	public function donorId($id){
		$this->db->like('user_id',$id);
        $query  =$this->db->get('donors');
        return $query->result();
	}
	public function edit($id){
		$this->db->like('blood_id',$id);
        $query  =$this->db->get('blood');
        return $query->result();
	}
	public function checkBloodId($id){
		$this->db->like('donor_id',$id);
        $query  =$this->db->get('blood');
        return $query->result();
	}
	public function stockId($sid){
		$this->db->like('bs_id',$sid);
        $query  =$this->db->get('stock');
        return $query->result();
	}
	public function stockUpdate($new,$sid)
    {
		 $this->db->update('stock',$new, array('bs_id' => $sid));
        $query = $this->db->get_where('stock', array('bs_id' => $sid));
        return $query->result();
	}
	public function addBlood($data)
    {
        return $this->db->insert('blood', $data);
    }
	
	public function updateBlood($data,$id)
    {
		 $this->db->update('blood', $data, array('donor_id' => $id));
        $query = $this->db->get_where('blood', array('donor_id' => $id));
        return $query->result();
	}
	public function bloodUpdate($data,$id)
    {
		 $this->db->update('blood', $data, array('blood_id' => $id));
        $query = $this->db->get_where('blood', array('blood_id' => $id));
        return $query->result();
	}
	public function bloodHistory($h)
    {
        return $this->db->insert('donor_history', $h);
    }
	public function selectAp(){
      $dr =date('Y-m-d');
		$this->db->select_sum('unit');
    $this->db->where('blood_type','A+');
	$this->db->where('expiration_date >=',$dr);
	$this->db->where('disease','Nothing');
    $result = $this->db->get('blood')->row();    
    return $result->unit;
	}
	public function selectApp(){
		$this->db->select_sum('unit');
    $this->db->where('blood_type','A+');
	$this->db->where('status','approved');
    $result = $this->db->get('bloodrequest')->row();    
    return $result->unit;
	}
	public function selectAn(){
      $dr =date('Y-m-d');
		$this->db->select_sum('unit');
    $this->db->where('blood_type','A-');
	$this->db->where('expiration_date >=',$dr);
	$this->db->where('disease','Nothing');
    $result = $this->db->get('blood')->row();    
    return $result->unit;
	}
	public function selectAnn(){
		$this->db->select_sum('unit');
    $this->db->where('blood_type','A-');
	$this->db->where('status','approved');
    $result = $this->db->get('bloodrequest')->row();    
    return $result->unit;
	}
	public function selectBp(){
      $dr =date('Y-m-d');
		$this->db->select_sum('unit');
    $this->db->where('blood_type','B+');
	$this->db->where('expiration_date >=',$dr);
	$this->db->where('disease','Nothing');
    $result = $this->db->get('blood')->row();    
    return $result->unit;
	}
	public function selectBpp(){
		$this->db->select_sum('unit');
    $this->db->where('blood_type','B+');
	$this->db->where('status','approved');
    $result = $this->db->get('bloodrequest')->row();    
    return $result->unit;
	}
	public function selectBn(){
      $dr =date('Y-m-d');
		$this->db->select_sum('unit');
    $this->db->where('blood_type','B-');
	$this->db->where('expiration_date >=',$dr);
	$this->db->where('disease','Nothing');
    $result = $this->db->get('blood')->row();    
    return $result->unit;
	}
	public function selectBnn(){
		$this->db->select_sum('unit');
    $this->db->where('blood_type','B-');
	$this->db->where('status','approved');
    $result = $this->db->get('bloodrequest')->row();    
    return $result->unit;
	}
	public function selectABp(){
      $dr =date('Y-m-d');
		$this->db->select_sum('unit');
    $this->db->where('blood_type','AB+');
	$this->db->where('expiration_date >=',$dr);
	$this->db->where('disease','Nothing');
    $result = $this->db->get('blood')->row();    
    return $result->unit;
	}
	public function selectABpp(){
		$this->db->select_sum('unit');
    $this->db->where('blood_type','AB+');
	$this->db->where('status','approved');
    $result = $this->db->get('bloodrequest')->row();    
    return $result->unit;
	}
	public function selectABn(){
      $dr =date('Y-m-d');
		$this->db->select_sum('unit');
    $this->db->where('blood_type','AB-');
	$this->db->where('expiration_date >=',$dr);
	$this->db->where('disease','Nothing');
    $result = $this->db->get('blood')->row();    
    return $result->unit;
	}
	public function selectABnn(){
		$this->db->select_sum('unit');
    $this->db->where('blood_type','AB-');
	$this->db->where('status','approved');
    $result = $this->db->get('bloodrequest')->row();    
    return $result->unit;
	}
	public function selectOp(){
      $dr =date('Y-m-d');
		$this->db->select_sum('unit');
    $this->db->where('blood_type','O+');
	$this->db->where('expiration_date >=',$dr);
	$this->db->where('disease','Nothing');
    $result = $this->db->get('blood')->row();    
    return $result->unit;
	}
	public function selectOpp(){
		$this->db->select_sum('unit');
    $this->db->where('blood_type','O+');
	$this->db->where('status','approved');
    $result = $this->db->get('bloodrequest')->row();    
    return $result->unit;
	}
	public function selectOn(){
      $dr =date('Y-m-d');
		$this->db->select_sum('unit');
    $this->db->where('blood_type','O-');
	$this->db->where('expiration_date >=',$dr);
	$this->db->where('disease','Nothing');
    $result = $this->db->get('blood')->row();    
    return $result->unit;
	}
	public function selectOnn(){
		$this->db->select_sum('unit');
    $this->db->where('blood_type','O-');
	$this->db->where('status','approved');
    $result = $this->db->get('bloodrequest')->row();    
    return $result->unit;
	}
}
