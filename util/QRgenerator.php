<?php
include "PHPQR/qrlib.php";
QRcode::png($_GET['code'], false, "L", 10, 4);
?>