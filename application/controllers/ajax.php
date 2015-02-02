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
        $auth = $this->session->userdata('auth');
        $user_session = $this->session->userdata('user');
        $uploadDir = PUBLICPATH . 'tmps/';
        $uploadUrl = base_url() . '/public/tmps/';
        if (!empty($auth) && empty($user_session)) {
            $uploadDir = PUBLICPATH . 'tmps/' . $auth['username'] . '/';
            $uploadUrl = base_url() . '/public/tmps/' . $auth['username'] . '/';
        }
        $params = array(
            'script_url' => site_url('ajax/imagesUpload/' . $id) . '/',
            'upload_dir' => $uploadDir,
            'upload_url' => $uploadUrl,
            'images' => array(),
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

    public function managerGirlList() {
        $recordPerPage = $this->input->get_post('iDisplayLength', TRUE);
        $start = $this->input->get_post('iDisplayStart', TRUE);
        $search = $this->input->get_post('sSearch', TRUE);
        $order = $this->input->get_post('iSortCol_0', TRUE);
        $sort = $this->input->get_post('sSortDir_0', TRUE);

        $this->load->model('girls_model', 'girl');
        $auth = $this->session->userdata('auth');
        $dataWhere = 'girl.user_id =' . $auth['id'];
        if (!empty($search))
            $dataWhere .= ' AND (girl.title like "%' . $search . '%" OR girl.fullname like "%' . $search . '%")';
        $girls = $this->girl->listGirls($dataWhere, array(), 0, 'girl.*', $recordPerPage, $start, $order, $sort);

        $totals = $this->girl->listGirlTotal($dataWhere);
        $jsonArray = array(
            'iTotalRecords' => $totals,
            'iTotalDisplayRecords' => $totals,
        );
        $jsonArray['aaData'] = array();
        foreach ($girls as $girl) {
            $data = $girl;
            $data['action'] = 1;
            unset($data['content']);
            $jsonArray['aaData'][] = $data;
        }

        echo json_encode($jsonArray);
    }

}