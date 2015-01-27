<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('rand')) {

    function rand($min = null, $max = null) {
        static $seeded;

        if (!isset($seeded)) {
            mt_srand((double) microtime() * 1000000);
            $seeded = true;
        }

        if (isset($min) && isset($max)) {
            if ($min >= $max) {
                return $min;
            } else {
                return mt_rand($min, $max);
            }
        } else {
            return mt_rand();
        }
    }

}
if (!function_exists('create_random_value')) {

    function create_random_value($length = 15, $type = 'mixed') {
        if (($type != 'mixed') && ($type != 'chars') && ($type != 'digits'))
            return false;

        $rand_value = '';
        while (strlen($rand_value) < $length) {
            if ($type == 'digits') {
                $char = rand(0, 9);
            } else {
                $char = chr(rand(0, 255));
            }
            if ($type == 'mixed') {
                if (preg_match('/^[a-z0-9]$/', $char))
                    $rand_value .= $char;
            } elseif ($type == 'chars') {
                if (preg_match('/^[a-z]$/', $char))
                    $rand_value .= $char;
            } elseif ($type == 'digits') {
                if (preg_match('/^[0-9]$/', $char))
                    $rand_value .= $char;
            }
        }
        return $rand_value;
    }

}

if (!function_exists('mybase64_encode')) {

    function mybase64_encode($s) {
        return str_replace(array('+', '/'), array(',', '-'), base64_encode($s));
    }

}
if (!function_exists('mybase64_decode')) {

    function mybase64_decode($s) {
        return base64_decode(str_replace(array(',', '-'), array('+', '/'), $s));
    }

}


//if (!function_exists('sentMail')) {
//
//    function sentMail($emailTo, $subject, $content, $emailFrom = null, $name = null) {
//        $CI = & get_instance();
//        $CI->load->library('mail');
//        $CI->mail->addTo($emailTo['name'], $emailTo['email']);
//        $CI->config->load('email', TRUE);
//        if (empty($emailFrom))
//            $CI->mail->addFrom($CI->config->item('email_from', 'email'));
//        else
//            $CI->mail->addFrom($emailFrom);
//        $CI->mail->addSender($CI->config->item('sender', 'email'));
//        $CI->mail->addSubject($subject);
//        $CI->mail->addHtml($content);
//        if ($CI->mail->send())
//            return true;
//        return FALSE;
//    }
//
//}

if (!function_exists('sentMail')) {

    function sentMail($emailTo, $subject, $content, $emailFrom = null, $name = null) {
        $CI = & get_instance();
        $CI->load->model('configs_model');
        $configs = $CI->configs_model->getConfigs();
        $CI->load->library('mail');
        $CI->mail->addTo($emailTo['name'], $emailTo['email']);
        if (empty($emailFrom))
            $CI->mail->addFrom($configs['ftp_email']);
        else
            $CI->mail->addFrom($configs['email_config']);
        if (empty($name))
            $CI->mail->addSender($configs['ftp_email_sender']);
        else
            $CI->mail->addSender($name);
        $CI->mail->addSubject($subject);
        $CI->mail->addHtml($content);
        if ($CI->mail->send())
            return true;
        return FALSE;
    }

}


if (!function_exists('sentMailTemp')) {

    function sentMailTemp($emailTo, $key, $replaces) {
        $CI = & get_instance();
        $CI->load->model('email_templates_model');

        $emailTemplate = $CI->email_templates_model->getTemplate(array('key' => $key));
        if (empty($emailTemplate))
            return FALSE;

        $subject = $emailTemplate['subject'];
        $content = $emailTemplate['content'];

        foreach ($replaces as $key => $code) {
            $subject = str_replace('{{' . $key . '}}', $code, $subject);
            $content = str_replace('{{' . $key . '}}', $code, $content);
        }

        sentMail($emailTo, $subject, $content);
    }

}
?>
