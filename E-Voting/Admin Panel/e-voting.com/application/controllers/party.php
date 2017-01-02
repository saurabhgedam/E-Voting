<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class party extends MY_Controller {
	function __construct()
	{
		parent::__construct();		
		$this->load->model('party_model');
	}
	function index()
	{
		if ($this->session->userdata('role') == 'Admin') {
			$this->show_parties();
		}
		else{
			$data['main_content']='403_view';
			$this->load->view('includes/templete', $data);
		}		
	}
	function add_party()
	{
		if ($this->session->userdata('role') == 'Admin') {
			$data=array();		
			$data['top_nav']=$this->config->item('ADMIN_TOP_NAV');
			$data['selected_top_nav']='PARTY';
			if($this->input->post('add_party')){
				//$this->form_validation->set_rules($this->config->item('add_party'));				
				$this->form_validation->set_rules('partyname','Party Name','required|alpha_dash_space|is_unique[party.name]');
				if ($this->form_validation->run() == FALSE)
				{
					$data['main_content']='party/add_party_view';
					$this->load->view('includes/templete', $data);
				}
				else
				{
                	$p_logo='';
					$party_logo=$_FILES['party_logo']['name'];
                    if (!empty($party_logo)) {                   
	                    $config['upload_path'] = './assets/party_logo/';
	                    $config['allowed_types'] = 'gif|jpg|png';
	                    $config['max_size'] = '10240';
	                    $config['remove_spaces'] = TRUE;
		                $config['encrypt_name'] = TRUE;
	                    //$this->upload->initialize($config);
	                    $this->load->library('upload', $config);
	                    if (!$this->upload->do_upload('party_logo'))
	                    {
	                        $error =$this->upload->display_errors();
	                        $this->session->set_flashdata('error_message', $error);
							redirect('party/add_party');
	                    }else{           	    
	                    	$upload_data=$this->upload->data();
	                    	$p_logo=$upload_data['file_name'];        
		                    $config['image_library'] = 'gd2';
		                    $config['source_image'] = './assets/party_logo/'.$p_logo;
		                    $config['new_image'] = './assets/party_logo/thumbs/'.$p_logo;
		                    $config['create_thumb'] = TRUE;
		                    $config['maintain_ratio'] = TRUE;
		                    $config['width']     = 50;
		                    $config['height']   = 50;
		                    $config['thumb_marker']   = "";
		                    $this->load->library('image_lib', $config);
		                    $this->image_lib->resize();
		                    $error=$this->image_lib->display_errors();
		                    if(!empty($error)){                    	
		                    	$this->session->set_flashdata('error_message', $error);
								redirect('party/add_party');
		                    }		                    
	                	}
                	}
					if ($this->party_model->add_party($p_logo)) {
						$this->session->set_flashdata('success_message', 'Party created successfully');
						redirect('party/show_parties');
					}
					else{
						$this->session->set_flashdata('error_message', 'Failed to create party');
						redirect('party/add_party');
					}
				}				
			}
			else{
				$data['main_content']='party/add_party_view';
				$this->load->view('includes/templete', $data);
			}
		}
		else{
			$data['main_content']='403_view';
			$this->load->view('includes/templete', $data);
		}
	}	
	function manage_party()
	{
		if ($this->session->userdata('role') == 'Admin') {
			if ($this->input->post('party_id') != '' &&  $this->input->post('party_status') != '') {
				if ($this->party_model->manage_party()) {
					echo "success";
				}
				else{
					if($this->input->post('manage_value') == "Activated"){
						echo "Failed to Deactivate candidate";
					}
					else{
						echo "Failed to Activate candidate";
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
	function edit_party()
	{
		if ($this->session->userdata('role') == 'Admin') {
			$party_id=$this->uri->segment(3);
			$data=array();		
			$data['top_nav']=$this->config->item('ADMIN_TOP_NAV');
			//$data['roles']=$this->config->item('roles');
			$data['party_details']=$this->party_model->get_party_details($party_id);
			$data['selected_top_nav']='PARTY';
			$data['main_content']='party/edit_party_view';
			$this->load->view('includes/templete', $data);
		}
		else{
			$data['main_content']='403_view';
			$this->load->view('includes/templete', $data);
		}		
	}
	function update_party()
	{
		if ($this->session->userdata('role') == 'Admin') {
			$data=array();		
			$data['top_nav']=$this->config->item('ADMIN_TOP_NAV');
			//$data['roles']=$this->config->item('roles');
			$data['selected_top_nav']='PARTY';			
			if($this->input->post('update_party')){
				//$this->form_validation->set_rules($this->config->item('update_party'));
				$this->form_validation->set_message('id', '"Oops! Something went wrong." ');
				$partyname=$this->party_model->get_partyname($this->input->post('id'));
				if ($this->input->post('name') != '' && $this->input->post('name') != $partyname){
					$this->form_validation->set_message('is_unique', 'Partyname is unique. This partyname all ready used.');
					$this->form_validation->set_rules('name', 'Partyname', 'trim|required|is_unique[party.name]');
				}
				else{
					$this->form_validation->set_rules('name', 'Partyname', 'trim|required');
				}	
				if ($this->form_validation->run() == FALSE)
				{
					$data['main_content']='edit_party_view';
					$this->load->view('includes/templete', $data);
				}
				else
				{
					$party_lg=NULL;
					$party_logo=$_FILES['party_logo']['name'];
                    if (!empty($party_logo)) {                   
	                    $config['upload_path'] = './assets/party_logo/';
	                    $config['allowed_types'] = 'gif|jpg|png';
	                    $config['max_size'] = '10240';
	                    $config['remove_spaces'] = TRUE;
		                $config['encrypt_name'] = TRUE;
	                    //$this->upload->initialize($config);
	                    $this->load->library('upload', $config);
	                    if (!$this->upload->do_upload('party_logo'))
	                    {
	                        $error =$this->upload->display_errors();
	                        $this->session->set_flashdata('error_message', $error);
							redirect('party/add_party');
	                    }else{           	    
	                    	$upload_data=$this->upload->data();
	                    	$party_lg=$upload_data['file_name'];        
		                    $config['image_library'] = 'gd2';
		                    $config['source_image'] = './assets/party_logo/'.$party_lg;
		                    $config['new_image'] = './assets/party_logo/thumbs/'.$party_lg;
		                    $config['create_thumb'] = TRUE;
		                    $config['maintain_ratio'] = FALSE;
		                    $config['width']     = 50;
		                    $config['height']   = 50;
		                    $config['thumb_marker']   = "";
		                    $this->load->library('image_lib', $config);
		                    $this->image_lib->resize();
		                    $error=$this->image_lib->display_errors();
		                    if(!empty($error)){                    	
		                    	$this->session->set_flashdata('error_message', $error);
								redirect('party/add_party');
		                    }		                    
	                	}
                	}
					if ($this->party_model->update_party($party_lg)) {
						$this->session->set_flashdata('success_message', 'Party updated successfully');
						redirect('party/show_parties');
					}
					else{
						$this->session->set_flashdata('error_message', 'Failed to update party');
						redirect('party/edit_party/'.$this->input->post('id'));
					}
				}				
			}
			else{
				$data['main_content']='edit_party_view';
				$this->load->view('includes/templete', $data);
			}
		}
		else{
			$data['main_content']='403_view';
			$this->load->view('includes/templete', $data);
		}		
	}	
	function show_parties()
	{
		if ($this->session->userdata('role') == 'Admin') {
			$data=array();		
			$data['top_nav']=$this->config->item('ADMIN_TOP_NAV');
			//$data['roles']=$this->config->item('roles');
			$data['parties']=$this->party_model->get_all_parties();
			//print_r($data['candidates']); die();
			$data['selected_top_nav']='PARTY';
			$data['main_content']='party/show_parties_view';
			$this->load->view('includes/templete', $data);
		}
		else{
			$data['main_content']='403_view';
			$this->load->view('includes/templete', $data);
		}		
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */