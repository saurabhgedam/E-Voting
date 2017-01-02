
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
            <div id="edit_max_levels" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="edit_max_levels" aria-hidden="true">
                <form action="<?php echo site_url('levels/update_max_levels'); ?>" method="POST" onSubmit="return valid_edit_max_levels();" class="form-horizontal no-margin">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                      ×
                    </button>
                    <h3 id="myModalLabel">
                      Edit Maximum Levels
                    </h3>
                  </div>
                  <div class="modal-body">                   
                    <div class="control-group">
                      <label class="control-label" for="max_levels">
                       Maximun Levels
                      </label>
                      <div class="controls">
                        <input type="text" id="max_levels" name="max_levels" value="<?php echo (isset($max_levels) ? $max_levels : 0) ;?>" class="span3" placeholder="Enter Maximum Levels" required/>
                      </div>
                    </div>          
                  </div>
                  <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">
                      Close
                    </button>
                    <button type="submit" name="update_max_levels" value="update_max_levels" class="btn btn-primary">
                      Save changes
                    </button>
                  </div>
                </form>
              </div>
            <div class="row-fluid">
              <div class="span12">
                <div class="widget">
                  <div class="widget-header">
                    
                    <div class="title">
                      Create New Level
                      <span class="mini-title">
                        Form for Level
                      </span>
                    </div>                    
                    <span class="tools">                      
                      <i class="fa fa-signal fa-lg fa-2x"></i>
                    </span>
                    <center>
                      <span class="hidden-phone">
                        Maximum Levels:
                      </span>
                      <span class="input-append">                      
                        <input class="span1 hidden-phone" id="max_levels" value="<?php echo (isset($max_levels) ? $max_levels : 0) ;?>" disabled="" type="text">
                        <a href="#edit_max_levels" class="btn btn-info" role="button" data-toggle="modal">
                            <i class="fa fa-pencil fa-lg"></i>
                        </a>
                      </span>
                    </center>
                  </div>                  
                  <div class="widget-body">
                    
                    <form action="<?php echo site_url('levels/add_level'); ?>" method="POST" class="form-horizontal no-margin">
                      <div class="control-group">
                        <label class="control-label" for="level_number">
                         Level Number
                        </label>
                        <div class="controls">
                          <input type="text" name="level_number" id="level_number" value="<?php echo set_value('level_number',(isset($last_level) ? $last_level+1 : 1)); ?>" class="span6" placeholder="Enter Level Number" readonly required/>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="level_pay">
                          Level Pay
                        </label>
                        <div class="controls">
                          <input type="text" name="level_pay" id="level_pay" value="<?php echo set_value('level_pay'); ?>" class="span6" placeholder="Enter Level Pay"  required/>
                        </div>
                      </div><!--
                      <div class="control-group">
                        <label class="control-label" for="fix_pay">
                          Fix Pay
                        </label>
                        <div class="controls">
                          <input type="text" name="fix_pay" id="fix_pay" value="<?php echo set_value('fix_pay'); ?>" class="span6" placeholder="Enter Fix Pay"  required/>
                        </div>
                      </div>-->
                      <?php if ($last_level < $max_levels){?> 
                      <div class="form-actions no-margin">
                        <button type="submit" name="add_level" value="add_level" class="btn btn-info pull-right">
                          Create Level
                        </button>
                        <div class="clearfix">
                        </div>
                      </div>
                      <?php }else{ ?>
                      <div class="alert alert-block alert-danger fade in">
                        <button data-dismiss="alert" class="close" type="button">
                          ×
                        </button>
                        <h4 class="alert-heading">
                          Error!
                        </h4>
                        <p>
                          Level number exceeds to maximum levels
                        </p>
                      </div>
                      <?php  } ?>
                    </form>
                    
                  </div>
                </div>
              </div>
              
            </div>
          </div>