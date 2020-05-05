<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Auth_model');
        $this->load->library('form_validation');
    }

    public function debug()
    {
        $this->load->view('debug');
    }

    public function debugcheck()
    {
        echo json_encode($this->Auth_model->checkEmail($this->input->post('email')));
        // $this->Auth_model->checkEmail();
    }

    public function adminLogin()
    {
        log_in();
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['class'] = 'login-page';
            $data['title'] = 'Ice Mine | Admin Login';
            $this->load->view('templates/admin/auth_header', $data);
            $this->load->view('admin/login');
            $this->load->view('templates/admin/auth_footer');
        } else {
            // validasinya success
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->db->get_where('admin', ['email' => $email])->row_array();

            // jika usernya ada
            if ($user) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                    ];
                    $this->session->set_userdata($data);
                    redirect('admin');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <i class="icon fas fa-ban"></i> Incorrect password!
                    </div>');
                    redirect('admin/login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="icon fas fa-ban"></i> user could not be found!
                </div>');
                redirect('admin/login');
            }
        }
    }

    public function userLogin()
    {
        log_in();
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['class'] = 'login-page';
            $data['title'] = 'Ice Mine | User Login';
            $this->load->view('templates/user/auth_header', $data);
            $this->load->view('user/login');
            $this->load->view('templates/user/auth_footer');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $user = $this->db->get_where('user', ['email' => $email])->row_array();

            // jika usernya ada
            if ($user) {
                // jika usernya aktif
                if ($user['is_active'] == 1) {
                    // cek password
                    if (password_verify($password, $user['password'])) {
                        $data = [
                            'email' => $user['email'],
                            'id' => $user['id']
                        ];
                        $this->session->set_userdata($data);
                        redirect('user');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <i class="icon fas fa-ban"></i> Incorrect password!
                        </div>');
                        redirect('user/login');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <i class="icon fas fa-ban"></i> This email has not been activated!
                    </div>');
                    redirect('user/login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="icon fas fa-ban"></i> user could not be found!
                </div>');
                redirect('user/login');
            }
        }
    }

    public function reviewerLogin()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['class'] = 'login-page';
            $data['title'] = 'Ice Mine | User Login';
            $this->load->view('templates/reviewer/auth_header', $data);
            $this->load->view('reviewer/login');
            $this->load->view('templates/reviewer/auth_footer');
        } else {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $reviewer = $this->db->get_where('reviewers', ['email' => $email])->row_array();

            if ($reviewer) {
                if ($reviewer['active'] == 1) {
                    if (password_verify($password, $reviewer['password'])) {
                        $data = [
                            'email' => $reviewer['email'],
                            'id' => $reviewer['id']
                        ];
                        $this->session->set_userdata($data);
                        redirect('reviewer');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <i class="icon fas fa-ban"></i> Incorrect password!
                        </div>');
                        redirect('reviewer/login');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <i class="icon fas fa-ban"></i> This email has not been activated!
                    </div>');
                    redirect('reviewer/login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="icon fas fa-ban"></i> user could not be found!
                </div>');
                redirect('reviewer/login');
            }
        }
    }

    public function userRegistration()
    {
        log_in();
        $this->form_validation->set_rules('first_name', 'First name', 'trim|required');
        $this->form_validation->set_rules('last_name', 'Last name', 'trim|required');
        $this->form_validation->set_rules('birth', 'Date of birth', 'trim|required');
        $this->form_validation->set_rules('salutation', 'Salutation', 'trim|required');
        $this->form_validation->set_rules('institution', 'Institution', 'trim|required');
        $this->form_validation->set_rules('research', 'Research', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]', [
            'is_unique' => 'This email has already registered'
        ]);
        $this->form_validation->set_rules('email2', 'Email Confirmation', 'trim|required|matches[email]');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('password2', 'Password Confirmation', 'trim|required|matches[password]');
        $this->form_validation->set_rules('phone', 'Phone', 'trim|required|numeric');
        $this->form_validation->set_rules('street', 'Street', 'trim|required');
        $this->form_validation->set_rules('city', 'City', 'trim|required');
        $this->form_validation->set_rules('zip_code', 'Zip Code', 'trim|required|numeric');
        $this->form_validation->set_rules('country', 'Country', 'trim|required');
        $this->form_validation->set_rules('terms', 'Terms', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['class'] = 'register-page';
            $data['title'] = 'Ice Mine | User Registration';
            $this->load->view('templates/user/auth_header', $data);
            $this->load->view('user/registration');
            $this->load->view('templates/user/auth_footer');
        } else {
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $this->input->post('email'),
                'token' => $token,
                'date_created' => time()
            ];
            $this->Auth_model->inputUserRegistration();
            $this->db->insert('user_token', $user_token);
            $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('message', '<div id="toast-container-relative" class="toast-top-right">
                <div class="toast-custom toast-success" aria-live="polite" style="display: block;">
                    <div class="toast-message">
                        Your account has been made, please verify it by clicking the activation link that has been send to your email.
                    </div>
                </div>
            </div>');
            redirect('user/login');
        }
    }

    public function emailExist()
    {
        echo json_encode($this->Auth_model->checkEmail($this->input->post('email')));
    }

    public function phoneExist()
    {
        echo json_encode($this->Auth_model->phoneExist($this->input->post('phone')));
    }

    private function _sendEmail($token, $type)
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
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Account Verification');
            $this->email->message('Click this link to verify you account : <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate</a>');
        } else if ($type == 'forgot') {
            $this->email->subject('Reset Password');
            $this->email->message('Click this link to reset your password : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->db->set('confirm', 1);
                    $this->db->where('email', $email);
                    $this->db->update('user');

                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <i class="icon fas fa-check"></i> ' . $email . ' has been verified. Please wait for your account activation by admin.
                    </div>');
                    redirect('user/login');
                } else {
                    $this->db->delete('user', ['email' => $email]);
                    $this->db->delete('user_token', ['email' => $email]);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <i class="icon fas fa-ban"></i> Account activation failed! Token expired.
                    </div>');
                    redirect('user/login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="icon fas fa-ban"></i> Account activation failed! Wrong token.
                </div>');
                redirect('user/login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="icon fas fa-ban"></i> Account activation failed! Wrong email.
            </div>');
            redirect('user/login');
        }
    }

    public function forgotPassword()
    {
        log_in();
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');

        if ($this->form_validation->run() == false) {
            $data['class'] = 'login-page';
            $data['title'] = 'Ice Mine | Forgot Password';
            $this->load->view('templates/user/auth_header', $data);
            $this->load->view('user/forgot_password');
            $this->load->view('templates/user/auth_footer');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token, 'forgot');

                $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="icon fas fa-check"></i> Please check your email to reset your password.
                </div>');
                redirect('user/forgot_password');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="icon fas fa-ban"></i> Email is not registered or activated!
                </div>');
                redirect('user/forgot_password');
            }
        }
    }


    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="icon fas fa-ban"></i> Reset password failed! Wrong token.
                </div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="icon fas fa-ban"></i> Reset password failed! Wrong email.
            </div>');
            redirect('auth');
        }
    }

    public function changePassword()
    {
        log_in();
        if (!$this->session->userdata('reset_email')) {
            redirect('user/login');
        }

        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|matches[password]');

        if ($this->form_validation->run() == false) {
            $data['class'] = 'login-page';
            $data['title'] = 'Ice Mine | Change Password';
            $this->load->view('templates/user/auth_header', $data);
            $this->load->view('user/change_password');
            $this->load->view('templates/user/auth_footer');
        } else {
            $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->unset_userdata('reset_email');

            $this->db->delete('user_token', ['email' => $email]);

            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="icon fas fa-check"></i> Password has been changed.
            </div>');
            redirect('user/login');
        }
    }

    public function logOut()
    {
        $data = $this->session->userdata('email');
        $admin = $this->db->get_where('admin', ['email' => $data]);
        $user = $this->db->get_where('user', ['email' => $data]);
        $reviewer = $this->db->get_where('reviewers', ['email' => $data]);
        if ($admin->num_rows() > 0) {
            $this->session->unset_userdata('email');
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="icon fas fa-check"></i> You have been logged out.
            </div>');
            redirect('admin/login');
        } elseif ($user->num_rows() > 0) {
            $this->session->unset_userdata('email');
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="icon fas fa-check"></i> You have been logged out.
            </div>');
            redirect('user/login');
        } elseif ($reviewer->num_rows() > 0) {
            $this->session->unset_userdata('email');
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="icon fas fa-check"></i> You have been logged out.
            </div>');
            redirect('reviewer/login');
        }
    }
}
