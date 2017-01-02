<link rel="stylesheet" type="text/css" media="all" href="<?php echo site_url(); ?>assets/election/css/daterangepicker-bs3.css" />
    <link href="<?php echo site_url(); ?>assets/election/css/bootstrap.min.css" rel="stylesheet"> 
    <link href="<?php echo site_url(); ?>assets/icons/css/font-awesome.min.css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo site_url(); ?>assets/election/js/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="<?php echo site_url(); ?>assets/election/js/moment.js"></script>  
    <script type="text/javascript" src="<?php echo site_url(); ?>assets/election/js/daterangepicker.js"></script>
 <script type="text/javascript">
               $(document).ready(function() {
                  $('#date').daterangepicker({ singleDatePicker: true }, function(start, end, label) {
                    console.log(start.toISOString(), end.toISOString(), label);
                  });
               });
               </script>

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
                      Edit Election  
                      <span class="mini-title">
                        Form for edit election
                      </span>
                    </div>
                    <span class="tools">
                      <i class="fa fa-cubes fa-lg fa-2x"></i>
                    </span>
                  </div>
                  <div class="widget-body">
                     <form action="<?php echo site_url('elections/update_election'); ?>" method="POST" enctype="multipart/form-data" class="form-horizontal no-margin">
                       <input type="hidden"  name="id" value="<?php echo set_value('id',(isset($election_details->id) ? $election_details->id : '')); ?>"/>
                       
                      <div class="control-group">
                        <label class="control-label" for="name">
                         Election Name
                        </label>
                        <div class="controls controls-row">
                          <input type="text" name="name" id="name" value="<?php echo set_value('name',(isset($election_details->name) ? $election_details->name : '')); ?>" class="span6" placeholder="Enter Election Name"  required/>
                        </div>
                      </div>
                      

                      <div class="control-group">
                      <label class="control-label" for="date">
                       Election Date
                      </label>
                        <div class="controls controls-row">
                          <div class="input-append">
                            <input type="text" class="date_picker" name="date" id="date" placeholder="" value="<?php echo set_value('date',(isset($election_details1) ? $election_details1: '')); ?>" /><!--<?php echo set_value('from',(isset($election_details->from) ? $election_details->from : '')); ?>-->
                          </div>
                        </div>
                      </div>
                      
                      <div class="control-group">
                        <label class="control-label" for="name">
                         Election Ward
                        </label>
                        <div class="controls controls-row">
                          <input type="text" name="ward" id="ward" value="<?php echo set_value('ward',(isset($election_details->ward) ? $election_details->ward : '')); ?>" class="span6" placeholder="Enter Election Ward"  required/>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="description">
                          Election Description
                        </label>
                        <div class="controls">
                          <textarea rows="3" name="description" id="description" class="span6" placeholder="Election Description ..." required><?php echo set_value('description',(isset($election_details->description) ? $election_details->description : '')); ?></textarea>                          
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
                              <option value="<?php //echo $key; ?>" <?php //(set_value('role',$key) ? 'selected' : ''); ?> >
                                <?php //echo $value; ?>
                              </option>
                            <?php //}?>
                          </select>
                        </div>
                      </div>-->
                      <div class="form-actions no-margin">
                        <button type="submit" name="update_election" value="update_election" class="btn btn-info pull-right">
                          Edit Election
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