</div>
      </div>
      <!--/.fluid-container-->
    </div>
    <footer>
      <center>
        <p>
          &copy; <a href="http://hashtrix.in/" target="_blank"></a> <?php echo date("Y"); ?>
        </p>
      </center>  
    </footer>
    
    <script src="<?php echo site_url(); ?>assets/js/jquery.min.js">
    </script>
    <script src="<?php echo site_url(); ?>assets/js/bootstrap.js">
    </script>
    <script src="<?php echo site_url(); ?>assets/js/alertify.min.js">
    </script>
    <script src="<?php echo site_url();?>assets/js/jBox/jBox.js"></script>
    <script>
    //Alertify JS
      $ = function (id) {
        return document.getElementById(id);
      };
      <?php if($main_content == 'show_voters_view'){ ?>
      function voter_confirm(data) {
        var id=data.id;
        var value=$('#'+id).attr('title');
        if(value == "Activated"){
          var title= "deactivate";
          var title_= "Deactivated";
          var icon= '<i class="fa fa-thumbs-o-down"></i>';
          var class_ = "btn btn-warning";
        }
        else{
          var title= "activate";
          var title_= "Activated";
          var icon= '<i class="fa fa-thumbs-o-up"></i>';
          var class_ = "btn btn-success";
        }
        alertify.confirm("Do you want to "+title+" this voter", function (e) {
          if (e) {
            $.post("<?php echo site_url('voters/manage_voter'); ?>",{ voter_id: id, voter_status: value },function(data) {
              if(data == "success"){
                $('#'+id).attr('title',title_)
                $('#'+id).html(icon);
                $('#'+id).attr('class',class_);
                alertify.success("Voter successfully "+title);
                new jBox("Notice",{audio:"<?php echo site_url(); ?>assets/js/jBox/activity done successfully",volume:"100",});
              }
              else{
                alertify.error(data); 
                new jBox("Notice",{audio:"<?php echo site_url(); ?>assets/js/jBox/error has occured",volume:"100",}); 
              }
            });
          }
        });
      };  
      <? } ?>
      <?php if($main_content == 'show_booth_officers_view'){ ?>
      function booth_officer_confirm(data) {
        var id=data.id;
        var value=$('#'+id).attr('title');
        if(value == "Activated"){
          var title= "deactivate";
          var title_= "Deactivated";
          var icon= '<i class="fa fa-thumbs-o-down"></i>';
          var class_ = "btn btn-warning";
        }
        else{
          var title= "activate";
          var title_= "Activated";
          var icon= '<i class="fa fa-thumbs-o-up"></i>';
          var class_ = "btn btn-success";
        }
        alertify.confirm("Do you want to "+title+" this Booth Officer", function (e) {
          if (e) {
            $.post("<?php echo site_url('booth_officers/manage_booth_officer'); ?>",{ booth_officer_id: id, booth_officer_status: value },function(data) {
              if(data == "success"){
                $('#'+id).attr('title',title_)
                $('#'+id).html(icon);
                $('#'+id).attr('class',class_);
                alertify.success("Booth Officer successfully "+title);
                new jBox("Notice",{audio:"<?php echo site_url(); ?>assets/js/jBox/activity done successfully",volume:"100",});
              }
              else{
                alertify.error(data);
                new jBox("Notice",{audio:"<?php echo site_url(); ?>assets/js/jBox/error has occured",volume:"100",});  
              }
            });
          }
        });
      };  
      <? } ?>
      <?php if($main_content == 'show_candidates_view'){ ?>
      function candidate_confirm(data) {
        var id=data.id;
        var value=$('#'+id).attr('title');
        if(value == "Activated"){
          var title= "deactivate";
          var title_= "Deactivated";
          var icon= '<i class="fa fa-thumbs-o-down"></i>';
          var class_ = "btn btn-warning";
        }
        else{
          var title= "activate";
          var title_= "Activated";
          var icon= '<i class="fa fa-thumbs-o-up"></i>';
          var class_ = "btn btn-success";
        }
        alertify.confirm("Do you want to "+title+" this candidate", function (e) {
          if (e) {
            $.post("<?php echo site_url('candidates/manage_candidate'); ?>",{ candidate_id: id, candidate_status: value },function(data) {
              if(data == "success"){
                $('#'+id).attr('title',title_)
                $('#'+id).html(icon);
                $('#'+id).attr('class',class_);
                alertify.success("Candidate successfully "+title);
                new jBox("Notice",{audio:"<?php echo site_url(); ?>assets/js/jBox/activity done successfully",volume:"100",});
              }
              else{
                alertify.error(data);
                new jBox("Notice",{audio:"<?php echo site_url(); ?>assets/js/jBox/error has occured",volume:"100",});  
              }
            });
          }
        });
      };  
      <? } ?>     
      <?php if($main_content == 'show_elections_view'){ ?>
      function election_confirm(data) {
        var id=data.id;
        var value=$('#'+id).attr('title');
        if(value == "Activated"){
          var title= "deactivate";
          var title_= "Deactivated";
          var icon= '<i class="fa fa-thumbs-o-down"></i>';
          var class_ = "btn btn-warning";
        }
        else{
          var title= "activate";
          var title_= "Activated";
          var icon= '<i class="fa fa-thumbs-o-up"></i>';
          var class_ = "btn btn-success";
        }
        alertify.confirm("Do you want to "+title+" this election", function (e) {
          if (e) {
            $.post("<?php echo site_url('elections/manage_election'); ?>",{ election_id: id, election_status: value },function(data) {
              if(data == "success"){
                $('#'+id).attr('title',title_)
                $('#'+id).html(icon);
                $('#'+id).attr('class',class_);
                alertify.success("Election successfully "+title);
                new jBox("Notice",{audio:"<?php echo site_url(); ?>assets/js/jBox/activity done successfully",volume:"100",});
              }
              else{
                alertify.error(data);
                new jBox("Notice",{audio:"<?php echo site_url(); ?>assets/js/jBox/error has occured",volume:"100",});  
              }
            });
          }
        });
      };  
      <?php } ?>
      </script>
    <script src="<?php echo site_url(); ?>assets/js/jquery.min.js">
    </script>  
    <script src="<?php echo site_url(); ?>assets/js/jquery.scrollUp.js">
    </script>
    <?php if($main_content == 'add_election_view' || $main_content == 'edit_election_view'){ ?>
    <link rel="stylesheet" type="text/css" media="all" href="<?php echo site_url(); ?>assets/election/css/daterangepicker-bs3.css" />
    <link href="<?php echo site_url(); ?>assets/election/css/bootstrap.min.css" rel="stylesheet"> 
    <link href="<?php echo site_url(); ?>assets/icons/css/font-awesome.min.css" rel="stylesheet">
    <script type="text/javascript" src="<?php echo site_url(); ?>assets/election/js/moment.js"></script>  
    <script type="text/javascript" src="<?php echo site_url(); ?>assets/election/js/daterangepicker.js"></script>
    <script type="text/javascript">
               $(document).ready(function() {
                  $('#date').daterangepicker({ singleDatePicker: true }, function(start, end, label) {
                    console.log(start.toISOString(), end.toISOString(), label);
                  });
               });
               </script>
   <!-- <script type="text/javascript" src="<?php echo site_url(); ?>assets/js/date-picker/date.js">
    </script>
    <script type="text/javascript" src="<?php echo site_url(); ?>assets/js/date-picker/daterangepicker.js"></script>
  -->

    <?php }?>
    <?php if($main_content == 'candidate_wise_reports_view' || $main_content == 'voter_wise_reports_view' || $main_content == 'admin_mlm_view' || $main_content == 'voter_mlm_view'){ ?>
    <script src="<?php echo site_url(); ?>assets/js/chosen.jquery.min.js">
    </script>
    <script type="text/javascript">
    jQuery(function($) {
        $('.chosen-select').chosen({allow_single_deselect:true}); 
        //resize the chosen on window resize
        $(window)
        .off('resize.chosen')
        .on('resize.chosen', function() {
          $('.chosen-select').each(function() {
             var $this = $(this);
             $this.next().css({'width': '250px'});
          })
        }).trigger('resize.chosen');
      });</script>
    <?php } ?>
    <?php if($main_content == 'show_voters_view' || $main_content == 'show_candidates_view' || $main_content == 'show_booth_officers_view' || $main_content == 'candidate_wise_reports_view' || $main_content == 'show_elections_view' || $main_content == 'date_wise_reports_view' || $main_content == 'all_transactions_details_view' || $main_content == 'admin_dashboard_view' || $main_content == 'voter_dashboard_view'){ ?>
    <script src="<?php echo site_url(); ?>assets/js/jquery.dataTables.js">
    </script>
    <? } ?>     
     <!-- Custom JS -->
    <script src="<?php echo site_url(); ?>assets/js/custom.js">
    </script>
     <?php if($main_content == 'print_voter_transaction_payment_receipt_view'){ ?>
    <script src="<?php echo site_url(); ?>assets/js/print/js/jQuery.print.js">
    </script>
    <? } ?>
    <?php if($main_content == 'admin_dahboard_view'){ ?>
    <!-- Easy Pie Chart JS -->
    <script src="js/jquery.easy-pie-chart.js">
    </script>
    
    <? } ?> 

    <script type="text/javascript">
      $(document).ready(function () {
        //ScrollUp
        $.scrollUp({
          scrollName: 'scrollUp', // Element ID
          topDistance: '300', // Distance from top before showing element (px)
          topSpeed: 300, // Speed back to top (ms)
          animation: 'fade', // Fade, slide, none
          animationInSpeed: 400, // Animation in speed (ms)
          animationOutSpeed: 400, // Animation out speed (ms)
          scrollText: 'Scroll to top', // Text for element
          activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
        });
        //table
        <?php if($main_content == 'show_voters_view' || $main_content == 'show_candidates_view' || $main_content == 'show_booth_officers_view'  || $main_content == 'candidate_wise_reports_view' || $main_content == 'show_elections_view' || $main_content == 'date_wise_reports_view'|| $main_content == 'all_transactions_details_view' || $main_content == 'admin_dashboard_view'){ ?>
        $('#data-table').dataTable({
          "sPaginationType": "full_numbers"
        });
        <? } ?>
        <?php if($main_content == 'voter_dashboard_view'){ ?>
        $('#data-table').dataTable({
          "sPaginationType": "full_numbers"
        });
        $('#data-table1').dataTable({
          "sPaginationType": "full_numbers"
        });
        <? } ?>
        <?php if($main_content == 'add_election_view' ||$main_content == 'edit_election_view'){ ?>
        //Date picker
        /*
        $('.date_picker').daterangepicker({
          opens: 'right'
        });
       */ //Date Picker

       


        <? } ?>
        <?php if($main_content == 'print_voter_transaction_payment_receipt_view'){ ?>
          $(function() {
                      $("#print").click(function() {
                          //Print ele4 with custom options
                          $("#invoice").print({
                              //Use Global styles
                              globalStyles : false,

                              //Add link with attrbute media=print
                              mediaPrint : false,

                              //Custom stylesheet
                              stylesheet : "<?php echo site_url(); ?>assets/css/main.css",

                              //Print in a hidden iframe
                              iframe : false,

                              //Don't print this
                              noPrintSelector : ".avoid-this",
                          });
                      });
                });
        <?php } ?>
        <?php if($this->session->flashdata('success_message')){ ?>
          alertify.success("<?php echo $this->session->flashdata('success_message'); ?>");
           new jBox("Notice",{audio:"<?php echo site_url(); ?>assets/js/jBox/activity done successfully",volume:"100",});
        <?php } ?>
        <?php if($this->session->flashdata('error_message')){ ?>
          alertify.error("<?php echo $this->session->flashdata('error_message'); ?>");
          new jBox("Notice",{audio:"<?php echo site_url(); ?>assets/js/jBox/error has occured",volume:"100",});
        <?php } ?>
      });    
      
    </script>
    
    
  </body>

<!-- Mirrored from iamsrinu.com/bluemoon-admin-theme/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 09 Oct 2014 05:11:23 GMT -->
</html>