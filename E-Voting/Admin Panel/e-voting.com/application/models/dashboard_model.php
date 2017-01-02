<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dashboard_model extends CI_Model {
	
	function get_activated_voters(){
		$this->db->where('role','Voter');
		$this->db->where('status','Activated');
		$q=$this->db->get('users');
		return $q->num_rows();
	}
	function get_deactivated_voters(){
		$this->db->where('role','Voter');
		$this->db->where('status','Deactivated');
		$q=$this->db->get('users');
		return $q->num_rows();
	}
	function get_activated_admins(){
		$this->db->where('role','Admin');
		$this->db->where('status','Activated');
		$q=$this->db->get('users');
		return $q->num_rows();
	}
	function get_deactivated_admins(){
		$this->db->where('role','Admin');
		$this->db->where('status','Deactivated');
		$q=$this->db->get('users');
		return $q->num_rows();
	}
	function get_activated_booth_officers(){
		$this->db->where('role','Booth Officer');
		$this->db->where('status','Activated');
		$q=$this->db->get('users');
		return $q->num_rows();
	}
	function get_deactivated_booth_officers(){
		$this->db->where('role','Booth Officer');
		$this->db->where('status','Deactivated');
		$q=$this->db->get('users');
		return $q->num_rows();
	}
	function get_activated_candidates(){
		$this->db->where('role','Candidate');
		$this->db->where('status','Activated');
		$q=$this->db->get('users');
		return $q->num_rows();
	}
	function get_deactivated_candidates(){
		$this->db->where('role','Candidate');
		$this->db->where('status','Deactivated');
		$q=$this->db->get('users');
		return $q->num_rows();
	}
	function get_activated_elections(){
		$this->db->where('status','Activated');
		$q=$this->db->get('elections');
		return $q->num_rows();
	}
	function get_deactivated_elections(){
		$this->db->where('status','Deactivated');
		$q=$this->db->get('elections');
		return $q->num_rows();
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */