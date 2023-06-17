<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BloodRequest_model extends CI_Model {

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
	
	
	public function addRequest($data)
    {
        return $this->db->insert('bloodrequest', $data);
    }
	
	public function display(){
	$query = $this->db->get('hospital');
	return $query->result();
}
	public function getStock(){
	$query = $this->db->get('stock');
	return $query->result();
}
	public function getId($name){
		$this->db->like('h_name',$name);
        $query  =   $this->db->get('hospital');
        return $query->result();
	}
	public function requestId($id){
		$this->db->like('br_id',$id);
        $query  =   $this->db->get('bloodrequest');
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
	$this->db->select('hospital.h_name,bloodrequest.br_id,bloodrequest.reason,bloodrequest.blood_type,bloodrequest.unit,bloodrequest.requested_date,bloodrequest.status')
         ->from('hospital')
         ->join('bloodrequest', 'hospital.h_id = bloodrequest.h_id');
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
	public function stockUpdate($dd,$sid)
    {
		 $this->db->update('stock', $dd, array('bs_id' => $sid));
        $query = $this->db->get_where('stock', array('bs_id' => $sid));
        return $query->result();
	}
	public function requestUpdate($cd,$id)
    {
		 $this->db->update('bloodrequest', $cd, array('br_id' => $id));
        $query = $this->db->get_where('bloodrequest', array('br_id' => $id));
        return $query->result();
	}
}
