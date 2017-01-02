<div class="left-sidebar">            
            <div class="row-fluid">              
              <div class="span12">
                <div class="widget">
                  <div class="widget-header">
                    <div class="title">
                     Payment Receipt For <?php echo ( $member_transaction_details['member_name'] ? $member_transaction_details['member_name'] : ''); ?>
                    </div>
                    <span class="tools">
                      <button id="print" class="btn btn-info">
                      <i class="fa fa-print fa-lg"></i>
                      <span class="label label label-info">Print</span>
                    </button>
                    </span>
                  </div>
                  <div class="widget-body">   
                    <div class="container-fluid" >
                    <div class="invoice" id="invoice" style="background-color:#FFF">
                      <div class="invoice-head" style="height:80px;">
                        <img src="<?php echo site_url();?>assets/img/logo.jpg" alt="logo" style="height:70px;float:left;" class="logo">
                        <div class="invoice-info" >
                          <span style="font-size:22px;float:left;color:rgba(239, 144, 52, 1);" > 
                            Hectare Square <span style="float: none;">Properties / Marketing</span>
                          </span>
                          <br>
                          <span style="font-size:12px;float:left;color:rgba(0, 111, 68, 1);" >
                            C-37 KPCT Mall, Fatima Nagar Near Vishal Megamart, Pune
                          </span>
                          <br>
                          <span style="font-size:12px;float:left;color:rgba(0, 111, 68, 1);" >
                            Contact : +91 8796006222
                          </span>
                        </div>                        
                      </div>
                      <div class="invoice-data-container">
                          <span style="float:right;">
                            Invoice Id <?php echo ( $member_transaction_details['invoice_id'] ? $member_transaction_details['invoice_id'] : ''); ?>
                          </span>
                          <br>
                          <span style="float:right;">
                            Invoice Date <?php echo ( $member_transaction_details['invoice_date'] ? $member_transaction_details['invoice_date'] : ''); ?>
                          </span>
                          <h6>
                            <?php echo ( $member_transaction_details['member_name'] ? $member_transaction_details['member_name'] : ''); ?>
                          </h6>
                          <span>
                            Address,
                          </span>
                          <br>
                          <span>
                            <?php echo ( $member_transaction_details['member_address'] ? $member_transaction_details['member_address'] : ''); ?>,
                          </span>
                          <br>
                          <span>
                            Email : <?php echo ( $member_transaction_details['member_email'] ? $member_transaction_details['member_email'] : ''); ?>,
                          </span>
                          <br>
                          <span>
                            Mobile Number : <?php echo ( $member_transaction_details['member_mobile'] ? $member_transaction_details['member_mobile'] : ''); ?>,
                          </span>
                          <br>
                          <span>
                            Payment due <?php echo ( $member_transaction_details['transaction_date'] ? $member_transaction_details['transaction_date'] : ''); ?>
                          </span>
                      </div>
                      <table class="table table-condensed table-striped table-bordered table-hover no-margin">
                        <thead>
                          <tr>
                            <th style="width:10%">
                              TRANSACTION ID
                            </th>
                            <th style="width:20%">
                              TRANSACTION DATE
                            </th>
                            <th style="width:20%" >
                              PAY TYPE
                            </th>                            
                            <th style="width:10%" >
                              AMMOUNT
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <?php echo ( $member_transaction_details['transaction_id'] ? $member_transaction_details['transaction_id'] : ''); ?>
                            </td>
                            <td>
                              <?php echo ( $member_transaction_details['transaction_date'] ? $member_transaction_details['transaction_date'] : ''); ?>
                            </td>
                            <td >
                              <?php echo ( $member_transaction_details['pay_type']=="level_pay " ? 'Level Pay' : 'Direct Pay'); ?>
                            </td>
                            <td>
                              <i class="fa fa-rupee fa=lg"></i>&nbsp;<?php echo ( $member_transaction_details['ammount'] ? $member_transaction_details['ammount'] : ''); ?>
                            </td>
                          </tr>
                          <tr class="success">
                            <td class="total" colspan="3">
                              <b>TOTAL</b>
                            </td>
                            <td >
                              <i class="fa fa-rupee fa=lg"></i>&nbsp;<?php echo ( $member_transaction_details['ammount'] ? $member_transaction_details['ammount'] : ''); ?>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>                    
                    </div>               
                    <br>
                  </div>
                </div>
              </div>
              
            </div>
            
          </div>