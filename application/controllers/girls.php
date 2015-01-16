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
    
    public function __construct() {
        parent::__construct();
        $this->data['tab_locations'] = $this->getLocations();
        $this->data['tab_tags'] = $this->getTags();
    }
    public function index($url) {
        $id = current(explode('-', $url));
        $girl = $this->girl->getGirl(array('id' => $id));
        if (empty($girl))
            redirect('');
        $this->data['header_title'] = $girl['title'];
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

    public function tag($url = 0, $page = 0) {
        $id = current(explode('-', $url));
        $this->data['breadcrumbs'] = array();

        $tag = $this->tag->getTag(array('id' => $id));
        if (empty($tag))
            redirect();
        $this->data['header_title'] = 'Tag: '.$tag['name'];
        

        $limit = 2;
        $page = $this->input->get('per_page');
        if (empty($page))
            $page = 0;
        $this->data['per_page'] = $page;
        $offset = $page;
        $girls = $this->girl->listGirlsByTag(array('girl.status' => 1, 'girl_tags.tag_id' => $id), array(), 0, 'girl.*', $limit, $offset);
        $totalRecord = $this->girl->listTotalGirlsByTag(array('girl.status' => 1, 'girl_tags.tag_id' => $id));
        $totalPage = ceil($totalRecord / $limit);
        $this->data['totalPage'] = $totalPage;

        $this->load->library('pagination');

        $config['base_url'] = site_url('girls/tag/'.$url);
        $config['total_rows'] = $totalRecord;
        $config['per_page'] = $limit;
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
        $this->load('front_layout', 'girl/tag');
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */