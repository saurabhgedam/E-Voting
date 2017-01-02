
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
                Success!
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
                      Update Site
                      <span class="mini-title">
                        Form for update site
                      </span>
                    </div>
                    <span class="tools">
                      <i class="fa fa-home fa-lg fa-2x"></i>
                    </span>
                  </div>
                  <div class="widget-body">
                    
                    <form action="<?php echo site_url('sites/update_site'); ?>" method="POST" class="form-horizontal no-margin">
                      <input type="hidden"  name="id" value="<?php echo set_value('id',(isset($site_details->id) ? $site_details->id : '')); ?>"/>
                      <div class="control-group">
                        <label class="control-label" for="name">
                          Name
                        </label>
                        <div class="controls">
                          <input type="text" name="name" id="name" value="<?php echo set_value('name',(isset($site_details->name) ? $site_details->name : '')); ?>" class="span6" placeholder="Enter name"  required/>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="location">
                          Location
                        </label>
                        <div class="controls">
                          <input type="text" name="location" id="location" value="<?php echo set_value('location',(isset($site_details->location) ? $site_details->location : '')); ?>" class="span6" placeholder="Enter location"  required/>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="address">
                          Address
                        </label>
                        <div class="controls">
                          <textarea rows="3" name="address" id="address" class="span6" placeholder="Enter Address ..." required><?php echo set_value('address',(isset($site_details->address) ? $site_details->address : '')); ?></textarea>                          
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="details">
                          Details
                        </label>
                        <div class="controls">
                          <textarea rows="3" name="details" id="details" class="span6" placeholder="Enter Details ..." required><?php echo set_value('details',(isset($site_details->details) ? $site_details->details : '')); ?></textarea>                          
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="role">
                          Site Admin
                        </label>
                        <div class="controls">
                          <select  name="site_admin" id="site_admin" class="span6" required>
                            <option value="">
                              Select Site Admin
                            </option>
                            <?php foreach ($site_admins as $site_admin) { ?>
                              <option value="<?php echo $site_admin->id; ?>" <?php echo (set_value('site_admin',(isset($site_details->site_admin) ? $site_details->site_admin : '')) == $site_admin->id ? 'selected' : ''); ?> >
                                <?php echo $site_admin->first_name.' '.$site_admin->last_name; ?>
                              </option>
                            <?php }?>
                          </select>
                        </div>
                      </div>
                      <!--<div class="control-group">
                        <label class="control-label" for="contractors">
                          Contractors
                        </label>
                        <div class="controls">
                          <select  name="contractors[]" id="multi_selector">
                            <?php //foreach ($contractors as $contractor) { ?>
                              <option value="<?php //echo $contractor->id; ?>" <?php //echo (set_value('contractors[]') ? 'selected' : ''); ?> >
                                <?php //echo $contractor->first_name.' '.$site_admin->last_name; ?>
                              </option>
                            <?php //}?>
                          </select>
                        </div>
                      </div>-->
                      <div class="control-group">
                        <label class="control-label" for="contractors">
                          Contractors
                        </label>
                        <div class="controls span6" style="height :115px; overflow : auto;">
                          <?php foreach ($contractors as $contractor) { ?>
                          <label class="checkbox">
                            <input type="checkbox" name="contractors[]" id="contractors" value="<?php echo $contractor->id; ?>" <?php echo set_checkbox('contractors[]', $contractor->id); if(isset($site_contractors)){ echo (in_array($contractor->id, $site_contractors) ? 'checked' : ''); } ?> >
                            <?php echo $contractor->first_name.' '.$site_admin->last_name; ?>
                          </label>
                          <?php }?>
                        </div>
                      </div>
                      <div class="form-actions no-margin">
                        <button type="submit" name="update_site" value="update_site" class="btn btn-info pull-right">
                          Update Site
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