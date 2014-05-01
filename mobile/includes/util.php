<?php
include 'includes/config.php';
require 'includes/PHPMailer/PHPMailerAutoload.php';
class db extends Mysqli{
	
    function __construct() {
		parent::__construct(DB_HOST, DB_USER, DB_PASS, DB_NAME);
	}

	function getAllRows($qry)
	{
		$rows = array();
		if($result = $this->query($qry))
		{
			while ($row = $result->fetch_assoc())
				$rows[] = $row;
			$result->free();
		}
		return $rows;
	}
}

function get($param){
	if(isset($_GET[$param]) && $_GET[$param] != '')
		return mysql_real_escape_string($_GET[$param]);
	return false;
}

function validateParams($params)
{
	$param = explode(',',$params);
	$invalid = '';
	foreach($param as $p)
		if(!get(trim($p, ' ')))
			$invalid .= $p.' ';
	
	if($invalid!='')
	{
		sendResponse(array('status' => 'failed', 'msg' => "Invalid parameters: $invalid"));
		die();
	}
}	

function sendResponse($array)
{
	echo json_encode($array);
}

function sendmail($to, $title, $msg){
	$mail = new PHPMailer;

	$mail->isSMTP(); 
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = '587';
	$mail->SMTPAuth = true;
	$mail->Username = GEMAILADDRESS; 
	$mail->Password = GEMAILPASSWORD; 
	$mail->SMTPSecure = 'tls'; 

	$mail->From = GEMAILADDRESS;
	$mail->FromName = MAILERNAME;
	$mail->addAddress($to);  
	$mail->isHTML(true);   
	$mail->Subject = $title;
	$mail->Body    = $msg;

	if(!$mail->send()) {
	   return false;
	}
	return true;
}

function printr($item){
	echo '<pre>';
	print_r($item);
	echo '</pre>';
}

$db = new db();
?>