<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Tool {

    /**
     * Generating random Unique MD5 String for user Api key
     */
    public function generateApiKey() {
        return md5(uniqid(rand(), true));
    }
    
    public function getGenerateKey(){
        return substr(uniqid('', FALSE), -10);
    }

}