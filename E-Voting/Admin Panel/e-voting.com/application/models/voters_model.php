<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class voters_model extends CI_Model {
	
	function add_voter($p_pic,$id_p1,$id_p2)
	{
		$voter_details=$this->input->post();
		$this->load->library('encrypt');
		$voter_details['password']=$this->encrypt->sha1($voter_details['password']);
		$voter_details['mobile']=$voter_details['tel'];
		unset($voter_details['tel']);
		unset($voter_details['repPassword']);
		unset($voter_details['add_voter']);
		$voter_details['role']="Voter";
		if(isset($p_pic)){
			$voter_details['pro_pic']=$p_pic;
		}
		if(isset($id_p1)){
			$voter_details['id_proof1']=$id_p1;
		}
		if(isset($id_p2)){
			$voter_details['id_proof2']=$id_p2;
		}
		$voter_details['modified']=date("Y-m-d H:i:s");		
		$voter_details['created_by']=$voter_details['modified_by']=$this->session->userdata('id');
		//echo "<pre>";
		//print_r($voter_details); die();
		if ($this->db->insert('users', $voter_details)) {
			return true;
		}
		else{
			return false;
		}
	}
	function manage_voter()
	{
		$voter_details=$this->input->post();
		if ($voter_details['voter_status'] == 'Activated') {
			$voter_data['status']="Deactivated";
		}
		else{
			$voter_data['status']="Activated";
		}
		$this->db->where('id', $voter_details['voter_id']);	
		if ($this->db->update('users', $voter_data)) {
			return true;
		}
		else{
			return false;
		}
	}
	function update_voter($pro_pic)
	{
		$voter_details=$this->input->post();
		if($voter_details['password'] != '')
		{
			$this->load->library('encrypt');
			$voter_details['password']=$this->encrypt->sha1($voter_details['password']);
			
		}
		else{
			unset($voter_details['password']);
		}
		$users_id=$voter_details['id'];
		$voter_details['mobile']=$voter_details['tel'];
		unset($voter_details['tel']);
		unset($voter_details['repPassword']);
		unset($voter_details['update_voter']);
		$voter_details['current_address']=$voter_details['current_address'];
		if(!empty($pro_pic)){
			$voter_details['pro_pic']=$pro_pic;
		}
		$voter_details['modified']=date("Y-m-d H:i:s");	
		$voter_details['modified_by']=$this->session->userdata('id');
		$this->db->where('id', $users_id);
		if ($this->db->update('users', $voter_details))
		 {
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
	function get_all_voters()
	{		
		$this->db->where('role','Voter');
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
	function get_reference_by($project_details)
	{		
		$this->db->select('users.id,users.first_name,users.last_name');
		$this->db->from('users');
		$this->db->join('tree', 'tree.voter_id = users.id');
		$this->db->where('tree.project_id',$project_details['project_id']);
		$q=$this->db->get();
		$data=array();
		//echo $this->db->last_query(); die();
		if($q->num_rows()>0)
		{
			foreach($q->result() as $row)
			{
				$data[]=array('id'=>$row->id,'name'=>$row->first_name." ".$row->last_name);
			}
			return $data;  
		}
	}
	function get_username($voter_id)
	{	
		$this->db->select('username');
		$this->db->where('role','Voter');
		$this->db->where('id',$voter_id);	
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
	function get_voter_details($voter_id)
	{	
		$this->db->where('role','Voter');
		$this->db->where('id',$voter_id);	
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

	function get_parent($project_id)
	{				
		$this->db->select('value');
		$this->db->where('key','max_levels');
		$con=$this->db->get('configurations');
		$max_levels=$con->result();
		$max_levels=$max_levels[0]->value;

		$this->db->select('tree.depth_level,users.id,users.first_name,users.last_name');
		$this->db->from('users');
		$this->db->join('tree', 'tree.voter_id = users.id');
		$this->db->where('users.status','Activated');
		$this->db->where('tree.project_id',$project_id);
		$q=$this->db->get();
		$parent=array();
		if($q->num_rows() > 1)
		{			
			foreach($q->result() as $row)
			{
				$this->db->where('parent_id',$row->id);
				$this->db->where('project_id',$project_id);
				$tree=$this->db->get('tree');;
				if($tree->num_rows() < 2)
				{				
					$parent['id']=$row->id;
					$parent['name']=$row->first_name." ".$row->last_name;;
					$parent['depth_level']=$row->depth_level+1;	
					if ($parent['depth_level'] <= $max_levels) {
						return $parent;
					}
					else{
						return false;
					}
				}
			}	
		}
		else{
			$this->db->select('name');
			$this->db->where('id',$project_id);
			$p=$this->db->get('projects');
			foreach($p->result() as $row)
			{
				$project_name=$row->name;
			}
			$parent['id']=0;
			$parent['name']=$project_name;
			$parent['depth_level']=1;
			if ($parent['depth_level'] <= $max_levels) {
				return $parent;
			}
			else{
				return false;
			}

		}		
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */