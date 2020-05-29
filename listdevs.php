<?php
include_once('config.php');

$output = $db->query('SELECT * FROM switches');

while ($device = $output->fetchArray()) {


    echo $device[0]. "|" .$device[1]. "|" .$device[2]. "|" .$device[3]. "|" .$device[4]. "|" .$device[5]. "|" .$device[6]. "\n";

}

$db->close();

?>