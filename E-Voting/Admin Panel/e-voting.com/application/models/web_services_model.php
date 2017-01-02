<?php
class web_services_model extends CI_Model {

function __construct()
{
  parent::__construct();
        //date_default_timezone_set("Asia/Kolkata");
         //DateInterval::format() ;
}

function validate_user($username,$hash_password)
{
  
   //print_r($_POST);die();
  $this->db->where('username',$username);
  $this->db->where('password',$hash_password);
  //$this->db->where('status','active');
  $q=$this->db->get('users');
  //print_r($q);exit();
  if($q->num_rows>0)
  {
    $data=array(
          'username'=>$q->row('username'),
          'id'=>$q->row('id')       
           );
    $this->session->set_userdata($data);
    
    

        //return $data;
    //return TRUE;
  
    return $q->row('id');   
  }
}

public function save_user($username,$hash_password,$first_name,$last_name,$gender,$age,$mobile,$email,$address)
{
    
  $data = array('username' => $username,  
                'password' => $hash_password,
                 'role'=> 'Voter',
                'first_name' => $first_name,  
                'last_name' => $last_name,
                'gender' => $gender,
                'age' => $age,
                'mobile' => $mobile, 
                'email' => $email,
               // 'current_address' => $current_address,
                'address' => $address,
               /* 'pro_pic' => $pro_pic,
                'voting_card_no' => $voting_card_no,
                'pan_card_no' => $pan_card_no,
                'id_proof1' => $id_proof1,
                'id_proof2' => $id_proof2,
                'ward' => $ward,
              */
              );

  $data['modified']=date("Y-m-d H:i:s");   
  $data['created_by']=$data['modified_by']=$this->session->userdata('id');
  
  $this->db->insert('users',$data);
  $user_id = $this->db->insert_id();
  if ($user_id)
    {
      return $user_id;
  }
  else
  {
    return FALSE;
  }
}

function upcoming_election($start_date)
{ 
 /* $sql ="SELECT id,`name`,`ward`,`description`,`from`,`to` from elections where  date(`from`) >=".$start_date ;
*/
   $sql ="SELECT id,`name` from elections where  date(`from`) >='".$start_date."' ORDER BY date(`from`) ASC" ;
  $query = $this->db->query($sql);
        
    if ($query) {
    return $query->result();
    }
    else
    {
    return NULL;
    }

} 

function is_election($election_id,$start_date)
{ 
  //$sql ="SELECT id,`name`,`ward`,`description`,`from`,`to` from elections where  date(`from`) ='".$start_date."' ";
  $sql ="SELECT id,`name` from elections where id='".$election_id."' AND date(`from`) ='".$start_date."' ";
  $query = $this->db->query($sql);
      //print_r($query);exit();
    if ($query->num_rows()>0)
     {
        //print_r($query->result());exit(); 
      //return $query->result();
      return TRUE;
    }
    else
    {
      return FALSE;
    }

} 


function voting($voter_id,$election_id,$candidate_id1,$candidate_id2)
{ 
    
		$query="select id from users where first_name='".$candidate_id1."'  and last_name='".$candidate_id2."' ";
		$query1=$this->db->query($query);
		$candidate_id=$query1->row('id');
		//echo ;exit();
		//print_r($query1);exit();
		
		
      $sql = "SELECT voter_id,election_id,candidate_id  FROM `vote` WHERE voter_id = '".$voter_id."'AND candidate_id = '".$candidate_id."' AND election_id=".$election_id;      
        $q1=$this->db->query($sql)->result();
       
      //$voter_id=$q1->row('voter_id');
      // print_r($q1);exit();
      if($q1)
        {
                return FALSE;
        }
         else
        {  
            $data= array('voter_id'=>$voter_id,
                         'election_id'=>$election_id,
                         //'candidate_name'=>$candidate_name;
						 'candidate_id'=>$candidate_id
                        );


          return  $this->db->insert("vote", $data); 
            
        }
      

}

function get_election($election_id)
 {
    $sql ='select `id`,`name`,`from` as date,`ward`,`description` from elections where id='.$election_id;

    $q = $this->db->query($sql);
    // print_r($q);exit();
    if($q->num_rows()>0)
    {     
        foreach($q->result() as $row)
        {
          $data[]=$row;
        }
            return $data;  
     }
    else
    {
        return false;
    } 
}

function candidate_list($election_id)
 {
    //$sql ='SELECT users.`username`, candidate_election.`candidate_id`,candidate_election.`election_id` FROM users LEFT JOIN candidate_election ON users.`id`=candidate_election.`candidate_id`   where election_id='.$election_id;
    $sql ='SELECT CONCAT_WS(" ", users.`first_name`, users.`last_name`) AS `name` FROM users LEFT JOIN candidate_election ON users.`id`=candidate_election.`candidate_id`   where election_id='.$election_id;

    $q = $this->db->query($sql);
    // print_r($q);exit();
    if($q->num_rows()>0)
    {     
        foreach($q->result() as $row)
        {
          $data[]=$row;
        }
            return $data;  
     }
    else
    {
        return false;
    } 
}

function get_role($user_id)
{
  $this->db->select('role');
  $this->db->where('id',$user_id);
  $q=$this->db->get('users');
  if($q->num_rows > 0)
  {
    return $q->result();
  }

}
function Get_onetime_pass($user_id,$election_id,$password)
{
      $sql = "SELECT user_id,election_id FROM `onetime_pass` WHERE user_id = '".$user_id."' AND election_id=".$election_id;      
      $q1=$this->db->query($sql)->result();
       
      if($q1)
        {
                return FALSE;
        }
         else
        {  
            $data=array(
                'user_id'=>$user_id,
                'election_id'=>$election_id,
                'password'=>$password
                );
          return  $this->db->insert('onetime_pass',$data);
         
        }
     
}

function get_info($user_id)
{
   $this->db->select('username,mobile,first_name,last_name,role');
  $this->db->where('id',$user_id);
  $q=$this->db->get('users');
  if($q->num_rows()>0)
    {     
        foreach($q->result() as $row)
        {
          $data[]=$row;
        }
            return $data;  
     }
    else
    {
        return false;
    } 
}


function validate_credential($user_id,$election_id,$password)
{
  
   //print_r($_POST);die();
  $this->db->where('user_id',$user_id);
  $this->db->where('election_id',$election_id);
  $this->db->where('password',$password);
  //$this->db->where('status','active');
  $q=$this->db->get('onetime_pass');
  //print_r($q);exit();
  if($q->num_rows>0)
  {
    return TRUE;
  }
  else
  {
    return FALSE;
  }
}

}?>