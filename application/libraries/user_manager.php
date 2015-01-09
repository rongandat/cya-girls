<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_manager {

    private $CI;

    public function __construct() {
        $this->CI = & get_instance();
    }

    public function authenticate($redirect = null) {
        $auth = $this->CI->session->userdata('auth');
        if (empty($auth))
            redirect(site_url('session/login?redirect=' . $redirect));
    }

    public function retaurant_authenticate($redirect = null) {
        $auth = $this->CI->session->userdata('auth');
        if (empty($auth))
            redirect(site_url('session/login?redirect=' . $redirect));
        if ($auth['parent_id'] != 0) {
            redirect(site_url('dashboard'));
        }
    }

    public function login_authenticate() {
        $auth = $this->CI->session->userdata('auth');
        if (!empty($auth))
            redirect(site_url('dashboard'));
    }

    public function admin_login_authenticate() {
        $admin = $this->CI->session->userdata('admin');
        if (!empty($admin))
            redirect(site_url('admin/dashboard'));
    }

    public function admin_authenticate() {
        $admin = $this->CI->session->userdata('admin');
        if (empty($admin))
            redirect(site_url('admin/authenticate/signin'));
    }

    public function adminLoginValidate($uname, $pass) {
        $dataResult = 1;
        if (empty($uname) || empty($pass)) {
            $dataResult = 0;
            return $dataResult;
        }
        $this->CI->load->model('administrator_model', 'administrator');

        $user = $this->CI->administrator->getUserLogin($uname, $pass);
        if (!empty($user)) {
            $this->updateAdminSession($user);
        } else {
            $dataResult = 0;
        }
        return $dataResult;
    }

    public function updateAdminSession($user) {
        unset($user['password']);
        $this->CI->session->set_userdata('admin', $user);
    }

    public function loginValidate($email, $pass) {
        $dataResult = 1;
        if (empty($email) || empty($pass) || !valid_email($email)) {
            $dataResult = 0;
            return $dataResult;
        }
        $this->CI->load->model('user_model', 'user');

        $user = $this->CI->user->getUserLogin($email, $pass);
        if (!empty($user)) {
            $this->updateUserSession($user);
        } else {
            $dataResult = 0;
        }
        return $dataResult;
    }

    public function updateUserSession($user) {
        unset($user['password']);
        $this->CI->session->set_userdata('auth', $user);
    }

    public function forgotPass($email) {
        $dataResult['success'] = 1;
        if (empty($email) || !valid_email($email)) {
            $dataResult['success'] = 0;
            $dataResult['message'] = 'Invalid Email';
            return $dataResult;
        }
        $this->CI->load->model('user_model', 'user');
        $user = $this->CI->user->getUserByEmail($email);

        if (!empty($user)) {
            $dataResult['success'] = 1;
            $dataUpdate['forgotpass_key'] = $this->CI->tool->getGenerateKey();
            $this->CI->user->update($dataUpdate, $user['id']);
            $this->CI->load->library('mail');

            $mailTo['name'] = $user['firstname'] . ' ' . $user['lastname'];
            $mailTo['email'] = $email;

            $dataEmail['firstname'] = $user['firstname'];
            $dataEmail['lastname'] = $user['lastname'];
            $dataEmail['forgot_link'] = site_url('account/resetpass?key=' . $dataUpdate['forgotpass_key'] . '&email=' . $email);

            sentMailTemp($mailTo, 'forgot_password', $dataEmail);
        } else {
            $dataResult['success'] = 0;
            $dataResult['message'] = 'Email does not exist';
        }
        return $dataResult;
    }

    public function validPassword($password, $rePassword) {
        $containsLetter = preg_match('/[a-zA-Z]/', $password);
        $containsDigit = preg_match('/\d/', $password);
        $containsSpecial = preg_match('/[^a-zA-Z\d]/', $password);
        $error = array();
        if (empty($password) || strlen($password) < 7) {
            $error['password'] = 'Minimum of 7 characters.  At least one must be numeric and at least one must be alpha';
        }
        if (!$containsLetter || !$containsDigit) {
            $error['password'] = 'Minimum of 7 characters.  At least one must be numeric and at least one must be alpha';
        }

        if ($password != $rePassword) {
            $error['re_password'] = 'Passwords do not match. Please re-enter your password';
        }

        return $error;
    }

    public function validEmail($email) {
        $mail = array();
        if (empty($email) || !valid_email($email)) {
            $mail['message_email'] = 'Please enter a valid email address.';
        }
        return $mail;
    }

    public function validPhone($phone) {
        $phone_return = array();
        $phone_validate = preg_match('/^0\d{10}$/', $phone);
        if (empty($phone) || !$phone_validate) {
            $phone_return['message_phone'] = 'Please enter numeric characers only';
        }
        return $phone_return;
    }

    public function registerUser($button_term, $firstname, $name, $email, $pass, $repass, $phone, $nameRes, $suburb, $postcode) {
        $error = array();
        if ($button_term == false) {
            $error['TermOfUse'] = 'Please read and accept the terms of use';
        }
        if (empty($firstname)) {
            $error['firstname'] = 'Please enter your first name';
        }
        if (empty($suburb)) {
            $error['suburb'] = 'Please enter suburb';
        }
        if (empty($postcode)) {
            $error['postcode'] = 'Please enter postcode';
        }
        if (!empty($postcode) && !is_numeric($postcode)) {
            $error['postcode'] = 'Please enter valid postcode';
        }
        if (empty($name)) {
            $error['lastname'] = 'Please enter your last name';
        }
        if (empty($email) || !valid_email($email)) {
            $error['email'] = 'Email invalid';
        }
        $select_user = $this->CI->My_model->select_where_c("users", array("email" => $email));
        if (!empty($select_user))
            $error['email'] = 'Email already exists';
        if (!empty($phone) && !is_numeric($phone)) {
            $error['phone'] = 'Please enter valid phone number';
        }
        if (empty($nameRes)) {
            $error['nameRes'] = 'Please enter name of Restaurant';
        }
        if ($pass != $repass) {
            $error['repassword'] = 'Passwords do not match. Please re-enter your password';
        }
        $containsLetter = preg_match('/[a-zA-Z]/', $pass);
        $containsDigit = preg_match('/\d/', $pass);
        if (empty($pass) || strlen($pass) < 7) {
            $error['password'] = 'Minimum of 7 characters.  At least one must be numeric and at least one must be alpha';
        }
        if (!$containsLetter || !$containsDigit) {
            $error['password'] = 'Minimum of 7 characters.  At least one must be numeric and at least one must be alpha';
        }
        return $error;
    }

    public function validUserAccount($data) {
        $error = array();
        if (empty($data['firstname'])) {
            $error['firstname'] = 'Please enter your firstname';
        }

        if (empty($data['lastname'])) {
            $error['lastname'] = 'Please enter your lastname';
        }
        if (empty($data['email']) || !valid_email($data['email'])) {
            $error['email'] = 'Email invalid';
        }

        $auth = $this->CI->session->userdata('auth');

        $emailExistsWhere['email'] = $data['email'];
        $emailExistsWhere['id !='] = $auth['id'];
        $checkEmailExists = $this->CI->user->getUser($emailExistsWhere);
        if (!empty($checkEmailExists))
            $error['email'] = 'Email already exists';


        $phone_validate = preg_match('/^0\d{10}$/', $data['phone']);
        if (empty($data['phone']) || !is_numeric($data['phone'])) {
            $error['phone'] = 'Please enter numeric characers only';
        }
        if (!empty($data['password'])) {
            if ($data['password'] != $data['re_password']) {
                $error['re_password'] = 'Passwords do not match. Please re-enter your password';
            }
            $containsLetter = preg_match('/[a-zA-Z]/', $data['password']);
            $containsDigit = preg_match('/\d/', $data['password']);
            if (empty($data['password']) || strlen($data['password']) < 7) {
                $error['password'] = 'Minimum of 7 characters.  At least one must be numeric and at least one must be alpha';
            }
            if (!$containsLetter || !$containsDigit) {
                $error['password'] = 'Minimum of 7 characters.  At least one must be numeric and at least one must be alpha';
            }
        }
        return $error;
    }

    public function userCreateValidate($user, $id = null) {
        $this->CI->load->model('user_model', 'user');
        $error = array();
        if (empty($user['firstname'])) {
            $error['firstname'] = 'Please enter your first name';
        }
        if (empty($user['firstname'])) {
            $error['lastname'] = 'Please enter your first name';
        }

        if (empty($user['email']) || !valid_email($user['email'])) {
            $error['email'] = 'Email invalid';
        }

        $emailExistsWhere['email'] = $user['email'];
        if (!empty($id)) {
            $emailExistsWhere['id !='] = $id;
        }

        $checkEmailExists = $this->CI->user->getUser($emailExistsWhere);
        if (!empty($checkEmailExists))
            $error['email'] = 'Email already exists';

        if (!empty($user['phone']) && !is_numeric($user['phone'])) {
            $error['phone'] = 'Please enter valid phone number';
        }

        if ($user['password'] != $user['cf_password']) {
            $error['cf_password'] = 'Passwords do not match. Please re-enter your password';
        }
        $containsLetter = preg_match('/[a-zA-Z]/', $user['password']);
        $containsDigit = preg_match('/\d/', $user['password']);
        if (empty($id) || (!empty($id) && strlen($user['password']) > 0)) {
            if (empty($user['password']) || strlen($user['password']) < 7) {
                $error['password'] = 'Minimum of 7 characters.  At least one must be numeric and at least one must be alpha';
            }
            if (!$containsLetter || !$containsDigit) {
                $error['password'] = 'Minimum of 7 characters.  At least one must be numeric and at least one must be alpha';
            }
        }

        return $error;
    }

    public function changepassValidate($user, $id) {
        $this->CI->load->model('user_model', 'user');
        $error = array();

        $checkpass = $this->CI->user->getUserById($id);
        if (md5($user['oldpass']) != $checkpass['password']) {
            $error['oldpass'] = 'Old password incorrect';
        }

        if ($user['newpass'] != $user['cf_newpass']) {
            $error['cf_newpass'] = 'Passwords do not match. Please re-enter your password';
        }
        $containsLetter = preg_match('/[a-zA-Z]/', $user['newpass']);
        $containsDigit = preg_match('/\d/', $user['newpass']);
        if (strlen($user['newpass']) < 7) {
            $error['newpass'] = 'Minimum of 7 characters.  At least one must be numeric and at least one must be alpha';
        }
        if (!$containsLetter || !$containsDigit) {
            $error['newpass'] = 'Minimum of 7 characters.  At least one must be numeric and at least one must be alpha';
        }

        return $error;
    }

}
