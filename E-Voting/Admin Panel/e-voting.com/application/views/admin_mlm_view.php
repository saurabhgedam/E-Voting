<div class="left-sidebar">
            
            <div class="row-fluid">
              
              <div class="span12">
                <div class="widget">
                  <div class="widget-header">
                    <div class="title">  
                    <?php if(!empty($projects)){ ?>                    
                      <form action="<?php echo site_url('mlm/show_project_tree'); ?>" method="POST" class="navbar-form">
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
                            <button type="submit" name="show_tree" value="show_tree" class="btn btn-info ">
                              Submit
                            </button>                                                  
                        </form>
                    <?php }
                      else{ ?>
                      <span  style="font-size:14px;" class="label label label-info ">
                      Add Projects First
                    </span> 

                      <?php  } ?>    
                    </div> 
                                      
                    <span class="tools">
                    <span  style="font-size:14px;" class="label label label-info ">
                      Click on member to discover the tree
                    </span> 
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
                    <?php if(isset($tree)){ ?>
                    <div class="container-fluid">
                    <?php                     
                    $total_tree_members=count($tree)-1;
                    $width=100;
                    
                    $male=site_url('assets/profile_pictures/thumbs/male_icon.png');                                                
                    $female=site_url('assets/profile_pictures/thumbs/female_icon.png');
                     
                    $j=0;
                    for($i=0; $i<=$total_tree_members; $i++){
                      if ($i > $j) {
                        $width=$width/2;
                        $j=$i*2;
                      }  
                      if ($tree[$i]['depth_level']==0) {
                        echo '<div style="float:left;width:'.$width.'%">
                            <center>
                              <a  class="btn btn-success" >
                                '.$tree[$i]['project_name'].' ('.$total_tree_members.' Members)<br>(Level '.$tree[$i]['depth_level'].')
                              </a>
                            <div style="height: 20px;border-style: inset;width: 0px;"></div>
                            <div style="height: 0px;border-style: inset;width: 50%;"></div></center>
                          </div>';
                      }
                      elseif($j>=$total_tree_members){
                        echo '<div style="float:left;width:'.$width.'%">
                            <center>
                              <div style="height: 20px;border-style: inset;width: 0px;"></div>
                              <a  href="'.site_url('mlm/show_member_tree/'.$tree[$i]['project_id'].'/'.$tree[$i]['member_id']).'" class="btn btn-info bottom-margin" title="'.$tree[$i]['member_name'].'">
                                <img src="'.($tree[$i]['member_image'] ? site_url('assets/profile_pictures/thumbs/'.$tree[$i]['member_image']) : ($tree[$i]['member_gender']=='Male' ? $male: $female)).'"></img><br>(Level '.$tree[$i]['depth_level'].')
                              </a>
                            </center>
                          </div>';
                        }
                      else{
                      echo '<div style="float:left;width:'.$width.'%">
                            <center>
                              <div style="height: 20px;border-style: inset;width: 0px;"></div>
                              <a  href="'.site_url('mlm/show_member_tree/'.$tree[$i]['project_id'].'/'.$tree[$i]['member_id']).'" class="btn btn-warning bottom-margin" title="'.$tree[$i]['member_name'].'">
                                <img src="'.($tree[$i]['member_image'] ? site_url('assets/profile_pictures/thumbs/'.$tree[$i]['member_image']) : ($tree[$i]['member_gender']=='Male' ? $male: $female)).'"></img><br>(Level '.$tree[$i]['depth_level'].')
                              </a>
                              <div style="height: 20px;border-style: inset;width: 0px;"></div>
                              <div style="height: 0px;border-style: inset;width: 50%;"></div>
                            </center>
                          </div>';
                        }
                    }
                    
                    ?>
                    </div> 
                    <?php }
                     ?>                 
                    <br>
                  </div>
                </div>
              </div>
              
            </div>
            
          </div>