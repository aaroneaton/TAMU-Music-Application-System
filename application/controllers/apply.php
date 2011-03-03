<?php


class Apply extends CI_Controller {

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
        $this->form_validation->set_rules('perf_aud', 'error', '');

        if($this->form_validation->run() == FALSE)
        {

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
                '--'    => '--',
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
                '----'  => '----',
                '2011'  => '2011',
                '2012'  => '2012',
                '2013'  => '2013'
            );

            // Attributes for TAMU App
            $data['app_tamu'] = array(
                '--'    => '--',
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

            $data['main_content'] = 'apply/create_form_view';
            $this->load->view('includes/template', $data);
        }
        else
        {
            $data['main_content'] = 'apply/create_success_view';
            $this->load->view('includes/template', $data);
        }
    }

}