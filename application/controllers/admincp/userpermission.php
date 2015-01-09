<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Userpermission extends MY_Controller {

    public function __construct() {
        
        parent::__construct();
        $user_session = $this->session->userdata('user');
        $this->data['user_session'] = $user_session;
        if (empty($user_session)) {
            redirect(admin_url('authenticate/login'));
        }
        $this->data['header_title'] = $this->configs['page_title'] .' - ' .'User Groups';
    }

    public function index() {
        $this->data['breadcrumbs'][] = array('title' => 'User groups');
        if (!$this->permission()) {
            $this->load('admin_layout', 'admincp/permission');
            return;
        }
        $this->data['success'] = $this->session->flashdata('success');
        $this->data['roles'] = $this->role->getRoles();
        $this->load('admin_layout', 'admincp/userpermission/index');
    }

    public function delete() {
        $flag = true;
        $ids = $this->input->get('ids');
        $error = array();
        if (!$this->hasPermission('modify')) {
            $this->session->set_flashdata('error', 'You don\'t permission for this action');
            redirect(admin_url('userpermission'));
        }

        $idList = explode(',', $ids);
        foreach ($idList as $id) {
            $this->role->delete($id);
        }
        $this->session->set_flashdata('success', 'Delete user group success');
        redirect(admin_url('userpermission'));
    }

    public function update($id = 0) {
        $this->data['breadcrumbs'][] = array('link' => admin_url('userpermission'), 'title' => 'User groups');
        $this->data['breadcrumbs'][] = array('title' => 'Update');
        if (!$this->permission()) {
            $this->load('admin_layout', 'admincp/permission');
            return;
        }
        $user_group_info = array();
        if (!empty($id)) {
            $user_group_info = $this->role->getUserRole($id);
        }
        $files = glob(APPPATH . 'controllers/admincp/*.php');
        $checkbox_access_input = array();
        $checkbox_modify_input = array();

        $textbox_input = array(
            'name' => 'name',
            'class' => 'st-forminput',
            'value' => !empty($user_group_info['name']) ? $user_group_info['name'] : ''
        );

        $access = !empty($user_group_info['permission']['access']) ? $user_group_info['permission']['access'] : array();
        $modify = !empty($user_group_info['permission']['modify']) ? $user_group_info['permission']['modify'] : array();
        $this->data['files'] = $files;
        $this->data['access'] = $access;
        $this->data['user_group_info'] = $user_group_info;
        $this->data['modify'] = $modify;
        $this->data['ignore'] = $this->ignore;
        $posts = $this->input->post();
        if ($posts) {
            $error = $this->validate($posts);
            $this->data['error'] = $error;
            if (empty($error)) {
                $data_post['name'] = $posts['name'];
                $data_post['permission'] = serialize($posts['permission']);

                if (!empty($user_group_info)) {
                    $this->role->update($id, $data_post);
                    $this->session->set_flashdata('success', 'Update user group success');
                    redirect(admin_url('userpermission'));
                } else {
                    $id = $this->role->insert($data_post);
                    $this->session->set_flashdata('success', 'Add user group success');
                    redirect(admin_url('userpermission'));
                }
            }
        }

        $this->load('admin_layout', 'admincp/userpermission/update');
    }

    private function validate($post, $id = 0) {
        $posts = $this->input->post();

        $flag = true;
        $error = array();
        if (!$this->hasPermission('modify')) {
            $error['permission'] = 'You dont permission modify';
        }

        if (empty($post['name'])) {
            $error['name'] = 'Plese input group name';
        }

        return $error;
    }

}
