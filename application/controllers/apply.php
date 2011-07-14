<?php


class Apply extends CI_Controller {

    function  __construct() {
        parent::__construct();
        
        // Checks to see if the user is an applicant.
        if (!$this->ion_auth->is_group('applicants')){
          redirect('/auth/login');
        }

        // Load the App_model
            $this->load->model('App_model');

    }

    function index()
    {
      // Check to see if an application exists for the student
      $user = $this->ion_auth->get_user();
      $data['id'] = $user->id;

      $data['app_status'] = $this->App_model->check_user_status($data['id']);

      $data['app'] = $this->App_model->check_user_app($data['id']);
      if (!isset ($data['app'])){
        $data['app_link'] = anchor('apply/new_app', 'Start Application');
      }
      else {
        $data['app_link'] = anchor('apply/edit_app', 'Edit Application');
      }
      
      // Now for the recommendations. We will call count_user_recs in the model and return the result
      $data['rec_request'] = anchor('apply/rec_request', 'Request Recommendations');
      $data['rec_count'] = $this->App_model->count_user_recs($data['id']);

      $data['main_content'] = 'apply/apply_home_view';
      $this->load->view('includes/template', $data);

       $this->output->enable_profiler(TRUE);
    }

    function get_user_id()
    {
      // Check to see if an application exists for the student
      $user = $this->ion_auth->get_user();
      $data['id'] = $user->id;
    }

    /*
     * The new_app() method in it's current state loads, validates, and
     * passes application info to the method.
     *
     * This method will later be expanded in to many methods to guide the
     * applicant step-by-step through the process.
     */
    function new_app()
    {
      $this->output->enable_profiler(TRUE);

      // Call up the validation rules for this form
      $this->form_validate_rules();

      if($this->form_validation->run() == FALSE)
      {
        $this->apply_edit_data();
        // Call up all of the form attributes
        $data = $this->create_form();

        //$data['edit_info'] = $this->apply_edit_data();

        // Set apply_form_view.php as the view and pass the $data array to the template
        $data['main_content'] = 'apply/apply_form_view';
        $this->load->view('includes/template', $data);
      }
      else {
        
        // Get the array of info submitted from the form and
        // serialize it.

        $post = array(
            'user_id'    => $this->input->post('id'),
            'serial_app'    => serialize($_POST),
            'app_status'  => 'Incomplete'
            );
            
        // Now send the serialized array to the model to create the record
        $this->App_model->create($post);
        // @todo - Create 'success' or 'fail' messages and pass to view

        $data['main_content'] = 'apply/apply_form_view';
        $this->load->view('includes/template', $data);
      }

    }

    function edit_app()
    {
      $this->output->enable_profiler(TRUE);

      // Call up the validation rules for the form
      $this->form_validate_rules();

        if($this->form_validation->run() == FALSE)
        {
          // Call up all of the form attributes
          $data = $this->create_form();

          // Set apply_form_view.php as the view and pass the $data array to the template
          $data['main_content'] = 'apply/apply_form_view';
          $this->load->view('includes/template', $data);
        }
        else {
          // Put update code here...

          $data['main_content'] = 'apply/apply_form_view';
          $this->load->view('includes/template', $data);
        }
    }



    function inst_area_data()
    {
      global $app_info;
      global $data;

      $inst_areas_db = $app_info['inst_areas'];
      // Get array keys for inst_areas
      $inst_area_choices = array_keys($data['inst_areas']);

      $area_intersect = array_intersect_key($inst_areas_db, $inst_area_choices);
      $area_diff = array_diff($inst_area_choices, $inst_areas_db);

      foreach ($area_intersect as $key) {
        // code...
        $checked[$key] = 'checked';
      }

      foreach ($area_diff as $key) {
        $checked[$key] = '';
      }

      global $checked;
      return $checked;
      
    }

    function form_validate_rules()
    {
      $this->form_validation->set_rules('curr_gpa', 'Current GPA', 'required|max_length[3]');
      $this->form_validation->set_rules('inst_areas[]', 'error', '');
      $this->form_validation->set_rules('ensembles[]', 'error', '');
      $this->form_validation->set_rules('perf_aud', 'error', '');
      $this->form_validation->set_rules('music_background', 'Music Background', 'required|min_length[5]');
      $this->form_validation->set_rules('music_interest', 'Music Interest', 'required|min_length[5]');
      $this->form_validation->set_rules('music_goals', 'Music Goals', 'required|min_length[5]');
      $this->form_validation->set_rules('awards_honors', 'Awards & Honors', '');
      $this->form_validation->set_rules('correct_info', 'Correct Information', 'required');
      // The following rules may need to be moved to accommodate for
      // Freshman/Transfer status.
      //
      // $this->form_validation->set_rules('grad_month', 'Graduation Month', 'required');
      // $this->form_validation->set_rules('app_tamu', 'TAMU Application', 'required');
      
    }


    function create_form()
    {

      $user = $this->ion_auth->get_user();
      $data['id'] = $user->id;

      $this->apply_edit_data();

      global $edit_info;
      $data['edit_info'] = $edit_info;

      /**** Start General Fieldset ****/

      // Attributes for General Questions fieldset
      $data['general_field'] = array(
        'id'    => 'general_field',
        'class' => 'span-10 last'
      );

      // Attributes for Current GPA
      $data['curr_gpa'] = array(
        'name'      => 'curr_gpa',
        'id'        => 'curr_gpa',
        'value' => '',
        'maxlength' => '3'
      );


      // Attributes for Interested Areas
      $data['inst_areas'] = array(
        'composition'   => array(
          'name'      => 'inst_areas[]',
          'id'        => 'inst_areas',
          'value'     => 'composition',
          'checked' => ''
        ),

        'musc_hist'      => array(
          'name'      => 'inst_areas[]',
          'id'        => 'inst_areas',
          'value'     => 'musc_hist',
          'checked' => ''
        ),

        'musc_theo'      => array(
          'name'      => 'inst_areas[]',
          'id'        => 'inst_areas',
          'value'     => 'musc_theo',
          'checked' => ''
        ),

        'ethno_musc'      => array(
          'name'      => 'inst_areas[]',
          'id'        => 'inst_areas',
          'value'     => 'ethno_musc',
          'checked' => ''
        ),

        'musc_tech'      => array(
          'name'      => 'inst_areas[]',
          'id'        => 'inst_areas',
          'value'     => 'musc_tech',
          'checked' => ''
        ),

        'musc_perf'      => array(
          'name'      => 'inst_areas[]',
          'id'        => 'inst_areas',
          'value'     => 'musc_perf',
          'checked' => ''
        ),

      );

      // Attributes for Ensembles
      $data['ensembles'] = array(

        'brazos_chorale'   => array(
          'name'      => 'ensembles[]',
          'id'        => 'ensembles',
          'value'     => 'brazos_chorale',
          'checked' => ''
        ),

        'cent_singers'      => array(
          'name'      => 'ensembles[]',
          'id'        => 'ensembles',
          'value'     => 'cent_singers',
          'checked' => ''
        ),

        'singing_cadets'      => array(
          'name'      => 'ensembles[]',
          'id'        => 'ensembles',
          'value'     => 'singing_cadets',
          'checked' => ''
        ),

        'womens_chorus'      => array(
          'name'      => 'ensembles[]',
          'id'        => 'ensembles',
          'value'     => 'womens_chorus',
          'checked' => ''
        ),

        'bvso'      => array(
          'name'      => 'ensembles[]',
          'id'        => 'ensembles',
          'value'     => 'bvso',
          'checked' => ''
        ),
        'aggie_band'      => array(
          'name'      => 'ensembles[]',
          'id'        => 'ensembles',
          'value'     => 'aggie_band',
          'checked' => ''
        ),

        'concert_band'      => array(
          'name'      => 'ensembles[]',
          'id'        => 'ensembles',
          'value'     => 'concert_band',
          'checked' => ''
        ),

        'symph_band'      => array(
          'name'      => 'ensembles[]',
          'id'        => 'ensembles',
          'value'     => 'symph_band',
          'checked' => ''
        ),

        'wind_symph'      => array(
          'name'      => 'ensembles[]',
          'id'        => 'ensembles',
          'value'     => 'wind_symph',
          'checked' => ''
        ),

        'jazz_band'      => array(
          'name'      => 'ensembles[]',
          'id'        => 'ensembles',
          'value'     => 'jazz_band',
          'checked' => ''
        ),

        'small_ens'      => array(
          'name'      => 'ensembles[]',
          'id'        => 'ensembles',
          'value'     => 'small_ens',
          'checked' => ''
        ),

      );

      // Attributes for Intended Minor
      $data['int_minor'] = array(
        'name'  => 'int_minor',
        'id'    => 'int_minor',
        'value' => ''
      );

      // Attributes for Audition
      // These are just test items. Will reference a database in future
      // @todo - Pull options from database
      $data['perf_aud'] = array(
        '--' => '------',
        'mar'   => 'March 2011',
        'may'   => 'May 2011',
        'aug'   => 'August 2011'
      );
      // This array helps populate the selection above based on what
      // the user selected.
      $data['perf_aud_select'] = $this->input->post('perf_aud');

      /**** End General Fieldset ****/
      
      /**** Start Freshmen Fieldset ****/
      // Attributes for Freshmen Fieldset
      $data['freshmen_field'] = array(
        'id'    => 'freshman_field',
        'class' => 'span-10 last'
      );
      
      // Attributes for High School
      $data['high_school'] = array(
        'name'  => 'high_school',
        'id'    => 'high_school',
        'value' => ''
      );

      // Attributes for Graduation Month
      $data['grad_month'] = array(
        ''    => '',
        '01'    => '01',
        '02'    => '02',
        '03'    => '03',
        '04'    => '04',
        '05'    => '05',
        '06'    => '06',
        '07'    => '07',
        '08'    => '08',
        '09'    => '09',
        '10'    => '10',
        '11'    => '11',
        '12'    => '12',
      );
      $data['grad_month_select'] = $this->input->post('grad_month');

      // Attributes for Graduation Year
      $data['grad_year'] = array(
        ''  => '',
        '2011'  => '2011',
        '2012'  => '2012',
        '2013'  => '2013'
      );
      $data['grad_year_select'] = $this->input->post('grad_year');

      // Attributes for TAMU App
      $data['app_tamu'] = array(
        ''    => '',
        'yes'   => 'Yes',
        'no'    => 'No'
      );
      $data['app_tamu_select'] = $this->input->post('app_tamu');

      // Attributes for Test Scores
      $data['sat_act'] = array(
        'name'  => 'sat_act',
        'id'    => 'sat_act',
        'value' => ''
      );


      /**** End Freshment Fieldset ****/

      /**** Start Transfer Fieldset ****/

      // Attributes for Transfer Fieldset
      $data['transfer_field'] = array(
        'id'    => 'transfer_field',
        'class' => 'span-10 last'
      );

      // Attributes for Current Institution
      $data['curr_inst'] = array(
        'name'  => 'curr_inst',
        'id'    => 'curr_inst',
        'value' => ''
      );

      // Attributes for Current Major
      $data['curr_maj'] = array(
        'name'  => 'curr_maj',
        'id'    => 'curr_maj',
        'value' => ''
      );

      /**** End Transfer Fieldset ****/

      /**** Start Textarea responses ****/

      // Attributes for music background
      $data['music_background'] = array(
        'name'  => 'music_background',
        'id'    => 'music_background',
        'class' => 'app-form-text',
        'value' => ''
      );

      // Attributes for music interest
      $data['music_interest'] = array(
        'name'  => 'music_interest',
        'id'    => 'music_interest',
        'class' => 'app-form-text',
        'value' => ''
      );

      // Attributes for music goals
      $data['music_goals'] = array(
        'name'  => 'music_goals',
        'id'    => 'music_goals',
        'class' => 'app-form-text',
        'value' => ''
      );

      // Attributes for awards and honors
      $data['awards_honors'] = array(
        'name'  => 'awards_honors',
        'id'    => 'awards_honors',
        'class' => 'app-form-text',
        'value' => ''
      );

      /**** End Textarea responses ****/

      // Attributes for correct info checkbox
      $data['correct_info'] = array(
        'name'  => 'correct_info',
        'id'    => 'correct_info',
        'value' => 'correct_info'
      );

      if (isset($edit_info)){

        /*
         * This next section gets the Interested Areas from the database
         * and re-populates the checkboxes
         */
        $inst_areas_db = $edit_info['inst_areas'];
        // Get array keys for inst_areas
        $inst_area_choices = array_keys($data['inst_areas']);

        $area_intersect = array_intersect_key($inst_areas_db, $inst_area_choices);
        $area_diff = array_diff($inst_area_choices, $inst_areas_db);

        foreach ($area_intersect as $key) {
          // code...
          $data['inst_areas'][$key]['checked'] = 'checked';
        }

        // Now repopulate the Ensemble checkboxes
        $ensembles_db = $edit_info['ensembles'];
        $ensembles_choices = array_keys($data['ensembles']);

        $ensembles_intersect = array_intersect_key($ensembles_db, $ensembles_choices);
        $ensembles_diff = array_diff($ensembles_choices, $ensembles_db);

        foreach ($ensembles_intersect as $key) {
          $data['ensembles'][$key]['checked'] = 'checked';
        }

        // Set up array Perf_aud to repopulate from POST or DB
        $data['perf_aud_select'] = $edit_info['perf_aud'];

        $data['grad_month_select'] = $edit_info['grad_month'];

        $data['grad_year_select'] = $edit_info['grad_year'];

        $data['app_tamu_select'] = $edit_info['app_tamu'];

        $data['int_minor']['value'] = $edit_info['int_minor'];

        $data['curr_gpa']['value'] = $edit_info['curr_gpa'];

        $data['high_school']['value'] = $edit_info['high_school'];

        $data['sat_act']['value'] = $edit_info['sat_act'];

        $data['curr_inst']['value'] = $edit_info['curr_inst'];

        $data['curr_maj']['value'] = $edit_info['curr_maj'];

        $data['music_background']['value'] = $edit_info['music_background'];

        $data['music_interest']['value'] = $edit_info['music_interest'];

        $data['music_goals']['value'] = $edit_info['music_goals'];

        $data['awards_honors']['value'] = $edit_info['awards_honors'];
      }

      return $data;

    }

    function apply_edit_data()
    {
      $user = $this->ion_auth->get_user();
      $id = $user->id;

      global $edit_info;
      $edit_info = $this->App_model->get_user_app($id);
      
      
      return $edit_info;


    }

    /*
     * The show_app() method retrieves the application from the database
     * and presents it to the user.
     */
    function show_app()
    {
        // $this->output->enable_profiler(TRUE);

        $user = $this->ion_auth->get_user();
        $id = $user->id;

        // $this->App_model->get_app($id);
        
        $data['app'] = $this->App_model->get_user_app($id);

        if(!isset ($data['app']))
        {
            $data['err_msg'] = 'There was an error in retrieving your application';
        }
        
        // Attributes for Interested Areas Fieldset
        $data['inst_areas_field'] = array(
            'id'    => 'inst_areas',
            'name'  => 'inst_areas',
            'class' => 'span-5'
        );
        
        // Attributes for Ensembles Fieldset
        $data['ensembles_field'] = array(
            'id'    => 'ensembles',
            'name'  => 'ensembles',
            'class' => 'span-5'
        );


        $data['main_content'] = 'apply/view_view';
        $this->load->view('includes/template', $data);
    }

    function rec_request()
    {
      
      // Retrieve existing recommendation records from database if exists
      //
      // Send data to view
      //
      
    }
    
    }
    function rec_request_submit()
    {
      // Get information from recommendation request form
      //
      // Create temporary password
      //
      // Check to see if user exists based on email address
      //
      // Create new user in database
      //
      // Create recommendation record and mark incomplete
      //
      // Build email
      //
      // Send email
    }

}
