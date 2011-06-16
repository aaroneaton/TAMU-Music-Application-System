<?php
/*
* Administrative functions and such
*/

class Admin extends CI_Controller
{
  function __construct()
  {
    parent::__construct();

    // Checks to see if the user is an admin
    if (!$this->ion_auth->is_admin()){
      redirect('/auth/login');
    }

  }

  function index()
  {
    $data['main_content'] = 'admin/admin_home_view';
    $this->load->view('includes/template', $data);
  }
}
