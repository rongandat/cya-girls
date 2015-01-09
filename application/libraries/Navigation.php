<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Library class encapsulating navigation providing navigation methods.
 * @author 	Dean Gleeson <dean.gleeson@pragmaticsystems.com.au>
 * @date	14/12/2012
 */
class Navigation {

    function __construct() {
		$this->ci =& get_instance();
                $this->ci->load->library('template');
    }

    public function loadDashBoard() {        
        $this->ci->template->loadDashBoardView();
    }

}
