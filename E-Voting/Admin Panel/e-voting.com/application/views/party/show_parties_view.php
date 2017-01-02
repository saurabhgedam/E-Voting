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
                      Show Parties
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
                              CREATED
                            </th>
                            <th >
                              LOGO
                            </th>
                            <th>
                              ACTION
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php if(isset($parties)){ 
                          $i=1; ?>
                        <?php foreach ($parties as $party) { ?>
                          <tr>
                            <td class="hidden-phone">
                              <?php echo $i++; ?>
                            </td>
                            <td>
                              <?php echo $party->name; ?>
                            </td>
                            <td >
                              <?php echo $party->created; ?>
                            </td>
                            <td >
                              <img src="<?php echo site_url().'assets/party_logo/thumbs/'.$party->party_logo; ?>" />
                            </td>
                            <!--
                            <td class="hidden-phone"> 
                              <?php //echo $election->gender; ?>
                            </td>-->
                            <td>
                              <?php if($party->status == "Activated"){ ?>
                                <a href="#" onclick="party_confirm(this)" id="<?php echo $party->id; ?>" class="btn btn-success" title="<?php echo $party->status; ?>">
                                  <i class="fa fa-thumbs-o-up"></i>                                </a>
                              <?php } 
                                if($party->status == "Deactivated"){ ?>
                                  <a href="#" class="btn btn-warning" onclick="party_confirm(this)" id="<?php echo $party->id; ?>" title="<?php echo $party->status; ?>">
                                    <i class="fa fa-thumbs-o-down"></i>
                                  </a>
                              <?php } ?>
                              <a href="<?php echo site_url('party/edit_party/'.$party->id); ?>" class="btn btn-info" title="Edit">
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
          <script type="text/javascript">
          function party_confirm(data) {
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
        alertify.confirm("Do you want to "+title+" this party", function (e) {
          if (e) {
            $.post("<?php echo site_url('party/manage_party'); ?>",{ party_id: id, party_status: value },function(data) {
              if(data == "success"){
                $('#'+id).attr('title',title_)
                $('#'+id).html(icon);
                $('#'+id).attr('class',class_);
                alertify.success("Party successfully "+title);
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
          </script>