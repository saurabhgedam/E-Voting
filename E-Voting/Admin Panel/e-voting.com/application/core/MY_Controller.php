<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$id=$this->session->userdata('id');
		if (empty($id)) {
			$this->session->sess_destroy();
			redirect('login');
		}

	}	
}
