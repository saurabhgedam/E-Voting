<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//array('text'=>'url')
$config['ADMIN_TOP_NAV']= array('DASHBOARD'=>array('url'=>'dashboard','icon'=>'<i class="fa fa-tachometer fa-lg"></i>','sub_nav'=>array()),'VOTERS'=>array('url'=>'voters','icon'=>'<i class="fa fa-users fa-lg"></i></br>','sub_nav'=>array('Add voter'=>'voters/add_voter','Show voters'=>'voters/show_voters')),'CANDIDATES'=>array('url'=>'candidates','icon'=>'<i class="fa fa-users fa-lg"></i></br>','sub_nav'=>array('Add Candidate'=>'candidates/add_candidate','Show Candidates'=>'candidates/show_candidates')),'ELECTIONS'=>array('url'=>'elections','icon'=>'<i class="fa fa-cubes fa-lg"></i></br>','sub_nav'=>array('Add Election'=>'elections/add_election','Show Elections'=>'elections/show_elections')),'PARTY'=>array('url'=>'party','icon'=>'<i class="fa fa-users fa-lg"></i></br>','sub_nav'=>array('Add party'=>'party/add_party','Show parties'=>'party/show_parties')));
$config['POOLING_OFFICER_TOP_NAV']= array('DASHBOARD'=>array('url'=>'dashboard','icon'=>'<i class="fa fa-tachometer fa-lg"></i>','sub_nav'=>array()),'MARKETING'=>array('url'=>'mlm','icon'=>'<i class="fa fa-tree fa-lg"></i></br>','sub_nav'=>array()));
$config['VOTER_TOP_NAV']= array('DASHBOARD'=>array('url'=>'dashboard','icon'=>'<i class="fa fa-tachometer fa-lg"></i>','sub_nav'=>array()),'MARKETING'=>array('url'=>'mlm','icon'=>'<i class="fa fa-tree fa-lg"></i></br>','sub_nav'=>array()));
//$config['roles']= array('admin'=>'Admin','manager'=>'Manager','voter'=>'Member','REPORTS'=>array('url'=>'reports','icon'=>'<i class="fa fa-table fa-lg"></i></br>','sub_nav'=>array('Project Wise Reports'=>'reports','Member Wise Reports'=>'reports/voter_reports','Date Wise Reports'=>'reports/date_wise_reports')));
$config['add_voter'] = array(
               array(
                     'field'   => 'first_name',
                     'label'   => 'First Name',
                     'rules'   => 'trim|required|alpha'
                  ),
               array(
                     'field'   => 'last_name',
                     'label'   => 'Last Name',
                     'rules'   => 'trim|required|alpha'
                  ),
               array(
                     'field'   => 'gender',
                     'label'   => 'Gender',
                     'rules'   => 'trim|required|alpha'
                  ),                     
               array(
                     'field'   => 'age',
                     'label'   => 'Age',
                     'rules'   => 'trim|required|integer'
                  ),   
               array(
                     'field'   => 'tel',
                     'label'   => 'Mobile Number',
                     'rules'   => 'trim|required|integer|min_length[10]|max_length[10]'
                  ),   
               array(
                     'field'   => 'email',
                     'label'   => 'Email',
                     'rules'   => 'trim|required|valid_email'
                  ),
               array(
                     'field'   => 'address',
                     'label'   => 'Permanant Address',
                     'rules'   => 'trim|required|xss_clean|strip_tags'
                  ),
               array(
                     'field'   => 'current_address',
                     'label'   => 'Current Address',
                     'rules'   => 'trim|required|xss_clean|strip_tags'
                  ),
               array(
                     'field'   => 'ward',
                     'label'   => 'Ward',
                     'rules'   => 'trim|required'
                  ),
               array(
                     'field'   => 'voting_card_no',
                     'label'   => 'Voting Card Number',
                     'rules'   => 'trim|required|is_unique[users.voting_card_no]'
                  ),
               array(
                     'field'   => 'pan_card_no',
                     'label'   => 'Pan Card Number',
                     'rules'   => 'trim|required|is_unique[users.pan_card_no]'
                  ),
               array(
                     'field'   => 'username',
                     'label'   => 'Username',
                     'rules'   => 'trim|required|is_unique[users.username]'
                  ),
               array(
                     'field'   => 'password',
                     'label'   => 'Password',
                     'rules'   => 'trim|required|min_length[6]'
                  ),
               array(
                     'field'   => 'repPassword',
                     'label'   => 'Password Confirmation',
                     'rules'   => 'trim|required|matches[password]|min_length[6]'
                  )
            );
$config['update_voter'] = array(
            array(
                     'field'   => 'id',
                     'label'   => '',
                     'rules'   => 'trim|required|integer'
                  ),
               array(
                     'field'   => 'first_name',
                     'label'   => 'First Name',
                     'rules'   => 'trim|required|alpha'
                  ),
               array(
                     'field'   => 'last_name',
                     'label'   => 'Last Name',
                     'rules'   => 'trim|required|alpha'
                  ),
               array(
                     'field'   => 'gender',
                     'label'   => 'Gender',
                     'rules'   => 'trim|required'
                  ),   
               array(
                     'field'   => 'tel',
                     'label'   => 'Mobile Number',
                     'rules'   => 'trim|required|integer|min_length[10]|max_length[10]'
                  ),   
               array(
                     'field'   => 'email',
                     'label'   => 'Email',
                     'rules'   => 'trim|required|valid_email'
                  ),
               array(
                     'field'   => 'current_address',
                     'label'   => 'Address',
                     'rules'   => 'trim|required|xss_clean|strip_tags'
                  ),
               array(
                     'field'   => 'password',
                     'label'   => 'Password',
                     'rules'   => 'trim|min_length[6]'
                  ),
               array(
                     'field'   => 'repPassword',
                     'label'   => 'Password Confirmation',
                     'rules'   => 'trim|matches[password]|min_length[6]'
                  )
            );
$config['add_booth_officer'] = array(
               array(
                     'field'   => 'first_name',
                     'label'   => 'First Name',
                     'rules'   => 'trim|required|alpha'
                  ),
               array(
                     'field'   => 'last_name',
                     'label'   => 'Last Name',
                     'rules'   => 'trim|required|alpha'
                  ),
               array(
                     'field'   => 'gender',
                     'label'   => 'Gender',
                     'rules'   => 'trim|required|alpha'
                  ),                     
               array(
                     'field'   => 'age',
                     'label'   => 'Age',
                     'rules'   => 'trim|required|integer'
                  ),   
               array(
                     'field'   => 'mobile',
                     'label'   => 'Mobile Number',
                     'rules'   => 'trim|required|integer|min_length[10]|max_length[10]'
                  ),   
               array(
                     'field'   => 'email',
                     'label'   => 'Email',
                     'rules'   => 'trim|required|valid_email'
                  ),
               array(
                     'field'   => 'address',
                     'label'   => 'Permanant Address',
                     'rules'   => 'trim|required|xss_clean|strip_tags'
                  ),
               array(
                     'field'   => 'current_address',
                     'label'   => 'Current Address',
                     'rules'   => 'trim|required|xss_clean|strip_tags'
                  ),
               array(
                     'field'   => 'ward',
                     'label'   => 'Ward',
                     'rules'   => 'trim|required'
                  ),
               array(
                     'field'   => 'voting_card_no',
                     'label'   => 'Voting Card Number',
                     'rules'   => 'trim|required|is_unique[users.voting_card_no]'
                  ),
               array(
                     'field'   => 'pan_card_no',
                     'label'   => 'Pan Card Number',
                     'rules'   => 'trim|required|is_unique[users.pan_card_no]'
                  ),
               array(
                     'field'   => 'username',
                     'label'   => 'Username',
                     'rules'   => 'trim|required|is_unique[users.username]'
                  ),
               array(
                     'field'   => 'password',
                     'label'   => 'Password',
                     'rules'   => 'trim|required|min_length[6]'
                  ),
               array(
                     'field'   => 'repPassword',
                     'label'   => 'Password Confirmation',
                     'rules'   => 'trim|required|matches[password]|min_length[6]'
                  )
            );

$config['update_booth_officer'] = array(
               array(
                     'field'   => 'first_name',
                     'label'   => 'First Name',
                     'rules'   => 'trim|required|alpha'
                  ),
               array(
                     'field'   => 'last_name',
                     'label'   => 'Last Name',
                     'rules'   => 'trim|required|alpha'
                  ),
               array(
                     'field'   => 'gender',
                     'label'   => 'Gender',
                     'rules'   => 'trim|required|alpha'
                  ),                     
              
               array(
                     'field'   => 'mobile',
                     'label'   => 'Mobile Number',
                     'rules'   => 'trim|required|integer|min_length[10]|max_length[10]'
                  ),   
               array(
                     'field'   => 'email',
                     'label'   => 'Email',
                     'rules'   => 'trim|required|valid_email'
                  ),
               array(
                     'field'   => 'current_address',
                     'label'   => 'Current Address',
                     'rules'   => 'trim|required|xss_clean|strip_tags'
                  ),
               array(
                     'field'   => 'username',
                     'label'   => 'Username',
                     'rules'   => 'trim|required|is_unique[users.username]'
                  ), 
               array(
                     'field'   => 'password',
                     'label'   => 'Password',
                     'rules'   => 'trim|min_length[6]'
                  ),
               array(
                     'field'   => 'repPassword',
                     'label'   => 'Password Confirmation',
                     'rules'   => 'trim|matches[password]|min_length[6]'
                  )
            );


$config['add_candidate'] = array(
               array(
                     'field'   => 'first_name',
                     'label'   => 'First Name',
                     'rules'   => 'trim|required|alpha'
                  ),
               array(
                     'field'   => 'last_name',
                     'label'   => 'Last Name',
                     'rules'   => 'trim|required|alpha'
                  ),
               array(
                     'field'   => 'gender',
                     'label'   => 'Gender',
                     'rules'   => 'trim|required|alpha'
                  ),                     
               array(
                     'field'   => 'age',
                     'label'   => 'Age',
                     'rules'   => 'trim|required|integer'
                  ),
               array(
                  'field'   => 'education',
                  'label'   => 'Education',
                  'rules'   => 'trim|required'
               ), 
               array(
                  'field'   => 'category',
                  'label'   => 'Category',
                  'rules'   => 'trim|required'
               ),   
               array(
                     'field'   => 'age',
                     'label'   => 'Age',
                     'rules'   => 'trim|required|integer'
                  ),
               array(
                     'field'   => 'profile',
                     'label'   => 'Profile',
                     'rules'   => 'trim|required|xss_clean|strip_tags'
                  ),
               array(
                     'field'   => 'mobile',
                     'label'   => 'Mobile Number',
                     'rules'   => 'trim|required|integer|min_length[10]|max_length[10]'
                  ),   
               array(
                     'field'   => 'email',
                     'label'   => 'Email',
                     'rules'   => 'trim|required|valid_email'
                  ),
               array(
                     'field'   => 'address',
                     'label'   => 'Permanant Address',
                     'rules'   => 'trim|required|xss_clean|strip_tags'
                  ),
               array(
                     'field'   => 'current_address',
                     'label'   => 'Current Address',
                     'rules'   => 'trim|required|xss_clean|strip_tags'
                  ),
               array(
                     'field'   => 'ward',
                     'label'   => 'Ward',
                     'rules'   => 'trim|required'
                  ),
               array(
                     'field'   => 'voting_card_no',
                     'label'   => 'Voting Card Number',
                     'rules'   => 'trim|required|is_unique[users.voting_card_no]'
                  ),
               array(
                     'field'   => 'pan_card_no',
                     'label'   => 'Pan Card Number',
                     'rules'   => 'trim|required|is_unique[users.pan_card_no]'
                  ),
               array(
                     'field'   => 'username',
                     'label'   => 'Username',
                     'rules'   => 'trim|required|is_unique[users.username]'
                  ),               
               array(
                     'field'   => 'party',
                     'label'   => 'Party',
                     'rules'   => 'trim|required'
                  ),
               array(
                     'field'   => 'password',
                     'label'   => 'Password',
                     'rules'   => 'trim|required|min_length[6]'
                  ),
               array(
                     'field'   => 'repPassword',
                     'label'   => 'Password Confirmation',
                     'rules'   => 'trim|required|matches[password]|min_length[6]'
                  )
            );


$config['update_candidate'] = array(
               array(
                     'field'   => 'first_name',
                     'label'   => 'First Name',
                     'rules'   => 'trim|required|alpha'
                  ),
               array(
                     'field'   => 'last_name',
                     'label'   => 'Last Name',
                     'rules'   => 'trim|required|alpha'
                  ),
               array(
                     'field'   => 'gender',
                     'label'   => 'Gender',
                     'rules'   => 'trim|required|alpha'
                  ),                     
              
               array(
                     'field'   => 'mobile',
                     'label'   => 'Mobile Number',
                     'rules'   => 'trim|required|integer|min_length[10]|max_length[10]'
                  ),   
               array(
                     'field'   => 'email',
                     'label'   => 'Email',
                     'rules'   => 'trim|required|valid_email'
                  ),
               array(
                     'field'   => 'current_address',
                     'label'   => 'Current Address',
                     'rules'   => 'trim|required|xss_clean|strip_tags'
                  ),
               array(
                     'field'   => 'ward',
                     'label'   => 'Ward',
                     'rules'   => 'trim|required'
                  ),
               array(
                     'field'   => 'username',
                     'label'   => 'Username',
                     'rules'   => 'trim|required|is_unique[users.username]'
                  ),               
               array(
                     'field'   => 'party',
                     'label'   => 'Party',
                     'rules'   => 'trim|required'
                  ),
               array(
                     'field'   => 'password',
                     'label'   => 'Password',
                     'rules'   => 'trim|min_length[6]'
                  ),
               array(
                     'field'   => 'repPassword',
                     'label'   => 'Password Confirmation',
                     'rules'   => 'trim|matches[password]|min_length[6]'
                  )
            );

$config['update_profile'] = array(
            array(
                     'field'   => 'id',
                     'label'   => '',
                     'rules'   => 'trim|required|integer'
                  ),
               array(
                     'field'   => 'first_name',
                     'label'   => 'First Name',
                     'rules'   => 'trim|required|alpha'
                  ),
               array(
                     'field'   => 'last_name',
                     'label'   => 'Last Name',
                     'rules'   => 'trim|required|alpha'
                  ),
               array(
                     'field'   => 'gender',
                     'label'   => 'Gender',
                     'rules'   => 'trim|required'
                  ),   
               array(
                     'field'   => 'tel',
                     'label'   => 'Mobile Number',
                     'rules'   => 'trim|required|integer|min_length[10]|max_length[10]'
                  ),   
               array(
                     'field'   => 'email',
                     'label'   => 'Email',
                     'rules'   => 'trim|required|valid_email'
                  ),
               array(
                     'field'   => 'current_address',
                     'label'   => 'Address',
                     'rules'   => 'trim|required|xss_clean|strip_tags'
                  ),
               array(
                     'field'   => 'password',
                     'label'   => 'Password',
                     'rules'   => 'trim|min_length[6]'
                  ),
               array(
                     'field'   => 'repPassword',
                     'label'   => 'Password Confirmation',
                     'rules'   => 'trim|matches[password]|min_length[6]'
                  )
            );

$config['add_level'] = array(
                array(
                     'field'   => 'level_number',
                     'label'   => 'Level Number',
                     'rules'   => 'trim|required|integer'
                  ),
               array(
                     'field'   => 'level_pay',
                     'label'   => 'Level Pay',
                     'rules'   => 'trim|required|integer'
                  )
            );

$config['add_level'] = array(
                array(
                     'field'   => 'level_number',
                     'label'   => 'Level Number',
                     'rules'   => 'trim|required|integer'
                  ),
               array(
                     'field'   => 'level_pay',
                     'label'   => 'Level Pay',
                     'rules'   => 'trim|required|integer'
                  )
            );
$config['update_level'] = array(
                array(
                     'field'   => 'id',
                     'label'   => '',
                     'rules'   => 'trim|required|integer'
                  ),
               array(
                     'field'   => 'level_pay',
                     'label'   => 'Level Pay',
                     'rules'   => 'trim|required|integer'
                  )
            );
$config['add_election'] = array(
                array(
                     'field'   => 'name',
                     'label'   => 'Election name',
                     'rules'   => 'trim|required|is_unique[elections.name]|alpha_dash_space'
                  ),
                array(
                     'field'   => 'date',
                     'label'   => 'Election Date',
                     'rules'   => 'trim|required'
                  ),
                array(
                     'field'   => 'ward',
                     'label'   => 'Election Ward',
                     'rules'   => 'trim|required'
                  ),
               array(
                     'field'   => 'description',
                     'label'   => 'Description',
                     'rules'   => 'trim|required|xss_clean|strip_tags'
                  )
            );
$config['update_election'] = array(
                array(
                     'field'   => 'id',
                     'label'   => '',
                     'rules'   => 'trim|required|integer'
                  ),
                array(
                     'field'   => 'name',
                     'label'   => 'Election name',
                     'rules'   => 'trim|required|is_unique[elections.name]|alpha_dash_space'
                  ),
                
                array(
                     'field'   => 'ward',
                     'label'   => 'Election Ward',
                     'rules'   => 'trim|required'
                  ),
               array(
                     'field'   => 'description',
                     'label'   => 'Description',
                     'rules'   => 'trim|required|xss_clean|strip_tags'
                  )
            );


$config['update_max_levels'] = array(
               array(
                     'field'   => 'max_levels',
                     'label'   => 'Maximum levels',
                     'rules'   => 'trim|required|integer|is_natural_no_zero|max_length[3]'
                  )
            );
$config['update_direct_pay'] = array(
               array(
                     'field'   => 'direct_pay',
                     'label'   => 'Direct Pay',
                     'rules'   => 'trim|required|integer|is_natural_no_zero'
                  )
            );
/* End of file constants.php */
/* Location: ./application/config/constants.php */
