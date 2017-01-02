
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
                      Show Users
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
                              ID
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
                        <?php if(isset($users)){ ?>
                        <?php foreach ($users as $user) { ?>
                          <tr>
                            <td class="hidden-phone">
                              <?php echo $user->id; ?>
                            </td>
                            <td>
                              <?php echo $user->first_name." ".$user->last_name; ?>
                            </td>
                            <td class="hidden-phone">
                              <?php echo $user->email; ?>
                            </td>
                            <td class="hidden-phone">
                              <?php echo $user->mobile; ?>
                            </td>
                            <td >
                              <?php echo $roles[$user->role]; ?>
                            </td>
                            <td class="hidden-phone"> 
                              <?php echo $user->gender; ?>
                            </td>
                            <td>
                              <?php if($user->status == "Activated"){ ?>
                                <a href="#" onclick="user_confirm(this)" id="<?php echo $user->id; ?>" class="btn btn-success" title="<?php echo $user->status; ?>">
                                  <i class="fa fa-thumbs-o-up"></i>                                </a>
                              <?php } 
                                if($user->status == "Deactivated"){ ?>
                                  <a href="#" class="btn btn-warning" onclick="user_confirm(this)" id="<?php echo $user->id; ?>" title="<?php echo $user->status; ?>">
                                    <i class="fa fa-thumbs-o-down"></i>
                                  </a>
                              <?php } ?>
                              <a href="<?php echo site_url('users/edit_user/'.$user->id); ?>" class="btn btn-info" title="Edit">
                                <i class="fa fa-pencil-square-o"></i>
                              </a>
                            </td>
                          </tr>  
                        <?php } ?>
                        <?php }else{
                            echo '<tr><td colspan="7"> No Users found</td></tr>';
                          } ?>                          
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