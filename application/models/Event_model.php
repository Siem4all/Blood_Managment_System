<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event_model extends CI_Model {

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
	
	
	public function addEvent($data)
    {
        return $this->db->insert('events', $data);
    }
	
	public function displayEvent(){
	$query = $this->db->get('events');
	return $query->result();
}
	
	public function editEvent($id){
		$this->db->like('event_id',$id);
        $query  =$this->db->get('events');
        return $query->result();
	}
	
	public function updateEvent($data,$id)
    {
		 $this->db->update('events', $data, array('event_id' => $id));
        $query = $this->db->get_where('events', array('event_id' => $id));
        return $query->result();
	}
	public function fourEvent() {

 $this->db->select('*');
$this->db->from('events');
$this->db->order_by('event_id', 'desc');
$this->db->limit(4);
$query = $this->db->get();
  return $query->result();
}
	public function delete_row($id){
    $this -> db -> where('event_id', $id);
   $this -> db -> delete('events');

}
}
