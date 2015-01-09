<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Authenticate extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model', 'user');
        $this->load->model('role_model', 'role');
        $lang = $this->lang->language;
        $this->data['user_input'] = $lang;
    }

    public function index() {
        
    }
    
    public function logout(){
        $this->session->sess_destroy();
        redirect(admin_url('authenticate/login'));
    }

    public function login() {
        $posts = $this->input->post();
        if ($posts) {
            if (strlen(trim($posts['username'])) == 0) {
                $error = 'Username is wrong';
            }
            if (strlen(trim($posts['password'])) == 0) {
                $error = 'Username is wrong';
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
                    $this->session->set_userdata(array('user' => $user_session));
                    redirect(admin_url(''));
                } else {
                    $error = 'Username or password is wrong';
                    $this->data['error'] = $error;
                }
            }
        }

        
        $this->load->view('admincp/authenticate/login', $this->data);
    }

}