<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Contact extends MY_Controller {

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
    }
    public function index() {
        $this->data['header_title'] = 'Contact';
        $this->data['no_sidebar'] = true;
        $this->data['success'] = $this->session->flashdata('success');
        if($this->input->post()){
            $posts = $this->input->post();
            $error = $this->validate();
            $this->data['errors'] = $error;
            if(empty($error)){
                $dataEmail['home_page'] = site_url();
                $dataEmail['logo'] = 'Sexy';
                $dataEmail['contact_page'] = site_url('contact');
                $dataEmail['name'] = $posts['name'];
                $dataEmail['email'] = $posts['email'];
                $dataEmail['subject'] = $posts['subject'];
                $dataEmail['content'] = $posts['message'];
                $dataEmail['footer_text'] = $this->configs['footer_text'];
                sentMailTemp(array('name' => $this->configs['email_config_name'], 'email' => $this->configs['email_config']), 'contact_us', $dataEmail);
                $this->session->set_flashdata('success', 'Thank you for contacting us.');
                redirect('contact');
            }
        }
        $this->load('front_layout', 'contact/index');
        
    }
    
    public function validate(){
        $posts = $this->input->post();
        $error = array();
        if(empty($posts['name'])){
            $error[] = 'please input your name';
        }
        if(empty($posts['email'])){
            $error[] = 'please input your email';
        }
        if(empty($posts['message'])){
            $error[] = 'please input your email message';
        }
        return $error;
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */