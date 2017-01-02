<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class levels_model extends CI_Model {
	
	function add_level($level_details)
	{
		unset($level_details['add_level']);		
		$level_details['modified']=date("Y-m-d H:i:s");
		$level_details['created_by']=$level_details['modified_by']=$this->session->userdata('id');
		if ($this->db->insert('levels', $level_details)) {
			return true;
		}
		else{
			return false;
		}
	}
	function manage_level($level_details)
	{		
		$this->db->select('id,level_number,level_pay');
		$this->db->where('id', $level_details['level_id']);	
		$q = $this->db->get('levels');
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
	function update_level($level_details)
	{		
		$level_id=$level_details['id'];		
		unset($level_details['update_level']);	
		if ($level_details['level_number']) {
			unset($level_details['level_number']);
		}	
		$level_details['modified']=date("Y-m-d H:i:s");
		$level_details['modified_by']=$this->session->userdata('id');
		$this->db->where('id', $level_id);
		if ($this->db->update('levels', $level_details)) {
			return true;
		}
		else{
			return false;
		}
	}
	function update_max_levels($max_levels)
	{			
		$max_levels['value']=$max_levels['max_levels'];
		unset($max_levels['max_levels']);
		unset($max_levels['update_max_levels']);
		$max_levels['modified_by']=$this->session->userdata('id');
		$this->db->where('key','max_levels');
		if ($this->db->update('configurations', $max_levels)) {
			return true;
		}
		else{
			return false;
		}
	}
	function update_direct_pay($direct_pay)
	{			
		$direct_pay['value']=$direct_pay['direct_pay'];
		unset($direct_pay['direct_pay']);
		unset($direct_pay['update_direct_pay']);
		$direct_pay['modified']=date("Y-m-d H:i:s");
		$max_levels['modified_by']=$this->session->userdata('id');
		$this->db->where('key','direct_pay');
		if ($this->db->update('configurations', $direct_pay)) {
			return true;
		}
		else{
			return false;
		}
	}
	function get_all_levels()
	{	
		$q = $this->db->get('levels');
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
	function get_last_level()
	{		
		$this->db->select_max('level_number');
		$q=$this->db->get('levels');
		if($q->num_rows()>0)
		{
			foreach($q->result() as $row)
			{
				$last_level=$row->level_number;
			}  
		}
		return $last_level;
	}
	function get_level_number($level_id)
	{	
		$this->db->select('level_number');
		$this->db->where('id',$level_id);	
		$q=$this->db->get('levels');
		$data=array();
		if($q->num_rows()>0)
		{
			foreach($q->result() as $row)
			{
				$data=$row->level_number;
			}
			return $data;  
		}
	}
	function get_max_levels()
	{	
		$this->db->select('value');
		$this->db->where('key','max_levels');	
		$q=$this->db->get('configurations');
		$data=array();
		if($q->num_rows()>0)
		{
			foreach($q->result() as $row)
			{
				$data=$row->value;
			}
			return $data;;  
		}
	}
	function get_direct_pay()
	{	
		$this->db->select('value');
		$this->db->where('key','direct_pay');	
		$q=$this->db->get('configurations');
		$data=array();
		if($q->num_rows()>0)
		{
			foreach($q->result() as $row)
			{
				$data=$row->value;
			}
			return $data;;  
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */