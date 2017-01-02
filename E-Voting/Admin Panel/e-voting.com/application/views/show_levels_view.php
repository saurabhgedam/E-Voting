
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
            <?php if($this->session->flashdata('success_message')){ ?>
            <div class="alert alert-block alert-success fade in">
              <button data-dismiss="alert" class="close" type="button">
                ×
              </button>
              <h4 class="alert-heading">
                Success!
              </h4>
              <p>
                <?php echo $this->session->flashdata('success_message'); ?>
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
            <!-- Modal -->
              <div id="edit_level" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="edit_level" aria-hidden="true">
                <form action="<?php echo site_url('levels/update_level'); ?>" method="POST" onSubmit="return valid_edit_level();" class="form-horizontal no-margin">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                      ×
                    </button>
                    <h3 id="myModalLabel">
                      Edit Level
                    </h3>
                  </div>
                  <div class="modal-body">   
                    <input type="hidden" name="id" id="id" value=""/>                 
                    <div class="control-group">
                      <label class="control-label" for="level_number">
                       Level Number
                      </label>
                      <div class="controls">
                        <input type="text" id="level_number" value="" class="span3" placeholder="Enter Level Pay" disabled="" required/>
                      </div>
                    </div>
                    <div class="control-group">
                      <label class="control-label" for="level_pay">
                        Level Pay
                      </label>
                      <div class="controls">
                        <input type="text" name="level_pay" id="level_pay" value="" class="span3" placeholder="Enter Level Pay"  required/>
                      </div>
                    </div><!--
                    <div class="control-group">
                      <label class="control-label" for="fix_pay">
                        Fix Pay
                      </label>
                      <div class="controls">
                        <input type="text" name="fix_pay" id="fix_pay" value="" class="span3" placeholder="Enter Fix Pay"  required/>
                      </div>
                    </div> -->         
                  </div>
                  <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">
                      Close
                    </button>
                    <button type="submit" name="update_level" value="update_level" class="btn btn-primary">
                      Save changes
                    </button>
                  </div>
                </form>
              </div>  
              <div id="edit_direct_pay" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="edit_max_levels" aria-hidden="true">
                <form action="<?php echo site_url('levels/update_direct_pay'); ?>" method="POST" onSubmit="return valid_edit_direct_pay();" class="form-horizontal no-margin">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                      ×
                    </button>
                    <h3 id="myModalLabel">
                      Edit Direct Pay
                    </h3>
                  </div>
                  <div class="modal-body">                   
                    <div class="control-group">
                      <label class="control-label" for="direct_pay">
                       Direct Pay
                      </label>
                      <div class="controls">
                        <input type="text" id="direct_pay" name="direct_pay" value="<?php echo (isset($direct_pay) ? $direct_pay : 0) ;?>" class="span3" placeholder="Enter Direct Pay" required/>
                      </div>
                    </div>          
                  </div>
                  <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">
                      Close
                    </button>
                    <button type="submit" name="update_direct_pay" value="update_direct_pay" class="btn btn-primary">
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
                      Show Levels
                    </div>
                    <span class="tools">
                      <i class="fa fa-signal fa-lg fa-2x"></i>
                    </span>
                    <center>
                      <span class="hidden-phone">
                        Direct Pay:
                      </span>
                      <span class="input-append">                      
                        <input class="span1 hidden-phone" id="direct_pay" value="<?php echo (isset($direct_pay) ? $direct_pay : 0) ;?>" disabled="" type="text">
                        <a href="#edit_direct_pay" class="btn btn-info" role="button" data-toggle="modal">
                            <i class="fa fa-pencil fa-lg"></i>
                        </a>
                      </span>
                    </center>
                  </div>
                  <div class="widget-body">
                    <div id="dt_example" class="example_alt_pagination">
                      <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">
                        
                        <thead>
                          <tr>
                            <th class="hidden-phone">
                              SR.NO.
                            </th>
                            <th >
                              LEVEL NUMBER
                            </th>
                            <th >
                              LEVEL PAY
                            </th><!--
                            <th >
                              FIX PAY
                            </th>-->
                            <th>
                              ACTION
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php if(isset($levels)){ 
                          $i=1; ?>
                        <?php foreach ($levels as $level) { ?>
                          <tr>
                            <td class="hidden-phone">
                              <?php echo $i++; ?>
                            </td>
                            <td>
                              <?php echo $level->level_number; ?>
                            </td>
                            <td>
                              <?php echo $level->level_pay; ?>
                            </td><!--
                            <td >
                              <?php //echo $level->fix_pay; ?>
                            </td>-->
                            <td>    
                                <a href="#edit_level" class="btn btn-info" onclick="edit_level(this);" role="button" data-toggle="modal" id="<?php echo $level->id; ?>">
                                  <i class="fa fa-pencil-square-o"></i>
                                </a>
                            </td>
                          </tr>  
                        <?php } ?>
                        <?php }?>                          
                        </tbody>
                      </table>
                      <div class="clearfix">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
          </div>