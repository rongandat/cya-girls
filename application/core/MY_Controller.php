<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    protected $auth;
    protected $admin;
    public $data;
    protected $permission;
    protected $configs;
    public $ignore = array(
        'authenticate', 'welcome', 'errorpermission'
    );

    public function __construct() {
        parent::__construct();
        $this->data['controller'] = $this->router->fetch_class();
        $this->data['action'] = $this->router->fetch_method();
        $user_session = $this->session->userdata('user');
        $this->data['user_session'] = $user_session;
        $this->load->library('Mobiledetect');
        $this->load->model('role_model', 'role');
        $this->load->model('configs_model');
        $this->load->model('girls_model', 'girl');
        $this->load->model('option_model', 'option');
        $this->load->model('location_model', 'location');
        $this->load->model('image_model', 'image');
        $this->load->model('tag_model', 'tag');
        $this->load->model('girl_option_value_model', 'option_value');
        $this->configs = $this->configs_model->getConfigs();
        $this->data['configs'] = $this->configs;
        
        $this->data['header_title'] = '';
        $this->data['breadcrumbs'] = array();
    }

    function load($tpl_view, $body_view = null) {
        $this->load->library('Mobiledetect');
        if (!is_null($body_view)) {
            if ($this->mobiledetect->isMobile() && file_exists(APPPATH . 'views/mobile/' . $body_view)) { // mobile
                $body_view_path = 'mobile/' . $body_view;
            } elseif ($this->mobiledetect->isMobile() && file_exists(APPPATH . 'views/mobile/' . $body_view . '.php')) { // mobile
                $body_view_path = 'mobile/' . $body_view . '.php';
            } elseif (file_exists(APPPATH . 'views/' . $tpl_view . '/' . $body_view)) {
                $body_view_path = $tpl_view . '/' . $body_view;
            } else if (file_exists(APPPATH . 'views/' . $tpl_view . '/' . $body_view . '.php')) {
                $body_view_path = $tpl_view . '/' . $body_view . '.php';
            } else if (file_exists(APPPATH . 'views/' . $body_view)) {
                $body_view_path = $body_view;
            } else if (file_exists(APPPATH . 'views/' . $body_view . '.php')) {
                $body_view_path = $body_view . '.php';
            } else {
                show_error('Unable to load the requested file: ' . $tpl_name . '/' . $view_name . '.php');
            }
            $data = $this->data;
            $body = $this->load->view($body_view_path, $data, TRUE);
            if (is_null($data)) {
                $data = array('body' => $body);
            } else if (is_array($data)) {
                $data['body'] = $body;
            } else if (is_object($data)) {
                $data->body = $body;
            }
        }
        $this->load->view('templates/' . $tpl_view, $data);
    }

    public function permission() {
        if (!in_array($this->router->fetch_class(), $this->ignore) && !$this->hasPermission('access', $this->router->fetch_class())) {
            return false;
        }
        return true;
    }

    public function hasPermission($permission) {
        
        $this->load->model('role_model', 'role');
        $user_session = $this->session->userdata('user');
        $permissions = $this->role->getUserRole($user_session['role']);
        
        $permission_list = ($permissions['permission']);

        if (is_array($permission_list)) {
            foreach ($permission_list as $key => $value) {
                $this->permission[$key] = $value;
            }
        }
        if (isset($this->permission[$permission])) {
            return in_array($this->router->fetch_class(), $this->permission[$permission]);
        } else {
            return false;
        }
    }

}