<div class="left-sidebar">           
            
            <div class="row-fluid">
              <div class="span12">
                <div class="widget">
                  <div class="widget-header">
                    <div class="title">
                      Statistics
                    </div>
                    <span class="tools">
                      <i class="fa fa-tachometer fa-lg fa-2x"></i>
                    </span>
                  </div>
                  <div class="widget-body">
                    <div class="row-fluid">
                      <div class="metro-nav">
                        <div class="metro-nav-block nav-block-blue double">
                          <a href="#">
                              <i class="fa fa-calculator fa-2x"></i>
                              <div class="info"><i class="fa fa-rupee "></i> &nbsp;<?php echo (isset($member_transactions_ammount) ? $member_transactions_ammount : 0 ); ?></div>
                            <div class="brand">Total Number of Transactions &nbsp;<b><?php echo (isset($all_member_transactions) ? $all_member_transactions : 0 ); ?></b></div>
                          </a>
                        </div>
                        <div class="metro-nav-block nav-block-green double">
                          <a href="#">
                              <i class="fa fa-calculator fa-2x "></i>
                              <div class="info"><i class="fa fa-rupee "></i>&nbsp;<?php echo (isset($member_invoices_ammount) ? $member_invoices_ammount : 0 ); ?></div>
                            <div class="brand">Total Generated Invoices &nbsp;<b><?php echo (isset($all_member_invoices) ? $all_member_invoices : 0 ); ?></b></div>
                          </a>
                        </div>
                        <div class="metro-nav-block nav-block-yellow double">
                          <a href="#">
                              <i class="fa fa-calculator fa-2x"></i>
                              <div class="info"><i class="fa fa-rupee "></i> &nbsp;<?php echo (isset($member_transactions_ammount) && !empty($all_invoices_ammount) ? $member_transactions_ammount-$member_invoices_ammount : 0 ); ?></div>
                            <div class="brand">Total Number of Remainig Invoices &nbsp;<b><?php echo (isset($all_member_transactions) && isset($all_member_invoices) ? $all_member_transactions-$all_member_transactions : 0 ); ?></b></div>
                          </a>
                        </div> 
                        <div class="metro-nav-block nav-block-green">
                          <a href="#">
                              <i class="fa fa-cubes fa-2x"></i>
                              <div class="info">&nbsp;<?php echo (isset($project_name) ? $project_name : '' ); ?></div>
                            <div class="brand">Project Name</div>
                          </a>
                        </div>                       
                      </div>                      
                    </div>
                  </div>
                </div>
                <div class="widget">
                  <div class="widget-header">
                    <div class="title">
                      All Transaction Details For <?php echo ($member_name ? $member_name : ''); ?>
                    </div>
                    <span class="tools">
                      <i class="fa fa-calculator fa-lg fa-2x"></i>
                    </span>
                  </div>
                  <div class="widget-body">
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
                                PAY TYPE
                              </th>
                              <th >
                                AMMOUNT (<i class="fa fa-rupee"></i>)
                              </th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php if(isset($member_transactions_details)){ ?>
                          <?php
                          $i=1;
                           foreach ($member_transactions_details as $member_transactions_detail) { 
                            $date=explode('-', $member_transactions_detail->created)?>
                            <tr>
                              <td >
                                <?php echo "#".$date[0].$date[1].$member_transactions_detail->id; ?>
                              </td>
                              <td>
                                <?php echo $member_transactions_detail->created; ?>
                              </td>
                              <td >
                                <?php echo ($member_transactions_detail->pay_type=="level_pay" ? 'Level Pay' : 'Direct Pay'); ?>
                              </td>
                              <td >
                                <?php echo $member_transactions_detail->ammount; ?>
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
                <div class="widget">
                  <div class="widget-header">
                    <div class="title">
                      All Invoices Details For <?php echo ($member_name ? $member_name : ''); ?>
                    </div>
                    <span class="tools">
                      <i class="fa fa-calculator fa-lg fa-2x"></i>
                    </span>
                  </div>
                  <div class="widget-body">
                    <div class="row-fluid">
                    <div class="span12">
                      <div id="dt_example" class="example_alt_pagination">
                        <table class="table table-condensed table-striped table-hover table-bordered pull-left" id="data-table1">
                           <thead>
                            <tr>
                              <th class="hidden-phone">
                                INVOICE ID
                              </th>
                              <th >
                                INVOICE DATE
                              </th>
                              <th >
                                PAY TYPE
                              </th>
                              <th >
                                AMMOUNT (<i class="fa fa-rupee"></i>)
                              </th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php if(isset($member_invoices_details)){ ?>
                          <?php
                          $i=1;
                           foreach ($member_invoices_details as $member_invoices_detail) { 
                            $date=explode('-', $member_invoices_detail->created)?>
                            <tr>
                              <td >
                                <?php echo "#".$date[0].$date[1].$member_invoices_detail->id; ?>
                              </td>
                              <td>
                                <?php echo $member_invoices_detail->created; ?>
                              </td>
                              <td >
                                <?php echo ($member_invoices_detail->pay_type=="level_pay" ? 'Level Pay' : 'Direct Pay'); ?>
                              </td>
                              <td >
                                <?php echo $member_invoices_detail->ammount; ?>
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
            </div>
            
          </div>