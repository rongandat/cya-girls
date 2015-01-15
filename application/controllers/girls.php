<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Girls extends MY_Controller {

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
    public function index($id) {
        $this->load->model('girls_model', 'girl');
        $this->load->model('option_model', 'option');
        $this->load->model('location_model', 'location');
        $this->load->model('image_model', 'image');
        $this->load->model('tag_model', 'tag');
        $this->load->model('girl_option_value_model', 'option_value');

        $girl = $this->girl->getGirl(array('id' => $id));
        if (empty($girl))
            redirect('');
        $optionValue = $this->option_value->listValuesByGirl(array('girl_id' => $id), array(), 'options.name, girl_option_value.value');
        $locations = $this->location->listLocationsByGirl(array('girl_id' => $id));
        $locationIdList = array();
        foreach ($locations as $location) {
            $locationIdList[] = $location['id'];
        }
        $locationGirls = array();
        if (!empty($locationIdList)) {
            $locationGirls = $this->girl->listGirlsByLocation(array('girl.id != ' => $id),array('girl_location.location_id' => $locationIdList));
        }
        $this->data['locationGirls'] = $locationGirls;
        $tags = $this->tag->listGirlTags(array('girl_id' => $id));
        $images = $this->image->listImages(array('girl_id' => $id));
        if (empty($girl['image']) && !empty($images)) {
            $girl['image'] = $images[0]['image'];
        }

        $this->data['girl'] = $girl;
        $this->data['optionValue'] = $optionValue;
        $this->data['locations'] = $locations;
        $this->data['tags'] = $tags;
        $this->data['images'] = $images;
        $this->load('front_layout', 'girl/index');
    }

    public function girl() {

        $this->load('front_layout', 'girl');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */