<?php
require 'includes/util.php';

validateParams('email,password,fullname');

$em = get('email');
$pw = get('password');
$fn = get('fullname');

//check whether existing user with the email is there
$query = "SELECT * FROM `user` WHERE `email` = '$em'";

if(sizeof($db->getAllRows($query)) == 0) //if no existing email registered, then proceed
{
	$query = "INSERT INTO `user` VALUES('','$em','$pw','$fn')";
	
	//queries other thn SELECT, use the $db->query($qry) method
	//returns true whn succes, false otherwise
	if($db->query($query))
	{
		//defining subject and content of email, content can be html format
		$subject = 'Registration succecssfull';
		$content = "Dear $fn,<br/><p><b>Thank you</b> for registering with us. Feel free to enjoy the oyster set below.<br/><br/><img src='http://graphics8.nytimes.com/images/2008/05/16/timestopics/2oysters-395.jpg' /><br/></p>Best regards, <br/>PHPMailer."
		
		//email can be send by calling the sendmail function
		sendmail($em, $subject, $content);
		
		$responseArray = array();
		$responseArray['status'] = 'success';
		$responseArray['msg'] = 'Registration successfull';
		sendResponse($responseArray);
	}
	else
	{
		$responseArray = array();
		$responseArray['status'] = 'failed';
		$responseArray['msg'] = 'Registration failed';
		sendResponse($responseArray);
	}
}
else //if existing email registered, stop
{
	$responseArray = array();
	$responseArray['status'] = 'failed';
	$responseArray['msg'] = 'Email already in use';
	sendResponse($responseArray);
}


?>