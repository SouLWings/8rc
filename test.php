<?php
$msg = 'blablabla';
$lines = file('test2.php'); 
$lines[] = ''.date('Y-m-d g:i:s', strtotime("now")).": $msg \r\n";
$fp = fopen('test2.php', 'w'); 
fwrite($fp, implode('', $lines)); 
fclose($fp);
?>
