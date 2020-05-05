<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reviewer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        is_logged_inReviewer();
        $this->load->model('Auth_model');
        $this->load->library('form_validation');
    }

    public function debug()
    {
    }

    public function index()
    {
        $this->load->view('templates/reviewer/header');
        $this->load->view('templates/reviewer/sidebar');
        $this->load->view('reviewer/dashboard');
        $this->load->view('templates/reviewer/footer');
    }

    public function review()
    {
        $this->load->view('templates/reviewer/header');
        $this->load->view('templates/reviewer/sidebar');
        $this->load->view('reviewer/review');
        $this->load->view('templates/reviewer/footer');
    }

    public function review_result()
    {
        $this->load->view('templates/reviewer/header');
        $this->load->view('templates/reviewer/sidebar');
        $this->load->view('reviewer/review_result');
        $this->load->view('templates/reviewer/footer');
    }
}
