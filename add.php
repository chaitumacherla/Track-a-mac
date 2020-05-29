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
    $output = $db->query('SELECT * FROM switches');
    $count = 0;
    foreach ($output as $output) {
        if($output['ip_address']==$ip_address && $output['port_number']==$port_number && $output['community']==$community && $output['version']==$version){
            $count = $count+1;
        }
    }

    if ($count ==0){
        $db->exec("INSERT INTO switches (ip_address,port_number,community,version) VALUES ('$ip_address','$port_number','$community','$version')");
        echo "OK";
    }
    else {
        echo "FALSE";
    }
}

$db->close();

?>