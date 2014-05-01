<?php
require 'includes/util.php';

validateParams('userid');

$uid = get('userid');

//assuming a table `expenses` with column `id`, `uid`, `itemname`, `itemprice`, `itemdate`

//to get all expenses
$query = "SELECT * FROM `expenses` WHERE `uid` = '$uid' ORDER BY `itemdate`";

//to get expenses during this month until today
$query = "SELECT * FROM `expenses` WHERE `uid` = '$uid' AND DATEPART(m, `itemdate`) = DATEPART(m, getdate()) ORDER BY `itemdate`";

//to get expenses during last month/bulan lepas/shang ge yue
$query = "SELECT * FROM `expenses` WHERE `uid` = '$uid' AND DATEPART(m, `itemdate`) = DATEPART(m, DATEADD(m, -1, getdate())) AND DATEPART(y, `itemdate`) = DATEPART(y, DATEADD(m, -1, getdate())) ORDER BY `itemdate`";

//total expenses can be count by looping through the resultarray accumulating the itemprice

if($resultArray = $db->getAllRows($query))
{
	$responseArray = array();
	$responseArray['status'] = 'success';
	$responseArray['expenses'] = $resultArray;
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