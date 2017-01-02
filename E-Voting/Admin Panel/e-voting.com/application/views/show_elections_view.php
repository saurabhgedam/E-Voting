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
            <div class="row-fluid">
              <div class="span12">
                <div class="widget">
                  <div class="widget-header">
                    <div class="title">
                      Show Elections
                    </div>
                    <span class="tools">
                      <i class="fa fa-cubes fa-lg fa-2x"></i>
                    </span>
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
                              NAME
                            </th>
                            <th >
                              DATE
                            </th>
                            <th >
                              WARD
                            </th>
                            <th>
                              DESCRIPTION
                            </th><!--
                            <th class="hidden-phone">
                              EMAIL
                            </th>
                            <th class="hidden-phone">
                              MOBILE
                            </th>
                            <th>
                              ROLE
                            </th>
                            <th class="hidden-phone">
                              GENDER
                            </th>-->
                            <th>
                              ACTION
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php if(isset($elections)){ 
                          $i=1; ?>
                        <?php foreach ($elections as $election) { ?>
                          <tr>
                            <td class="hidden-phone">
                              <?php echo $i++; ?>
                            </td>
                            <td>
                              <?php echo $election->name; ?>
                            </td>
                            <td >
                              <?php echo $election->from ; ?>
                            </td>
                            <td >
                              <?php echo $election->ward; ?>
                            </td>
                            <td >
                              <?php echo $election->description; ?>
                            </td><!--
                            <td class="hidden-phone"> 
                              <?php //echo $election->gender; ?>
                            </td>-->
                            <td>
                              <?php if($election->status == "Activated"){ ?>
                                <a href="#" onclick="election_confirm(this)" id="<?php echo $election->id; ?>" class="btn btn-success" title="<?php echo $election->status; ?>">
                                  <i class="fa fa-thumbs-o-up"></i>                                </a>
                              <?php } 
                                if($election->status == "Deactivated"){ ?>
                                  <a href="#" class="btn btn-warning" onclick="election_confirm(this)" id="<?php echo $election->id; ?>" title="<?php echo $election->status; ?>">
                                    <i class="fa fa-thumbs-o-down"></i>
                                  </a>
                              <?php } ?>
                              <a href="<?php echo site_url('elections/edit_election/'.$election->id); ?>" class="btn btn-info" title="Edit">
                                <i class="fa fa-pencil-square-o"></i>
                              </a>
                            </td>
                          </tr>  
                        <?php } ?>
                        <?php } ?>                          
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