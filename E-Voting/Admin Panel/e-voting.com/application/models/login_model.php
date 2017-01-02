<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login_model extends CI_Model {
	
	function authenticate_user($username,$password)
	{
		$password=$this->encrypt->sha1($password);
		$this->db->where('username',$username);
		$this->db->where('password',$password);
		$this->db->where('status','Activated');
		$q=$this->db->get('users');
		if($q->num_rows>0)
		{	
				$user_data=array(
								'id'=>$q->row('id'),
								'first_name'=>$q->row('first_name'),
								'last_name'=>$q->row('last_name'),
								'role'=>$q->row('role'),
								'mobile'=>$q->row('mobile'),
								'email'=>$q->row('email'),
								'gender'=>$q->row('gender'),
								'image'=>$q->row('pro_pic')
								);
				//print_r($user_data);exit();

				$this->session->set_userdata($user_data);
				return TRUE;
		}
		else{
			return FALSE;
		}

	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
?>