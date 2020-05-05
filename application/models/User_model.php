<?php

class User_model extends CI_model
{
    public function getCountries()
    {
        return $this->db->get('apps_countries')->result_array();
    }

    public function getDataUser($data)
    {
        return $this->db->get_where('user', ['email' => $data])->row_array();
    }

    public function editUser()
    {
        $data = [
            'first_name' => htmlspecialchars($this->input->post('first_name', true)),
            'last_name' => htmlspecialchars($this->input->post('last_name', true)),
            'phone' => htmlspecialchars($this->input->post('phone', true)),
            'salutation' => htmlspecialchars($this->input->post('salutation', true)),
            'institution' => htmlspecialchars($this->input->post('institution', true)),
            'research' => htmlspecialchars($this->input->post('research', true)),
            'fax' => htmlspecialchars($this->input->post('fax', true)),
            'gender' => htmlspecialchars($this->input->post('gender', true)),
            'birth' => $this->input->post('birth'),
            'street' => htmlspecialchars($this->input->post('street', true)),
            'city' => htmlspecialchars($this->input->post('city', true)),
            'zip_code' => htmlspecialchars($this->input->post('zip_code', true)),
            'country' => htmlspecialchars($this->input->post('country', true)),
            'info' => htmlspecialchars($this->input->post('info', true))
        ];

        $this->db->set($data);
        $this->db->where('id', $this->session->userdata('id'));
        $this->db->update('user');
    }

    public function getAbstract($data)
    {
        return $this->db->get_where('abstract', ['id_user' => $data])->result_array();
    }

    public function getEditAbstract($data)
    {
        return $this->db->get_where('abstract', ['id' => $data])->row_array();
    }

    public function editAbstract()
    {
        $data = [
            'title' => htmlspecialchars($this->input->post('title', true)),
            'author' => htmlspecialchars($this->input->post('author', true)),
            'institution' => htmlspecialchars($this->input->post('institution', true)),
            'email' => htmlspecialchars($this->input->post('email')),
            'content' => htmlspecialchars($this->input->post('content'), true),
            'keyword' => htmlspecialchars($this->input->post('keyword', true)),
            'topic' => htmlspecialchars($this->input->post('topic', true)),
            'presenter' => htmlspecialchars($this->input->post('presenter', true)),
            'type' => htmlspecialchars($this->input->post('type', true)),
            'info' => htmlspecialchars($this->input->post('info', true)),
            'last_update' => date('Y-m-d H:i:s')
        ];
        $this->db->set($data);
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('abstract');
    }

    public function addAbstract()
    {
        $data = [
            'title' => htmlspecialchars($this->input->post('title', true)),
            'author' => htmlspecialchars($this->input->post('author', true)),
            'institution' => htmlspecialchars($this->input->post('institution', true)),
            'email' => htmlspecialchars($this->input->post('email')),
            'content' => htmlspecialchars($this->input->post('content'), true),
            'keyword' => htmlspecialchars($this->input->post('keyword', true)),
            'topic' => htmlspecialchars($this->input->post('topic', true)),
            'presenter' => htmlspecialchars($this->input->post('presenter', true)),
            'type' => htmlspecialchars($this->input->post('type', true)),
            'info' => htmlspecialchars($this->input->post('info', true)),
            'id_user' => htmlspecialchars($this->session->userdata('id')),
            'date_created' => date('Y-m-d H:i:s'),
            'last_update' => date('Y-m-d H:i:s'),
            'payment' => 0,
            'status' => 0
        ];
        $this->db->insert('abstract', $data);
    }

    public function getFullPaper($data)
    {
        return $this->db->get_where('paper', ['abs_id' => $data])->row_array();
    }

    public function addFullPaper($file)
    {
        $data = [
            'date' => date('Y-m-d H-i-s'),
            'file' => $file,
            'user_id' => $this->input->post('user_id'),
            'abs_id' => $this->input->post('abs_id'),
            'info' => $this->input->post('info')
        ];
        $this->db->insert('paper', $data);
    }

    public function getAbsFpRp($id)
    {
        $this->db->select('abs.*, fp.id as fp_id, fp.file as fp_file, fp.info as fp_info, 
        rp.id as rp_id, rp.file as rp_file, rp.info as rp_info');
        $this->db->from('abstract abs');
        $this->db->join('paper fp', 'fp.abs_id = abs.id', 'left');
        $this->db->join('revised_paper rp', 'rp.abs_id = abs.id', 'left');
        $this->db->where('id_user', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
}
