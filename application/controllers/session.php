<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Session extends MY_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() {
        parent::__construct();
        $this->data['no_sidebar'] = true;
        $this->load->model('user_model', 'user');
    }

    public function login() {
        $this->data['header_title'] = 'Login or create new account';


        $posts = $this->input->post();
        if ($posts) {

            if (strlen(trim($posts['username'])) == 0 || strlen(trim($posts['password'])) == 0) {
                $error = 'Incorrect username or password';
            }

            if (empty($error)) {
                $user = $this->user->getUserByUsernameAndPassword($posts['username'], $posts['password']);
                if (!empty($user)) {
                    $user_session['id'] = $user->id;
                    $user_session['username'] = $user->username;
                    $user_session['role'] = $user->role;
                    $user_session['firstname'] = $user->firstname;
                    $user_session['lastname'] = $user->lastname;
                    $user_session['mobile'] = $user->mobile;
                    $user_session['phone'] = $user->phone;
                    $user_session['email'] = $user->email;
                    $user_session['avatar'] = $user->avatar;
                    $this->session->set_userdata(array('auth' => $user_session));
                    redirect(site_url(''));
                } else {
                    $error = 'Incorrect username or password';
                }
            }
            $this->data['error'] = $error;
        }
        $this->load('front_layout', 'session/login');
    }

    public function register() {
        $this->data['header_title'] = 'Register';
        $posts = $this->input->post();
        $this->data['post'] = $posts;
        if ($posts) {
            $errors = $this->validate();
            $this->data['errors'] = $errors;
            if (empty($errors)) {
                $user = $posts;
                unset($user['repassword']);
                unset($user['agree']);

                $avatar = $_FILES['avatar'];
                if (!empty($avatar['tmp_name'])) {
                    $avtName = $user['username'] . '.' . $avatar['name'];
                    $destination = PUBLICPATH . 'images/avatars/' . $avtName;
                    if (@move_uploaded_file($avatar['tmp_name'], $destination)) {
                        $user['avatar'] = $avtName;
                    }
                }
                $user['password'] = md5($user['password']);
                $user_id = $this->user->insert($user);
                redirect(site_url('session/login'));
            }
        }

        $this->load('front_layout', 'session/register');
    }

    private function validate() {
        $posts = $this->input->post();

        $flag = true;
        $error = array();

        $file = $_FILES['avatar'];
        if (!empty($file['tmp_name']))
            if (!is_image($file['tmp_name'])) {
                $error['avatar'] = 'Please upload image';
            }

        $regex = '/^[-a-zA-Z0-9._]+$/';
        if (strlen($posts['username']) <= 3 || strlen($posts['username']) > 25 || !preg_match($regex, $posts['username'])) {
            $error['username'] = 'Username min 2 alpha character. Max 25 alpha characters. Allow \'_\' and \'.\'';
            $flag = false;
        }
        $dataUserCheck = array(
            'username' => $posts['username']
        );
        if (!empty($id)) {
            $dataUserCheck['username !='] = $posts['username'];
        }
        $checkUser = $this->user->totalUsers($dataUserCheck);
        if ($checkUser > 0) {
            $error['username'] = 'Username arealdy exists';
            $flag = false;
        }

        $regex = '/^[-a-zA-Z0-9&\'._ ]+$/';
        if (strlen($posts['firstname']) < 2 || strlen($posts['firstname']) > 20) {
            $error['firstname'] = 'Please enter your first name';
        }

        if (!preg_match($regex, $posts['firstname'])) {
            $error['firstname'] = 'Min 2 alpha character. Max 20 alpha characters. Allow \'-\', " \' ", \'_\' and \'.\'';
        }

        if (strlen($posts['lastname']) < 2 || strlen($posts['lastname']) > 20) {
            $error['lastname'] = 'Please enter your last name';
        }

        if (!preg_match($regex, $posts['lastname'])) {
            $error['lastname'] = 'Min 2 alpha character. Max 20 alpha characters. Allow \'-\', " \' ", \'_\' and \'.\'';
        }

        if (!valid_email($posts['email'])) {
            $error['email'] = 'Email do not match';
            $flag = false;
        }


        if (empty($posts['password']) || strlen($posts['password']) < 7) {
            $error['password'] = 'Minimum of 7 characters.';
        }

        if ($posts['password'] != $posts['repassword']) {
            $error['repassword'] = 'Passwords do not match. Please re-enter your password';
        }
        if (empty($posts['agree'])) {
            $error['agree'] = 'You havent yet accept our Terms & Conditions';
        }

        return $error;
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect(site_url('session/login'));
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */