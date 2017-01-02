<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class candidates extends MY_Controller {
	function __construct()
	{
		parent::__construct();		
		$this->load->model('candidates_model');
	}
	function index()
	{
		if ($this->session->userdata('role') == 'Admin') {
			$this->show_candidates();
		}
		else{
			$data['main_content']='403_view';
			$this->load->view('includes/templete', $data);
		}		
	}
	function add_candidate()
	{
		if ($this->session->userdata('role') == 'Admin') {
			$data=array();		
			$data['top_nav']=$this->config->item('ADMIN_TOP_NAV');
			$data['selected_top_nav']='CANDIDATES';

			if($this->input->post('add_candidate')){
				$this->form_validation->set_rules($this->config->item('add_candidate'));				
				if ($this->form_validation->run() == FALSE)
				{
					$data['candidate_details'] = $this->candidates_model->get_all_election();
					$data['candidate_details1'] = $this->candidates_model->get_all_party();
				//print_r($data['candidate_details']);exit();
					$data['main_content']='add_candidate_view';
					$this->load->view('includes/templete', $data);
				}
				else
				{
					
					
					$p_pic='';
					$pro_pic=$_FILES['pro_pic']['name'];
                    if (!empty($pro_pic)) {                   
	                    $config['upload_path'] = './assets/profile_pictures/';
	                    $config['allowed_types'] = 'gif|jpg|png';
	                    $config['max_size'] = '10240';
	                    $config['remove_spaces'] = TRUE;
		                $config['encrypt_name'] = TRUE;
	                    //$this->upload->initialize($config);
	                    $this->load->library('upload', $config);
	                    if (!$this->upload->do_upload('pro_pic'))
	                    {
	                        $error =$this->upload->display_errors();
	                        $this->session->set_flashdata('error_message', $error);
							redirect('candidates/add_candidate');
	                    }else{           	    
	                    	$upload_data=$this->upload->data();
	                    	$p_pic=$upload_data['file_name'];        
		                    $config['image_library'] = 'gd2';
		                    $config['source_image'] = './assets/profile_pictures/'.$p_pic;
		                    $config['new_image'] = './assets/profile_pictures/thumbs/'.$p_pic;
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
								redirect('candidates/add_candidate');
		                    }		                    
	                	}
                	}
                	$id_p1='';
					$id_proof1=$_FILES['id_proof1']['name'];
                    if (!empty($id_proof1)) {                   
	                    $config['upload_path'] = './assets/profile_pictures/';
	                    $config['allowed_types'] = 'gif|jpg|png';
	                    $config['max_size'] = '10240';
	                    $config['remove_spaces'] = TRUE;
		                $config['encrypt_name'] = TRUE;
	                    //$this->upload->initialize($config);
	                    $this->load->library('upload', $config);
	                    if (!$this->upload->do_upload('id_proof1'))
	                    {
	                        $error =$this->upload->display_errors();
	                        $this->session->set_flashdata('error_message', $error);
							redirect('candidates/add_candidate');
	                    }else{           	    
	                    	$upload_data=$this->upload->data();
	                    	$id_p1=$upload_data['file_name'];        
		                    $config['image_library'] = 'gd2';
		                    $config['source_image'] = './assets/profile_pictures/'.$id_p1;
		                    $config['new_image'] = './assets/profile_pictures/thumbs/'.$id_p1;
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
								redirect('candidates/add_candidate');
		                    }		                    
	                	}
                	}
                	$id_p2='';
					$id_proof2=$_FILES['id_proof2']['name'];
                    if (!empty($id_proof2)) {                   
	                    $config['upload_path'] = './assets/profile_pictures/';
	                    $config['allowed_types'] = 'gif|jpg|png';
	                    $config['max_size'] = '10240';
	                    $config['remove_spaces'] = TRUE;
		                $config['encrypt_name'] = TRUE;
	                    //$this->upload->initialize($config);
	                    $this->load->library('upload', $config);
	                    if (!$this->upload->do_upload('id_proof2'))
	                    {
	                        $error =$this->upload->display_errors();
	                        $this->session->set_flashdata('error_message', $error);
							redirect('candidates/add_candidate');
	                    }else{           	    
	                    	$upload_data=$this->upload->data();
	                    	$id_p2=$upload_data['file_name'];        
		                    $config['image_library'] = 'gd2';
		                    $config['source_image'] = './assets/profile_pictures/'.$id_p2;
		                    $config['new_image'] = './assets/profile_pictures/thumbs/'.$id_p2;
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
								redirect('candidates/add_candidate');
		                    }		                    
	                	}
                	}
                	$p_logo='';
					$party_logo=$_FILES['party_logo']['name'];
                    if (!empty($party_logo)) {                   
	                    $config['upload_path'] = './assets/profile_pictures/';
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
							redirect('candidates/add_candidate');
	                    }else{           	    
	                    	$upload_data=$this->upload->data();
	                    	$p_logo=$upload_data['file_name'];        
		                    $config['image_library'] = 'gd2';
		                    $config['source_image'] = './assets/profile_pictures/'.$p_logo;
		                    $config['new_image'] = './assets/profile_pictures/thumbs/'.$p_logo;
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
								redirect('candidates/add_candidate');
		                    }		                    
	                	}
                	}
					if ($this->candidates_model->add_candidate($p_pic,$id_p1,$id_p2,$p_logo)) {
						$this->session->set_flashdata('success_message', 'User create Successfully');
						redirect('candidates/show_candidates');
					}
					else{
						$this->session->set_flashdata('error_message', 'Failed to create candidate (Check Level is exist or not)');
						redirect('candidates/add_candidate');
					}
				}				
			}
			else{
				$data['candidate_details'] = $this->candidates_model->get_all_election();
				$data['candidate_details1'] = $this->candidates_model->get_all_party();
				
				//print_r($data['candidate_details1']);exit();
				$data['main_content']='add_candidate_view';
				$this->load->view('includes/templete', $data);
			}
		}
		else{
			$data['main_content']='403_view';
			$this->load->view('includes/templete', $data);
		}
	}	
	function manage_candidate()
	{
		if ($this->session->userdata('role') == 'Admin') {
			if ($this->input->post('candidate_id') != '' &&  $this->input->post('candidate_status') != '') {
				if ($this->candidates_model->manage_candidate()) {
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
	function get_parent()
	{
		if ($this->session->userdata('role') == 'Admin') {
			if ($this->input->post('project_id') != '') {
				if ($parent_details=$this->candidates_model->get_parent($this->input->post('project_id'))) {
					if ($reference_details=$this->candidates_model->get_reference_by($this->input->post())) {
						
					}
					else{
						$reference_details="No Reference By Found";
					}
					$data['parent']=$parent_details;
					$data['reference']=$reference_details;
					print_r(json_encode($data));
				}
				else{
					echo "Levels Full. Tree Complete";
				}
			}
			else{
				echo "Select Project";
			}
		}
		else{
			echo "Access or Permission denied";
		}		
	}
	function edit_candidate()
	{
		if ($this->session->userdata('role') == 'Admin') {
			$candidate_id=$this->uri->segment(3);
			// print_r($candidate_id);exit();
			$data=array();		
			$data['top_nav']=$this->config->item('ADMIN_TOP_NAV');
			//$data['roles']=$this->config->item('roles');
			$data['candidate_details']=$this->candidates_model->get_candidate_details($candidate_id);
			$data['selected_top_nav']='CANDIDATES';

			$data['candidate_details2'] = $this->candidates_model->get_all_election();
			$data['candidate_details1'] = $this->candidates_model->get_all_party();

			$data['candidate_details3'] = $this->candidates_model->edit_election($candidate_id);
            $data['candidate_details4'] = $this->candidates_model->edit_party($candidate_id);

            //$array=explode(",", $data['candidate_details3']);
            //print_r($data['candidate_details']);exit();
			$data['main_content']='edit_candidate_view';
			$this->load->view('includes/templete', $data);
		}
		else{
			$data['main_content']='403_view';
			$this->load->view('includes/templete', $data);
		}		
	}
	function update_candidate()
	{ 
		if ($this->session->userdata('role') == 'Admin') {
			//print_r($_POST);exit();
			$data=array();		
			$data['top_nav']=$this->config->item('ADMIN_TOP_NAV');
			//$data['roles']=$this->config->item('roles');
			$data['selected_top_nav']='CANDIDATES';			
			if($this->input->post('update_candidate')){

				$this->form_validation->set_rules($this->config->item('update_candidate'));
				$this->form_validation->set_message('id', '"Oops! Something went wrong." ');
				$username=$this->candidates_model->get_username($this->input->post('id'));
				if ($this->input->post('username') != '' && $this->input->post('username') != $username){
					$this->form_validation->set_message('is_unique', 'Username is unique. This username all ready used.');
					$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[users.username]');
				}
				else{
					$this->form_validation->set_rules('username', 'Username', 'trim|required');
				}	
				if ($this->form_validation->run() == FALSE)
				{
					$data['candidate_details'] = $this->candidates_model->get_all_election();
					$data['candidate_details1'] = $this->candidates_model->get_all_party();
					$data['main_content']='edit_candidate_view';
					$this->load->view('includes/templete', $data);
				}
				else
				{
					$pro_p='';
					$pro_pic=$_FILES['pro_pic']['name'];
                    if (!empty($pro_pic)) {                   
	                    $config['upload_path'] = './assets/profile_pictures/';
                      $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
                      $config['max_size'] = '10240';
                      $config['remove_spaces'] = TRUE;
                      $config['encrypt_name'] = TRUE;
                
                      $this->load->library('upload',$config);
	                    if (!$this->upload->do_upload('pro_pic'))
	                    {
	                        $error =$this->upload->display_errors();
	                        $this->session->set_flashdata('error_message', $error);
							redirect('candidates/add_candidate');
	                    }else{           	    
	                    	$upload_data=$this->upload->data();
	                    	$pro_p=$upload_data['file_name'];        
		                    $config['image_library'] = 'gd2';
		                    $config['source_image'] = './assets/profile_pictures/'.$pro_p;
		                    $config['new_image'] = './assets/profile_pictures/thumbs/'.$pro_p;
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
								redirect('candidates/add_candidate');
		                    }		                    
	                	}
                	}

                	$p_logo='';
					$party_logo=$_FILES['party_logo']['name'];
                    if (!empty($party_logo)) {                   
	                    $config['upload_path'] = './assets/profile_pictures/';
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
							redirect('candidates/add_candidate');
	                    }else{           	    
	                    	$upload_data=$this->upload->data();
	                    	$p_logo=$upload_data['file_name'];        
		                    $config['image_library'] = 'gd2';
		                    $config['source_image'] = './assets/profile_pictures/'.$p_logo;
		                    $config['new_image'] = './assets/profile_pictures/thumbs/'.$p_logo;
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
								redirect('candidates/add_candidate');
		                    }		                    
	                	}
                	}


					if ($this->candidates_model->update_candidate($pro_p,$p_logo)) {
						$this->session->set_flashdata('success_message', 'User updated Successfully');
						redirect('candidates/show_candidates');
					}
					else{
						$this->session->set_flashdata('error_message', 'Failed to update candidate');
						redirect('candidates/edit_candidate/'.$this->input->post('id'));
					}
				}				
			}
			else{
				$data['candidate_details'] = $this->candidates_model->get_all_election();
				$data['candidate_details1'] = $this->candidates_model->get_all_party();
				$data['main_content']='edit_candidate_view';
				$this->load->view('includes/templete', $data);
			}
		}
		else{
			$data['main_content']='403_view';
			$this->load->view('includes/templete', $data);
		}		
	}	

function view_votes()
	{
		if ($this->session->userdata('role') == 'Admin') {
			$candidate_id=$this->uri->segment(3);
			// print_r($candidate_id);exit();
			$data=array();		
			$data['top_nav']=$this->config->item('ADMIN_TOP_NAV');
			//$data['roles']=$this->config->item('roles');
			$data['candidate_details']=$this->candidates_model->get_candidate_election_details($candidate_id);
			$data['selected_top_nav']='CANDIDATES';

			
            //$array=explode(",", $data['candidate_details3']);
            //print_r($data['candidate_details']);exit();
			$data['main_content']='candidate_election_votes';
			$this->load->view('includes/templete', $data);
		}
		else{
			$data['main_content']='403_view';
			$this->load->view('includes/templete', $data);
		}		
	}






	function show_candidates()
	{
		if ($this->session->userdata('role') == 'Admin') {
			$data=array();		
			$data['top_nav']=$this->config->item('ADMIN_TOP_NAV');
			//$data['roles']=$this->config->item('roles');
			$data['candidates']=$this->candidates_model->get_all_candidates();
			
			//print_r($data['candidates']); die();
			$data['selected_top_nav']='CANDIDATES';
			$data['main_content']='show_candidates_view';
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