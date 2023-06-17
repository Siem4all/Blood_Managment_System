<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Donor_model extends CI_Model {

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
	$query = $this->db->get('users');
	return $query->result();
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
		 $this->db->where('user_id', $id);
    $query = $this->db->get('donors');
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
	public function donorId($id){
		$this->db->like('user_id',$id);
        $query  =$this->db->get('donors');
        return $query->result();
	}
	public function edit($id){
		$this->db->like('donor_id',$id);
        $query  =$this->db->get('donors');
        return $query->result();
	}
	public function checkBloodId($id){
		$this->db->like('donor_id',$id);
        $query  =$this->db->get('blood');
        return $query->result();
	}
	public function addBlood($info)
    {
        return $this->db->insert('blood', $info);
    }
	
	public function donorUpdate($data,$id)
    {
		 $this->db->update('donors', $data, array('donor_id' => $id));
        $query = $this->db->get_where('donors', array('donor_id' => $id));
        return $query->result();
	}
}
