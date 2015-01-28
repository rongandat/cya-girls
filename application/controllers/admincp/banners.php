<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Banners extends MY_Controller {

    protected $lang;

    public function __construct() {

        parent::__construct();
        $user_session = $this->session->userdata('user');
        $this->data['user_session'] = $user_session;
        if (empty($user_session)) {
            redirect(admin_url('authenticate/login'));
        }
        $this->data['header_title'] = $this->configs['page_title'] . ' - ' . 'Banners';
    }

    public function index() {
        $this->data['breadcrumbs'][] = array('title' => 'Users');
        if (!$this->permission()) {
            $this->load('admin_layout', 'admincp/permission');
            return;
        }
        $this->data['success'] = $this->session->flashdata('success');
        $this->load->model('banner_model', 'banner');
        $this->data['banners'] = $this->banner->listBanners();
        $this->load('admin_layout', 'admincp/banners/index');
    }

    public function delete() {
        $this->load->model('banner_model', 'banner');
        $flag = true;
        $ids = $this->input->get('ids');
        $error = array();
        if (!$this->hasPermission('modify')) {
            $this->session->set_flashdata('error', 'You don\'t permission for this action');
            redirect(admin_url('banners'));
        }

        $idList = explode(',', $ids);
        foreach ($idList as $id) {
            $this->banner->delete(array('id' => $id));
        }
        $this->session->set_flashdata('success', 'Delete user success');
        redirect(admin_url('banners'));
    }

    public function update($id = 0) {
        $this->data['breadcrumbs'][] = array('banner' => admin_url('user'), 'title' => 'Location');
        $this->data['breadcrumbs'][] = array('title' => 'Update');
        if (!$this->permission()) {
            $this->load('admin_layout', 'admincp/permission');
            return;
        }
        $this->load->model('banner_model', 'banner');

        $banner = $this->banner->getBannerById($id);
        if (empty($banner) && !empty($id)) {
            redirect(admin_url('banners/update'));
        }
        $this->data['banner'] = $banner;
        $posts = $this->input->post();
        if ($posts) {
            $this->data['banner'] = $posts;
            $user = $posts;
            $error = $this->validate($posts, $id);
            $this->data['error'] = $error;
            if (empty($error)) {
                
                $banner = $posts;
                $imageBanner = $_FILES['image'];
                if (!empty($imageBanner['tmp_name'])) {
                    $bannerName = time() . '.' . $imageBanner['name'];
                    $destination = PUBLICPATH . 'images/banners/' . $bannerName;
                    if (@move_uploaded_file($imageBanner['tmp_name'], $destination)) {
                        $banner['image'] = $bannerName;
                    }
                }
                if(!empty($banner['status']))
                    $banner['status'] = 1;
                if (empty($id)) {
                    $banner_id = $this->banner->insert($banner);
                    redirect(admin_url('banners'));
                    $this->session->set_flashdata('success', 'Add banner success');
                } else {
                    $this->banner->update($banner, $id);
                    $this->session->set_flashdata('success', 'Update banner success');
                    redirect(admin_url('banners'));
                }
            }
        }
        $this->load('admin_layout', 'admincp/banners/update');
    }

    private function validate($banner, $id = 0) {
        $posts = $this->input->post();

        $flag = true;
        $error = array();
        if (!$this->hasPermission('modify')) {
            $error['permission'] = 'You dont permission modify';
            $flag = false;
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