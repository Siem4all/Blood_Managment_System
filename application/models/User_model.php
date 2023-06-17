<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

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
	
	public function index()
	{
		$this->load->view('welcome_message');
	}
	
	public function registerUser($data)
    {
        return $this->db->insert('users', $data);
    }
	public function contact($data)
    {
        return $this->db->insert('contact', $data);
    }
	public function account()
    {
$query = $this->db->get('users');
	return $query->result();
	}
	
	public function getRecord()
    {
$query = $this->db->get('stock');
	return $query->result();
	}
	
	public function userId($id)
    {
		$this->db->where('user_id', $id);
        $this->db->from('users');
        $query = $this->db->get();
        return $query->result();
	}
	public function contactId($id)
    {
		$this->db->where('contact_id', $id);
        $this->db->from('contact');
        $query = $this->db->get();
        return $query->result();
	}
	public function userEmail($email)
    {
		$this->db->where('email', $email);
        $this->db->from('users');
        $query = $this->db->get();
        return $query->result();
	}
	public function delete_row($id){
    $this -> db -> where('contact_id', $id);
   $this -> db -> delete('contact');

}
	public function userUpdate($data,$id)
    {
		 $this->db->update('users', $data, array('user_id' => $id));
        $query = $this->db->get_where('users', array('user_id' => $id));
        return $query->result();
	}
	
	public function login($email, $password){
			$query = $this->db->get_where('users', array('email'=>$email, 'password'=>$password));
			return $query->row_array();
		}
	public function get_user($id)
    {
        $this->db->where('user_id', $id);
        $query = $this->db->get('users');
        return $query->row();
    }

    public function update_user($id, $userdata)
    {
        $this->db->where('user_id', $id);
        $this->db->update('users', $userdata);
    }
	public function ForgotPassword($email)
 {
        $this->db->select('email');
        $this->db->from('users'); 
        $this->db->where('email', $email); 
        $query=$this->db->get();
        return $query->row_array();
 }
 public function sendpassword($data)
{
        $email = $data['email'];
        $query1=$this->db->query("SELECT *  from users where email = '".$email."' ");
        $row=$query1->result_array();
        if ($query1->num_rows()>0)
      
{$mail = $this->phpmailer_lib->load();
        $passwordplain = "";
        $passwordplain  = rand(999999999,9999999999);
        $newpass['password'] = md5($passwordplain);
        $this->db->where('email', $email);
        $this->db->update('users', $newpass); 
        $mail_message='Dear '.$row[0]['fname'].','. "\r\n";
        $mail_message.='Thanks for contacting regarding to forgot password,<br> Your <b>Password</b> is <b>'.$passwordplain.'</b>'."\r\n";
        $mail_message.='<br>Please Update your password.';
        $mail_message.='<br>Thanks & Regards';
        $mail_message.='<br>Assosa Blood Bank';        
        date_default_timezone_set('Etc/UTC');
        $mail->isSMTP();
        $mail->SMTPSecure = "tls"; 
        $mail->Debugoutput = 'html';
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 587;
        $mail->SMTPAuth = true;   
        $mail->Username = "siemghiwet@gmail.com";    
        $mail->Password = "rihcwzklzwyymnxw";
        $mail->setFrom('siemghiwet@gmail.com', 'admin');
        $mail->IsHTML(true);
        $mail->addAddress($email);
        $mail->Subject = 'Assosa Blood Bank';
        $mail->Body    = $mail_message;
        $mail->AltBody = $mail_message;
if (!$mail->send()) {
     $this->session->set_flashdata('error','Failed to send password, please try again!');
} else {
   $this->session->set_flashdata('success','Password sent to your email!');
	redirect(base_url().'#forgot','refresh');        
}
  redirect(base_url().'#forgot','refresh');        
}
else
{  
 $this->session->set_flashdata('error','Email not found try again!');
 redirect(base_url().'#forgot','refresh');
}
}
	
	public function fourEvent() {
$date=date('Y-m-d');
 $this->db->select('*');
$this->db->from('events');
$this->db->where('event_date >=', $date); 
$this->db->order_by('event_id', 'desc');
$this->db->limit(3);
$query = $this->db->get();
  return $query->result();
}
	public function comments() {
 $this->db->select('*');
$this->db->from('contact');
$this->db->order_by('contact_id', 'desc');
$this->db->limit(4);
$query = $this->db->get();
  return $query->result();
}
	public function messages(){
		$this->db->select('contact.contact_id,contact.subject,contact.message,contact.date,users.fname,users.mobile,users.sex,users.mobile,users.email')
         ->from('contact')
         ->join('users', 'contact.user_id = users.user_id');
$query = $this->db->get();
return $query->result();
    
	}
	public function notification() {
		$r=date('Y-m-d');
	$date=date('Y-m-d', strtotime("+0 years +0 months +7 days", strtotime($r)));
 $this->db->select('*');
$this->db->from('blood');
$this->db->where('expiration_date <=', $date);
$this->db->where('expiration_date >=', $r); 
$this->db->order_by('blood_id', 'desc');
$query = $this->db->get();
  return $query->result();
}
}
