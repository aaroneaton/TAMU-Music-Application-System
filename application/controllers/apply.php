<?php


class Apply extends CI_Controller {

    function index()
    {
        $data['main_content'] = 'apply_view';
        $this->load->view('includes/template', $data);
    }

    function create_app()
    {
        $data['main_content'] = 'apply/create_view';
        $this->load->view('includes/template', $data);
    }

}