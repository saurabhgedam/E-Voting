<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class web_services extends CI_Controller {
function __construct()
{
  parent::__construct();    
  $this->load->model('web_services_model');
  //$this->load->model('users_model');
  $this->load->library('ftp');
  $this->load->library('email');
  
}
  
 
function validate_member()
{
  
  $username = $_POST['username'];//'krushna';//
  $password = $_POST['password'];//'123456';//
  $this->load->library('encrypt');
  $hash_password = $this->encrypt->sha1($password);
  if($user_id=$this->web_services_model->validate_user($username,$hash_password))
  {
      $data=array(
                  'username'=>$username,
                  'logged_in'=>TRUE
                );
      $this->session->set_userdata($data);        
      echo '{success: true,user_id:'.json_encode($user_id).'}';
  }
  else
  {   
    $this->session->set_flashdata('login_failure','Email Or Password Incorrect.');
    echo "{success: false,errors: { reason: 'Login failed. Try again.' }}";    
  }   
}
  
public function register_user()
{   
   
    $first_name = $_POST['first_name'];
    $last_name =$_POST['last_name']; 
    $gender = $_POST['gender'];
    $age = $_POST['age'];

    $mobile = $_POST['mobile'];

    $email = $_POST['email'];  
    $address = $_POST['address']; 
    $username = $_POST['username'];//'mayur';//
    $password = $_POST['password'];//'123456';//
    $this->load->library('encrypt');
    $hash_password = $this->encrypt->sha1($password);
   
    
    $user_id=$this->web_services_model->save_user($username,$hash_password,$first_name,$last_name,$gender,$age,$mobile,$email,$address);
 
  if($user_id)
   {
            
       echo '{success: true,user_id:'.json_encode($user_id).'}';
       
   }
    
   else
   {
       echo "{success: false, errors: { reason: 'Registration failed. Try again.' }}";
   }
}

public function upcoming_election()
{  
   $today = DATE('Y-m-d');
   $start_date = $today;
  // print_r($start_date);exit();
  $upcoming_election =$this->web_services_model->upcoming_election($start_date);
   //print_r($is_election);exit();
   if($upcoming_election)
  {
            
      echo '{success: true,upcoming_election:'.json_encode($upcoming_election).'}';
  }
  else
  {   
    $this->session->set_flashdata('No Elections','No Elections.');
    echo "{success: false,errors: { reason: 'No Elections founds. Try again.' }}";    
  }   

}

public function is_election()
{  
   $election_id =$_POST['election_id'];//3;
   $today = DATE('Y-m-d');
   $start_date = $today;
  // print_r($start_date);exit();
   $Todays_election =$this->web_services_model->is_election($election_id,$start_date);
  // print_r($is_election);exit();
   if($Todays_election==TRUE)
  {
            
      echo '{success: true,Todays_election:'.json_encode($Todays_election).'}';
  }
  else
  {   
    $this->session->set_flashdata('No Elections','No Elections.');
    echo "{success: false,errors: { reason: 'No Elections founds. Try again.' }}";    
  }   

}

public function voting()
{
    $voter_id =$_POST['voter_id'];//6;
    $election_id =$_POST['election_id'];//3;
    $candidate_name= $_POST['candidate_name'];//rohan
	$name= explode(" ",$candidate_name);
	$candidate_id1=$name[0];
	$candidate_id2=$name[1];
	//print_r($candidate_id2);exit();
    $vote=$this->web_services_model->voting($voter_id,$election_id,$candidate_id1,$candidate_id2);
    
    if($vote)
     {
              
         echo '{success: true,vote:'.json_encode($vote).'}';
     }
      
     else
     {
         echo "{success: false, errors: { reason: 'You are already vote the candidate for this election.' }}";
     }
}

function get_election()
{
      $election_id = $_POST['election_id'];//3;// 
      $election =$this->web_services_model->get_election($election_id);
      echo '{success: true,"election":'.json_encode($election).'}';  
}

function candidate_list()
{
      $election_id =$_POST['election_id'];//3;// 
      $candidate_list =$this->web_services_model->candidate_list($election_id);
      echo '{success: true,"candidate_list":'.json_encode($candidate_list).'}';  
}



public function Get_onetime_pass()
{
  
     $user_id= $_POST['user_id'];
     $election_id = $_POST['election_id'];//3;// 

     
        $uchars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $lchars = "abcdefghijklmnopqrstuvwxyz";
        $schars = "!@#$%^&*()_-=+;:,.?";
        $upassword = substr( str_shuffle( $uchars ), 0, 3 );
        $lpassword = substr( str_shuffle( $lchars ), 0, 3 );
        $spassword = substr( str_shuffle( $schars ), 0, 2 );
        $new_password = str_shuffle( $upassword.$lpassword.$spassword );
        $password = $new_password;
  
       $sms=$this->web_services_model->Get_onetime_pass($user_id,$election_id,$password);
    // print_r($sms);exit();
       if($sms== FALSE)
       {
        echo "{success: false, errors: { reason: 'Your are already registered for this election.' }}";

       }

       else
       {
         $password=$password;
         $data=$this->web_services_model->get_info($user_id);
        // print_r($data);exit();
         foreach ($data as  $data)
         {
            $username=$data->username;
            $mobile =$data->mobile;
            $first_name=$data->first_name;
            $last_name=$data->last_name;
            $role=$data->role;
          }
        //echo '{success: true,"message:Password generated successfully"}';  
        //echo '<br>';
       //  print_r($password);exit();
        $this->sendsms($password,$username,$mobile,$first_name,$last_name);
echo '{success: true}';
       }


}



public function sendsms($password,$username,$mobile,$first_name,$last_name)
{
  //print_r($role);exit();

  $message = "Your OTP is ".$password;
 //echo $message;exit();
  $message = urlencode($message);
  $url = "http://www.bulksmspune.mobi/sendurlcomma.aspx?user=20072542&pwd=6rbui4&senderid=Medicare&mobileno=".$mobile."&msgtext=".$message;
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $curl_scraped_page = curl_exec($ch);
  curl_close($ch);  
  return $curl_scraped_page;
  
}



function validate_credential()
{
  $user_id = $_POST['user_id'];//'krushna';//
  $election_id =$_POST['election_id'];
  $password = $_POST['password'];//'123456';//
  $validate=$this->web_services_model->validate_credential($user_id,$election_id,$password);
  if($validate==TRUE)
  {
    echo '{success:true}';  
  }
  else
  {
    echo "{success: false}";
  }
  
}

}?>