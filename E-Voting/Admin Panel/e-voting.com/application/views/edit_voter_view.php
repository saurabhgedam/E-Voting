
          <div class="left-sidebar">
            <?php if(validation_errors()){ ?>
            <div class="alert alert-block alert-warning fade in">
              <button data-dismiss="alert" class="close" type="button">
                ×
              </button>
              <h4 class="alert-heading">
                Warning!
              </h4>
              <p>
                <?php echo validation_errors(); ?>
              </p>
            </div>
            <?php } ?>
            <?php if($this->session->flashdata('error_message')){ ?>
            <div class="alert alert-block alert-danger fade in">
              <button data-dismiss="alert" class="close" type="button">
                ×
              </button>
              <h4 class="alert-heading">
                Error!
              </h4>
              <p>
                <?php echo $this->session->flashdata('error_message'); ?>
              </p>
            </div>
            <?php } ?>
            <div class="row-fluid">
              <div class="span12">
                <div class="widget">
                  <div class="widget-header">
                    <div class="title">
                      Edit Voter Account 
                      <span class="mini-title">
                        Form for edit Account
                      </span>
                    </div>
                    <span class="tools">
                      <i class="fa fa-user fa-lg fa-2x"></i>
                    </span>
                  </div>
                  <div class="widget-body">
                    <div class="container-fluid">
                      <?php
                       /* if(!empty($voter_details->pro_pic)){
                          $profile_picture=site_url('assets/profile_pictures/'.$voter_details->pro_pic);
                        }
                        elseif($this->session->userdata('gender') == "male"){
                          $profile_picture=site_url('assets/profile_pictures/male_icon.png'); 
                        }
                        else{                        
                          $profile_picture=site_url('assets/profile_pictures/male_icon.png');
                        }*/
                      ?>
                      <div class="row-fluid">
                        <div class="span3">
                          <div class="thumbnail">
                            <img alt="300x200" src="<?php echo (set_value('pro_pic',(!empty($voter_details->pro_pic) ? $voter_details->pro_pic : '' )) ? site_url('assets/profile_pictures/'.set_value('pro_pic',(!empty($voter_details->pro_pic) ? $voter_details->pro_pic : '' ))) : ($this->session->userdata('gender') == "Male" ? site_url('assets/profile_pictures/male_icon.png') : site_url('assets/profile_pictures/female_icon.png'))); ?>">                            
                          </div>
                        </div>
                      <div class="span9">
                      <form action="<?php echo site_url('voters/update_voter'); ?>" method="POST" enctype="multipart/form-data" class="form-horizontal no-margin">
                       <input type="hidden"  name="id" value="<?php echo set_value('id',(isset($voter_details->id) ? $voter_details->id : '')); ?>"/>
                        <h5>
                          Login Information
                        </h5>
                        <hr>
                        <div class="control-group">
                          <label class="control-label" for="username">
                            Username
                          </label>
                          <div class="controls">
                            <input type="text" name="username" id="username" value="<?php echo set_value('username',(isset($voter_details->username) ? $voter_details->username : '')); ?>" class="span6" placeholder="Enter Username"  required/>
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label" for="password">
                            New Password
                          </label>
                          <div class="controls">
                            <input type="password" name="password" id="password" value="<?php echo (set_value('password') ? set_value('password') : ''); ?>" pattern=".{6,}" class="span6" placeholder="6 or more characters"  />
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label" for="repPassword">
                            Repeat Password
                          </label>
                          <div class="controls">
                            <input type="password" name="repPassword" id="repPassword" value="<?php echo (set_value('repPassword') ? set_value('repPassword') : ''); ?>" pattern=".{6,}" class="span6" placeholder="Retype Password"  />
                          </div>
                        </div>
                        <h5>
                          Personal Information
                        </h5>
                        <hr>
                        <div class="control-group">
                          <label class="control-label" for="name">
                            Name
                          </label>
                          <div class="controls controls-row">
                            <input class="span3" type="text"  name="first_name" id="first_name" value="<?php echo set_value('first_name',(isset($voter_details->first_name) ? $voter_details->first_name : '')); ?>" placeholder="First Name" required/>
                            <input class="span3 input-left-top-margins" type="text" name="last_name" id="last_name" value="<?php echo set_value('last_name',(isset($voter_details->last_name) ? $voter_details->last_name : '')); ?>" placeholder="Last Name" required/>
                          </div>
                        </div>
                        <div class="control-group">
                              <label class="control-label">
                                Gender
                              </label>
                              <div class="controls">
                                <label class="radio inline">
                                  <input type="radio" name="gender" id="gender" value="Male" <?php echo (set_value('gender',(isset($voter_details->gender) ? $voter_details->gender : '')) == 'Male' ? 'checked' : ''); ?> required/>
                                  Male
                                </label>
                                <label class="radio inline">
                                  <input type="radio" name="gender" id="gender" value="Female" <?php echo (set_value('gender',(isset($voter_details->gender) ? $voter_details->gender : '')) == 'Female' ? 'checked' : ''); ?> required/>
                                  Female
                                </label>
                              </div>
                            </div>
                        <div class="control-group">
                          <label class="control-label" for="tel">
                            Mobile Number
                          </label>
                          <div class="controls">
                            <input type="tel" id="tel" name="tel" value="<?php echo set_value('tel',(isset($voter_details->mobile) ? $voter_details->mobile : '')); ?>" pattern="\d{10}" class="span6" placeholder="Enter Mobile Number"  required/>
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label" for="email1">
                            Email Address
                          </label>
                          <div class="controls">
                            <input type="email" name="email" id="email" value="<?php echo set_value('email',(isset($voter_details->email) ? $voter_details->email : '')); ?>" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" class="span6" placeholder="Enter Email Address e.g. example@example.com"  required/>
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label" for="address">
                            Address
                          </label>
                          <div class="controls">
                            <textarea rows="3" name="current_address" id="current_address" class="span6" placeholder="Enter Address ..." required><?php echo set_value('current_address',(isset($voter_details->current_address) ? $voter_details->current_address : '')); ?></textarea>                          
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label" for="image">
                            Upload Image
                          </label>
                          <div class="controls">
                            <input type="file" name="pro_pic" id="pro_pic" value="<?php echo set_value('pro_pic')?set_value('pro_pic'):$voter_details->pro_pic; ?>" class="span6"/>
                          </div>
                        </div>                        
                         <!--                     
                        <div class="control-group">
                          <label class="control-label" for="role">
                            User Role
                          </label>
                          <div class="controls">
                            <select  name="role" id="role" class="span6" required>
                              <option value="">
                                Select Role
                              </option>
                              <?php //foreach ($roles as $key => $value) { ?>
                                <option value="<?php //echo $key; ?>" <?php //echo (set_value('role',(isset($voter_details->role) ? $voter_details->role : '')) == $key ? 'selected' : ''); ?> >
                                  <?php //echo $value; ?>
                                </option>
                              <?php //}?>
                            </select>
                          </div>
                        </div>-->
                        <div class="form-actions no-margin">
                          <button type="submit" name="update_voter" value="update_voter" class="btn btn-info pull-right">
                            Update Voter
                          </button>
                          <div class="clearfix">
                          </div>
                        </div>
                        
                      </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
          </div>