<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hospital_model extends CI_Model {

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
	function __construct(){
			parent::__construct();
			$this->load->database();
		}
	
	
	public function registerHospital($data)
    {
        return $this->db->insert('hospital', $data);
    }
	
	public function display(){
	$query = $this->db->get('users');
	return $query->result();
}
	public function getId($email){
		$this->db->like('email',$email);
        $query  =   $this->db->get('users');
        return $query->result();
	}
	public function checkId($id){
		 $this->db->where('user_id', $id);
    $query = $this->db->get('hospital');
    if ($query->num_rows() > 0) {
        return true;
    } else {
        return false;
    }
	}
	public function getAll(){
	$this->db->select('hospital.h_name,hospital.h_phone,hospital.h_date,hospital.region,hospital.wereda,hospital.city,hospital.h_id,users.fname,users.lname,users.sex,users.age,users.address,users.mobile,users.email')
         ->from('hospital')
         ->join('users', 'hospital.user_id = users.user_id');
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
	public function edit($id){
		$this->db->like('h_id',$id);
        $query  =$this->db->get('hospital');
        return $query->result();
	}
	public function searchUser($email){
		$query = $this->db->get_where('users', array('email'=>$email));
			return $query->row_array();
	}
	public function hospitalUpdate($data,$id)
    {
		 $this->db->update('hospital', $data, array('h_id' => $id));
        $query = $this->db->get_where('hospital', array('h_id' => $id));
        return $query->result();
	}
}
