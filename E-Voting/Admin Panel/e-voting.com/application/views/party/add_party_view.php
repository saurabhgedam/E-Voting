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
                      Create Party Account 
                      <span class="mini-title">
                        Form for new party
                      </span>
                    </div>
                    <span class="tools">
                      <i class="fa fa-user fa-lg fa-2x"></i>
                    </span>
                  </div>
                  <div class="widget-body">
                    
                    <form action="<?php echo site_url('party/add_party'); ?>" method="POST" enctype="multipart/form-data" class="form-horizontal no-margin">
                  
                      <h5>
                        Party Information
                      </h5>
                      <hr>
                      <div class="control-group">
                        <label class="control-label" for="party">
                          Party Name
                        </label>
                        <div class="controls">
                          <input type="text" name="partyname" id="party" value="<?php echo set_value('partyname'); ?>" class="span6" placeholder="Enter Party Name"  required/>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="party_logo">
                          Upload Party Logo
                        </label>
                        <div class="controls">
                          <input type="file" name="party_logo" id="party_logo" value="" class="span6" required/>
                        </div>
                      </div>
                      <div class="form-actions no-margin">
                        <button type="submit" name="add_party" value="add_party" class="btn btn-info pull-right">
                          Create Party
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