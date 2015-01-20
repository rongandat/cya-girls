<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Page extends MY_Controller {

    protected $lang;

    public function __construct() {

        parent::__construct();
        $user_session = $this->session->userdata('user');
        $this->data['user_session'] = $user_session;
        if (empty($user_session)) {
            redirect(admin_url('authenticate/login'));
        }
        $this->data['header_title'] = $this->configs['page_title'] . ' - ' . 'Page';
    }

    public function index() {
        $this->data['breadcrumbs'][] = array('title' => 'Users');
        if (!$this->permission()) {
            $this->load('admin_layout', 'admincp/permission');
            return;
        }
        $this->data['success'] = $this->session->flashdata('success');
        $this->load->model('information_model', 'information');
        $this->data['informations'] = $this->information->listInformations();
        $this->load('admin_layout', 'admincp/page/index');
    }

    public function delete() {
        $this->load->model('information_model', 'information');
        $flag = true;
        $ids = $this->input->get('ids');
        $error = array();
        if (!$this->hasPermission('modify')) {
            $this->session->set_flashdata('error', 'You don\'t permission for this action');
            redirect(admin_url('page'));
        }

        $idList = explode(',', $ids);
        foreach ($idList as $id) {
            $this->information->delete(array('id' => $id));
        }
        $this->session->set_flashdata('success', 'Delete page success');
        redirect(admin_url('page'));
    }

    public function update($id = 0) {
        $this->data['breadcrumbs'][] = array('link' => admin_url('user'), 'title' => 'Location');
        $this->data['breadcrumbs'][] = array('title' => 'Update');
        if (!$this->permission()) {
            $this->load('admin_layout', 'admincp/permission');
            return;
        }
        $this->load->model('information_model', 'information');

        $information = $this->information->getInformation(array('id' => $id));
        if (empty($information) && !empty($id)) {
            redirect(admin_url('page/update'));
        }
        $this->data['information'] = $information;
        $posts = $this->input->post();
        if ($posts) {
            $this->data['information'] = $posts;
            $user = $posts;
            $error = $this->validate($posts, $id);
            $this->data['error'] = $error;
            if (empty($error)) {
                $information = $posts;
                $information['footer_display'] = !empty($posts['footer_display']) ? 1 : 0;
                if (empty($id)) {
                    $information_id = $this->information->insert($information);
                    redirect(admin_url('informations'));
                    $this->session->set_flashdata('success', 'Add information success');
                } else {
                    $this->information->update($information, $id);
                    $this->session->set_flashdata('success', 'Update information success');
                    redirect(admin_url('page'));
                }
            }
        }
        $this->load('admin_layout', 'admincp/page/update');
    }

    private function validate($information, $id = 0) {
        $posts = $this->input->post();

        $flag = true;
        $error = array();
        if (!$this->hasPermission('modify')) {
            $error['permission'] = 'You dont permission modify';
            $flag = false;
        }

        if (empty($information['title'])) {
            $error['title'] = 'Please enter title';
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