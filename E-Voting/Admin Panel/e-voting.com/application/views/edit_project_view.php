
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
                      Edit Project
                      <span class="mini-title">
                        Form for edit project
                      </span>
                    </div>
                    <span class="tools">
                      <i class="fa fa-cubes fa-lg fa-2x"></i>
                    </span>
                  </div>
                  <div class="widget-body">
                    
                    <form action="<?php echo site_url('projects/update_project'); ?>" method="POST" class="form-horizontal no-margin">
                      <input type="hidden"  name="id" value="<?php echo set_value('id',(isset($project_details->id) ? $project_details->id : '')); ?>"/>
                      <div class="control-group">
                        <label class="control-label" for="name">
                          Name
                        </label>
                        <div class="controls controls-row">
                          <input type="text" name="name" id="name" value="<?php echo set_value('name',(isset($project_details->name) ? $project_details->name : '')); ?>" class="span6" placeholder="Enter Project Name"  required/>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="description">
                          Project Description
                        </label>
                        <div class="controls">
                          <textarea rows="3" name="description" id="description" class="span6" placeholder="Project Description ..." required><?php echo set_value('description',(isset($project_details->description) ? $project_details->description : '')); ?></textarea>                          
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
                              <option value="<?php //echo $key; ?>" <?php //echo (set_value('role',(isset($project_details->role) ? $project_details->role : '')) == $key ? 'selected' : ''); ?> >
                                <?php //echo $value; ?>
                              </option>
                            <?php //}?>
                          </select>
                        </div>
                      </div>-->
                      <div class="form-actions no-margin">
                        <button type="submit" name="update_project" value="update_project" class="btn btn-info pull-right">
                          Update Project
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