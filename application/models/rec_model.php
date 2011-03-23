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
  function get_user_rec($id)
    {
        $q = $this->db->get_where('recommendations', array('user_id' => $id));

        if ($q->num_rows() > 0)
        {
            // The returned field 'serial_app' is serialized. To use the data,
            // we must unserialize it.
            $serialized = $q->row_array();
            $rec = unserialize($serialized['serial_rec']);

            return $rec;
        }
        else
        {
            return FALSE;
        }
    }
 
}
