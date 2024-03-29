<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends MY_Controller {

    protected $lang;

    public function __construct() {

        parent::__construct();
        $user_session = $this->session->userdata('user');
        $this->data['user_session'] = $user_session;
        if (empty($user_session)) {
            redirect(admin_url('authenticate/login'));
        }
        $this->data['header_title'] = $this->configs['page_title'] .' - ' .'Users';
    }

    public function index() {
        $this->data['breadcrumbs'][] = array('title' => 'Users');
        if (!$this->permission()) {
            $this->load('admin_layout', 'admincp/permission');
            return;
        }
        $this->data['success'] = $this->session->flashdata('success');
        $this->load->model('user_model', 'user');
        $this->data['users'] = $this->user->getUsers();
        $this->load('admin_layout', 'admincp/user/index');
    }

    public function delete() {
        $this->load->model('user_model', 'user');
        $flag = true;
        $ids = $this->input->get('ids');
        $error = array();
        if (!$this->hasPermission('modify')) {
            $this->session->set_flashdata('error', 'You don\'t permission for this action');
            redirect(admin_url('user'));
        }

        $idList = explode(',', $ids);
        foreach ($idList as $id) {
            $this->user->delete($id);
        }
        $this->session->set_flashdata('success', 'Delete user success');
        redirect(admin_url('user'));
    }

    public function update($id = 0) {
        $this->data['breadcrumbs'][] = array('link' => admin_url('user'), 'title' => 'Users');
        $this->data['breadcrumbs'][] = array('title' => 'Update');
        if (!$this->permission()) {
            $this->load('admin_layout', 'admincp/permission');
            return;
        }
        $this->load->model('user_model', 'user');

        $user = $this->user->getUserById($id);
        if (empty($user) && !empty($id)) {
            redirect(admin_url('user/update'));
        }
        $roles = $this->role->getRoles();
        $this->data['user'] = $user;
        $this->data['roles'] = $roles;
        $posts = $this->input->post();
        if ($posts) {
            $this->data['user'] = $posts;
            $user = $posts;
            $error = $this->validate($user, $id);
            $this->data['error'] = $error;
            if (empty($error)) {
                unset($user['confirmPassword']);
                
                $avatar = $_FILES['avatar'];
                if (!empty($avatar['tmp_name'])) {
                    $avtName = $user['username'] . '.' . $avatar['name'];
                    $destination = PUBLICPATH . 'images/avatars/' . $avtName;
                    if (@move_uploaded_file($avatar['tmp_name'], $destination)) {
                        $user['avatar'] = $avtName;
                    }
                }
                if (empty($id)) {
                    $user['password'] = md5($user['password']);
                    $user_id = $this->user->insert($user);
                    redirect(admin_url('user'));
                    $this->session->set_flashdata('success', 'Add user success');
                } else {
                    if (strlen($posts['password']) == 0) {
                        unset($user['password']);
                    }else{
                        $user['password'] = md5($user['password']);
                    }
                    
                    $this->user->update($id, $user);
                    $this->session->set_flashdata('success', 'Update user success');
                    redirect(admin_url('user'));
                }
            }
        }
        $this->load('admin_layout', 'admincp/user/update');
    }

    private function validate($user, $id = 0) {
        $posts = $this->input->post();

        $flag = true;
        $error = array();
        if (!$this->hasPermission('modify')) {
            $error['permission'] = 'You don\'t permission for this action';
            $flag = false;
        }



        $file = $_FILES['avatar'];
        if (!empty($file['tmp_name']))
            if (!is_image($file['tmp_name'])) {
                $error['avatar'] = 'Please upload image';
            }

        $regex = '/^[-a-zA-Z0-9._]+$/';
        if (strlen($user['username']) <= 3 || strlen($posts['username']) > 25) {
            $error['username'] = 'Username min 2 alpha character. Max 25 alpha characters. Allow \'_\' and \'.\'';
            $flag = false;
        }
        $dataUserCheck = array(
            'username' => $user['username']
        );
        if (!empty($id)) {
            $dataUserCheck['username !='] = $user['username'];
        }
        $checkUser = $this->user->totalUsers($dataUserCheck);
        if ($checkUser > 0) {
            $error['username'] = 'Username arealdy exists';
            $flag = false;
        }

        $regex = '/^[-a-zA-Z0-9&\'._ ]+$/';
        if (strlen($user['firstname']) < 2 || strlen($user['firstname']) > 20) {
            $error['firstname'] = 'Please enter your first name';
        }

        if (!preg_match($regex, $user['firstname'])) {
            $error['firstname'] = 'Min 2 alpha character. Max 20 alpha characters. Allow \'-\', " \' ", \'_\' and \'.\'';
        }

        if (strlen($user['lastname']) < 2 || strlen($user['lastname']) > 20) {
            $error['lastname'] = 'Please enter your last name';
        }

        if (!preg_match($regex, $user['lastname'])) {
            $error['lastname'] = 'Min 2 alpha character. Max 20 alpha characters. Allow \'-\', " \' ", \'_\' and \'.\'';
        }

        if (!valid_email($posts['email'])) {
            $error['email'] = 'Email do not match';
            $flag = false;
        }



        if (empty($id) || (!empty($id) && strlen($user['password']) > 0)) {
            if (empty($user['password']) || strlen($user['password']) < 7) {
                $error['password'] = 'Minimum of 7 characters.';
            }

            if ($user['password'] != $user['confirmPassword']) {
                $error['confirmPassword'] = 'Passwords do not match. Please re-enter your password';
            }
        }

        return $error;
    }

    public function active($id = 0) {
        $this->user->update($id, array('status' => 1));
    }

    public function deactive($id = 0) {
        $this->user->update($id, array('status' => 0));
    }

}