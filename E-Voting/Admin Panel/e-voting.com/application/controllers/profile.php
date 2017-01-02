<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class profile extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('profile_model');
	}
	function index()
	{
		redirect('profile/edit_profile');				
	}
	function edit_profile()
	{
		if ($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'Member') {
			$selected_top_nav='';
			$data=array();		
			if($this->session->userdata('role') == 'Admin'){				
				$data['top_nav']=$this->config->item('ADMIN_TOP_NAV');
			}
			if($this->session->userdata('role') == 'Member'){				
				$data['top_nav']=$this->config->item('MEMBER_TOP_NAV');
			}
			$data['profile_details']=$this->profile_model->get_profile_details();
			$data['selected_top_nav']=$selected_top_nav;
			$data['main_content']='edit_profile_view';
			$this->load->view('includes/templete', $data);
		}
		else{
			$data['main_content']='403_view';
			$this->load->view('includes/templete', $data);
		}		
	}
	function update_profile()
	{
		if ($this->session->userdata('role') == 'Admin' || $this->session->userdata('role') == 'Member') {
			$data=array();		
			if($this->session->userdata('role') == 'Admin'){				
				$data['top_nav']=$this->config->item('ADMIN_TOP_NAV');
			}
			if($this->session->userdata('role') == 'Member'){				
				$data['top_nav']=$this->config->item('MEMBER_TOP_NAV');
			}
			$data['selected_top_nav']='';			
			if($this->input->post('update_profile')){

				$users_id=$this->input->post('id');	
				$this->form_validation->set_rules($this->config->item('update_profile'));
				$username=$this->profile_model->get_username($this->input->post('id'));				
				if ($this->input->post('username') != '' && $this->input->post('username') != $username){
					$this->form_validation->set_message('is_unique', 'Username is unique. This username all ready used.');
					$this->form_validation->set_rules('username', 'Username', 'trim|required|is_unique[users.username]');
				}
				else{
					$this->form_validation->set_rules('username', 'Username', 'trim|required');
				}	
				if ($this->form_validation->run() == FALSE)
				{
					$data['main_content']='edit_profile_view';
					$this->load->view('includes/templete', $data);
				}
				else
				{
					
					$img=NULL;
					$image=$_FILES['image']['name'];
                    if (!empty($image)) {                   
	                    $config['upload_path'] = './assets/profile_pictures/';
	                    $config['allowed_types'] = 'gif|jpg|png';
	                    $config['max_size'] = '10240';
	                    //$this->upload->initialize($config);
	                    $this->load->library('upload', $config);
	                    if (!$this->upload->do_upload('image'))
	                    {
	                        $error =$this->upload->display_errors();
	                        $this->session->set_flashdata('error_message', $error);
							redirect('profile/edit_profile');
	                    }else{           	    
	                    	$upload_data=$this->upload->data();

	                    	$img=$upload_data['file_name'];  
	                    	//print_r($img);exit();      
		                    $config['image_library'] = 'gd2';
		                    $config['source_image'] = './assets/profile_pictures/'.$img;
		                    $config['new_image'] = './assets/profile_pictures/thumbs/'.$img;
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
								redirect('profile/edit_profile');
		                    }		                    
	                	}
                	}
					if ($this->profile_model->update_profile($img)) {
						if(!empty($img)){
							$user_data=array('id'=>$this->input->post('id'),'first_name'=>$this->input->post('first_name'),'last_name'=>$this->input->post('last_name'),'mobile'=>$this->input->post('mobile'),'email'=>$this->input->post('email'),'gender'=>$this->input->post('gender'),'image'=>$img);
						  //print_r($img);exit();      print_r($user_data);exit();
						}
						else{
							$user_data=array('id'=>$this->input->post('id'),'first_name'=>$this->input->post('first_name'),'last_name'=>$this->input->post('last_name'),'mobile'=>$this->input->post('mobile'),'email'=>$this->input->post('email'),'gender'=>$this->input->post('gender'));	
						}
						$this->session->set_userdata($user_data);
						$this->session->set_flashdata('success_message', 'Profile updated Successfully');
						redirect('dashboard');
					}
					else{
						$this->session->set_flashdata('error_message', 'Failed to update Profile');
						redirect('profile/edit_profile');
					}
				}				
			}
			else{
				$data['main_content']='edit_profile_view';
				$this->load->view('includes/templete', $data);
			}
		}
		else{
			$data['main_content']='403_view';
			$this->load->view('includes/templete', $data);
		}		
	}
}
