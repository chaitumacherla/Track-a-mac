<?php

include_once('config.php');

$ip = $_GET['ip_address'];
$port = $_GET['port_number'];
$community = $_GET['community'];
$version = $_GET['version'];

if(empty($ip) || empty($port)||empty($community) || empty($version)) {
    echo "FALSE";
}

else {
    $output = $db->query('SELECT * FROM switches');
    $count = 0;
    foreach ($output as $output) {
        if($output['ip']==$ip_address && $output['port']==$port_number && $output['community']==$community && $output['version']==$version){
            $count = $count+1;
        }
    }

    if ($count ==0){
        $db->exec("INSERT INTO switches (ip,port,community,version) VALUES ('$ip','$port','$community','$version')");
        echo "OK added";
    }
    else {
        echo "FALSE, try again";
    }
}

$db->close();

?>