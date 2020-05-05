<?php

class Admin_model extends CI_model
{
    public function userActiveModel()
    {
        $active = '1';
        $query = $this->db->get_where('user', array('is_active' => $active));
        return $query->result_array();
    }

    public function userAccept($data)
    {
        $this->db->set('is_active', 1);
        $this->db->where('id', $data);
        $this->db->update('user');
    }

    public function userDecline($data)
    {
        $this->db->where('id', $data);
        $this->db->delete('user');
    }

    public function addReviewer($password)
    {
        $data = [
            'email' => htmlspecialchars($this->input->post('email'), true),
            'name' => htmlspecialchars($this->input->post('name'), true),
            'date_created' => date('Y-m-d H:i:s'),
            'active' => 1,
            'password' => password_hash($password, PASSWORD_DEFAULT)

        ];

        $this->db->insert('reviewers', $data);
    }

    public function getReviewer()
    {
        $this->db->get('reviewers')->result_array();
    }
}
