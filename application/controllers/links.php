<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Links extends MY_Controller {

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
        $this->data['header_title'] = 'Links';
        $this->load->model('link_model', 'link');
        $this->data['links'] = $this->link->listLinks(array('status' => 1));
        $this->load('front_layout', 'links/index');
    }

    public function girl() {

        $this->load('front_layout', 'girl');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */