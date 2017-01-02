
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
                      Create user account 
                      <span class="mini-title">
                        Form for new Account
                      </span>
                    </div>
                    <span class="tools">
                      <a class="fs1" aria-hidden="true" data-icon="&#xe090;"></a>
                    </span>
                  </div>
                  <div class="widget-body">
                    
                    <form action="<?php echo site_url('users/update_user'); ?>" method="POST" class="form-horizontal no-margin">
                      <input type="hidden"  name="id" value="<?php echo set_value('id',(isset($user_details->id) ? $user_details->id : '')); ?>"/>
                      <div class="control-group">
                        <label class="control-label" for="name">
                          Name
                        </label>
                        <div class="controls controls-row">
                          <input class="span3" type="text"  name="first_name" id="first_name" value="<?php echo set_value('first_name',(isset($user_details->first_name) ? $user_details->first_name : '')); ?>" placeholder="First Name" required/>
                          <input class="span3 input-left-top-margins" type="text" name="last_name" id="last_name" value="<?php echo set_value('last_name',(isset($user_details->last_name) ? $user_details->last_name : '')); ?>" placeholder="Last Name" required/>
                        </div>
                      </div>
                      <div class="control-group">
                            <label class="control-label">
                              Gender
                            </label>
                            <div class="controls">
                              <label class="radio inline">
                                <input type="radio" name="gender" id="gender" value="Male" <?php echo (set_value('gender',(isset($user_details->gender) ? $user_details->gender : '')) == 'Male' ? 'checked' : ''); ?> required/>
                                Male
                              </label>
                              <label class="radio inline">
                                <input type="radio" name="gender" id="gender" value="Female" <?php echo (set_value('gender',(isset($user_details->gender) ? $user_details->gender : '')) == 'Female' ? 'checked' : ''); ?> required/>
                                Female
                              </label>
                            </div>
                          </div>
                      <div class="control-group">
                        <label class="control-label" for="tel">
                          Mobile Number
                        </label>
                        <div class="controls">
                          <input type="tel" id="tel" name="tel" value="<?php echo set_value('tel',(isset($user_details->mobile) ? $user_details->mobile : '')); ?>" pattern="\d{10}" class="span6" placeholder="Enter Mobile Number"  required/>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="email1">
                          Email Address
                        </label>
                        <div class="controls">
                          <input type="email" name="email" id="email" value="<?php echo set_value('email',(isset($user_details->email) ? $user_details->email : '')); ?>" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" class="span6" placeholder="Enter Email Address e.g. example@example.com"  required/>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="address">
                          Address
                        </label>
                        <div class="controls">
                          <textarea rows="3" name="address" id="address" class="span6" placeholder="Enter Address ..." required><?php echo set_value('address',(isset($user_details->address) ? $user_details->address : '')); ?></textarea>                          
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="username">
                          Username
                        </label>
                        <div class="controls">
                          <input type="text" name="username" id="username" value="<?php echo set_value('username',(isset($user_details->username) ? $user_details->username : '')); ?>" class="span6" placeholder="Enter Username"  required/>
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
                                            
                      <div class="control-group">
                        <label class="control-label" for="role">
                          User Role
                        </label>
                        <div class="controls">
                          <select  name="role" id="role" class="span6" required>
                            <option value="">
                              Select Role
                            </option>
                            <?php foreach ($roles as $key => $value) { ?>
                              <option value="<?php echo $key; ?>" <?php echo (set_value('role',(isset($user_details->role) ? $user_details->role : '')) == $key ? 'selected' : ''); ?> >
                                <?php echo $value; ?>
                              </option>
                            <?php }?>
                          </select>
                        </div>
                      </div>
                      <div class="form-actions no-margin">
                        <button type="submit" name="update_user" value="update_user" class="btn btn-info pull-right">
                          Update User
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