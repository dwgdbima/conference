<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Admin_model');
        $this->load->model('User_active_model');
        $this->load->model('User_new_model');
        $this->load->model('Abstract_model');
        $this->load->model('Abstract_new_model');
        is_logged_inAdmin();
    }

    public function debug()
    {
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => dataEmail(),
            'smtp_pass' => dataPassword(),
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from(dataEmail(), 'Admin Icemine');
        $this->email->to('dewagedebima@gmail.com');
        $this->email->subject('test');
        $this->email->message('test');
        $this->email->send();
    }

    public function index()
    {
        $this->load->view('templates/admin/header');
        $this->load->view('templates/admin/sidebar');
        $this->load->view('admin/dashboard');
        $this->load->view('templates/admin/footer');
    }

    public function userActive()
    {
        $this->load->view('templates/admin/header');
        $this->load->view('templates/admin/sidebar');
        $this->load->view('admin/user_active');
        $this->load->view('templates/admin/footer');
    }

    public function userNew()
    {
        $this->load->view('templates/admin/header');
        $this->load->view('templates/admin/sidebar');
        $this->load->view('admin/user_new');
        $this->load->view('templates/admin/footer');
    }

    public function userAccept()
    {
        echo $_POST['id'];
        $this->Admin_model->userAccept($this->input->post('id'));
    }

    public function userDecline()
    {
        echo $_POST['id'];
        $this->Admin_model->userDecline($this->input->post('id'));
    }

    function get_data_user_active()
    {
        $list = $this->User_active_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $row = array();
            $row[] = '<img src="' . base_url("assets/") . 'dist/img/avatar5.png" class="img-circle-table" alt="">' . $field->salutation . ' ' . $field->first_name . ' ' . $field->last_name;
            $row[] = $field->institution;
            $row[] = $field->country;
            $row[] = $field->email;
            $row[] = $field->participation == 'Presenter' ? '<span class="badge bg-success">Presenter</span>' :
                '<span class="badge bg-primary">Non-Presenter</span>';
            $row[] = '<a href="#">Detail</a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->User_active_model->count_all(),
            "recordsFiltered" => $this->User_active_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    function get_data_user_new()
    {
        $list = $this->User_new_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $row = array();
            $row[] = '<img src="' . base_url("assets/") . 'dist/img/avatar5.png" class="img-circle-table" alt="">' . $field->salutation . ' ' . $field->first_name . ' ' . $field->last_name;
            $row[] = $field->institution;
            $row[] = $field->country;
            $row[] = $field->email;
            $row[] = $field->participation == 'Presenter' ? '<span class="badge bg-success">Presenter</span>' :
                '<span class="badge bg-primary">Non-Presenter</span>';
            $row[] = '
            <a href="#" data-role="accept" data-id="' . $field->id . '" data-toggle="modal" data-target="#modal-accept" class="badge bg-success">Accept</a>
            <a href="#" data-role="decline" data-id="' . $field->id . '" data-toggle="modal" data-target="#modal-decline" class="badge bg-danger">Decline</a>
            <a href="#" class="badge bg-primary">Detail</a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->User_new_model->count_all(),
            "recordsFiltered" => $this->User_new_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    function abstracts()
    {
        $this->load->view('templates/admin/header');
        $this->load->view('templates/admin/sidebar');
        $this->load->view('admin/abstract');
        $this->load->view('templates/admin/footer');
    }

    function newAbstracts()
    {
        $this->load->view('templates/admin/header');
        $this->load->view('templates/admin/sidebar');
        $this->load->view('admin/abstract_new');
        $this->load->view('templates/admin/footer');
    }

    function get_data_abstract()
    {
        $list = $this->Abstract_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $row = array();
            $row[] = 'ABS-' . $field->id;
            $row[] = $field->title;
            $row[] = $field->type;
            $row[] = $field->payment == 0 ? '<span class="badge bg-warning">Not Confirm</span>' :
                '<span class="badge bg-success">Confirm</span>';
            $row[] = '<a href="#">Edit</a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Abstract_model->count_all(),
            "recordsFiltered" => $this->Abstract_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    function get_data_abstract_new()
    {
        $list = $this->Abstract_new_model->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $field) {
            $row = array();
            $row[] = 'ABS-' . $field->id;
            $row[] = $field->title;
            $row[] = $field->type;
            $row[] = $field->payment == 0 ? '<span class="badge bg-warning">Not Confirm</span>' :
                '<span class="badge bg-success">Confirm</span>';
            $row[] = '
            <a href="#" data-role="accept" data-id="' . $field->id . '" data-toggle="modal" data-target="#modal-accept" class="badge bg-success">Accept</a>
            <a href="#" data-role="decline" data-id="' . $field->id . '" data-toggle="modal" data-target="#modal-decline" class="badge bg-danger">Decline</a>
            <a href="#" class="badge bg-primary">Detail</a>';

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->Abstract_new_model->count_all(),
            "recordsFiltered" => $this->Abstract_new_model->count_filtered(),
            "data" => $data,
        );
        //output dalam format JSON
        echo json_encode($output);
    }

    public function reviewers()
    {
        $data['reviewers'] = $this->Admin_model->getReviewer();
        $this->load->view('templates/admin/header');
        $this->load->view('templates/admin/sidebar');
        $this->load->view('admin/reviewers', $data);
        $this->load->view('templates/admin/footer');
    }

    public function addReviewer()
    {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $password = array();
        $alpha_length = strlen($alphabet) - 1;
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alpha_length);
            $password[] = $alphabet[$n];
        }
        $randpassword = implode($password);

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');

        if ($this->form_validation->run() == false) {
            redirect('admin/reviewers');
        } else {
            $this->Admin_model->addReviewer($randpassword);
            $config = [
                'protocol'  => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_user' => dataEmail(),
                'smtp_pass' => dataPassword(),
                'smtp_port' => 465,
                'mailtype'  => 'html',
                'charset'   => 'utf-8',
                'newline'   => "\r\n"
            ];

            $this->load->library('email', $config);
            $this->email->initialize($config);

            $this->email->from(dataEmail(), 'Admin Icemine');
            $this->email->to($this->input->post('email'));
            $this->email->subject('Reviewer');
            $this->email->message('Login to reviewers page: localhost/icemine-upn/admin/login
            <br> username: ' . $this->input->post('email') . '<br> Password: ' . $randpassword);
            $this->email->send();
            redirect('admin/reviewers');
        }
    }
}
