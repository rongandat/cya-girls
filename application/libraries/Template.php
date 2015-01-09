<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Template {

    var $ci;

    function __construct() {
        $this->ci = & get_instance();
        $this->ci->load->library('Mobiledetect');
        $this->ci->load->library('session');
    }

    function loadDashBoardView() {
        if ( $this->ci->mobiledetect->isMobile()) { // mobile
            $this->ci->load('front_layout', 'mobile/dashboard');
        } else {
            $this->ci->load('front_layout', 'dashboard');
        }
    }
}
