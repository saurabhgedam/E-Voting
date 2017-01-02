<div class="left-sidebar">            
            <div class="row-fluid">              
              <div class="span12">
                <div class="widget">
                  <div class="widget-header">
                    <div class="title">
                      Transactions Details For : <?php echo (!empty($member_details) ? $member_details['member_name'] : ''); ?>
                      &nbsp;
                    </div>                    
                    <span class="tools">
                      <i class="fa fa-search fa-lg fa-2x"></i>
                    </span><!--
                    <form action="<?php //echo site_url('reports/print_member_all_payment_receipt'); ?>" method="POST" class="navbar-form">
                      <input type="hidden" name="member_id" value="<?php //echo $member_details['member_id']; ?>">
                      <button type="submit" name="show_reports" value="show_reports" class="btn btn-warning btn-mini">
                        <span class="label label label-warning">Print All Transactions</span>
                      </button>
                    </form>-->
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
                                TRANS ID
                              </th>
                              <th >
                                TRANS DATE
                              </th>
                              <th >
                                MEMBER NAME
                              </th>
                              <th >
                                PROJECT NAME
                              </th>
                              <th >
                                PAY TYPE
                              </th>
                              <th >
                                AMMOUNT (<i class="fa fa-rupee"></i>)
                              </th>
                              <th>
                                PRINT
                              </th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php if(isset($all_transactions_details)){ ?>
                          <?php
                          $i=1;
                           foreach ($all_transactions_details as $all_transactions_detail) { 
                            $date=explode('-', $all_transactions_detail->created)?>
                            <tr>
                              <td >
                                <?php echo "#".$date[0].$date[1].$all_transactions_detail->id; ?>
                              </td>
                              <td>
                                <?php echo $all_transactions_detail->created; ?>
                              </td>
                              <td>
                                <?php echo (!empty($member_details) ? $member_details['member_name'] : ''); ?>
                              </td>
                              <td >
                                <?php echo (!empty($member_details) ? $member_details['project_name'] : ''); ?>
                              </td>
                              <td >
                                <?php echo ($all_transactions_detail->pay_type=="level_pay" ? 'Level Pay' : 'Direct Pay'); ?>
                              </td>
                              <td >
                                <?php echo $all_transactions_detail->ammount; ?>
                              </td>
                              <td width="5%">
                              <?php 
                              $created_date=$all_transactions_detail->created;
                              $current_date=date("Y-m-d h:i:s");
                              $datetime1 = new DateTime($created_date);
                              $datetime2 = new DateTime($current_date);
                              $interval = $datetime1->diff($datetime2);
                              $time_remaining = $interval->format('%a days %h : %i : %S remaining');
                              $days = 10-$interval->format('%a');
                              $hours = 24-$interval->format('%h');
                              $minute = 60-$interval->format('%i');
                              $seconds = 60-$interval->format('%S');
                              if($days < 1){ ?>                                
                                <form action="<?php echo ( $all_transactions_detail->print==1 ? site_url('reports/reprint_member_transaction_payment_receipt') : site_url('reports/print_member_transaction_payment_receipt')); ?>" method="POST" class="navbar-form">
                                  <input type="hidden" name="transaction_id" value="<?php echo $all_transactions_detail->id; ?>">
                                  <button type="submit" name="show_reports" value="show_reports" class="btn btn-<?php echo ( $all_transactions_detail->print==1 ? 'warning' : 'success'); ?> btn-mini">
                                    <?php echo ($all_transactions_detail->print==1 ? '<span class="label label label-warning">Re-print</span>' : '<span class="label label label-success">Print</span>'); ?>

                                  </button>
                                </form>
                                <?php }
                                else{ ?>
                                    <div class="progress progress-success progress-striped active " style="width:140px;margin-bottom: 5px;">
                                      <div class="bar" style="width: <?php echo $interval->format('%a'); ?>0%">
                                      </div>
                                    </div>
                                  <span class="label label label-warning"><?php echo ( $days==1 ? $hours." : ".$minute." : ".$seconds." hours remaining" : $days." days remaining" ); ?></span>
                                <?php  } ?>
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