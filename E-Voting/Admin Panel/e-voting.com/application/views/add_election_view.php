
   


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
                      Create Election  
                      <span class="mini-title">
                        Form for new election
                      </span>
                    </div>
                    <span class="tools">
                      <i class="fa fa-cubes fa-lg fa-2x"></i>
                    </span>
                  </div>
                  <div class="widget-body">
                    
                    <form action="<?php echo site_url('elections/add_election'); ?>" method="POST" class="form-horizontal no-margin">
                      <div class="control-group">
                        <label class="control-label" for="name">
                         Election Name
                        </label>
                        <div class="controls controls-row">
                          <input type="text" name="name" id="name" value="<?php echo set_value('name'); ?>" class="span6" placeholder="Enter Election Name"  required/>
                        </div>
                      </div>

                     

               
                
                  <div class="control-group">
                    <label class="control-label" for="date">
                       Election Date
                      </label>
                    <div class="controls">
                     <div class="input-prepend input-group">
                       <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span><input type="text" style="width: 200px" name="date" id="date" class="form-control" value="<?php echo set_value('date'); ?>" placeholder="03/18/2013" /> 
                     </div>
                    </div>
                  </div>
                
               <!--
                      <div class="control-group">
                      <label class="control-label" for="date">
                       Election Date
                      </label>
                        <div class="controls controls-row">
                          <div class="input-prepend input-group">
                       <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span><input type="text" style="width: 200px" name="date" id="date" class="form-control" value="03/18/2013" /> 
                     </div>
                        </div>
                      </div>

                 -->     
                      <div class="control-group">
                        <label class="control-label" for="name">
                         Election Ward
                        </label>
                        <div class="controls controls-row">
                          <input type="text" name="ward" id="ward" value="<?php echo set_value('ward'); ?>" class="span6" placeholder="Enter Election Ward"  required/>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="description">
                          Election Description
                        </label>
                        <div class="controls">
                          <textarea rows="3" name="description" id="description" class="span6" placeholder="Election Description ..." required><?php echo set_value('description'); ?></textarea>                          
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
                        <button type="submit" name="add_election" value="add_election" class="btn btn-info pull-right">
                          Create Election
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