<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Links extends MY_Controller {

    protected $lang;

    public function __construct() {

        parent::__construct();
        $user_session = $this->session->userdata('user');
        $this->data['user_session'] = $user_session;
        if (empty($user_session)) {
            redirect(admin_url('authenticate/login'));
        }
        $this->data['header_title'] = $this->configs['page_title'] . ' - ' . 'Links';
    }

    public function index() {
        $this->data['breadcrumbs'][] = array('title' => 'Users');
        if (!$this->permission()) {
            $this->load('admin_layout', 'admincp/permission');
            return;
        }
        $this->data['success'] = $this->session->flashdata('success');
        $this->load->model('link_model', 'link');
        $this->data['links'] = $this->link->listLinks();
        $this->load('admin_layout', 'admincp/links/index');
    }

    public function delete() {
        $this->load->model('link_model', 'link');
        $flag = true;
        $ids = $this->input->get('ids');
        $error = array();
        if (!$this->hasPermission('modify')) {
            $this->session->set_flashdata('error', 'You don\'t permission for this action');
            redirect(admin_url('links'));
        }

        $idList = explode(',', $ids);
        foreach ($idList as $id) {
            if ($this->link->delete(array('id' => $id))) {
                $this->link->deleteOptionValue(array('link_id' => $id));
            }
        }
        $this->session->set_flashdata('success', 'Delete user success');
        redirect(admin_url('links'));
    }

    public function update($id = 0) {
        $this->data['breadcrumbs'][] = array('link' => admin_url('user'), 'title' => 'Location');
        $this->data['breadcrumbs'][] = array('title' => 'Update');
        if (!$this->permission()) {
            $this->load('admin_layout', 'admincp/permission');
            return;
        }
        $this->load->model('link_model', 'link');

        $link = $this->link->getLinkById($id);
        if (empty($link) && !empty($id)) {
            redirect(admin_url('links/update'));
        }
        $this->data['link'] = $link;
        $posts = $this->input->post();
        if ($posts) {
            $this->data['link'] = $posts;
            $user = $posts;
            $error = $this->validate($posts, $id);
            $this->data['error'] = $error;
            if (empty($error)) {
                
                $link = $posts;
                $imageLink = $_FILES['image'];
                if (!empty($imageLink['tmp_name'])) {
                    $linkName = time() . '.' . $imageLink['name'];
                    $destination = PUBLICPATH . 'images/links/' . $linkName;
                    if (@move_uploaded_file($imageLink['tmp_name'], $destination)) {
                        $link['image'] = $linkName;
                    }
                }
                if(!empty($link['status']))
                    $link['status'] = 1;
                if (empty($id)) {
                    $link_id = $this->link->insert($link);
                    redirect(admin_url('links'));
                    $this->session->set_flashdata('success', 'Add link success');
                } else {
                    $this->link->update($link, $id);
                    $this->session->set_flashdata('success', 'Update link success');
                    redirect(admin_url('links'));
                }
            }
        }
        $this->load('admin_layout', 'admincp/links/update');
    }

    private function validate($link, $id = 0) {
        $posts = $this->input->post();

        $flag = true;
        $error = array();
        if (!$this->hasPermission('modify')) {
            $error['permission'] = 'You dont permission modify';
            $flag = false;
        }



        if (empty($link['name'])) {
            $error['name'] = 'Please enter link name';
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