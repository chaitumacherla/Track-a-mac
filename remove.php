<?php

include_once('config.php');

$ip_address = $_GET['ip_address'];
$port_number = $_GET['port_number'];
$community = $_GET['community'];
$version = $_GET['version'];

if(empty($ip_address) || empty($port_number)||empty($community) || empty($version)) {
    echo "FALSE";
}

else {
    $remove = $db->exec("DELETE FROM switches WHERE ip_address='$ip_address' AND port_number='$port_number'AND community='$community' AND version='$version'");
    if(!$remove){
        echo "FALSE";
    }
    else {
        echo "OK";
    }

}

$db->close();

?>

