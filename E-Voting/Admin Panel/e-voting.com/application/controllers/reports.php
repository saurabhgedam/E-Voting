<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class reports extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('reports_model');
	}
	function index()
	{
		if ($this->session->userdata('role') == 'Admin') {
			$data['top_nav']=$this->config->item('ADMIN_TOP_NAV');
			$data['selected_top_nav']='REPORTS';
			$data['projects']=$this->reports_model->get_all_projects();
			$data['project_reports']=$this->reports_model->get_all_reports_details();
			$data['main_content']='project_wise_reports_view';
			$this->load->view('includes/templete', $data);
		}else{
			$data['main_content']='403_view';
			$this->load->view('includes/templete', $data);
		}		
	}
	function show_project_wise_reports()
	{
		if ($this->session->userdata('role') == 'Admin') {
			$data=array();		
			$data['top_nav']=$this->config->item('ADMIN_TOP_NAV');
			$data['selected_top_nav']='REPORTS';
			$data['projects']=$this->reports_model->get_all_projects();
			if($this->input->post('show_reports')){
				if ($this->input->post('project_id') != '')
				{	
					$data['project_reports']=$this->reports_model->get_project_reports_details($this->input->post('project_id'));
					$data['main_content']='project_wise_reports_view';
					$this->load->view('includes/templete', $data);
				}
				else
				{					
					$this->session->set_flashdata('error_message', 'Select Project');
					redirect('reports');
				}				
			}
			else{
				redirect('reports/');
			}
		}
		else{
			$data['main_content']='403_view';
			$this->load->view('includes/templete', $data);
		}		
	}
	function member_reports()
	{
		if ($this->session->userdata('role') == 'Admin') {
			$data['top_nav']=$this->config->item('ADMIN_TOP_NAV');
			$data['selected_top_nav']='REPORTS';
			$data['members']=$this->reports_model->get_all_members();
			$data['project_reports']=$this->reports_model->get_all_reports_details();
			$data['main_content']='member_wise_reports_view';
			$this->load->view('includes/templete', $data);
		}else{
			$data['main_content']='403_view';
			$this->load->view('includes/templete', $data);
		}		
	}
	function show_member_wise_reports()
	{
		if ($this->session->userdata('role') == 'Admin') {
			$data=array();		
			$data['top_nav']=$this->config->item('ADMIN_TOP_NAV');
			$data['selected_top_nav']='REPORTS';
			$data['members']=$this->reports_model->get_all_members();
			if($this->input->post('show_reports')){
				if ($this->input->post('project_id') != '')
				{	
					$data['project_reports']=$this->reports_model->get_member_reports_details($this->input->post('member_id'));
					$data['main_content']='member_wise_reports_view';
					$this->load->view('includes/templete', $data);
				}
				else
				{					
					$this->session->set_flashdata('error_message', 'Select Project');
					redirect('reports');
				}				
			}
			else{
				redirect('reports/');
			}
		}
		else{
			$data['main_content']='403_view';
			$this->load->view('includes/templete', $data);
		}		
	}
	
	function date_wise_reports()
	{
		if ($this->session->userdata('role') == 'Admin') {
			$data['top_nav']=$this->config->item('ADMIN_TOP_NAV');
			$data['selected_top_nav']='REPORTS';
			$data['members']=$this->reports_model->get_all_members();
			$data['project_reports']=$this->reports_model->get_all_reports_details();
			$data['main_content']='date_wise_reports_view';
			$this->load->view('includes/templete', $data);
		}else{
			$data['main_content']='403_view';
			$this->load->view('includes/templete', $data);
		}		
	}
	function show_date_wise_reports()
	{
		if ($this->session->userdata('role') == 'Admin') {
			$data=array();		
			$data['top_nav']=$this->config->item('ADMIN_TOP_NAV');
			$data['selected_top_nav']='REPORTS';
			$data['members']=$this->reports_model->get_all_members();
			if($this->input->post('show_reports')){				
				if ($this->input->post('date_range') != '')
				{	
					$dates=array();
					$dates=explode('-', $this->input->post('date_range'));
					$first=explode('/', $dates[0]);
					$second=explode('/', $dates[1]);
					//print_r($first); print_r($second); die();
					$date_from=$first[2]."-".$first[1]."-".$first[0];				
					$date_to=$second[2]."-".$second[1]."-".$second[0];
					//$date_from=str_replace(' ', '', $date_from)
					//$date_to=str_replace(' ', '', $date_to)
					$date_from=preg_replace('/\s+/', '', $date_from);
					$date_to=preg_replace('/\s+/', '', $date_to);
					$data['project_reports']=$this->reports_model->get_date_wise_reports_details($date_from,$date_to);
					$data['main_content']='date_wise_reports_view';
					$this->load->view('includes/templete', $data);
				}
				else
				{					
					$this->session->set_flashdata('error_message', 'Select Project');
					redirect('reports');
				}				
			}
			else{
				redirect('reports/');
			}
		}
		else{
			$data['main_content']='403_view';
			$this->load->view('includes/templete', $data);
		}	

	}
	function member_all_transactions_details()
	{
		if ($this->session->userdata('role') == 'Admin') {
			$data=array();		
			$data['top_nav']=$this->config->item('ADMIN_TOP_NAV');
			$data['selected_top_nav']='REPORTS';
			if($this->input->post('show_reports')){
				if ($this->input->post('member_id') != '')
				{	
					$data['all_transactions_details']=$this->reports_model->get_member_all_transactions_details($this->input->post('member_id'));
					$data['member_details']=$this->reports_model->get_member_details($this->input->post('member_id'));
					$data['main_content']='all_transactions_details_view';
					$this->load->view('includes/templete', $data);
				}
				else
				{					
					$this->session->set_flashdata('error_message', 'Select Project');
					redirect('reports');
				}				
			}
			else{
				redirect('reports/');
			}
		}
		else{
			$data['main_content']='403_view';
			$this->load->view('includes/templete', $data);
		}		
	}	
	function print_member_transaction_payment_receipt()
	{
		if ($this->session->userdata('role') == 'Admin') {
			$data=array();		
			$data['top_nav']=$this->config->item('ADMIN_TOP_NAV');
			$data['selected_top_nav']='REPORTS';
			if($this->input->post('show_reports')){
				if ($this->input->post('transaction_id') != '')
				{	
					$this->reports_model->create_new_invoice($this->input->post('transaction_id'));
					$data['member_transaction_details']=$this->reports_model->get_member_transaction_details($this->input->post('transaction_id'));
					$data['main_content']='print_member_transaction_payment_receipt_view';
					$this->load->view('includes/templete', $data);
				}
				else
				{					
					$this->session->set_flashdata('error_message', 'Select Project');
					redirect('reports');
				}				
			}
			else{
				redirect('reports/');
			}
		}
		else{
			$data['main_content']='403_view';
			$this->load->view('includes/templete', $data);
		}		
	}
	function reprint_member_transaction_payment_receipt()
	{
		if ($this->session->userdata('role') == 'Admin') {
			$data=array();		
			$data['top_nav']=$this->config->item('ADMIN_TOP_NAV');
			$data['selected_top_nav']='REPORTS';
			if($this->input->post('show_reports')){
				if ($this->input->post('transaction_id') != '')
				{	
					$data['member_transaction_details']=$this->reports_model->get_member_transaction_details($this->input->post('transaction_id'));
					$data['main_content']='print_member_transaction_payment_receipt_view';
					$this->load->view('includes/templete', $data);
				}
				else
				{					
					$this->session->set_flashdata('error_message', 'Select Project');
					redirect('reports');
				}				
			}
			else{
				redirect('reports/');
			}
		}
		else{
			$data['main_content']='403_view';
			$this->load->view('includes/templete', $data);
		}		
	}
}
