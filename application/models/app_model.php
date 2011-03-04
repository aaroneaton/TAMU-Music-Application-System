<?php

class App_model extends CI_Model {

    function create($post)
    {
        $this->db->insert('applications', $post);
        return;
    }

}