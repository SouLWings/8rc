<?php
require 'includes/util.php';

validateParams('itemid');//better to include userid to increase security

$itemid = get('itemid');

//assuming a table `expenses` with column `id`, `uid`, `itemname`, `itemprice`, `itemdate`
$query = "DELETE FROM `expenses` WHERE `id` = $itemid";

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