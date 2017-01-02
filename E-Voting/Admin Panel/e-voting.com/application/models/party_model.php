<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class party_model extends CI_Model {
	
	function add_party($p_logo)
	{
		$partyname=$this->input->post('partyname');
		$data = array('name'=>$partyname,
					  'party_logo'=>$p_logo); 
		$data['modified']=date("Y-m-d H:i:s");		
		$data['created_by']=$data['modified_by']=$this->session->userdata('id');
		
		return $this->db->insert('party',$data);		
	}
	function manage_party()
	{
		$party_details=$this->input->post();
		if ($party_details['party_status'] == 'Activated') {
			$party_data['status']="Deactivated";
		}
		else{
			$party_data['status']="Activated";
		}
		//print_r($party_data);exit();
		$this->db->where('id', $party_details['party_id']);	
		if ($this->db->update('party', $party_data)) {
			return true;
		}
		else{
			return false;
		}
	}
	function update_party($party_logo)
	{
		$party_details=$this->input->post();
		
		
		unset($party_details['update_party']);
		$party_id=$party_details['id'];
		if(!empty($party_logo)){
			$party_details['party_logo']=$party_logo;
		}
		$party_details['modified']=date("Y-m-d H:i:s");	
		$party_details['modified_by']=$this->session->userdata('id');
		$this->db->where('id', $party_id);
		if ($this->db->update('party', $party_details))
		 {
			$this->db->where('id', $party_id);
			 $q=$this->db->get('party');
			if($q->num_rows()>0)
			{			
				return $q->result();  
			}
			else{
				return false;
			}	
	 	}
	}
	function get_all_parties()
	{		
		//$this->db->where('role','Candidate');
		$q=$this->db->get('party');
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
	function get_partyname($party_id)
	{	
		$this->db->select('name');
		$this->db->where('id',$party_id);	
		$q=$this->db->get('party');
		$data=array();
		if($q->num_rows()>0)
		{
			foreach($q->result() as $row)
			{
				$data=$row->name;
			}
			return $data;  
		}
	}
	function get_party_details($party_id)
	{	
		$this->db->where('id',$party_id);	
		$q=$this->db->get('party');
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
