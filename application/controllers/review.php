<?php
/*
* All reviewer methods are contained in this controller
*/

class Review extends CI_Controller
{
  function __construct()
  {
    parent::__construct();

    // Checks to see if the user is a reviewer.
    if (!$this->ion_auth->is_group('reviewers')){
      redirect('/auth/login');
    }
  }

  function index()
  {
    $data['main_content'] = 'review/review_home_view';
    $this->load->view('includes/template', $data);
  }
}
