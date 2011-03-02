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

        if($this->form_validation->run() == FALSE)
        {
            // Attributes for Current GPA
            $data['curr_gpa'] = array(
                'name'      => 'curr_gpa',
                'id'        => 'curr_gpa',
                'value'     => set_value('curr_gpa'),
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