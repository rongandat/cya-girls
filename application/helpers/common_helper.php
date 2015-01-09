<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('admin_url')) {

    function admin_url($uri = '') {
        $CI = & get_instance();
        return $CI->config->site_url('admincp/' . $uri);
    }

    function get_language_id() {
        $CI = & get_instance();
        $CI->load->model('configs_model');
        $language_config = $CI->configs_model->getConfig('language');
        $language = $CI->session->userdata('language');
        if (!$language)
            $language = $language_config['value'];
        return $language;
    }

    function is_image($path) {
        $a = getimagesize($path);
        $image_type = $a[2];

        if (in_array($image_type, array(IMAGETYPE_GIF, IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_BMP))) {
            return true;
        }
        return false;
    }

}
?>
