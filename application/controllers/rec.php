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
    $user = $this->ion_auth->get_user();
    $data['id'] = $user->id;

    $data['main_content'] = 'rec/rec_start';
    $this->load->view('includes/template', $data);
  }
}
