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
                        <div class="metro-nav-block nav-block-green">
                          <a href="#">
                              <i class="fa fa-thumbs-up fa-lg fa-3x"></i>
                              <div class="info"><i class="fa fa-cubes "></i>&nbsp;<?php echo (!empty($activated_voters) ? $activated_voters : 0 ); ?></div>
                            <div class="brand">Activated Voters</div>
                          </a>
                        </div>
                        <div class="metro-nav-block nav-block-orange">
                          <a href="#">
                              <i class="fa fa-thumbs-down fa-lg fa-3x"></i>
                              <div class="info"><i class="fa fa-cubes "></i>&nbsp;<?php echo (!empty($deactivated_voters) ? $deactivated_voters : 0 ); ?></div>
                            <div class="brand">Deactivated Voters</div>
                          </a>
                        </div>
                                             
                        <div class="metro-nav-block nav-block-green">
                          <a href="#">
                              <i class="fa fa-thumbs-up fa-lg fa-3x"></i>
                              <div class="info"><i class="fa fa-user "></i>&nbsp;<?php echo (!empty($activated_candidates) ? $activated_candidates : 0 ); ?></div>
                            <div class="brand">Activated Candidates</div>
                          </a>
                        </div>
                        <div class="metro-nav-block nav-block-red">
                          <a href="#">
                              <i class="fa fa-thumbs-down fa-lg fa-3x"></i>
                              <div class="info"><i class="fa fa-user "></i>&nbsp;<?php echo (!empty($deactivated_candidates) ? $deactivated_candidates : 0 ); ?></div>
                            <div class="brand">Deactivated Candidates</div>
                          </a>
                        </div>
                        <div class="metro-nav-block nav-block-green">
                          <a href="#">
                              <i class="fa fa-thumbs-up fa-lg fa-3x"></i>
                              <div class="info"><i class="fa fa-user "></i>&nbsp;<?php echo (!empty($activated_admins) ? $activated_admins : 0 ); ?></div>
                            <div class="brand">Activated Admins</div>
                          </a>
                        </div>
                        <div class="metro-nav-block nav-block-red">
                          <a href="#">
                              <i class="fa fa-thumbs-down fa-lg fa-3x"></i>
                              <div class="info"><i class="fa fa-user "></i>&nbsp;<?php echo (!empty($deactivated_admins) ? $deactivated_admins : 0 ); ?></div>
                            <div class="brand">Deactivated Admins</div>
                          </a>
                        </div>                        
                      </div>                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
          </div>