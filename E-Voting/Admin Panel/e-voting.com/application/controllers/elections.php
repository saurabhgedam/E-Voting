<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class elections extends MY_Controller {
	function __construct()
	{
		parent::__construct();		
		$this->load->model('elections_model');
	}
	function index()
	{
		if ($this->session->userdata('role') == 'Admin') {
			$this->show_elections();
		}
		else{
			$this->load->view('403_view');
		}		
	}
	function add_election()
	{
		if ($this->session->userdata('role') == 'Admin') {
			$data=array();		
			$data['top_nav']=$this->config->item('ADMIN_TOP_NAV');
			//$data['roles']=$this->config->item('roles');
			$data['selected_top_nav']='ELECTIONS';			
			if($this->input->post('add_election')){
				$this->form_validation->set_rules($this->config->item('add_election'));				
				if ($this->form_validation->run() == FALSE)
				{
					$data['main_content']='add_election_view';
					$this->load->view('includes/templete', $data);
				}
				else
				{
					if ($this->elections_model->add_election()) {
						$this->session->set_flashdata('success_message', 'Election create Successfully');
						redirect('elections/show_elections');
					}
					else{
						$this->session->set_flashdata('error_message', 'Failed to create election');
						redirect('elections/add_election');
					}
				}				
			}
			else{
				$data['main_content']='add_election_view';
				$this->load->view('includes/templete', $data);
			}
		}
		else{
			$this->load->view('403_view');
		}		
	}
	function manage_election()
	{
		if ($this->session->userdata('role') == 'Admin') {
			if ($this->input->post('election_id') != '' &&  $this->input->post('election_status') != '') {
				if ($this->elections_model->manage_election($this->input->post())) {
					echo "success";
				}
				else{
					if($this->input->post('manage_value') == "Activated"){
						echo "Failed to Deactivate election";
					}
					else{
						echo "Failed to Activate election";
					}
				}
			}
			else{
				echo "Page error occured";
			}
		}
		else{
			echo "Access or Permission denied";
		}		
	}
	function edit_election()
	{
		if ($this->session->userdata('role') == 'Admin') {
			$election_id=$this->uri->segment(3);
			$data=array();		
			$data['top_nav']=$this->config->item('ADMIN_TOP_NAV');
			$data['roles']=$this->config->item('roles');
			$data['election_details']=$this->elections_model->get_election_details($election_id);

			$date=$data['election_details']->from;
			$from = $date;
			$from = explode('-', $from);
			$from = trim($from[1]).'/'.trim($from[2]).'/'.trim($from[0]);
			$data['election_details1']=$from;
				//print_r($data['election_details1']);exit();
			/*
			$arr_implode = $data['election_details'];
			print_r($arr_implode);exit();
 			$separater = implode(",", $arr_implode);
			echo $separater;exit(); // name,email,phone

			$date = $election_details->from.'-'.$election_details->to;
			$date = explode('/', $date);
			$from = $date[0];
			$from = explode('-', $from);
			$from = trim($from[0]).'/'.trim($from[1]).'/'.trim($from[2]);
			$to = $date[1];
			$to = explode('-', $to);
			$to = trim($from[0]).'/'.trim($from[1]).'/'.trim($from[2]);


     */


			$data['selected_top_nav']='ELECTIONS';
			$data['main_content']='edit_election_view';
			$this->load->view('includes/templete', $data);
		}
		else{
			$this->load->view('403_view');
		}		
	}
	function update_election()
	{
		if ($this->session->userdata('role') == 'Admin') {
			$data=array();		
			$data['top_nav']=$this->config->item('ADMIN_TOP_NAV');
			$data['roles']=$this->config->item('roles');
			$data['selected_top_nav']='ELECTIONS';			
			if($this->input->post('update_election')){
				$this->form_validation->set_rules($this->config->item('update_election'));
				$election_name=$this->elections_model->get_election_name($this->input->post('id'));				
				if ($this->input->post('name') != '' && $this->input->post('name') != $election_name){
					$this->form_validation->set_message('is_unique', 'Election name is unique. This name all ready used.');
					$this->form_validation->set_rules('name', 'Election name', 'trim|required|is_unique[elections.name]');
				}
				else{
					$this->form_validation->set_rules('name', 'name', 'trim|required');
				}	
				if ($this->form_validation->run() == FALSE)
				{
					$data['main_content']='edit_election_view';
					$this->load->view('includes/templete', $data);
				}
				else
				{
					if ($this->elections_model->update_election($this->input->post())) {
						$this->session->set_flashdata('success_message', 'Election updated Successfully');
						redirect('elections/show_elections');
					}
					else{
						$this->session->set_flashdata('error_message', 'Failed to update election');
						redirect('elections/edit_election/'.$this->input->post('id'));
					}
				}				
			}
			else{
				$data['main_content']='edit_election_view';
				$this->load->view('includes/templete', $data);
			}
		}
		else{
			$this->load->view('403_view');
		}		
	}	
	function show_elections()
	{
		if ($this->session->userdata('role') == 'Admin') {
			$data=array();		
			$data['top_nav']=$this->config->item('ADMIN_TOP_NAV');
			$data['roles']=$this->config->item('roles');
			$data['elections']=$this->elections_model->get_all_elections();
			//print_r($data['elections']); die();
			$data['selected_top_nav']='ELECTIONS';
			$data['main_content']='show_elections_view';
			$this->load->view('includes/templete', $data);
		}
		else{
			$this->load->view('403_view');
		}		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */