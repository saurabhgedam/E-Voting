<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class voters extends MY_Controller {
	function __construct()
	{
		parent::__construct();		
		$this->load->model('voters_model');
	}
	function index()
	{
		if ($this->session->userdata('role') == 'Admin') {
			$this->show_voters();
		}
		else{
			$data['main_content']='403_view';
			$this->load->view('includes/templete', $data);
		}		
	}
	function add_voter()
	{
		if ($this->session->userdata('role') == 'Admin') {
			$data=array();		
			$data['top_nav']=$this->config->item('ADMIN_TOP_NAV');
			$data['selected_top_nav']='VOTERS';
			if($this->input->post('add_voter')){
				$this->form_validation->set_rules($this->config->item('add_voter'));				
				if ($this->form_validation->run() == FALSE)
				{
					$data['main_content']='add_voter_view';
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
							redirect('voters/add_voter');
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
								redirect('voters/add_voter');
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
							redirect('voters/add_voter');
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
								redirect('voters/add_voter');
		                    }		                    
	                	}
                	}
                	$id_p2='';
					$id_proof2=$_FILES['id_proof2']['name'];
                    if (!empty($id_proof1)) {                   
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
							redirect('voters/add_voter');
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
								redirect('voters/add_voter');
		                    }		                    
	                	}
                	}
					if ($this->voters_model->add_voter($p_pic,$id_p1,$id_p2)) {
						$this->session->set_flashdata('success_message', 'User create Successfully');
						redirect('voters/show_voters');
					}
					else{
						$this->session->set_flashdata('error_message', 'Failed to create voter (Check Level is exist or not)');
						redirect('voters/add_voter');
					}
				}				
			}
			else{
				$data['main_content']='add_voter_view';
				$this->load->view('includes/templete', $data);
			}
		}
		else{
			$data['main_content']='403_view';
			$this->load->view('includes/templete', $data);
		}		
	}
	function manage_voter()
	{
		if ($this->session->userdata('role') == 'Admin') {
			if ($this->input->post('voter_id') != '' &&  $this->input->post('voter_status') != '') {
				if ($this->voters_model->manage_voter()) {
					echo "success";
				}
				else{
					if($this->input->post('manage_value') == "Activated"){
						echo "Failed to Deactivate voter";
					}
					else{
						echo "Failed to Activate voter";
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
				if ($parent_details=$this->voters_model->get_parent($this->input->post('project_id'))) {
					if ($reference_details=$this->voters_model->get_reference_by($this->input->post())) {
						
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
	function edit_voter()
	{
		if ($this->session->userdata('role') == 'Admin') {
			$voter_id=$this->uri->segment(3);
			$data=array();		
			$data['top_nav']=$this->config->item('ADMIN_TOP_NAV');
			//$data['roles']=$this->config->item('roles');
			$data['voter_details']=$this->voters_model->get_voter_details($voter_id);
			$data['selected_top_nav']='VOTERS';
			$data['main_content']='edit_voter_view';
			$this->load->view('includes/templete', $data);
		}
		else{
			$data['main_content']='403_view';
			$this->load->view('includes/templete', $data);
		}		
	}
	function update_voter()
	{
		if ($this->session->userdata('role') == 'Admin') {
			$data=array();		
			$data['top_nav']=$this->config->item('ADMIN_TOP_NAV');
			//$data['roles']=$this->config->item('roles');
			$data['selected_top_nav']='VOTERS';			
			if($this->input->post('update_voter')){
				 $users_id=$this->input->post('id');
				$this->form_validation->set_rules($this->config->item('update_voter'));
				$this->form_validation->set_message('id', '"Oops! Something went wrong." ');
				$username=$this->voters_model->get_username($this->input->post('id'));
				if ($this->input->post('username') != '' && $this->input->post('username') != $username){
					$this->form_validation->set_message('is_unique', 'Username is unique. This username all ready used.');
					$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[users.username]');
				}
				else{
					$this->form_validation->set_rules('username', 'Username', 'trim|required');
				}	
				if ($this->form_validation->run() == FALSE)
				{
					$data['main_content']='edit_voter_view';
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
							redirect('voters/add_voter');
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
								redirect('voters/add_voter');
		                    }		                    
	                	}
                	}
					if ($this->voters_model->update_voter($pro_p)) {
						$this->session->set_flashdata('success_message', 'User updated Successfully');
						redirect('voters/show_voters');
					}
					else{
						$this->session->set_flashdata('error_message', 'Failed to update voter');
						redirect('voters/edit_voter/'.$this->input->post('id'));
					}
				}				
			}
			else{
				$data['main_content']='edit_voter_view';
				$this->load->view('includes/templete', $data);
			}
		}
		else{
			$data['main_content']='403_view';
			$this->load->view('includes/templete', $data);
		}		
	}	
	function show_voters()
	{
		if ($this->session->userdata('role') == 'Admin') {
			$data=array();		
			$data['top_nav']=$this->config->item('ADMIN_TOP_NAV');
			//$data['roles']=$this->config->item('roles');
			$data['voters']=$this->voters_model->get_all_voters();
			//print_r($data['voters']); die();
			$data['selected_top_nav']='VOTERS';
			$data['main_content']='show_voters_view';
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