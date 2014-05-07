<?php
require 'includes/util.php';
$to = 'qianni526@siswa.um.edu.my';
$title = 'Final Year Project';
$msg = '你完了';
if(sendmail($to, $title, $msg))
	echo 'ok';
else
	echo 'fail';