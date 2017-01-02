<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

 class MY_Form_validation extends CI_Form_validation {

   /*public function __construct($rules = array())
  {
   parent::__construct($rules);
   //$this->CI->lang->load('MY_form_validation');
  }*/
   function alpha_dash_space($str)
  {
   $this->CI->form_validation->set_message('alpha_dash_space','The %s should contain only characters and spaces.'); 
   //return ( ! preg_match("/^([-a-z_ ])+$/i", $str)) ? FALSE : TRUE;
   if(!preg_match("/^([-a-z-A-Z_ ])+$/i", $str)){
     return FALSE;
   }
    return TRUE; 
  } 

  function valid_website($str)
  {
   $this->CI->form_validation->set_message('valid_website','The %s Should Not be Valid Website.'); 
   //return ( ! preg_match("/^([-a-z_ ])+$/i", $str)) ? FALSE : TRUE;
   if(!preg_match("/^(http|https|ftp):\/\/([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?/i", $str)){
     return FALSE;
   }
    return TRUE; 
  }
 
  }?>