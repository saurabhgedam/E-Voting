<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {
	function __construct()
	{
		parent::__construct();		
		$this->load->model('login_model');
		$this->load->library('encrypt');
	}
	public function index()
	{
		if ($this->input->post('login')) {
			if ($this->input->post('username') && $this->input->post('password')) {				
				if ($this->login_model->authenticate_user($this->input->post('username'),$this->input->post('password'))) {
					redirect('dashboard');
				}
				else{
					$this->session->set_flashdata('login_error','Please re-enter your password The password you entered is incorrect. Please try again (make sure your caps lock is off).');
					redirect('login');
				}				
			}
			else{
				$this->session->set_flashdata('login_error','Please re-enter your password The password you entered is incorrect. Please try again (make sure your caps lock is off).');
				redirect('login');
			}
		}
		else{
			$this->load->view('login_view');
		}	
	}
	
	function logout()
	{		  
		$user_data=array('id'=>'','firstname'=>'','lastname'=>'','role'=>'','mobile'=>'','email'=>'','gender'=>'','image'=>'');
		$this->session->unset_userdata($user_data);
		$this->session->sess_destroy();
		redirect('login','refresh');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */