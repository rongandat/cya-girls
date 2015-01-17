<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Webcamps extends MY_Controller {

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
        $this->data['tab_tags'] = $this->getTags();
    }

    public function index() {
        $this->data['header_title'] = 'Webcamps';
        $this->load->model('webcamp_model', 'webcamp');
        $this->data['webcamps'] = $this->webcamp->listWebcamps(array('status' => 1));
        $this->load('front_layout', 'webcamps/index');
    }

    public function girl() {

        $this->load('front_layout', 'girl');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */