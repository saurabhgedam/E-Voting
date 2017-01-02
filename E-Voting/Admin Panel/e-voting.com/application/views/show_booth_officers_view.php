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
                      Show Booth Officers
                    </div>
                    <span class="tools">
                      <i class="fa fa-users fa-lg fa-2x"></i>
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
                            </th>
                            <th>
                              ACTION
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php if(isset($booth_officers)){ 
                          $i=1; ?>
                        <?php foreach ($booth_officers as $booth_officer) { ?>
                          <tr>
                            <td class="hidden-phone">
                              <?php echo $i++; ?>
                            </td>
                            <td>
                              <?php echo $booth_officer->first_name." ".$booth_officer->last_name; ?>
                            </td>
                            <td class="hidden-phone">
                              <?php echo $booth_officer->email; ?>
                            </td>
                            <td class="hidden-phone">
                              <?php echo $booth_officer->mobile; ?>
                            </td>
                            <td >
                              <?php echo $booth_officer->role; ?>
                            </td>
                            <td class="hidden-phone"> 
                              <?php echo $booth_officer->gender; ?>
                            </td>
                            <td>
                              <?php if($booth_officer->status == "Activated"){ ?>
                                <a href="#" onclick="booth_officer_confirm(this)" id="<?php echo $booth_officer->id; ?>" class="btn btn-success" title="<?php echo $booth_officer->status; ?>">
                                  <i class="fa fa-thumbs-o-up"></i>                                </a>
                              <?php } 
                                if($booth_officer->status == "Deactivated"){ ?>
                                  <a href="#" class="btn btn-warning" onclick="booth_officer_confirm(this)" id="<?php echo $booth_officer->id; ?>" title="<?php echo $booth_officer->status; ?>">
                                    <i class="fa fa-thumbs-o-down"></i>
                                  </a>
                              <?php } ?>
                              <a href="<?php echo site_url('booth_officers/edit_booth_officer/'.$booth_officer->id); ?>" class="btn btn-info" title="Edit">
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