<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Ajax extends MY_Controller {

    protected $lang;

    public function __construct() {

        parent::__construct();
        $user_session = $this->session->userdata('user');
    }

    public function imagesUpload($id = 0) {
        $this->load->model('image_model', 'image');
        $params = array(
            'script_url' => site_url('ajax/imagesUpload/' . $id) . '/',
            'upload_dir' => PUBLICPATH . 'tmps/',
            'upload_url' => base_url() . '/public/tmps/',
            'upload_url' => base_url() . '/public/tmps/',
            'images' => array(
            ),
        );
        if ($id) {
            $images = $this->image->listImages(array('girl_id' => $id));
            foreach ($images as $image) {
                $params['images'][] = array(
                    'id' => $image['id'],
                    'name' => $image['image'],
                    'default' => $image['default'],
                    'path' => base_url() . 'public/images/thumbnail/' . $image['image']
                );
            }
        }



        $upload_handler = $this->load->library('UploadHandler', $params);
    }

    public function tags() {
        $this->load->model('tag_model', 'tag');
        $tags = $this->tag->listTags();
        $data = array();
        foreach ($tags as $tag) {
            $data[] = $tag['name'];
        }
        echo json_encode($data);
    }

}