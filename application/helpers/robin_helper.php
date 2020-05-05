<?php

function is_logged_inAdmin()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('user/login');
    } else {
        $data = $ci->session->userdata('email');
        $admin = $ci->db->get_where('admin', ['email' => $data]);
        $user = $ci->db->get_where('user', ['email' => $data]);
        $reviewer = $ci->db->get_where('reviewers', ['email' => $data]);
        if ($admin->num_rows() < 1) {
            if ($user->num_rows() < 1) {
                redirect('user/login');
            } elseif ($reviewer->num_rows() < 1) {
                redirect('reviewer/login');
            } elseif ($user->num_rows() > 0) {
                redirect('user');
            } elseif ($reviewer->num_rows() > 0) {
                redirect('reviewer');
            }
        }
    }
}

function is_logged_inUser()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('user/login');
    } else {
        $data = $ci->session->userdata('email');
        $admin = $ci->db->get_where('admin', ['email' => $data]);
        $user = $ci->db->get_where('user', ['email' => $data]);
        $reviewer = $ci->db->get_where('reviewers', ['email' => $data]);
        if ($user->num_rows() < 1) {
            if ($admin->num_rows() < 1) {
                redirect('admin/login');
            } elseif ($reviewer->num_rows() < 1) {
                redirect('reviewer/login');
            } elseif ($admin->num_rows() > 0) {
                redirect('admin');
            } elseif ($reviewer->num_rows() > 0) {
                redirect('reviewer');
            }
        }
    }
}

function is_logged_inReviewer()
{
    $ci = get_instance();
    if (!$ci->session->userdata('email')) {
        redirect('user/login');
    } else {
        $data = $ci->session->userdata('email');
        $admin = $ci->db->get_where('admin', ['email' => $data]);
        $user = $ci->db->get_where('user', ['email' => $data]);
        $reviewer = $ci->db->get_where('reviewers', ['email' => $data]);
        if ($reviewer->num_rows() < 1) {
            if ($admin->num_rows() < 1) {
                redirect('admin/login');
            } elseif ($user->num_rows() < 1) {
                redirect('user/login');
            } elseif ($admin->num_rows() > 0) {
                redirect('admin');
            } elseif ($user->num_rows() > 0) {
                redirect('user');
            }
        }
    }
}

function log_in()
{
    $ci = get_instance();
    if ($ci->session->userdata('email')) {
        $data = $ci->session->userdata('email');
        $admin = $ci->db->get_where('admin', ['email' => $data]);
        $user = $ci->db->get_where('user', ['email' => $data]);
        $reviewer = $ci->db->get_where('reviewers', ['email' => $data]);
        if ($admin->num_rows() === 1) {
            redirect('admin');
        } elseif ($user->num_rows() === 1) {
            redirect('user');
        } elseif ($reviewer->num_rows() === 1) {
            redirect('reviewer');
        }
    }
}
