<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class reports_model extends CI_Model {	
	function get_all_projects()
	{		
		$this->db->select('id,name');
		$this->db->where('status','Activated');
		$q=$this->db->get('projects');
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
	function get_all_members()
	{		
		$this->db->select('id,first_name,last_name');
		$this->db->where('status','Activated');
		$this->db->where('role','Member');
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
	function get_all_level_details(){
		$q=$this->db->get('levels');
		$data=array();
		//echo $this->db->last_query(); die();
		if($q->num_rows()>0)
		{
			foreach($q->result() as $row)
			{
				$data[$row->level_number]=array('level_pay'=>$row->level_pay,'fix_pay'=>$row->fix_pay);
			}
			//print_r($q->result()); die();
			return $data;  
		}

	}
	function get_all_reports_details(){
		$query="select t.member_id,p.name,u.first_name,u.last_name,t.depth_level from tree as t left join users as u on t.member_id=u.id left join projects as p on t.project_id=p.id where t.member_id!=0";
		$q=$this->db->query($query);
		//echo $this->db->last_query(); print_r($q->result()); die();;
		$data=array();
		if($q->num_rows()>0)
		{			
			foreach($q->result() as $row)
			{
				$level_pay_query="select ifnull(sum(ammount),0) as ammount from transactions where pay_type = 'level_pay' and  member_id = ?";
				$level_pay_result=$this->db->query($level_pay_query,$row->member_id);
				//echo $this->db->last_query(); print_r($level_pay_result->result()); die();
				$level_pay=$level_pay_result->row('ammount');
				$direct_pay_query="select ifnull(sum(ammount),0) as ammount from transactions where pay_type = 'direct_pay' and  member_id = ?";
				$direct_pay_result=$this->db->query($direct_pay_query,$row->member_id);
				//echo $this->db->last_query(); print_r($direct_pay_result->result()); die();
				$direct_pay=$direct_pay_result->row('ammount');				
				$data[]=array('member_id'=>$row->member_id,'member_name'=>$row->first_name." ".$row->last_name,'project_name'=>$row->name,'level_pay'=>$level_pay,'direct_pay'=>$direct_pay,'total_pay'=>$level_pay+$direct_pay);
			}
			//print_r($data); die();
			return $data;  
		}
	}
	function get_project_reports_details($project_id){
		$query="select t.member_id,p.name,u.first_name,u.last_name,t.depth_level from tree as t left join users as u on t.member_id=u.id left join projects as p on t.project_id=p.id where t.member_id!=0 and t.project_id=?";
		$q=$this->db->query($query,$project_id);
		//echo $this->db->last_query(); print_r($q->result()); die();;
		$data=array();
		if($q->num_rows()>0)
		{			
			foreach($q->result() as $row)
			{
				$level_pay_query="select ifnull(sum(ammount),0) as ammount from transactions where pay_type = 'level_pay' and  member_id = ?";
				$level_pay_result=$this->db->query($level_pay_query,$row->member_id);
				//echo $this->db->last_query(); print_r($level_pay_result->result()); die();
				$level_pay=$level_pay_result->row('ammount');
				$direct_pay_query="select ifnull(sum(ammount),0) as ammount from transactions where pay_type = 'direct_pay' and  member_id = ?";
				$direct_pay_result=$this->db->query($direct_pay_query,$row->member_id);
				//echo $this->db->last_query(); print_r($direct_pay_result->result()); die();
				$direct_pay=$direct_pay_result->row('ammount');				
				$data[]=array('member_id'=>$row->member_id,'member_name'=>$row->first_name." ".$row->last_name,'project_name'=>$row->name,'level_pay'=>$level_pay,'direct_pay'=>$direct_pay,'total_pay'=>$level_pay+$direct_pay);
			}
			//print_r($data); die();
			return $data;  
		}

	}
	function get_member_reports_details($member_id){
		$query="select t.member_id,p.name,u.first_name,u.last_name,t.depth_level from tree as t left join users as u on t.member_id=u.id left join projects as p on t.project_id=p.id where t.member_id!=0 and t.member_id=?";
		$q=$this->db->query($query,$member_id);
		//echo $this->db->last_query(); print_r($q->result()); die();;
		$data=array();
		if($q->num_rows()>0)
		{			
			foreach($q->result() as $row)
			{
				$level_pay_query="select ifnull(sum(ammount),0) as ammount from transactions where pay_type = 'level_pay' and  member_id = ?";
				$level_pay_result=$this->db->query($level_pay_query,$row->member_id);
				//echo $this->db->last_query(); print_r($level_pay_result->result()); die();
				$level_pay=$level_pay_result->row('ammount');
				$direct_pay_query="select ifnull(sum(ammount),0) as ammount from transactions where pay_type = 'direct_pay' and  member_id = ?";
				$direct_pay_result=$this->db->query($direct_pay_query,$row->member_id);
				//echo $this->db->last_query(); print_r($direct_pay_result->result()); die();
				$direct_pay=$direct_pay_result->row('ammount');				
				$data[]=array('member_id'=>$row->member_id,'member_name'=>$row->first_name." ".$row->last_name,'project_name'=>$row->name,'level_pay'=>$level_pay,'direct_pay'=>$direct_pay,'total_pay'=>$level_pay+$direct_pay);
			}
			//print_r($data); die();
			return $data;  
		}

	}
	function get_member_details($member_id){
		$query="select u.id,u.first_name,u.last_name,p.name from tree as t left join users as u on t.member_id=u.id left join projects as p on t.project_id=p.id where t.member_id=?";
		$q=$this->db->query($query,$member_id);
		//echo $this->db->last_query(); print_r($q->result()); die();;
		$data=array();
		if($q->num_rows()>0)
		{	
			$data=array('member_id'=>$q->row('id'),'member_name'=>$q->row('first_name')." ".$q->row('last_name'),'project_name'=>$q->row('name'));
			return $data;  
		}

	}
	function get_member_transaction_details($transaction_id){
		$this->db->select('id,member_id,ammount,pay_type,depth_level,created');
		$this->db->where('id',$transaction_id);
		$q=$this->db->get('transactions');
		$data=array();
		$query="select u.id,u.first_name,u.last_name,u.address,u.email,u.mobile,p.name from tree as t left join users as u on t.member_id=u.id left join projects as p on t.project_id=p.id where t.member_id=?";
		$p=$this->db->query($query,$q->row('member_id'));
		$trans_date=explode(' ', $q->row('created'));
		$trans_date=explode('-', $trans_date[0]);
		$transaction_id="#".$trans_date[0].$trans_date[1].$q->row('id');
		$transaction_date=$trans_date[2]."/".$trans_date[1]."/".$trans_date[0];

		$this->db->select('id,created');
		$this->db->where('transaction_id',$q->row('id'));
		$r=$this->db->get('invoices');
		//echo $this->db->last_query(); print_r($r->result()); die();;
		$invo_date=explode(' ', $r->row('created'));
		$invo_date=explode('-', $invo_date[0]);
		$invoice_id="#".$invo_date[0].$invo_date[1].$r->row('id');
		$invoice_date=$invo_date[2]."/".$invo_date[1]."/".$invo_date[0];
		$data=array('transaction_id'=>$transaction_id,'invoice_id'=>$invoice_id,'invoice_date'=>$invoice_date,'member_id'=>$q->row('member_id'),'member_name'=>$p->row('first_name')." ".$p->row('last_name'),'member_address'=>$p->row('address'),'member_email'=>$p->row('email'),'member_mobile'=>$p->row('mobile'),'project_name'=>$p->row('name'),'transaction_date'=>$transaction_date,'pay_type'=>$q->row('pay_type'),'ammount'=>$q->row('ammount'));
		return $data; 

	}
	function create_new_invoice($transaction_id){
		$invoice_details['transaction_id']=$transaction_id;
		$invoice_details['created_by']=$this->session->userdata('id');
		if($this->db->insert('invoices',$invoice_details)){
			return true;
		}
		else{
			return false;
		}
	}
	
	function get_member_all_transactions_details($member_id){
		$this->db->select('id,ammount,pay_type,depth_level,created');
		$this->db->where('member_id',$member_id);
		$q=$this->db->get('transactions');
		$data=array();
		if($q->num_rows()>0)
		{
			foreach($q->result() as $row)
			{
				$this->db->select('id');
				$this->db->where('transaction_id',$row->id);
				$p=$this->db->get('invoices');
				if($p->num_rows()>0)
				{
					$row->print=1;
					$data[]=$row;
				}
				else{					
					$row->print=0;
					$data[]=$row;
				}
			}
			return $data;  
		}

	}
	function get_date_wise_reports_details($date_from,$date_to){
		$query="select t.member_id,p.name,u.first_name,u.last_name,t.depth_level from tree as t left join users as u on t.member_id=u.id left join projects as p on t.project_id=p.id where t.member_id!=0 and date(t.created) between '".$date_from."' and '".$date_to."'";
		$q=$this->db->query($query);
		//echo $this->db->last_query(); print_r($q->result()); die();;
		$data=array();
		if($q->num_rows()>0)
		{			
			foreach($q->result() as $row)
			{
				$level_pay_query="select ifnull(sum(ammount),0) as ammount from transactions where pay_type = 'level_pay' and  member_id = ?";
				$level_pay_result=$this->db->query($level_pay_query,$row->member_id);
				//echo $this->db->last_query(); print_r($level_pay_result->result()); die();
				$level_pay=$level_pay_result->row('ammount');
				$direct_pay_query="select ifnull(sum(ammount),0) as ammount from transactions where pay_type = 'direct_pay' and  member_id = ?";
				$direct_pay_result=$this->db->query($direct_pay_query,$row->member_id);
				//echo $this->db->last_query(); print_r($direct_pay_result->result()); die();
				$direct_pay=$direct_pay_result->row('ammount');				
				$data[]=array('member_id'=>$row->member_id,'member_name'=>$row->first_name." ".$row->last_name,'project_name'=>$row->name,'level_pay'=>$level_pay,'direct_pay'=>$direct_pay,'total_pay'=>$level_pay+$direct_pay);
			}
			//print_r($data); die();
			return $data;  
		}

	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */