<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class dashboard extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('dashboard_model');
	}
	function index()
	{ 
		if ($this->session->userdata('role') == 'Admin') {
			//print_r($_POST);exit();
			$data['top_nav']=$this->config->item('ADMIN_TOP_NAV');
			$data['activated_voters']=$this->dashboard_model->get_activated_voters();
			$data['deactivated_voters']=$this->dashboard_model->get_deactivated_voters();
			$data['activated_admins']=$this->dashboard_model->get_activated_admins();
			$data['deactivated_admins']=$this->dashboard_model->get_deactivated_admins();
			$data['activated_booth_officers']=$this->dashboard_model->get_activated_booth_officers();
			$data['deactivated_booth_officers']=$this->dashboard_model->get_deactivated_booth_officers();
			$data['activated_candidates']=$this->dashboard_model->get_activated_candidates();
			$data['deactivated_candidates']=$this->dashboard_model->get_deactivated_candidates();			
			$data['activated_elections']=$this->dashboard_model->get_activated_elections();
			$data['deactivated_elections']=$this->dashboard_model->get_deactivated_elections();
			$data['selected_top_nav']='DASHBOARD';
			$data['main_content']='admin_dashboard_view';
			$this->load->view('includes/templete', $data);
		}elseif ($this->session->userdata('role') == 'Polling Agent') {
			$data['top_nav']=$this->config->item('VOTER_TOP_NAV');
			$data['selected_top_nav']='DASHBOARD';
			$member_id=$this->session->userdata('id');
			$data['main_content']='voter_dashboard_view';
			$this->load->view('includes/templete', $data);
		}elseif ($this->session->userdata('role') == 'Voter') {
			$data['top_nav']=$this->config->item('VOTER_TOP_NAV');
			$data['selected_top_nav']='DASHBOARD';
			$member_id=$this->session->userdata('id');
			$data['main_content']='voter_dashboard_view';
			$this->load->view('includes/templete', $data);
		}else{			
			$data['main_content']='403_view';
			$this->load->view('includes/templete', $data);
		}
				
	}
}
