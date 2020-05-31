<?php
  include('config.php');
 
   $sql =<<<EOF
      SELECT * from List;
EOF;
   $ret = $db->query($sql);
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ) {
      echo   $row['Device']." | ".$row['VLANS']." | ".$row['port']." | ".$row['MAC']."\n";

   }
   
   $db->close();
?>