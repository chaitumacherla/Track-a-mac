<?php

include_once('config.php');

if (empty($_GET)) {
    echo "FALSE";
    }
else {
    $addr = htmlspecialchars($_GET["mac_address"]);
    $sql = <<<EOF
              SELECT * FROM List WHERE MACS LIKE "%$addr%" ORDER BY MAC_address;
EOF;
    $find = $db->query($sql);
    $arr = array(); 
    while($row = $find->fetchArray(SQLITE3_ASSOC) ){
         #echo $row[1]. "|" . $row[2] . "|" . $row[3] . "|" . $row[4] . "\n";
         $arr[] = $row['Device']. " | " . $row['VLANS'] . " | " . $row['port_number'] . " | " . "$address";
     
    }

$totnum = count($arr);
if ($totnum ==0){
    $count = $db->query('SELECT count(*) FROM switches');
    while($row1 = $count->fetchArray(SQLITE3_ASSOC)) {
        $noDevices = $row1['count(*)'];
        echo "Not Found in $noDevices devices"."\n";
     }
}

$res = array_unique($arr);
$len = count($res);
for($i = 0; $i < $len; $i++){
    echo $res[$i]. "\n";
    }
}
$db->close();

?>