<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Girls extends MY_Controller {

    protected $lang;

    public function __construct() {

        parent::__construct();
        $user_session = $this->session->userdata('user');
        $this->data['user_session'] = $user_session;
        if (empty($user_session)) {
            redirect(admin_url('authenticate/login'));
        }
        $this->data['header_title'] = $this->configs['page_title'] . ' - ' . 'Girls manager';
    }

    public function index() {
        $this->data['breadcrumbs'][] = array('title' => 'Girls');
        if (!$this->permission()) {
            $this->load('admin_layout', 'admincp/permission');
            return;
        }
        $this->data['success'] = $this->session->flashdata('success');
        $this->load->model('girls_model', 'girl');
        $this->data['girls'] = $this->girl->listGirls();
        $this->load('admin_layout', 'admincp/girls/index');
    }

    public function delete() {
        $this->load->model('girls_model', 'girl');
        $this->load->model('option_model', 'option');
        $this->load->model('location_model', 'location');
        $this->load->model('image_model', 'image');
        $this->load->model('tag_model', 'tag');
        $this->load->model('girl_option_value_model', 'option_value');
        $flag = true;
        $ids = $this->input->get('ids');
        $error = array();
        if (!$this->hasPermission('modify')) {
            $this->session->set_flashdata('error', 'You don\'t permission for this action');
            redirect(admin_url('user'));
        }

        $idList = explode(',', $ids);
        foreach ($idList as $id) {
            if ($this->girl->delete(array('id' => $id))) {
                $this->option->deleteOptionValue(array('girl_id' => $id));
                $this->location->deleteGirlLocations(array('girl_id' => $id));
                $this->tag->deleteUserTags(array('girl_id' => $id));
                $images = $this->image->listImages(array('girl_id' => $id));
                if ($this->image->delete(array('girl_id' => $id))) {
                    foreach ($images as $image) {
                        @unlink(PUBLICPATH . 'images/thumbnail/' . $image['image']);
                        @unlink(PUBLICPATH . 'images/small/' . $image['image']);
                        @unlink(PUBLICPATH . 'images/medium/' . $image['image']);
                        @unlink(PUBLICPATH . 'images/' . $image['image']);
                    }
                }
            }
        }
        $this->session->set_flashdata('success', 'Delete user success');
        redirect(admin_url('user'));
    }

    public function form($id = 0) {
        $this->data['breadcrumbs'][] = array('link' => admin_url('girls'), 'title' => 'Girls');
        $this->data['breadcrumbs'][] = array('title' => 'Update');
        if (!$this->permission()) {
            $this->load('admin_layout', 'admincp/permission');
            return;
        }
        $this->load->model('girls_model', 'girl');
        $this->load->model('option_model', 'option');
        $this->load->model('location_model', 'location');
        $this->load->model('image_model', 'image');
        $this->load->model('tag_model', 'tag');
        $this->load->model('girl_option_value_model', 'option_value');

        $girl = $this->girl->getGirl(array('id' => $id));
        if (!empty($girl['birthday']))
            $girl['birthday'] = date('m/d/Y', strtotime($girl['birthday']));
        if (empty($girl) && !empty($id)) {
            redirect(admin_url('girls/form'));
        }
        $options = $this->option->listOptions();
        $locations = $this->location->listLocations();
        $girlLocations = $this->location->listGirlLocations(array('girl_id' => $id));
        $listGirlLocations = array();
        foreach ($girlLocations as $value) {
            $listGirlLocations[$value['location_id']] = TRUE;
        }
        $images = $this->image->listImages(array('girl_id' => $id));
        $tags = $this->tag->listGirlTags(array('girl_tags.girl_id' => $id));
        $optionValues = $this->option_value->listValues(array('girl_id' => $id));
        $listValues = array();
        foreach ($optionValues as $value) {
            $listValues[$value['option_id']] = $value['value'];
        }
        $girl['locations'] = $listGirlLocations;
        $this->data['id'] = $id;
        $this->data['girl'] = $girl;
        $this->data['options'] = $options;
        $this->data['locations'] = $locations;
        $this->data['images'] = $images;
        $this->data['tags'] = $tags;
        $this->data['listValues'] = $listValues;
        $this->data['listGirlLocations'] = $listGirlLocations;

        $posts = $this->input->post();
        if ($posts) {
            $this->data['girl'] = $posts;
            $error = $this->validate($girl, $id);
            $this->data['error'] = $error;
            if (empty($error)) {
                $dataCommon['title'] = $posts['title'];
                $dataCommon['fullname'] = $posts['fullname'];
                $dataCommon['phone'] = $posts['phone'];
                if (!empty($posts['birthday']))
                    $dataCommon['birthday'] = date('Y-m-d', strtotime($posts['birthday']));
                $dataCommon['cost'] = $posts['cost'];
                $dataCommon['status'] = !empty($posts['status']) ? 1 : 0;
                $dataCommon['map'] = $posts['map'];
                $dataCommon['content'] = $posts['content'];
                $dataCommon['facebook'] = $posts['facebook'];
                $dataCommon['google_plus'] = $posts['google_plus'];
                $dataCommon['twitter'] = $posts['twitter'];
                $dataCommon['pinterest'] = $posts['pinterest'];
                $dataCommon['home_page'] = $posts['home_page'];
                if (!empty($id)) {
                    $this->girl->update($dataCommon, $id);
                } else {
                    $id = $this->girl->insert($dataCommon);
                }
                $this->image->update(array('default' => 0), array('girl_id' => $id));
                if (!empty($images)) {
                    foreach ($images as $image) {
                        if (!empty($posts['default_image']) && $image['image'] == $posts['default_image']) {
                            $dataImage['default'] = 1;
                            $this->image->update($dataImage, array('id' => $image['id']));
                        }
                    }
                }
                if (!empty($posts['images'])) {
                    if(empty($posts['default_image'])){
                        $posts['default_image'] = current($posts['images']);
                    }
                    foreach ($posts['images'] as $image) {
                        $newName = $id . '.' . $image;
                        $dataImage = array(
                            'girl_id' => $id,
                            'image' => $newName,
                            'default' => 0,
                        );
                        if (!empty($posts['default_image']) && $image == $posts['default_image']) {
                            $dataImage['default'] = 1;
                        }
                        $source = PUBLICPATH . 'tmps/' . $image;
                        $dest = PUBLICPATH . 'images/' . $newName;
                        if (@copy($source, $dest))
                            @unlink($source);

                        $sourceTiny = PUBLICPATH . 'tmps/thumbnail/' . $image;
                        $destTiny = PUBLICPATH . 'images/thumbnail/' . $newName;
                        if (@copy($sourceTiny, $destTiny))
                            @unlink($sourceTiny);

                        $sourceTiny = PUBLICPATH . 'tmps/small/' . $image;
                        $destTiny = PUBLICPATH . 'images/small/' . $newName;
                        if (@copy($sourceTiny, $destTiny))
                            @unlink($sourceTiny);

                        $sourceTiny = PUBLICPATH . 'tmps/medium/' . $image;
                        $destTiny = PUBLICPATH . 'images/medium/' . $newName;
                        if (@copy($sourceTiny, $destTiny))
                            @unlink($sourceTiny);

                        $this->image->insert($dataImage);
                    }
                }

                $this->location->deleteGirlLocations(array('girl_id' => $id));
                if (!empty($posts['locations'])) {
                    foreach ($posts['locations'] as $locationId) {
                        $this->location->insertGirlLocation(array(
                            'girl_id' => $id,
                            'location_id' => $locationId
                        ));
                    }
                }

                if (!empty($posts['options'])) {
                    $this->option_value->delete(array('girl_id' => $id));
                    foreach ($posts['options'] as $option_id => $value) {
                        if (!empty($value)) {
                            $this->option_value->insert(array(
                                'girl_id' => $id,
                                'option_id' => $option_id,
                                'value' => $value,
                            ));
                        }
                    }
                }
                $this->tag->deleteUserTags(array('girl_id' => $id));
                if (!empty($posts['tags'])) {
                    $tags = explode(', ', $posts['tags']);
                    foreach ($tags as $tagValue) {
                        $tag = $this->tag->getTag(array('name' => $tagValue));
                        if (!$tag) {
                            $tagId = $this->tag->insert(array('name' => $tagValue));
                        } else {
                            $tagId = $tag['id'];
                        }
                        $dataTag = array(
                            'girl_id' => $id,
                            'tag_id' => $tagId
                        );
                        $this->tag->insertUserTags($dataTag);
                    }
                }
                $this->session->set_flashdata('success', 'Update girl success');
                redirect(admin_url('girls'));
            }
        }
        $this->load('admin_layout', 'admincp/girls/form');
    }

    private function validate($girl, $id = 0) {
        $posts = $this->input->post();
         if (!$this->hasPermission('modify')) {
            $error['permission'] = 'You don\'t permission for this action';
        }
        
        if(empty($posts['locations'])){
            $error['locations'] = 'Please select location';
        }
        
        if(empty($posts['fullname'])){
            $error['fullname'] = 'Please input fullname';
        }
        
        if(empty($posts['title'])){
            $error['title'] = 'Please input fullname';
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