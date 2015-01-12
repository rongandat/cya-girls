<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Options extends MY_Controller {

    protected $lang;

    public function __construct() {

        parent::__construct();
        $user_session = $this->session->userdata('user');
        $this->data['user_session'] = $user_session;
        if (empty($user_session)) {
            redirect(admin_url('authenticate/login'));
        }
        $this->data['header_title'] = $this->configs['page_title'] . ' - ' . 'Users';
    }

    public function index() {
        $this->data['breadcrumbs'][] = array('title' => 'Users');
        if (!$this->permission()) {
            $this->load('admin_layout', 'admincp/permission');
            return;
        }
        $this->data['success'] = $this->session->flashdata('success');
        $this->load->model('option_model', 'option');
        $this->data['options'] = $this->option->listOptions();
        $this->load('admin_layout', 'admincp/options/index');
    }

    public function delete() {
        $this->load->model('option_model', 'option');
        $flag = true;
        $ids = $this->input->get('ids');
        $error = array();
        if (!$this->hasPermission('modify')) {
            $this->session->set_flashdata('error', 'You don\'t permission for this action');
            redirect(admin_url('options'));
        }

        $idList = explode(',', $ids);
        foreach ($idList as $id) {
            if ($this->option->delete(array('id' => $id))) {
                $this->option->deleteOptionValue(array('option_id' => $id));
            }
        }
        $this->session->set_flashdata('success', 'Delete user success');
        redirect(admin_url('options'));
    }

    public function update($id = 0) {
        $this->data['breadcrumbs'][] = array('link' => admin_url('user'), 'title' => 'Options');
        $this->data['breadcrumbs'][] = array('title' => 'Update');
        if (!$this->permission()) {
            $this->load('admin_layout', 'admincp/permission');
            return;
        }
        $this->load->model('option_model', 'option');

        $option = $this->option->getOptionById($id);
        if (empty($option) && !empty($id)) {
            redirect(admin_url('options/update'));
        }
        $this->data['option'] = $option;
        $posts = $this->input->post();
        if ($posts) {
            $this->data['user'] = $posts;
            $user = $posts;
            $error = $this->validate($user, $id);
            $this->data['error'] = $error;
            if (empty($error)) {
                $option = $posts;
                if (empty($id)) {
                    $option_id = $this->option->insert($option);
                    redirect(admin_url('options'));
                    $this->session->set_flashdata('success', 'Add option success');
                } else {
                    $this->option->update($option, $id);
                    $this->session->set_flashdata('success', 'Update option success');
                    redirect(admin_url('options'));
                }
            }
        }
        $this->load('admin_layout', 'admincp/options/update');
    }

    private function validate($option, $id = 0) {
        $posts = $this->input->post();

        $flag = true;
        $error = array();
        if (!$this->hasPermission('modify')) {
            $error['permission'] = 'You dont permission modify';
            $flag = false;
        }



        if (empty($option['name'])) {
            $error['name'] = 'Please enter option name';
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