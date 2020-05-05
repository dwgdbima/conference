<?php

class Auth_model extends CI_model
{
    public function checkEmail($key)
    {
        $this->db->where('email', $key);
        $query = $this->db->get('user');
        if ($query->num_rows() == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function phoneExist($key)
    {
        $this->db->where('phone', $key);
        $query = $this->db->get('user');
        if ($query->num_rows() == 0) {
            return true;
        } else {
            return false;
        }
    }

    public function inputUserRegistration()
    {
        $email = $this->input->post('email', true);
        $data = [
            'first_name' => htmlspecialchars($this->input->post('first_name', true)),
            'last_name' => htmlspecialchars($this->input->post('last_name', true)),
            'email' => htmlspecialchars($email),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'phone' => htmlspecialchars($this->input->post('phone', true)),
            'salutation' => htmlspecialchars($this->input->post('salutation', true)),
            'participation' => htmlspecialchars($this->input->post('participation', true)),
            'institution' => htmlspecialchars($this->input->post('institution', true)),
            'research' => htmlspecialchars($this->input->post('research', true)),
            'fax' => htmlspecialchars($this->input->post('fax', true)),
            'gender' => htmlspecialchars($this->input->post('gender', true)),
            'birth' => $this->input->post('birth'),
            'street' => htmlspecialchars($this->input->post('street', true)),
            'city' => htmlspecialchars($this->input->post('city', true)),
            'zip_code' => htmlspecialchars($this->input->post('zip_code', true)),
            'country' => htmlspecialchars($this->input->post('country', true)),
            'image' => 'default.jpg',
            'info' => htmlspecialchars($this->input->post('info', true)),
            'date_created' => date('Y-m-d H:i:s'),
            'is_active' => 0,
            'confirm' => 0
        ];
        $this->db->insert('user', $data);
    }
}
