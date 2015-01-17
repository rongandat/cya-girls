<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Webcamps extends MY_Controller {

    protected $lang;

    public function __construct() {

        parent::__construct();
        $user_session = $this->session->userdata('user');
        $this->data['user_session'] = $user_session;
        if (empty($user_session)) {
            redirect(admin_url('authenticate/login'));
        }
        $this->data['header_title'] = $this->configs['page_title'] . ' - ' . 'Webcamps';
    }

    public function index() {
        $this->data['breadcrumbs'][] = array('title' => 'Users');
        if (!$this->permission()) {
            $this->load('admin_layout', 'admincp/permission');
            return;
        }
        $this->data['success'] = $this->session->flashdata('success');
        $this->load->model('webcamp_model', 'webcamp');
        $this->data['webcamps'] = $this->webcamp->listWebcamps();
        $this->load('admin_layout', 'admincp/webcamps/index');
    }

    public function delete() {
        $this->load->model('webcamp_model', 'webcamp');
        $flag = true;
        $ids = $this->input->get('ids');
        $error = array();
        if (!$this->hasPermission('modify')) {
            $this->session->set_flashdata('error', 'You don\'t permission for this action');
            redirect(admin_url('webcamps'));
        }

        $idList = explode(',', $ids);
        foreach ($idList as $id) {
            $this->webcamp->delete(array('id' => $id));
        }
        $this->session->set_flashdata('success', 'Delete user success');
        redirect(admin_url('webcamps'));
    }

    public function update($id = 0) {
        $this->data['breadcrumbs'][] = array('link' => admin_url('user'), 'title' => 'Location');
        $this->data['breadcrumbs'][] = array('title' => 'Update');
        if (!$this->permission()) {
            $this->load('admin_layout', 'admincp/permission');
            return;
        }
        $this->load->model('webcamp_model', 'webcamp');

        $webcamp = $this->webcamp->getWebcampById($id);
        if (empty($webcamp) && !empty($id)) {
            redirect(admin_url('webcamps/update'));
        }
        $this->data['webcamp'] = $webcamp;
        $posts = $this->input->post();
        if ($posts) {
            $this->data['webcamp'] = $posts;
            $user = $posts;
            $error = $this->validate($posts, $id);
            $this->data['error'] = $error;
            if (empty($error)) {
                $webcamp = $posts;
                if(!empty($webcamp['status']))
                    $webcamp['status'] = 1;
                if (empty($id)) {
                    $webcamp_id = $this->webcamp->insert($webcamp);
                    redirect(admin_url('webcamps'));
                    $this->session->set_flashdata('success', 'Add webcamp success');
                } else {
                    $this->webcamp->update($webcamp, $id);
                    $this->session->set_flashdata('success', 'Update webcamp success');
                    redirect(admin_url('webcamps'));
                }
            }
        }
        $this->load('admin_layout', 'admincp/webcamps/update');
    }

    private function validate($webcamp, $id = 0) {
        $posts = $this->input->post();

        $flag = true;
        $error = array();
        if (!$this->hasPermission('modify')) {
            $error['permission'] = 'You dont permission modify';
            $flag = false;
        }



        if (empty($webcamp['name'])) {
            $error['name'] = 'Please enter webcamp name';
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