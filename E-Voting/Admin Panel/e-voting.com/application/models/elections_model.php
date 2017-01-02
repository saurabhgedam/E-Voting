<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class elections_model extends CI_Model {
	
	function add_election()
	{
		$date = $this->input->post('date');
	
		//$date = explode('-', $date);
		$from = $date;
		$from = explode('/', $from);
		$from = trim($from[2]).'-'.trim($from[0]).'-'.trim($from[1]);
		$election_details=$this->input->post();
        
		unset($election_details['date']);
		unset($election_details['add_election']);
		
		$election_details['from']=$from;
	//	print_r($election_details['from']);exit();
		//$election_details['to']=$to;
		$election_details['modified']=date("Y-m-d H:i:s");		
		$election_details['created_by']=$election_details['modified_by']=$this->session->userdata('id');
		if ($this->db->insert('elections', $election_details)) {
			return true;
		}
		else{
			return false;
		}
	}
	function manage_election($election_details)
	{
		if ($election_details['election_status'] == 'Activated') {
			$election_data['status']="Deactivated";
		}
		else{
			$election_data['status']="Activated";
		}
		$this->db->where('id', $election_details['election_id']);	
		if ($this->db->update('elections', $election_data)) {
			return true;
		}
		else{
			return false;
		}
	}
	function update_election($election_details)
	{
		$date = $this->input->post('date');
		$from = $date;
		$from = explode('/', $from);
		$from = trim($from[2]).'-'.trim($from[0]).'-'.trim($from[1]);
		$election_details=$this->input->post();
        
		$election_details=$this->input->post();
        
		unset($election_details['date']);
		unset($election_details['add_election']);
		
		$election_details['from']=$from;
		//$election_details['to']=$to;
		unset($election_details['update_election']);		
		$election_details['modified']=date("Y-m-d H:i:s");
		$election_details['modified_by']=$this->session->userdata('id');
		$this->db->where('id', $election_details['id']);
		if ($this->db->update('elections', $election_details)) {
			return true;
		}
		else{
			return false;
		}
	}
	function get_all_elections()
	{		
		$q=$this->db->get('elections');
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
	function get_election_name($election_id)
	{	
		$this->db->select('name');
		$this->db->where('id',$election_id);	
		$q=$this->db->get('elections');
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
	function get_election_details($election_id)
	{	
		$this->db->where('id',$election_id);	
		$q=$this->db->get('elections');
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

