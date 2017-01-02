
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
                      Edit Candidate Account 
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
                        if(!empty($candidate_details->pro_pic)){
                          $profile_picture=site_url('assets/profile_pictures/'.$candidate_details->pro_pic);
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
                      <form action="<?php echo site_url('candidates/update_candidate'); ?>" method="POST" enctype="multipart/form-data" class="form-horizontal no-margin">
                       <input type="hidden"  name="id" value="<?php echo set_value('id',(isset($candidate_details->id) ? $candidate_details->id : '')); ?>"/>
                        <h5>
                          Login Information
                        </h5>
                        <hr>
                        <div class="control-group">
                          <label class="control-label" for="username">
                            Username
                          </label>
                          <div class="controls">
                            <input type="text" name="username" id="username" value="<?php echo set_value('username',(isset($candidate_details->username) ? $candidate_details->username : '')); ?>" class="span6" placeholder="Enter Username"  required/>
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
                            <input class="span3" type="text"  name="first_name" id="first_name" value="<?php echo set_value('first_name',(isset($candidate_details->first_name) ? $candidate_details->first_name : '')); ?>" placeholder="First Name" required/>
                            <input class="span3 input-left-top-margins" type="text" name="last_name" id="last_name" value="<?php echo set_value('last_name',(isset($candidate_details->last_name) ? $candidate_details->last_name : '')); ?>" placeholder="Last Name" required/>
                          </div>
                        </div>
                        <div class="control-group">
                              <label class="control-label">
                                Gender
                              </label>
                              <div class="controls">
                                <label class="radio inline">
                                  <input type="radio" name="gender" id="gender" value="Male" <?php echo (set_value('gender',(isset($candidate_details->gender) ? $candidate_details->gender : '')) == 'Male' ? 'checked' : ''); ?> required/>
                                  Male
                                </label>
                                <label class="radio inline">
                                  <input type="radio" name="gender" id="gender" value="Female" <?php echo (set_value('gender',(isset($candidate_details->gender) ? $candidate_details->gender : '')) == 'Female' ? 'checked' : ''); ?> required/>
                                  Female
                                </label>
                              </div>
                            </div>
                        <div class="control-group">
                          <label class="control-label" for="mobile">
                            Mobile Number
                          </label>
                          <div class="controls">
                            <input type="mobile" id="mobile" name="mobile" value="<?php echo set_value('mobile',(isset($candidate_details->mobile) ? $candidate_details->mobile : '')); ?>" pattern="\d{10}" class="span6" placeholder="Enter Mobile Number"  required/>
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label" for="email1">
                            Email Address
                          </label>
                          <div class="controls">
                            <input type="email" name="email" id="email" value="<?php echo set_value('email',(isset($candidate_details->email) ? $candidate_details->email : '')); ?>" pattern="[^@]+@[^@]+\.[a-zA-Z]{2,6}" class="span6" placeholder="Enter Email Address e.g. example@example.com"  required/>
                          </div>
                        </div>
                        <div class="control-group">
                          <label class="control-label" for="address">
                            Address
                          </label>
                          <div class="controls">
                            <textarea rows="3" name="current_address" id="current_address" class="span6" placeholder="Enter Address ..." required><?php echo set_value('current_address',(isset($candidate_details->current_address) ? $candidate_details->current_address : '')); ?></textarea>                          
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
                          <h5>
                        Voting Information
                      </h5>
                      <hr>
                       <div class="control-group">
                        <label class="control-label" for="electon">
                          Select Election
                        </label>
                        <div class="controls controls-row">
                         <div class="input-group">  
                        <?php if(!empty($candidate_details3)){

                        foreach($candidate_details3 as $row1) { 
                          $eid[]= $row1->election_id;

                        }//print_r($eid);exit();
                        ?>
                           <!--  <select name="electon[]" multiple>
                              
                                <?php
                                 foreach($candidate_details2 as $row) {?>
                              <option  <?php echo in_array($row->id, $eid)?'selected':'';?> value="<?php echo $row->id;?>"><?=$row->name?></option>
                            
                              <?php } ?>
                              </select> 
                              -->
                              <?php

                              foreach($candidate_details2 as $row) {?>
                               <input <?php echo in_array($row->id, $eid)?'checked':'';?> type="checkbox" id="<?php echo $row->id; ?>" name="electon[]"  onchange="cTrig('<?php echo $row->id; ?>')" value="<?=$row->id?>"><?=$row->name?>
                                 
         <br>
                                 <?php } }else{ echo "Elections are not available";}?>
                               
                          <?php /*$class = 'data-placeholder="Choose a Role..." class="chosen-select" style="width:350px;" tabindex="2"';
                                                echo form_dropdown('election', $election, set_value('election')?set_value('election'):'',$class);*/?>
                          </div>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="ward">
                          Ward
                        </label>
                        <div class="controls controls-row">
                          <input class="span3" type="text"  name="ward" id="ward" value="<?php echo set_value('ward',(isset($candidate_details->ward) ? $candidate_details->ward : '')); ?>" placeholder="Ward" required/>
                        </div>
                      </div>   

                      <h5>
                        Party Information
                      </h5>
                      <hr>
                   <!--   <div class="control-group">
                        <label class="control-label" for="party">
                          Party Name
                        </label>
                        <div class="controls">
                          <input type="text" name="party" id="party" value="<?php echo set_value('party'); ?>" class="span6" placeholder="Enter Party Name"  required/>
                        </div>
                      </div>
                      -->
                      <div class="control-group">
                        <label class="control-label" for="party">
                          Party
                        </label>
                        <div class="controls controls-row">
                         <div class="input-group">  
                         <?php if(!empty($candidate_details4)){
                                  foreach($candidate_details4 as $row1) { 
                                    $party[]= $row1->name;
                                  }
                        //print_r($party);exit();
                        ?>
                             <select name="party" >
                              <?php

                                 foreach($candidate_details1 as $candidate_details1) { ?>
                              <option <?php echo in_array($candidate_details1->name, $party)?'selected':'';?> value="<?=$candidate_details1->name?>"><?=$candidate_details1->name?></option>
                              <?php } }else{echo "Elections are not available";}?>
                              </select> 
                          <?php /*$class = 'data-placeholder="Choose a Role..." class="chosen-select" style="width:350px;" tabindex="2"';
                                                echo form_dropdown('election', $election, set_value('election')?set_value('election'):'',$class);*/?>
                          </div>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="party_logo">
                          Upload Party Logo
                        </label>
                        <div class="controls">
                          <input type="file" name="party_logo" id="party_logo" value="" class="span6" />
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
                          <button type="submit" name="update_candidate" value="update_candidate" class="btn btn-info pull-right">
                            Update Candidate
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

          
<script type="text/javascript">
     function cTrig(clickedid) { 
      if (document.getElementById(clickedid).checked == true) {
        return false;
      } else {
       var box= confirm("Are you sure. you want to uncheck the Election");
        if (box==true)
            return true;
        else
           document.getElementById(clickedid).checked = true;
            
      }
    }
</script>


         