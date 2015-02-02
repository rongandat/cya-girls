<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Manager extends MY_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -  
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in 
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see http://codeigniter.com/user_guide/general/urls.html
     */
    public function __construct() {
        parent::__construct();
        $this->data['tab_locations'] = $this->getLocations();
    }

    public function index() {
        $this->data['breadcrumbs'][] = array('title' => 'Girls');
        $this->data['header_title'] = 'Girls manager';
        $auth = $this->session->userdata('auth');
        if (empty($auth))
            redirect();
        $this->load('front_layout', 'manager/index');
    }

    public function changepassword() {
        $this->data['header_title'] = 'Change password';

        $auth = $this->session->userdata('auth');
        $this->data['success'] = $this->session->flashdata('success');
        if (empty($auth))
            redirect();
        $this->load->model('user_model', 'user');
        $user = $this->user->getUserById($auth['id']);
        $posts = $this->input->post();
        if ($this->input->post()) {
            $error = $this->validateChangePassword($user);
            if (empty($error)) {
                $dataUpdate['password'] = md5($posts['password']);
                $this->user->update($auth['id'], $dataUpdate);
                $this->session->set_flashdata('success', 'Update password success');
                redirect(site_url('manager/changepassword'));
            }
        }
        $this->data['errors'] = $error;
        $this->load('front_layout', 'manager/changepassword');
    }

    public function validateChangePassword($user) {
        $posts = $this->input->post();
        $error = array();
        if($user['password'] != md5($posts['oldpassword'])){
            $error['Old password'] = 'Old password wrong';
        }
        if (empty($posts['password']) || strlen($posts['password']) < 7) {
            $error['password'] = 'Minimum of 7 characters.';
        }

        if ($posts['password'] != $posts['repassword']) {
            $error['repassword'] = 'Passwords do not match. Please re-enter your password';
        }
        return $error;
    }

    public function profile() {
        $auth = $this->session->userdata('auth');
        $this->data['success'] = $this->session->flashdata('success');
        if (empty($auth))
            redirect();
        $this->load->model('user_model', 'user');
        $user = $this->user->getUserById($auth['id']);
        $posts = $this->input->post();
        $error = array();
        if ($this->input->post()) {
            $error = $this->validateProfile();
            if (empty($error)) {
                $this->user->update($auth['id'], $posts);
                $this->session->set_flashdata('success', 'Update profile success');
                redirect(site_url('manager/profile'));
            }
        } else {
            $posts = $user;
        }
        $this->data['post'] = $posts;
        $this->data['errors'] = $error;
        $this->data['header_title'] = 'Profile';
        $this->load('front_layout', 'manager/profile');
    }

    private function validateProfile() {
        $auth = $this->session->userdata('auth');
        $id = $auth['id'];
        $posts = $this->input->post();
        $error = array();
        $regex = '/^[-a-zA-Z0-9._]+$/';
        if (strlen($posts['username']) <= 3 || strlen($posts['username']) > 25 || !preg_match($regex, $posts['username'])) {
            $error['username'] = 'Username min 2 alpha character. Max 25 alpha characters. Allow \'_\' and \'.\'';
            $flag = false;
        }
        $dataUserCheck = array(
            'username' => $posts['username']
        );
        if (!empty($id)) {
            $dataUserCheck['id !='] = $id;
        }
        $checkUser = $this->user->totalUsers($dataUserCheck);
        if ($checkUser > 0) {
            $error['username'] = 'Username arealdy exists';
            $flag = false;
        }

        $regex = '/^[-a-zA-Z0-9&\'._ ]+$/';
        if (strlen($posts['firstname']) < 2 || strlen($posts['firstname']) > 20) {
            $error['firstname'] = 'Please enter your first name';
        }

        if (!preg_match($regex, $posts['firstname'])) {
            $error['firstname'] = 'Min 2 alpha character. Max 20 alpha characters. Allow \'-\', " \' ", \'_\' and \'.\'';
        }

        if (strlen($posts['lastname']) < 2 || strlen($posts['lastname']) > 20) {
            $error['lastname'] = 'Please enter your last name';
        }

        if (!preg_match($regex, $posts['lastname'])) {
            $error['lastname'] = 'Min 2 alpha character. Max 20 alpha characters. Allow \'-\', " \' ", \'_\' and \'.\'';
        }

        if (!valid_email($posts['email'])) {
            $error['email'] = 'Email do not match';
            $flag = false;
        }

        return $error;
    }

    public function form($id = 0) {
        $this->data['breadcrumbs'][] = array('link' => site_url('girls'), 'title' => 'Girls');
        $this->data['breadcrumbs'][] = array('title' => 'Update');
        $auth = $this->session->userdata('auth');
        if (empty($auth))
            redirect();
        $this->load->model('girls_model', 'girl');
        $this->load->model('option_model', 'option');
        $this->load->model('location_model', 'location');
        $this->load->model('image_model', 'image');
        $this->load->model('tag_model', 'tag');
        $this->load->model('girl_option_value_model', 'option_value');

        $girl = $this->girl->getGirl(array('id' => $id, 'user_id' => $auth['id']));
        if (empty($girl))
            $this->data['header_title'] = 'Create girl';
        else
            $this->data['header_title'] = $girl['title'];
        if (!empty($girl['birthday']))
            $girl['birthday'] = date('m/d/Y', strtotime($girl['birthday']));
        if (empty($girl) && !empty($id)) {
            redirect(site_url('manager/form'));
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
            $this->data['errors'] = $error;
            if (empty($error)) {
                $dataCommon['title'] = $posts['title'];
                $dataCommon['fullname'] = $posts['fullname'];
                $dataCommon['phone'] = $posts['phone'];
                if (!empty($posts['birthday']))
                    $dataCommon['birthday'] = date('Y-m-d', strtotime($posts['birthday']));
                $dataCommon['cost'] = $posts['cost'];
                $dataCommon['user_id'] = $auth['id'];
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
                $sourceDir = PUBLICPATH . 'tmps/';
                if (!empty($auth) && empty($user_session)) {
                    $sourceDir = PUBLICPATH . 'tmps/' . $auth['username'] . '/';
                }
                if (!empty($posts['images'])) {
                    if (empty($posts['default_image'])) {
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
                        $source = $sourceDir . $image;
                        $dest = PUBLICPATH . 'images/' . $newName;
                        if (@copy($source, $dest))
                            @unlink($source);

                        $sourceTiny = $sourceDir . 'thumbnail/' . $image;
                        $destTiny = PUBLICPATH . 'images/thumbnail/' . $newName;
                        if (@copy($sourceTiny, $destTiny))
                            @unlink($sourceTiny);

                        $sourceTiny = $sourceDir . 'small/' . $image;
                        $destTiny = PUBLICPATH . 'images/small/' . $newName;
                        if (@copy($sourceTiny, $destTiny))
                            @unlink($sourceTiny);

                        $sourceTiny = $sourceDir . 'medium/' . $image;
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
                redirect(site_url('manager'));
            }
        }
        $this->load('front_layout', 'manager/form');
    }

    private function validate($girl, $id = 0) {
        $posts = $this->input->post();
        $error = array();
        if (empty($posts['locations'])) {
            $error['locations'] = 'Please select location';
        }

        if (empty($posts['fullname'])) {
            $error['fullname'] = 'Please input fullname';
        }

        if (empty($posts['title'])) {
            $error['title'] = 'Please input fullname';
        }

        if (empty($posts['locations']))
            $error['locations'] = 'Please select location';


        return $error;
    }

}
