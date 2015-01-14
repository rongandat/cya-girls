<?php

error_reporting(1);
set_time_limit(0);
$dom = new DOMDocument('1.0', 'utf-8');
$url = 'http://wobootstrap.com/htmldemo/retouch/portfolio-4.html';
$dom->loadHTMLFile(trim($url));
$xpath = new DOMXPath($dom);
$chuong = 'Chuong' . $i;
$images = $xpath->query(".//img/@src");
$path = realpath(dirname(__FILE__)).'/images/';
foreach ($images as $image){
    $imageLink = 'http://wobootstrap.com/htmldemo/retouch/'.$image->nodeValue;
    $pathinfo = pathinfo($imageLink);
    echo $imageLink.'<br>';
//    echo $path.$pathinfo['basename'].PHP_EOL;
    copy($imageLink, $path.$pathinfo['basename']);
    
}
?>
