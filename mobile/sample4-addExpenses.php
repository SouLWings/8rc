<?php
require 'includes/util.php';

validateParams('userid,itemname,itemprice');

$uid = get('userid');
$itemname = get('itemname');
$itemprice = get('itemprice');

//assuming a table `expenses` with column `id`, `uid`, `itemname`, `itemprice`, `itemdate`
$query = "INSERT INTO `expenses` VALUES('','$uid','$itemname','$itemprice',CURDATE())";

if($db->query($query))
{
	$responseArray = array();
	$responseArray['status'] = 'success';
	sendResponse($resultArray);
}
else
{
	$responseArray = array();
	$responseArray['status'] = 'failed';
	$responseArray['msg'] = 'Something wrong with the server script/database error';
	sendResponse($responseArray);
}
?>