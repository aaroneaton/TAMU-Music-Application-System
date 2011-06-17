<?php

class App_model extends CI_Model {

    function create($post)
    {
        $this->db->insert('applications', $post);
        return;
    }

    // This method looks up an application based on the user's id
    function get_user_app($id)
    {
        $q = $this->db->get_where('applications', array('user_id' => $id));

        if ($q->num_rows() > 0)
        {
            // The returned field 'serial_app' is serialized. To use the data,
            // we must unserialize it.
            $serialized = $q->row_array();
            $app = unserialize($serialized['serial_app']);

            return $app;
        }
        else
        {
            return FALSE;
        }
    }

    function check_user_app($id)
    {
      $q = $this->db->get_where('applications', array('user_id' => $id));

      if ($q->num_rows() > 0)
      {
        return TRUE;
      }
    }

    // We need to count the number of recommendations the user has and display it.
    function count_user_recs($id)
    {
      $this->db->where('app_id', $id);
      $this->db->from('recommendations');
      $q = $this->db->count_all_results();

      return $q;

    }

}
