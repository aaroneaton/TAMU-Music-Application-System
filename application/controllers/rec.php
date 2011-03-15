<?php
/*
* This is the controller for all functions related to the Recommendation feature.
*/

class Rec extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
  }
  
  function new_rec()
  {
    $this->form_validation->set_rules('field name','human name', 'rules');
    if($this->form_validation_run() == FALSE)
    {
      $data['main_content'] = 'rec/rec_start';
      $this->load->view('includes/template', $data);
    }
    else
    {
      $data['main_content'] = 'rec/rec_success';
      $this->load->view('includes/template', $data);
    }
  }
}
