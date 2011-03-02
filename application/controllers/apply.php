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


        $data['main_content'] = 'apply/create_form_view';
        $this->load->view('includes/template', $data);
    }

}