<div class="left-sidebar">            
            <div class="row-fluid">              
              <div class="span12">
                <div class="widget">
                  <div class="widget-header">
                    <div class="title">
                      <form action="<?php echo site_url('reports/show_project_wise_reports'); ?>" method="POST" class="navbar-form">
                        <select  name="project_id" id="project_id" class="chosen-select" required>
                          <option value="">
                            Select Project
                          </option>
                          <?php foreach ($projects as $project) { ?>
                            <option value="<?php echo $project->id; ?>" <?php //echo (set_value('project') == $project->id ? 'selected' : ''); ?> >
                              <?php echo $project->name; ?>
                            </option>
                          <?php }?>
                        </select>
                        <button type="submit" name="show_reports" value="show_reports" class="btn btn-info ">
                          Submit
                        </button>                                                 
                      </form>
                    </div>
                    <span class="tools">
                      <i class="fa fa-search fa-lg fa-2x"></i>
                    </span>
                  </div>
                  <div class="widget-body">     
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
                        <div id="dt_example" class="example_alt_pagination">
                          <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table">
                             <thead>
                              <tr>
                                <th class="hidden-phone">
                                  SR.NO.
                                </th>
                                <th class="hidden-phone">
                                  PROJECT NAME
                                </th>
                                <th >
                                  MEMBER NAME
                                </th>
                                <th class="hidden-phone">
                                  LEVEL PAY
                                </th>
                                <th class="hidden-phone">
                                  FIX PAY
                                </th>
                                <th >
                                  TOTAL PAY
                                </th>
                                <th>
                                  DETAILS
                                </th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php if(isset($project_reports)){ ?>
                            <?php
                            $i=1;
                             foreach ($project_reports as $project_report) { ?>
                              <tr>
                                <td class="hidden-phone">
                                  <?php echo $i++; ?>
                                </td>
                                <td class="hidden-phone">
                                  <?php echo $project_report['project_name']; ?>
                                </td>
                                <td >
                                  <?php echo $project_report['member_name']; ?>
                                </td>
                                <td class="hidden-phone">
                                  <?php echo $project_report['level_pay']; ?>
                                </td>
                                <td class="hidden-phone">
                                  <?php echo $project_report['direct_pay']; ?>
                                </td>
                                <td >
                                  <?php echo $project_report['total_pay']; ?>
                                </td>
                                <td>    
                                   <form action="<?php echo site_url('reports/member_all_transactions_details'); ?>" method="POST" class="navbar-form">
                                    <input type="hidden" name="member_id" value="<?php echo $project_report['member_id']; ?>">
                                    <button type="submit" name="show_reports" value="show_reports" class="btn btn-info btn-mini">
                                      <span class="label label label-info">Show Details</span>
                                    </button>
                                  </form>
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
                    <br>
                  </div>
                </div>
              </div>
              
            </div>
            
          </div>