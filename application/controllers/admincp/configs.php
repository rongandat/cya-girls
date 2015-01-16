<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Description of Adminconfig
 *
 * @author ngoalongkt
 */
class Configs extends MY_Controller {

    public function __construct() {

        parent::__construct();

        $user_session = $this->session->userdata('user');
        $this->data['user_session'] = $user_session;
        if (empty($user_session)) {
            redirect(admin_url('authenticate/login'));
        }
        $this->data['header_title'] = $this->configs['page_title'] .' - ' .'Configs';
    }

    public function index() {
        
        $this->data['breadcrumbs'][] = array('title' => 'Configs');
        if (!$this->permission()) {
            $this->load('admin_layout', 'admincp/permission');
            return;
        }
        $this->data['title'] = 'Referral Default Config';

        $this->data['data_configs'] = $this->configs;
        $success = $this->session->flashdata('success');
        $error = $this->session->flashdata('error');
        $this->data['success'] = $success;
        $this->data['error'] = $error;
        $posts = $this->input->post();
        if ($posts) {
            unset($posts['save-btn']);
            if (!$this->hasPermission('modify')) {
                $this->session->set_flashdata('error', 'You don\'t permission for this action');
                redirect(admin_url('configs'));
            }
            $this->configs_model->editConfigs($posts);
            $data['usermessage'] = array('success', 'green', 'Successfully saved ', '');
            $this->session->set_flashdata(array('usermessage' => $data['usermessage']));
            redirect(admin_url('configs'));
        }

        $ssl_config = array(0, 1);


        $this->data['tab_general'] = array(
            array(
                'type' => 'input',
                'label' => 'Page title',
                'value' => array(
                    'name' => 'page_title',
                    'id' => 'page_title',
                    'class' => 'help-block col-xs-12 col-sm-reset inline',
                    'value' => !empty($this->configs['page_title']) ? $this->configs['page_title'] : ''
                )
            ),
            array(
                'type' => 'input',
                'label' => 'Company',
                'value' => array(
                    'name' => 'company',
                    'id' => 'company',
                    'class' => 'help-block col-xs-12 col-sm-reset inline',
                    'value' => !empty($this->configs['company']) ? $this->configs['company'] : ''
                )
            ),
            array(
                'type' => 'input',
                'label' => 'Address',
                'value' => array(
                    'name' => 'address',
                    'id' => 'address',
                    'class' => 'help-block col-xs-12 col-sm-reset inline',
                    'value' => !empty($this->configs['address']) ? $this->configs['address'] : ''
                )
            ),
            array(
                'type' => 'input',
                'label' => 'Phone',
                'value' => array(
                    'name' => 'phone',
                    'id' => 'phone',
                    'class' => 'help-block col-xs-12 col-sm-reset inline',
                    'value' => !empty($this->configs['phone']) ? $this->configs['phone'] : ''
                )
            ),
            array(
                'type' => 'input',
                'label' => 'Fax',
                'value' => array(
                    'name' => 'fax',
                    'id' => 'fax',
                    'class' => 'help-block col-xs-12 col-sm-reset inline',
                    'value' => !empty($this->configs['fax']) ? $this->configs['fax'] : ''
                )
            ),
            array(
                'type' => 'input',
                'label' => 'Record Per Page',
                'value' => array(
                    'name' => 'record_per_page',
                    'id' => 'record_per_page',
                    'class' => 'help-block col-xs-12 col-sm-reset inline',
                    'value' => !empty($this->configs['record_per_page']) ? $this->configs['record_per_page'] : ''
                )
            ),
            array(
                'type' => 'input',
                'label' => 'Email Configs',
                'value' => array(
                    'name' => 'email_config',
                    'id' => 'email_config',
                    'class' => 'help-block col-xs-12 col-sm-reset inline',
                    'value' => !empty($this->configs['email_config']) ? $this->configs['email_config'] : ''
                )
            ),
            array(
                'type' => 'radio',
                'label' => 'SSL',
                'value' => array(
                    array(
                        'name' => 'ssl_config',
                        'label' => 'Yes',
                        'class' => 'help-block col-xs-12 col-sm-reset inline',
                        'value' => '1',
                        'checked' => (!empty($this->configs['ssl_config']) && $this->configs['ssl_config'] == 1) ? TRUE : FALSE,
                    ),
                    array(
                        'name' => 'ssl_config',
                        'label' => 'No',
                        'class' => 'help-block col-xs-12 col-sm-reset inline',
                        'value' => '0',
                        'checked' => (isset($this->configs['ssl_config']) && $this->configs['ssl_config'] == 0) ? TRUE : FALSE,
                    ),
                )
            ),
        );

        $this->data['tab_option'] = array(
        );
        $this->data['tab_image'] = array(
        );
        $this->data['tab_ftp'] = array(
        );

        $this->data['input_submit'] = array(
            'value' => 'Submit',
            'class' => 'button-blue'
        );
        $this->load('admin_layout', 'admincp/configs');
    }

}

?>
