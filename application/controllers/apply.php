<?php


class Apply extends CI_Controller {

    function  __construct() {
        parent::__construct();
        
        // Load the App_model
            $this->load->model('App_model');
    }

    function index()
    {
        $data['main_content'] = 'apply_view';
        $this->load->view('includes/template', $data);
    }

    /*
     * This method loads the first page of the application process.
     * 
     * On this page will be a video showing how to use the application system
     * along with instructions.
     */
    function create_app()
    {
        $data['main_content'] = 'apply/create_view';
        $this->load->view('includes/template', $data);
    }

    /*
     * The create_form() method in it's current state loads, validates, and
     * passes application info to the method.
     *
     * This method will later be expanded in to many methods to guide the
     * applicant step-by-step through the process.
     */
    function create_form()
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

        if($this->form_validation->run() == FALSE)
        {

            $user = $this->ion_auth->get_user();
            $data['id'] = $user->id;

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
                'maxlength' => '3'
            );


            // Attributes for Interested Areas
            $data['inst_areas'] = array(
                'composition'   => array(
                        'name'      => 'inst_areas[]',
                        'id'        => 'inst_areas',
                        'value'     => 'composition'
                ),
                'musc_hist'      => array(
                        'name'      => 'inst_areas[]',
                        'id'        => 'inst_areas',
                        'value'     => 'musc_hist'
                ),
                'musc_theo'      => array(
                        'name'      => 'inst_areas[]',
                        'id'        => 'inst_areas',
                        'value'     => 'musc_theo'
                ),
                'ethno_musc'      => array(
                        'name'      => 'inst_areas[]',
                        'id'        => 'inst_areas',
                        'value'     => 'ethno_musc'
                ),
                'musc_tech'      => array(
                        'name'      => 'inst_areas[]',
                        'id'        => 'inst_areas',
                        'value'     => 'musc_tech'
                ),
                'musc_perf'      => array(
                        'name'      => 'inst_areas[]',
                        'id'        => 'inst_areas',
                        'value'     => 'musc_perf'
                ),
            );

            // Attributes for Ensembles
            $data['ensembles'] = array(
                'brazos_chorale'   => array(
                        'name'      => 'ensembles[]',
                        'id'        => 'ensembles',
                        'value'     => 'brazos_chorale'
                ),
                'cent_singers'      => array(
                        'name'      => 'ensembles[]',
                        'id'        => 'ensembles',
                        'value'     => 'cent_singers'
                ),
                'singing_cadets'      => array(
                        'name'      => 'ensembles[]',
                        'id'        => 'ensembles',
                        'value'     => 'singing_cadets'
                ),
                'womens_chorus'      => array(
                        'name'      => 'ensembles[]',
                        'id'        => 'ensembles',
                        'value'     => 'womens_chorus'
                ),
                'bvso'      => array(
                        'name'      => 'ensembles[]',
                        'id'        => 'ensembles',
                        'value'     => 'bvso'
                ),
                'aggie_band'      => array(
                        'name'      => 'ensembles[]',
                        'id'        => 'ensembles',
                        'value'     => 'aggie_band'
                ),
                'concert_band'      => array(
                        'name'      => 'ensembles[]',
                        'id'        => 'ensembles',
                        'value'     => 'concert_band'
                ),
                'symph_band'      => array(
                        'name'      => 'ensembles[]',
                        'id'        => 'ensembles',
                        'value'     => 'symph_band'
                ),
                'wind_symph'      => array(
                        'name'      => 'ensembles[]',
                        'id'        => 'ensembles',
                        'value'     => 'wind_symph'
                ),
                'jazz_band'      => array(
                        'name'      => 'ensembles[]',
                        'id'        => 'ensembles',
                        'value'     => 'jazz_band'
                ),
                'small_ens'      => array(
                        'name'      => 'ensembles[]',
                        'id'        => 'ensembles',
                        'value'     => 'small_ens'
                ),
            );

            // Attributes for Intended Minor
            $data['int_minor'] = array(
                'name'  => 'int_minor',
                'id'    => 'int_minor',
            );

            // Attributes for Audition
            // These are just test items. Will reference a database in future
            // @todo - Pull options from database
            $data['perf_aud'] = array(
                'mar'   => 'March 2011',
                'may'   => 'May 2011',
                'aug'   => 'August 2011'
            );

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
                'id'    => 'high_school'
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

            // Attributes for Graduation Year
            $data['grad_year'] = array(
                ''  => '',
                '2011'  => '2011',
                '2012'  => '2012',
                '2013'  => '2013'
            );

            // Attributes for TAMU App
            $data['app_tamu'] = array(
                ''    => '',
                'yes'   => 'Yes',
                'no'    => 'No'
            );

            // Attributes for Test Scores
            $data['sat_act'] = array(
                'name'  => 'sat_act',
                'id'    => 'sat_act'
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
                'id'    => 'curr_inst'
            );

            // Attributes for Current Major
            $data['curr_maj'] = array(
                'name'  => 'curr_maj',
                'id'    => 'curr_maj'
            );

            /**** End Transfer Fieldset ****/

            /**** Start Textarea responses ****/

            // Attributes for music background
            $data['music_background'] = array(
                'name'  => 'music_background',
                'id'    => 'music_background',
                'class' => 'app-form-text',
            );

            // Attributes for music interest
            $data['music_interest'] = array(
                'name'  => 'music_interest',
                'id'    => 'music_interest',
                'class' => 'app-form-text',
            );

            // Attributes for music goals
            $data['music_goals'] = array(
                'name'  => 'music_goals',
                'id'    => 'music_goals',
                'class' => 'app-form-text',
            );

            // Attributes for awards and honors
            $data['awards_honors'] = array(
                'name'  => 'awards_honors',
                'id'    => 'awards_honors',
                'class' => 'app-form-text',
            );

            /**** End Textarea responses ****/

            // Attributes for correct info checkbox
            $data['correct_info'] = array(
                'name'  => 'correct_info',
                'id'    => 'correct_info',
                'value' => 'correct_info'
            );

            $data['main_content'] = 'apply/create_form_view';
            $this->load->view('includes/template', $data);
        }
        else
        {
            // Get the array of info submitted from the form and
            // serialize it.
            $post = array(
                'user_id'    => $this->input->post('id'),
                'serial_app'    => serialize($_POST)
            );
            
            // Now send the serialized array to the model to create the record
            $this->App_model->create($post);
            // @todo - Create 'success' or 'fail' messages and pass to view

            $data['main_content'] = 'apply/create_success_view';
            $this->load->view('includes/template', $data);
        }
    }

    /*
     * The view_app() method retrieves the application from the database
     * and presents it to the user.
     */
    function view()
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

}
