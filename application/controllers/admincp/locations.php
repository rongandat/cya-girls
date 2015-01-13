<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Locations extends MY_Controller {

    protected $lang;

    public function __construct() {

        parent::__construct();
        $user_session = $this->session->userdata('user');
        $this->data['user_session'] = $user_session;
        if (empty($user_session)) {
            redirect(admin_url('authenticate/login'));
        }
        $this->data['header_title'] = $this->configs['page_title'] . ' - ' . 'Locations';
    }

    public function index() {
        $this->data['breadcrumbs'][] = array('title' => 'Users');
        if (!$this->permission()) {
            $this->load('admin_layout', 'admincp/permission');
            return;
        }
        $this->data['success'] = $this->session->flashdata('success');
        $this->load->model('location_model', 'location');
        $this->data['locations'] = $this->location->listLocations();
        $this->load('admin_layout', 'admincp/locations/index');
    }

    public function delete() {
        $this->load->model('location_model', 'location');
        $flag = true;
        $ids = $this->input->get('ids');
        $error = array();
        if (!$this->hasPermission('modify')) {
            $this->session->set_flashdata('error', 'You don\'t permission for this action');
            redirect(admin_url('locations'));
        }

        $idList = explode(',', $ids);
        foreach ($idList as $id) {
            if ($this->location->delete(array('id' => $id))) {
                $this->location->deleteOptionValue(array('location_id' => $id));
            }
        }
        $this->session->set_flashdata('success', 'Delete user success');
        redirect(admin_url('locations'));
    }

    public function update($id = 0) {
        $this->data['breadcrumbs'][] = array('link' => admin_url('user'), 'title' => 'Location');
        $this->data['breadcrumbs'][] = array('title' => 'Update');
        if (!$this->permission()) {
            $this->load('admin_layout', 'admincp/permission');
            return;
        }
        $this->load->model('location_model', 'location');

        $location = $this->location->getLocationById($id);
        if (empty($location) && !empty($id)) {
            redirect(admin_url('locations/update'));
        }
        $this->data['location'] = $location;
        $posts = $this->input->post();
        if ($posts) {
            $this->data['location'] = $posts;
            $user = $posts;
            $error = $this->validate($posts, $id);
            $this->data['error'] = $error;
            if (empty($error)) {
                $location = $posts;
                if (empty($id)) {
                    $location_id = $this->location->insert($location);
                    redirect(admin_url('locations'));
                    $this->session->set_flashdata('success', 'Add location success');
                } else {
                    $this->location->update($location, $id);
                    $this->session->set_flashdata('success', 'Update location success');
                    redirect(admin_url('locations'));
                }
            }
        }
        $this->load('admin_layout', 'admincp/locations/update');
    }

    private function validate($location, $id = 0) {
        $posts = $this->input->post();

        $flag = true;
        $error = array();
        if (!$this->hasPermission('modify')) {
            $error['permission'] = 'You dont permission modify';
            $flag = false;
        }



        if (empty($location['name'])) {
            $error['name'] = 'Please enter location name';
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