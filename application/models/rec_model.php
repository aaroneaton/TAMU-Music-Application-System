<?php
/*
* This model communicates with the recommendations table of the database.
*/

class Rec_model extends CI_Model
{
  function __construct()
  {
    parent::__construct();
  }

  function create($post)
  {
    $this->db->insert('recommendations', $post);
    return;
  }
}
