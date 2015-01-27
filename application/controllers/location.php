<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Location extends MY_Controller {

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

    public function index($url = 0, $page = 0) {
        $id = current(explode('-', $url));
        $this->data['breadcrumbs'] = array();
        $location = $this->location->getLocation(array('id' => $id));
        if (empty($location))
            redirect();
        $this->data['header_title'] = $location['name'];


        $limit = $this->configs['record_per_page'];
        $this->data['per_page'] = $page;
        $offset = $page;
        $girls = $this->girl->listGirlsByLocation(array('girl.status' => 1, 'girl_location.location_id' => $id), array(), 0, 'girl.*', $limit, $offset);
        $totalRecord = $this->girl->listTotalGirlsByLocation(array('girl.status' => 1, 'girl_location.location_id' => $id));
        $totalPage = ceil($totalRecord / $limit);
        $this->data['totalPage'] = $totalPage;

        $this->load->library('pagination');

        $config['base_url'] = site_url('location/' . $url);
        $config['total_rows'] = $totalRecord;
        $config['per_page'] = $limit;
//        $config['page_query_string'] = TRUE;
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['first_link'] = 'First';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['last_link'] = 'Last';
        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $this->pagination->initialize($config);

        $this->data['pagination'] = $this->pagination->create_links();


        $listGirls = array();
        foreach ($girls as $girl) {
            $locations = $this->location->listLocationsByGirl(array('girl_location.girl_id' => $girl['id']));
            $girl['locations'] = $locations;
            $listGirls[] = $girl;
        }
        $this->data['girls'] = $listGirls;
        $this->load('front_layout', 'location/index');
    }

    public function girl() {

        $this->load('front_layout', 'girl');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */