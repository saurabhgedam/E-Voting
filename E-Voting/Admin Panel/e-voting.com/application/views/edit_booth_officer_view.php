
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
                      Edit Booth Officer Account 
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
                        if(!empty($booth_officer_details->pro_pic)){
                          $profile_picture=site_url('assets/profile_pictures/'.$booth_officer_details->pro_pic);
                        }
                        elseif($this->session->userdata('gender') == "male"){
                          $profile_picture=site_url('assets/profile_pictures/male_icon.png'); 
                        }
                        else{                        
                          $profile_picture=site_url('assets/profile_pictures/male_icon.png');
                        }
                      ?>
                      <div class="row-fluid">
                        <div class="span3">
                          <div class="thumbnail">
                            <img alt="300x200" src="<?php echo $profile_picture; ?>">                            
                          </div>
                        </div>
                      <div class="span9">
                      <form action="<?php echo site_url('booth_officers/update_booth_officer'); ?>" method="POST" enctype="multipart/form-data" class="form-horizontal no-margin">
                       <input type="hidden"  name="id" value="<?php echo set_value('id',(isset($booth_officer_details->id) ? $booth_officer_details->id : '')); ?>"/>
                        <h5>
                          Login Information
                        </h5>
                        <hr>
                        <div class="control-group">
                          <label class="control-label" for="username">
                            Username
                          </label>
                          <div class="controls">
                            <input type="text" name="username" id="username" value="<?php echo set_value('username',(isset($booth_officer_details->username) ? $booth_officer_details->username : '')); ?>" class="span6" placeholder="Enter Username"  required/>
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
                            <input class="span3" type="text"  name="first_name" id="first_name" value="<?php echo set_value('first_name',(isset($booth_officer_details->first_name) ? $booth_officer_details->first_name : '')); ?>" placeholder="First Name" required/>
                            <input class="span3 input-left-top-margins" type="text" name="last_name" id="last_name" value="<?php echo set_value('last_name',(isset($booth_officer_details->last_name) ? $booth_officer_details->last_name : '')); ?>" placeholder="Last Name" required/>
                          </div>
                        </div>
                        <div class="control-group">
                              <label class="control-label">
                                Gender
                              </label>
                              <div class="controls">
                                <label class="radio inline">
                                  <input type="radio" name="gender" id="gender" value="Male" <?php echo (set_value('gender',(isset($booth_officer_details->gender) ? $booth_officer_details->gender : '')) == 'Male' ? 'checked' : ''); ?> required/>
                                  Male
                                </label>
                                <label class="radio inline">
                                  <input type="radio" name="gender" id="gender" value="Female" <?php echo (set_value('gender',(isset($booth_officer_details->gender) ? $booth_officer_details->gender : '')) == 'Female' ? 'checked' : ''); ?> required/>
                                  Female
                                </label>
                              </div>
                            </div>
                        <div class="control-group">
                          <label class="control-label" for="mobile">
                            Mobile Number
                          </label>
                          <div class="controls">
                            <input type="mobile" id="mobile" name="mobile" value="<?php echo set_value('mobile',(isset($booth_officer_details->mobile) ? $booth_officer_details->mobile : '')); ?>" pattern="\d{10}" class="span6" placeholder="Enter Mobile Number"  required/>
                         <!--   <input type="mobile" id="mobile" name="mobile" value="<?php echo set_value('mobile',(isset($booth_officer_details->mobile) ? $booth_officer_details->mobile : '')); ?>" pattern="\d{10}" class="span6" placeholder="Enter Mobile Number"  required/>-->
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label" for="email1">
                            Email Address
                          </label>
                          <div class="controls">
                            <input type="email" name="email" id="email" value="<?php echo set_value('email',(isset($booth_officer_details->email) ? $booth_officer_details->email : '')); ?>" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" class="span6" placeholder="Enter Email Address e.g. example@example.com"  required/>
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label" for="address">
                            Address
                          </label>
                          <div class="controls">
                            <textarea rows="3" name="current_address" id="current_address" class="span6" placeholder="Enter Address ..." required><?php echo set_value('current_address',(isset($booth_officer_details->current_address) ? $booth_officer_details->current_address : '')); ?></textarea>                          
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label" for="image">
                            Upload Image
                          </label>
                          <div class="controls">
                            <input type="file" name="pro_pic" id="pro_pic" value="" class="span6"/>
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
                          <button type="submit" name="update_booth_officer" value="update_booth_officer" class="btn btn-info pull-right">
                            Update Booth Officer
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