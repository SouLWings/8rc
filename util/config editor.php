<?php
$lines = file('test2.php'); 
unset($lines[sizeof($lines) - 1]); 
$lines[] = "define('DB_NAME', 'asd');\n";
$fp = fopen('test2.php', 'w'); 
fwrite($fp, implode('', $lines)); 
fclose($fp);
?>
