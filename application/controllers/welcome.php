<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Welcome extends MY_Controller {

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
        $this->data['header_title'] = 'Home';
        $this->load->model('girls_model', 'girl');
        $this->load->model('option_model', 'option');
        $this->load->model('location_model', 'location');
        $this->load->model('image_model', 'image');
        $this->load->model('tag_model', 'tag');
        $this->load->model('girl_option_value_model', 'option_value');
        $girls = $this->girl->listGirls(array('status' => 1), array(), 0, '*', 20);

        $listGirls = array();
        foreach ($girls as $girl) {
            $locations = $this->location->listLocationsByGirl(array('girl_location.girl_id' => $girl['id']));
            $girl['locations'] = $locations;
            $listGirls[] = $girl;
        }
        $this->data['girls'] = $listGirls;
        $this->load('front_layout', 'welcome');
    }

    public function girl() {

        $this->load('front_layout', 'girl');
    }
    
    
    

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */