<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class booth_officers_model extends CI_Model {
	
	function add_booth_officer($p_pic,$id_p1,$id_p2)
	{
		$booth_officer_details=$this->input->post();
		$this->load->library('encrypt');
		$booth_officer_details['password']=$this->encrypt->sha1($booth_officer_details['password']);
		$booth_officer_details['mobile']=$booth_officer_details['mobile'];
		//unset($booth_officer_details['mobile']);
		unset($booth_officer_details['repPassword']);
		unset($booth_officer_details['add_booth_officer']);
		$booth_officer_details['role']="Booth Officer";
		if(isset($p_pic)){
			$booth_officer_details['pro_pic']=$p_pic;
		}
		if(isset($id_p1)){
			$booth_officer_details['id_proof1']=$id_p1;
		}
		if(isset($id_p2)){
			$booth_officer_details['id_proof2']=$id_p2;
		}
		$booth_officer_details['modified']=date("Y-m-d H:i:s");		
		$booth_officer_details['created_by']=$booth_officer_details['modified_by']=$this->session->userdata('id');
		//echo "<pre>";
		//print_r($booth_officer_details); die();
		if ($this->db->insert('users', $booth_officer_details)) {
			return true;
		}
		else{
			return false;
		}
	}
	function manage_booth_officer()
	{
		$booth_officer_details=$this->input->post();
		if ($booth_officer_details['booth_officer_status'] == 'Activated') {
			$booth_officer_data['status']="Deactivated";
		}
		else{
			$booth_officer_data['status']="Activated";
		}
		$this->db->where('id', $booth_officer_details['booth_officer_id']);	
		if ($this->db->update('users', $booth_officer_data)) {
			return true;
		}
		else{
			return false;
		}
	}
	function update_booth_officer($pro_pic)
	{
		$booth_officer_details=$this->input->post();
		if($booth_officer_details['password'] != '')
		{
			$this->load->library('encrypt');
			$booth_officer_details['password']=$this->encrypt->sha1($booth_officer_details['password']);
			
		}
		else{
			unset($booth_officer_details['password']);
		}
		$users_id=$booth_officer_details['id'];
		$booth_officer_details['mobile']=$booth_officer_details['mobile'];
		//unset($booth_officer_details['mobile']);
		unset($booth_officer_details['repPassword']);
		unset($booth_officer_details['update_booth_officer']);
		if(!empty($pro_pic)){
			$booth_officer_details['pro_pic']=$pro_pic;
		}
		$booth_officer_details['modified']=date("Y-m-d H:i:s");	
		$booth_officer_details['modified_by']=$this->session->userdata('id');
		$this->db->where('id', $users_id);
		if ($this->db->update('users', $booth_officer_details)) {
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
	function get_all_booth_officers()
	{		
		$this->db->where('role','Booth Officer');
		$q=$this->db->get('users');
		$data=array();
		if($q->num_rows()>0)
		{
			foreach($q->result() as $row)
			{
				$data[]=$row;
			}
			return $data;  
		}
	}
	function get_username($booth_officer_id)
	{	
		$this->db->select('username');
		$this->db->where('role','Booth Officer');
		$this->db->where('id',$booth_officer_id);	
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
	function get_booth_officer_details($booth_officer_id)
	{	
		$this->db->where('role','Booth Officer');
		$this->db->where('id',$booth_officer_id);	
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

}
