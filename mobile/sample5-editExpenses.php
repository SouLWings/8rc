<?php
require 'includes/util.php';

validateParams('itemid,itemname,itemprice');//better to include userid to increase security

$itemid = get('itemid');
$itemname = get('itemname');
$itemprice = get('itemprice');

//assuming a table `expenses` with column `id`, `uid`, `itemname`, `itemprice`, `itemdate`
$query = "UPDATE `expenses` SET `itemname` = '$itemname', `itemprice` = '$itemprice' WHERE `id` = $itemid";

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