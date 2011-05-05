<?php
/*
* This is the controller for all functions related to the Recommendation feature.
*/

class Rec extends CI_Controller
{
  function __construct()
  {
    parent::__construct();

    // Load the Rec_model
    $this->load->model('Rec_model');
  }
  
  function new_rec()
  {
    $this->form_validation->set_rules('app_first','Applicant First Name', 'required|min_length[3]');
    $this->form_validation->set_rules('app_last','Applicant Last Name', 'required|min_length[3]');
    $this->form_validation->set_rules('musc_tal[]','Musical Talent', 'required');
    $this->form_validation->set_rules('create_skill[]','Interpretive, creative skill', 'required');
    $this->form_validation->set_rules('musc_fund[]','Music Fundamentals', 'required');
    $this->form_validation->set_rules('musc_career[]','Music Career', 'required');
    $this->form_validation->set_rules('success_tamu[]','TAMU Success', 'required');
    $this->form_validation->set_rules('personality[]','Personality', 'required');
    $this->form_validation->set_rules('reliability','Reliability', 'required');
    $this->form_validation->set_rules('motivation[]','Motivation', 'required');
    $this->form_validation->set_rules('overall_rating[]','Overall Rating', 'required');
    $this->form_validation->set_rules('known_app','Relation to applicant', 'required');
    $this->form_validation->set_rules('comments','Comments', '');

    if($this->form_validation->run() == FALSE)
    {
      $user = $this->ion_auth->get_user();
      $data['id'] = $user->id;

      // Begin Form Attributes
      $data['app_first'] = array(
        'name' => 'app_first',
        'id' => 'app_first',
        'value' => 'First Name',
        );

      $data['app_last'] = array(
        'name' => 'app_last',
        'id' => 'app_last',
        'value' => 'Last Name',
        );

      // Start Radio Button Array
      // Attributes for musical talent radio buttons
      $data['musc_tal'] = array(
          'outstanding' => array(
            'name' => 'musc_tal[]',
            'id' => 'musc_tal',
            'value' => 'outstanding',
          ),

          'ab_avg' => array(
            'name' => 'musc_tal[]',
            'id' => 'musc_tal',
            'value' => 'ab_avg',
          ),
          
          'avg' => array(
            'name' => 'musc_tal[]',
            'id' => 'musc_tal',
            'value' => 'avg',
          ),

          'be_avg' => array(
            'name' => 'musc_tal[]',
            'id' => 'musc_tal',
            'value' => 'be_avg',
          ),

          'inadq' => array(
            'name' => 'musc_tal[]',
            'id' => 'musc_tal',
            'value' => 'inadq',
          ),

          'not_obs' => array(
            'name' => 'musc_tal[]',
            'id' => 'musc_tal',
            'value' => 'not_obs',
          ),
        );

      // Attributes for Creative Skill radio buttons
      $data['create_skill'] = array(
          'outstanding' => array(
            'name' => 'create_skill[]',
            'id' => 'create_skill',
            'value' => 'outstanding',
          ),

          'ab_avg' => array(
            'name' => 'create_skill[]',
            'id' => 'create_skill',
            'value' => 'ab_avg',
          ),
          
          'avg' => array(
            'name' => 'create_skill[]',
            'id' => 'create_skill',
            'value' => 'avg',
          ),

          'be_avg' => array(
            'name' => 'create_skill[]',
            'id' => 'create_skill',
            'value' => 'be_avg',
          ),

          'inadq' => array(
            'name' => 'create_skill[]',
            'id' => 'create_skill',
            'value' => 'inadq',
          ),

          'not_obs' => array(
            'name' => 'create_skill[]',
            'id' => 'create_skill',
            'value' => 'not_obs',
          ),
        );

      // Attributes for muscial fundamentals radio buttons
      $data['musc_fund'] = array(
          'outstanding' => array(
            'name' => 'musc_fund[]',
            'id' => 'musc_fund',
            'value' => 'outstanding',
          ),

          'ab_avg' => array(
            'name' => 'musc_fund[]',
            'id' => 'musc_fund',
            'value' => 'ab_avg',
          ),
          
          'avg' => array(
            'name' => 'musc_fund[]',
            'id' => 'musc_fund',
            'value' => 'avg',
          ),

          'be_avg' => array(
            'name' => 'musc_fund[]',
            'id' => 'musc_fund',
            'value' => 'be_avg',
          ),

          'inadq' => array(
            'name' => 'musc_fund[]',
            'id' => 'musc_fund',
            'value' => 'inadq',
          ),

          'not_obs' => array(
            'name' => 'musc_fund[]',
            'id' => 'musc_fund',
            'value' => 'not_obs',
          ),
        );

      // Attributes for Muscial Career radio buttons
      $data['musc_career'] = array(
          'outstanding' => array(
            'name' => 'musc_career[]',
            'id' => 'musc_career',
            'value' => 'outstanding',
          ),

          'ab_avg' => array(
            'name' => 'musc_career[]',
            'id' => 'musc_career',
            'value' => 'ab_avg',
          ),
          
          'avg' => array(
            'name' => 'musc_career[]',
            'id' => 'musc_career',
            'value' => 'avg',
          ),

          'be_avg' => array(
            'name' => 'musc_career[]',
            'id' => 'musc_career',
            'value' => 'be_avg',
          ),

          'inadq' => array(
            'name' => 'musc_career[]',
            'id' => 'musc_career',
            'value' => 'inadq',
          ),

          'not_obs' => array(
            'name' => 'musc_career[]',
            'id' => 'musc_career',
            'value' => 'not_obs',
          ),
        );

      // Attributes for Success at TAMU radio buttons
      $data['success_tamu'] = array(
          'outstanding' => array(
            'name' => 'success_tamu[]',
            'id' => 'success_tamu',
            'value' => 'outstanding',
          ),

          'ab_avg' => array(
            'name' => 'success_tamu[]',
            'id' => 'success_tamu',
            'value' => 'ab_avg',
          ),
          
          'avg' => array(
            'name' => 'success_tamu[]',
            'id' => 'success_tamu',
            'value' => 'avg',
          ),

          'be_avg' => array(
            'name' => 'success_tamu[]',
            'id' => 'success_tamu',
            'value' => 'be_avg',
          ),

          'inadq' => array(
            'name' => 'success_tamu[]',
            'id' => 'success_tamu',
            'value' => 'inadq',
          ),

          'not_obs' => array(
            'name' => 'success_tamu[]',
            'id' => 'success_tamu',
            'value' => 'not_obs',
          ),
        );

      // Attributes for Personality radio buttons
      $data['personality'] = array(
          'outstanding' => array(
            'name' => 'personality[]',
            'id' => 'personality',
            'value' => 'outstanding',
          ),

          'ab_avg' => array(
            'name' => 'personality[]',
            'id' => 'personality',
            'value' => 'ab_avg',
          ),
          
          'avg' => array(
            'name' => 'personality[]',
            'id' => 'personality',
            'value' => 'avg',
          ),

          'be_avg' => array(
            'name' => 'personality[]',
            'id' => 'personality',
            'value' => 'be_avg',
          ),

          'inadq' => array(
            'name' => 'personality[]',
            'id' => 'personality',
            'value' => 'inadq',
          ),

          'not_obs' => array(
            'name' => 'personality[]',
            'id' => 'personality',
            'value' => 'not_obs',
          ),
        );

      // Attributes for Reliability radio buttons
      $data['reliability'] = array(
          'outstanding' => array(
            'name' => 'reliability[]',
            'id' => 'reliability',
            'value' => 'outstanding',
          ),

          'ab_avg' => array(
            'name' => 'reliability[]',
            'id' => 'reliability',
            'value' => 'ab_avg',
          ),
          
          'avg' => array(
            'name' => 'reliability[]',
            'id' => 'reliability',
            'value' => 'avg',
          ),

          'be_avg' => array(
            'name' => 'reliability[]',
            'id' => 'reliability',
            'value' => 'be_avg',
          ),

          'inadq' => array(
            'name' => 'reliability[]',
            'id' => 'reliability',
            'value' => 'inadq',
          ),

          'not_obs' => array(
            'name' => 'reliability[]',
            'id' => 'reliability',
            'value' => 'not_obs',
          ),
        );

      // Attrubutes for Motivation radio buttons
      $data['motivation'] = array(
          'outstanding' => array(
            'name' => 'motivation[]',
            'id' => 'motivation',
            'value' => 'outstanding',
          ),

          'ab_avg' => array(
            'name' => 'motivation[]',
            'id' => 'motivation',
            'value' => 'ab_avg',
          ),
          
          'avg' => array(
            'name' => 'motivation[]',
            'id' => 'motivation',
            'value' => 'avg',
          ),

          'be_avg' => array(
            'name' => 'motivation[]',
            'id' => 'motivation',
            'value' => 'be_avg',
          ),

          'inadq' => array(
            'name' => 'motivation[]',
            'id' => 'motivation',
            'value' => 'inadq',
          ),

          'not_obs' => array(
            'name' => 'motivation[]',
            'id' => 'motivation',
            'value' => 'not_obs',
          ),
        );

      // Attributes for Overall rating radio buttons
      $data['overall_rating'] = array(
          'outstanding' => array(
            'name' => 'overall_rating[]',
            'id' => 'overall_rating',
            'value' => 'outstanding',
          ),

          'ab_avg' => array(
            'name' => 'overall_rating[]',
            'id' => 'overall_rating',
            'value' => 'ab_avg',
          ),
          
          'avg' => array(
            'name' => 'overall_rating[]',
            'id' => 'overall_rating',
            'value' => 'avg',
          ),

          'be_avg' => array(
            'name' => 'overall_rating[]',
            'id' => 'overall_rating',
            'value' => 'be_avg',
          ),

          'inadq' => array(
            'name' => 'overall_rating[]',
            'id' => 'overall_rating',
            'value' => 'inadq',
          ),

          'not_obs' => array(
            'name' => 'overall_rating[]',
            'id' => 'overall_rating',
            'value' => 'not_obs',
          ),
        );
      // End Radio Button Array
      
      // Start Textarea Attributes
      $data['known_app'] = array(
        'name' => 'known_app',
        'id' => 'known_app',
        );

      $data['comments'] = array(
        'name' => 'comments',
        'id' => 'comments',
        );

      $data['main_content'] = 'rec/rec_start';
      $this->load->view('includes/template', $data);
    }
    else
    {
      // Get the array of info submitted from the form and
      // serialize it.
      $post = array(
        'user_id' => $this->input->post('id'),
        'app_first' => $this->input->post('app_first'),
        'app_last' => $this->input->post('app_last'),
        'serial_rec' => serialize($_POST),
      );

      //Now send the serialized array to the model to create the record
      $this->Rec_model->create($post);
      // @todo - Create 'success' or 'fail' messages and pass to view

      $data['main_content'] = 'rec/submit_view';
      $this->load->view('includes/template', $data);
    }
  }

  public function list_rec()
  {
    $user = $this->ion_auth->get_user();
    $id = $user->id;

    $data['recs'] = $this->Rec_model->get_user_rec_list($id);

    if(!isset ($data['recs']))
    {
      $data['err_msg'] = 'There was an error in retrieving your recommendations.';
    }
    
    $data['main_content'] = 'rec/list_rec_view';
    $this->load->view('includes/template', $data);

  }

  function show_rec()
  {
    $user =  $this->ion_auth->get_user();
    $id = $user->id;

    $rec_id = $this->uri->segment(3);

    $data['rec'] = $this->Rec_model->get_user_rec_single($rec_id);

    if(!isset ($data['rec']))
    {
      $data['err_msg'] = 'There was an error in retrieving your recommendation.';
    }

    $data['main_content'] = 'rec/show_rec_view';
    $this->load->view('includes/template', $data);
  }
}
