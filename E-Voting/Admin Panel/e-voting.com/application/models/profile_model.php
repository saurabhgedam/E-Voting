<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class profile_model extends CI_Model {

	function get_profile_details()
	{	
		$id=$this->session->userdata('id');
		$role=$this->session->userdata('role');
		$this->db->where('role',$role);
		$this->db->where('id',$id);	
		$q=$this->db->get('users');
		$data=array();
		if($q->num_rows()>0)
		{
			foreach($q->result() as $row)
			{
				$data=$row;
			}
			return $data;  
		}
	}
	function update_profile($img)
	{ 
		$profile_details=$this->input->post();
		if($profile_details['password'] != '')
		{
			$this->load->library('encrypt');
			$profile_details['password']=$this->encrypt->sha1($profile_details['password']);			
		}
		else{
			unset($profile_details['password']);
		}
		$users_id=$profile_details['id'];
		$profile_details['mobile']=$profile_details['tel'];
		unset($profile_details['tel']);
		unset($profile_details['repPassword']);
		unset($profile_details['update_profile']);
		if(!empty($img)){
			$profile_details['pro_pic']=$img;
		}	
		
		$profile_details['modified']=date("Y-m-d H:i:s");	
		$profile_details['modified_by']=$this->session->userdata('id');
		$this->db->where('id', $users_id);
		if ($this->db->update('users', $profile_details)) {
			$this->db->where('id', $users_id);
			 $q=$this->db->get('users');
			if($q->num_rows()>0)
			{			
				
				return $q->result();  
			}
			else{
				return false;
			}	
	 	}
	}
	function get_username($id)
	{	
		$this->db->select('username');
		$this->db->where('id',$id);	
		$q=$this->db->get('users');
		$data=array();
		if($q->num_rows()>0)
		{
			foreach($q->result() as $row)
			{
				$data=$row->username;
			}
			return $data;  
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */