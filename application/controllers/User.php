<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_inUser();
        $this->load->model('User_model');
        $this->load->library('form_validation');
        $this->load->helper('download');
    }

    public function debug()
    {
        $data = 'Here is some text!';
        $name = 'mytext.txt';
        echo $data . $name;
    }

    public function debugcheck()
    {
    }

    public function index()
    {
        $data['user'] = $this->User_model->getDataUser($this->session->userdata('email'));
        $this->load->view('templates/user/header', $data);
        $this->load->view('templates/user/sidebar', $data);
        $this->load->view('user/dashboard', $data);
        $this->load->view('templates/user/footer');
    }

    public function profile()
    {
        $data['user'] = $this->User_model->getDataUser($this->session->userdata('email'));
        $data['abstract'] = $this->User_model->getAbstract($this->session->userdata('id'));
        $data['countries'] = $this->User_model->getCountries();
        $data['absfprp'] = $this->User_model->getAbsFpRp($this->session->userdata('id'));
        $this->load->view('templates/user/header', $data);
        $this->load->view('templates/user/sidebar', $data);
        $this->load->view('user/profile', $data);
        $this->load->view('templates/user/footer');
    }

    public function editProfile()
    {
        $data['user'] = $this->User_model->getDataUser($this->session->userdata('email'));
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required');

        if ($this->form_validation->run() == false) {
            redirect('user/profile');
        } else {
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['upload_path']      = './upload/image/';
                $config['allowed_types']    = 'gif|jpg|png|jpeg';
                $config['max_size']         = '10000';
                $config['file_name']        = 'user-' . $data['user']['id'] . '-profile';
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . '/upload/image/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $this->User_model->editUser();
            redirect('user/profile');
        }
    }

    public function abstract()
    {
        $data['user'] = $this->User_model->getDataUser($this->session->userdata('email'));
        $this->load->view('templates/user/header', $data);
        $this->load->view('templates/user/sidebar', $data);
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('author', 'All Authors', 'trim|required');
        $this->form_validation->set_rules('institution', 'Institution', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('content', 'Content of Abstract', 'trim|required');
        $this->form_validation->set_rules('keyword', 'Keyword', 'trim|required');
        $this->form_validation->set_rules('topic', 'Topic', 'trim|required');
        $this->form_validation->set_rules('presenter', 'Presenter', 'trim|required');
        $this->form_validation->set_rules('type', 'Abstract Type', 'trim|required');

        if ($this->form_validation->run() == false) {
            $this->load->view('user/abstract', $data);
        } else {
            $this->User_model->addAbstract();
            $this->session->set_flashdata('message', '<div id="toast-container-relative" class="toast-top-right">
            <div class="toast-custom toast-success" aria-live="polite" style="display: block;">
            <div class="toast-message">Your abstract has been added.</div></div></div>');
            $this->load->view('user/abstract', $data);
        }
    }

    public function getEditAbstract()
    {
        echo json_encode($this->User_model->getEditAbstract($this->input->post('id')));
    }

    public function editAbstract()
    {
        $this->User_model->editAbstract();
        redirect('user/profile');
    }

    public function addFullPaper()
    {
        $data['user'] = $this->User_model->getDataUser($this->session->userdata('email'));
        $data['fullpaper'] = $this->User_model->getFullPaper($this->input->post('abs_id'));

        $config['upload_path']      = './upload/fullpaper/';
        $config['allowed_types']    = 'doc|docx';
        $config['max_size']         = 10000;
        $config['file_name']        = 'ABS-' . $this->input->post('abs_id') . '_full_paper';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('fp_file')) {
            $error = array('error' => $this->upload->display_errors());
            die;
            redirect('user/profile');
        } else {
            $new_fullpaper = $this->upload->data('file_name');
            $this->User_model->addFullPaper($new_fullpaper);
            redirect('user/profile');
        }
    }

    public function downloadFp($data)
    {
        $path = 'upload/fullpaper/';
        $file = $data;

        return force_download($path . $file, null);
    }
}
