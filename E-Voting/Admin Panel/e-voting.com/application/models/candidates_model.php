<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class candidates_model extends CI_Model {
	
	function add_candidate($p_pic,$p_logo,$id_p1,$id_p2)
	{
		
		$this->load->library('encrypt');

        $user_details=array('username'=>$this->input->post('username'),
        					'password'=>$this->encrypt->sha1($this->input->post('password')),
        					'role'=>"Candidate",
        					'first_name'=>$this->input->post('first_name'),
        					'last_name'=>$this->input->post('last_name'),
        					'gender'=>$this->input->post('gender'),
        					'age'=>$this->input->post('age'),
        					'mobile'=>$this->input->post('mobile'),
        					'email'=>$this->input->post('email'),
        					'current_address'=>$this->input->post('current_address'),
        					'address'=>$this->input->post('address'),
        					'pro_pic'=>$p_pic,
        					'voting_card_no'=>$this->input->post('voting_card_no'),
        					'pan_card_no'=>$this->input->post('pan_card_no'),
        					'id_proof1'=>$id_p1,
        					'id_proof2'=>$id_p2,
        					'ward'=>$this->input->post('ward')

        					);

        //print_r($user_details);exit();

		$user_details['modified']=date("Y-m-d H:i:s");
		$user_details['created_by']=$user_details['modified_by']=$this->session->userdata('id');
//print_r($user_details);exit();

		$mul_array = $this->input->post('electon');
		//print_r($mul_array);exit();
		
		$candidate_details=array('party'=>$this->input->post('party'),
								 'party_logo'=>$p_logo, 	
								 'education'=>$this->input->post('education'),
								 'category'=>$this->input->post('category'), 	
								 'criminal_cases'=>$this->input->post('criminal_cases'),
								 'profile'=>$this->input->post('profile')
								);


		$candidate_details['modified']=$user_details['modified']=date("Y-m-d H:i:s");		
		$candidate_details['created_by']=$candidate_details['modified_by']=$user_details['created_by']=$user_details['modified_by']=$this->session->userdata('id');
		//print_r($candidate_details);exit();
		
       /*
		$user_details['role']="Candidate";
		$candidate_details['party']=$user_details['party'];	

		$candidate_details['education']=$user_details['education'];
		$candidate_details['category']=$user_details['category'];		
		$candidate_details['criminal_cases']=$user_details['criminal_cases'];			
		$candidate_details['profile']=$user_details['profile'];
		unset($user_details['party']);
		unset($user_details['education']);
		unset($user_details['category']);
		unset($user_details['criminal_cases']);
		unset($user_details['profile']);
		unset($user_details['tel']);
		unset($user_details['repPassword']);
		unset($user_details['add_candidate']);
	*/
		
		if(isset($p_pic)){
			$user_details['pro_pic']=$p_pic;
		}
		if(isset($p_logo)){
			$candidate_details['party_logo']=$p_logo;
		}
		if(isset($id_p1)){
			$user_details['id_proof1']=$id_p1;
		}
		if(isset($id_p2)){
			$user_details['id_proof2']=$id_p2;
		}

		

		if ($this->db->insert('users', $user_details)) {
			$user_id=$this->db->insert_id();
			$candidate_details['user_id']=$user_id;
			if ($this->db->insert('candidates', $candidate_details)) 
			{
				foreach($mul_array as $key){
					$candidate_election = array(
						"candidate_id"=>$user_id,
						"election_id"=> $key
					);
					$this->db->insert("candidate_election",$candidate_election);
				}
				return true;
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}
	}
	function manage_candidate()
	{
		$candidate_details=$this->input->post();
		if ($candidate_details['candidate_status'] == 'Activated') {
			$candidate_data['status']="Deactivated";
		}
		else{
			$candidate_data['status']="Activated";
		}
		$this->db->where('id', $candidate_details['candidate_id']);	
		if ($this->db->update('users', $candidate_data)) {
			return true;
		}
		else{
			return false;
		}
	}
	/*function update_candidate($pro_pic,$party_logo)
	{
		$this->load->library('encrypt');
      
      $user_details=$this->input->post('pro_pic');

        $user_details=array('username'=>$this->input->post('username'),
        					'password'=>$this->encrypt->sha1($this->input->post('password')),
        					'role'=>"Candidate",
        					'first_name'=>$this->input->post('first_name'),
        					'last_name'=>$this->input->post('last_name'),
        					'gender'=>$this->input->post('gender'),
        					//'age'=>$this->input->post('age'),
        					'mobile'=>$this->input->post('mobile'),
        					'email'=>$this->input->post('email'),
        					'current_address'=>$this->input->post('current_address'),
        					//'permanant_address'=>$this->input->post('permanant_address'),
        					//'pro_pic'=>$pro_pic,
        					//'voting_card_no'=>$this->input->post('voting_card_no'),
        					//'pan_card_no'=>$this->input->post('pan_card_no'),
        					//'id_proof1'=>$id_p1,
        					//'id_proof2'=>$id_p2,
        					'ward'=>$this->input->post('ward')

        					);

        //print_r($user_details);exit();

		$user_details['modified']=date("Y-m-d H:i:s");
		$user_details['created_by']=$user_details['modified_by']=$this->session->userdata('id');
//print_r($user_details);exit();
 
        $mul_array = $this->input->post('electon');
		//print_r($mul_array);exit();
		$candidate_details=$this->input->post('id');
		$user_id=$candidate_details;
		//print_r($user_id);exit();
		$candidate_details=$this->input->post('party_logo');
		$candidate_details=array('party'=>$this->input->post('party')
								 //'party_logo'=>$party_logo, 	
								// 'education'=>$this->input->post('education'),
								// 'category'=>$this->input->post('category'), 	
								// 'criminal_cases'=>$this->input->post('criminal_cases'),
								 //'profile'=>$this->input->post('profile')
								);


		
		$candidate_details['modified']=$user_details['modified']=date("Y-m-d H:i:s");		
		$candidate_details['created_by']=$candidate_details['modified_by']=$user_details['created_by']=$user_details['modified_by']=$this->session->userdata('id');
		//print_r($candidate_details);exit();
		/*if(!empty($pro_pic)){
			$voter_details['pro_pic']=$pro_pic;
		}
		*/
		/*if(!empty($pro_pic)){
			$user_details['pro_pic']=$pro_pic;
		}
		
		if(!empty($party_logo)){
			$candidate_details['party_logo']=$party_logo;
		}
		if(isset($id_p1)){
			$user_details['id_proof1']=$id_p1;
		}
		if(isset($id_p2)){
			$user_details['id_proof2']=$id_p2;
		}
 
        
		
		$this->db->where('id', $user_id);
		if ($this->db->update('users', $user_details)) {
			//$user_id=$this->db->insert_id();
			//$candidate_details['user_id']=$user_id;
			$this->db->where('user_id', $user_id);
			if ($this->db->update('candidates', $candidate_details)) 
			{

				$selected_elections="SELECT election_id FROM `candidate_election` WHERE candidate_id =".$user_id;      
			        $q2=$this->db->query($selected_elections)->result();
			       // print_r($q2);exit();
			        foreach($q2 as $q2)
			        {
					   $selected[]=$q2->election_id;
					}
					$qwe=implode(",", $selected);
				//print_r($qwe);exit();	
			 //print_r($mul_array);exit();

					foreach($mul_array as $key)
					{
						$candidate_election = array( "candidate_id"=>$user_id,
													 "election_id"=> $key
													);	
						//$ab=in_array($key,$selected);
					//print_r($key);exit();
				   //  $this->db->where('id', $user_id);
					 //$this->db->update("candidate_election",$candidate_election);
				    	
					 
					$data="delete  from candidate_election where  candidate_id =".$user_id;
			      $q1=$this->db->query($data);
			      // print_r($qq);exit();	exit();
				//print_r($key);exit();
						 

/*
						   if(!in_array($selected, $mul_array))
				   {
				   	  //echo "success";exit();				      //print_r($_POST);exit();
                    $data="delete * from candidate_election where  candidate_id ='".$user_id."' AND election_id='".$key."'  ";      
					   $qq= $this->db->query($data);
			      // print_r($qq);exit();	
				   }
*/

				/*	
				$sql="SELECT candidate_id,election_id FROM `candidate_election` WHERE candidate_id IN (".$user_id.") AND election_id IN (".$key.")";      
				    $q1=$this->db->query($sql)->result();
				  // print_r($q1);exit();
				    if($q1)
				    {	
				        	// print_r($_POST);exit();
	                      
				          


				    	$this->db->where('id', $user_id);
					    $this->db->update("candidate_election",$candidate_election);
				    	

				    }

				    else
				    {
			             $this->db->insert("candidate_election",$candidate_election);
			        }
			        */
			        
			    /*         
				}
				
				 
				return true;
			}
			else{
				return false;
			}
		}
		else{
			return false;
		}

	/*	$this->db->where('id', $users_id);
		if ($this->db->update('users', $candidate_details)) 
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
	
	}*/

	function update_candidate($pro_pic,$party_logo)
	{

		$this->load->library('encrypt');
      
      $user_details=$this->input->post('pro_pic');

        $user_details=array('username'=>$this->input->post('username'),
        					'password'=>$this->encrypt->sha1($this->input->post('password')),
        					'role'=>"Candidate",
        					'first_name'=>$this->input->post('first_name'),
        					'last_name'=>$this->input->post('last_name'),
        					'gender'=>$this->input->post('gender'),
        					//'age'=>$this->input->post('age'),
        					'mobile'=>$this->input->post('mobile'),
        					'email'=>$this->input->post('email'),
        					'current_address'=>$this->input->post('current_address'),
        					//'permanant_address'=>$this->input->post('permanant_address'),
        					//'pro_pic'=>$pro_pic,
        					//'voting_card_no'=>$this->input->post('voting_card_no'),
        					//'pan_card_no'=>$this->input->post('pan_card_no'),
        					//'id_proof1'=>$id_p1,
        					//'id_proof2'=>$id_p2,
        					'ward'=>$this->input->post('ward')

        					);

        //print_r($user_details);exit();

		$user_details['modified']=date("Y-m-d H:i:s");
		$user_details['created_by']=$user_details['modified_by']=$this->session->userdata('id');
//print_r($user_details);exit();
 
        $mul_array = $this->input->post('electon');
		//print_r($mul_array);exit();
		$candidate_details=$this->input->post('id');
		$user_id=$candidate_details;
		//print_r($user_id);exit();
		$candidate_details=$this->input->post('party_logo');
		$candidate_details=array('party'=>$this->input->post('party')
								 //'party_logo'=>$party_logo, 	
								// 'education'=>$this->input->post('education'),
								// 'category'=>$this->input->post('category'), 	
								// 'criminal_cases'=>$this->input->post('criminal_cases'),
								 //'profile'=>$this->input->post('profile')
								);


		
		$candidate_details['modified']=$user_details['modified']=date("Y-m-d H:i:s");		
		$candidate_details['created_by']=$candidate_details['modified_by']=$user_details['created_by']=$user_details['modified_by']=$this->session->userdata('id');
		//print_r($candidate_details);exit();
		
		if(!empty($pro_pic)){
			$user_details['pro_pic']=$pro_pic;
		}
		
		if(!empty($party_logo)){
			$candidate_details['party_logo']=$party_logo;
		}
		if(isset($id_p1)){
			$user_details['id_proof1']=$id_p1;
		}
		if(isset($id_p2)){
			$user_details['id_proof2']=$id_p2;
		}
 		

		$this->db->where('id', $user_id);
		if ($this->db->update('users', $user_details)) {
			//$user_id=$this->db->insert_id();
			//$candidate_details['user_id']=$user_id;
			$this->db->where('user_id', $user_id);
			if ($this->db->update('candidates', $candidate_details)) 
			{
        




		//print_r($_POST);exit();
		$id = $_POST ['id'];
		$new_elections = $_POST ['electon'];
		$this->db->select('election_id');
		$this->db->select('candidate_id',$id);	
      	$q = $this->db->get('candidate_election');

	    foreach ($q->result() as $row ) {
	       $old_elections[] = $row->election_id;
	    }

	    foreach ($old_elections as $old_election) {
	      	//print_r($old_election);exit();
	     	if (!in_array($old_election, $new_elections)) {
	     		//print_r($old_election);exit();
	      		$sql = 'delete from candidate_election where candidate_id='.$id.' AND election_id='.$old_election;
	      		$this->db->query($sql);
	      	}
	    }

	    foreach ($new_elections as $new_election) {
	    	$candidate_election = array( "candidate_id"=>$id,
											 "election_id"=> $new_election
											);	

	    	$sql="SELECT candidate_id,election_id FROM `candidate_election` WHERE candidate_id IN (".$id.") AND election_id IN (".$new_election.")";      
				    $q1=$this->db->query($sql)->result();
				  // print_r($q1);exit();
				    if($q1)
				    {	
				        	// print_r($_POST);exit();
	                      
				          


				    	$this->db->where('id', $user_id);
					    $this->db->update("candidate_election",$candidate_election);
				    	

				    }

				    else
				    {
			             $this->db->insert("candidate_election",$candidate_election);
			        }
			/*								      		
	      	if (!in_array($new_elections, $old_elections)) {
	      		//print_r($candidate_election);exit();
	      		$this->db->insert("candidate_election",$candidate_election);	
	      	}
	      	*/
	    }

	    return true;
	}

	else{
			return false;
		}
	}
	else{
			return false;
		}
}		

	public function get_all_election()
    {
      $this->db->select('id,name');	
      $q = $this->db->get('elections');

      foreach ($q->result() as $row ) {
        $data[] = $row;
      }
      
      return $data;
    }

    public function get_all_party()
    {
      $this->db->select('id,name');	
      $q = $this->db->get('party');

      foreach ($q->result() as $row ) {
        $data[] = $row;
      }
      
      return $data;
    }

/*	function get_all_candidates()
	{		
		$this->db->where('role','Candidate');
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
*/	
	function get_all_candidates()
	{	
		$sql='select users.id,users.first_name,users.last_name,users.email,users.mobile,users.role,users.gender,users.status,vote.candidate_id,COUNT(`candidate_id`) AS votes from users,vote where  users.role="candidate" and users.id=vote.candidate_id GROUP BY vote.candidate_id';
		$q = $this->db->query($sql);
		 
		$data=array();
		if($q->num_rows()>0)
		{
			foreach($q->result() as $row)
			{
				$data[]=$row;
			}
			return $data;  
			//print_r($data);exit();
		}
	}
	
	
	
	
	function get_reference_by($candidate_details)
	{		
		$this->db->select('users.id,users.first_name,users.last_name');
		$this->db->from('users');
		$this->db->join('tree', 'tree.candidate_id = users.id');
		$this->db->where('tree.candidate_id',$candidate_details['candidate_id']);
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
	function get_username($candidate_id)
	{	
		$this->db->select('username');
		$this->db->where('role','Candidate');
		$this->db->where('id',$candidate_id);	
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
	function get_candidate_details($candidate_id)
	{	
		$this->db->where('role','Candidate');
		$this->db->where('id',$candidate_id);	
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
	

	function get_candidate_election_details($candidate_id)
	{	
		$sql='SELECT count(a.election_id) count,a.election_id,b.name,c.first_name,c.last_name,c.email,c.mobile,c.gender,c.status FROM vote a,elections b ,users c WHERE a.candidate_id=c.id and  a.election_id = b.id AND a.candidate_id='.$candidate_id.' group by a.election_id';

		
		$q = $this->db->query($sql);
		 
		$data=array();
		if($q->num_rows()>0)
		{
			foreach($q->result() as $row)
			{
				$data[]=$row;
			}
			return $data;  
			//print_r($data);exit();
		}
	}

	function get_parent($candidate_id)
	{				
		$this->db->select('value');
		$this->db->where('key','max_levels');
		$con=$this->db->get('configurations');
		$max_levels=$con->result();
		$max_levels=$max_levels[0]->value;

		$this->db->select('tree.depth_level,users.id,users.first_name,users.last_name');
		$this->db->from('users');
		$this->db->join('tree', 'tree.candidate_id = users.id');
		$this->db->where('users.status','Activated');
		$this->db->where('tree.candidate_id',$candidate_id);
		$q=$this->db->get();
		$parent=array();
		if($q->num_rows() > 1)
		{			
			foreach($q->result() as $row)
			{
				$this->db->where('parent_id',$row->id);
				$this->db->where('candidate_id',$candidate_id);
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
			$this->db->where('id',$candidate_id);
			$p=$this->db->get('candidates');
			foreach($p->result() as $row)
			{
				$candidate_name=$row->name;
			}
			$parent['id']=0;
			$parent['name']=$candidate_name;
			$parent['depth_level']=1;
			if ($parent['depth_level'] <= $max_levels) {
				return $parent;
			}
			else{
				return false;
			}

		}		
	}

	
	function edit_election($candidate_id)
	{		
		$sql='SELECT candidate_id,`election_id` FROM `candidate_election` WHERE `candidate_id`='.$candidate_id;
		
		$q = $this->db->query($sql);
    // print_r($q);exit();
	    if($q->num_rows()>0)
	    {     
	        foreach($q->result() as $row)
	        {
	          $data[]=$row;
	        }
	            return $data;  
	           // print_r($data);exit();
	    }
	}

	function edit_party($candidate_id)
	{		
		//$sql='SELECT id,`name` FROM `party` WHERE `candidate_id`='.$candidate_id;
		$sql ='SELECT party.`id`,party.`name`,candidates.`party` , candidates.`user_id` FROM candidates LEFT JOIN party ON candidates.`party`= party.`name`   where candidates.`user_id`='.$candidate_id;

		$q = $this->db->query($sql);
    // print_r($q);exit();
	    if($q->num_rows()>0)
	    {     
	        foreach($q->result() as $row)
	        {
	          $data[]=$row;
	        }
	            return $data;  
	           // print_r($data);exit();
	     }
	}
	
}?>
