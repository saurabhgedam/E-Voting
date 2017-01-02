<?php /*if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class booth_officers extends MY_Controller {
	function __construct()
	{
		parent::__construct();		
		$this->load->model('booth_officers_model');
	}
	function index()
	{
		if ($this->session->userdata('role') == 'Admin') {
			$this->show_booth_officers();
		}
		else{
			$data['main_content']='403_view';
			$this->load->view('includes/templete', $data);
		}		
	}
	function add_booth_officer()
	{
		if ($this->session->userdata('role') == 'Admin') {
			$data=array();		
			$data['top_nav']=$this->config->item('ADMIN_TOP_NAV');
			$data['selected_top_nav']='BOOTHS';
			if($this->input->post('add_booth_officer')){
				$this->form_validation->set_rules($this->config->item('add_booth_officer'));				
				if ($this->form_validation->run() == FALSE)
				{
					$data['main_content']='add_booth_officer_view';
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
							redirect('booth_officers/add_booth_officer');
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
								redirect('booth_officers/add_booth_officer');
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
							redirect('booth_officers/add_booth_officer');
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
								redirect('booth_officers/add_booth_officer');
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
							redirect('booth_officers/add_booth_officer');
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
								redirect('booth_officers/add_booth_officer');
		                    }		                    
	                	}
                	}
					if ($this->booth_officers_model->add_booth_officer($p_pic,$id_p1,$id_p2)) {
						$this->session->set_flashdata('success_message', 'User create Successfully');
						redirect('booth_officers/show_booth_officers');
					}
					else{
						$this->session->set_flashdata('error_message', 'Failed to create booth_officer (Check Level is exist or not)');
						redirect('booth_officers/add_booth_officer');
					}
				}				
			}
			else{
				$data['main_content']='add_booth_officer_view';
				$this->load->view('includes/templete', $data);
			}
		}
		else{
			$data['main_content']='403_view';
			$this->load->view('includes/templete', $data);
		}		
	}
	function manage_booth_officer()
	{
		if ($this->session->userdata('role') == 'Admin') {
			if ($this->input->post('booth_officer_id') != '' &&  $this->input->post('booth_officer_status') != '') {
				if ($this->booth_officers_model->manage_booth_officer()) {
					echo "success";
				}
				else{
					if($this->input->post('manage_value') == "Activated"){
						echo "Failed to Deactivate booth_officer";
					}
					else{
						echo "Failed to Activate booth_officer";
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
				if ($parent_details=$this->booth_officers_model->get_parent($this->input->post('project_id'))) {
					if ($reference_details=$this->booth_officers_model->get_reference_by($this->input->post())) {
						
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
	function edit_booth_officer()
	{
		if ($this->session->userdata('role') == 'Admin') {
			$booth_officer_id=$this->uri->segment(3);
			$data=array();		
			$data['top_nav']=$this->config->item('ADMIN_TOP_NAV');
			//$data['roles']=$this->config->item('roles');
			$data['booth_officer_details']=$this->booth_officers_model->get_booth_officer_details($booth_officer_id);
			$data['selected_top_nav']='BOOTHS';
			$data['main_content']='edit_booth_officer_view';
			$this->load->view('includes/templete', $data);
		}
		else{
			$data['main_content']='403_view';
			$this->load->view('includes/templete', $data);
		}		
	}
	function update_booth_officer()
	{
		if ($this->session->userdata('role') == 'Admin') {
			$data=array();		
			$data['top_nav']=$this->config->item('ADMIN_TOP_NAV');
			//$data['roles']=$this->config->item('roles');
			$data['selected_top_nav']='BOOTHS';			
			if($this->input->post('update_booth_officer')){
				$this->form_validation->set_rules($this->config->item('update_booth_officer'));
				$this->form_validation->set_message('id', '"Oops! Something went wrong." ');
				$username=$this->booth_officers_model->get_username($this->input->post('id'));
				if ($this->input->post('username') != '' && $this->input->post('username') != $username){
					$this->form_validation->set_message('is_unique', 'Username is unique. This username all ready used.');
					$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[users.username]');
				}
				else{
					$this->form_validation->set_rules('username', 'Username', 'trim|required');
				}	
				if ($this->form_validation->run() == FALSE)
				{
					$data['main_content']='edit_booth_officer_view';
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
							redirect('booth_officers/add_booth_officer');
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
								redirect('booth_officers/add_booth_officer');
		                    }		                    
	                	}
                	}
					if ($this->booth_officers_model->update_booth_officer($pro_p)) {
						$this->session->set_flashdata('success_message', 'User updated Successfully');
						redirect('booth_officers/show_booth_officers');
					}
					else{
						$this->session->set_flashdata('error_message', 'Failed to update booth_officer');
						redirect('booth_officers/edit_booth_officer/'.$this->input->post('id'));
					}
				}				
			}
			else{
				$data['main_content']='edit_booth_officer_view';
				$this->load->view('includes/templete', $data);
			}
		}
		else{
			$data['main_content']='403_view';
			$this->load->view('includes/templete', $data);
		}		
	}	
	function show_booth_officers()
	{
		if ($this->session->userdata('role') == 'Admin') {
			$data=array();		
			$data['top_nav']=$this->config->item('ADMIN_TOP_NAV');
			//$data['roles']=$this->config->item('roles');
			$data['booth_officers']=$this->booth_officers_model->get_all_booth_officers();
			//print_r($data['booth_officers']); die();
			$data['selected_top_nav']='BOOTHS';
			$data['main_content']='show_booth_officers_view';
			$this->load->view('includes/templete', $data);
		}
		else{
			$data['main_content']='403_view';
			$this->load->view('includes/templete', $data);
		}		
	}
}
*/
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */