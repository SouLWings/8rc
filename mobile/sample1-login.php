<?php
//set up databasename and email in includes/config.php

//begin each new .php with this line and you are good to go
require 'includes/util.php';

//android usually request page with passing in some parameter
//those parameter must be validated before proceeding, to avoid things goes wrong
//use validateParams($params) to validate
//seperate every parameter with a comma (,)
//checking condition: parameter exist, parameter's value cannot be empty
//this method will terminate the rest of the page operation
//and response with JSON of {'status':'failed', 'msg':'Invalid parameters: parameters'}
//make sure the android check for status before proceed to check for other responses
//Note: you must use GET parameter in this framework
validateParams('email,password');

//parameter value can be retrieved with get($parametername)
//get() escapes ' and " characters to prevent faulty queries
$em = get('email');
$pw = get('password');

//assuming a table `user` with column `id`, `email`, `password`, `fullname`
$query = "SELECT * FROM `user` WHERE `email` = '$em' AND `password` = '$pw'";
echo $query; //you can display the query for debug purpose, must be commented in production

//dealing with the database with $db variable
//most select query can be done by using getAllRows function
$resultarray = $db->getAllRows($query);
//it returns an associate 2 dimentional array of the select result
//it returns an empty array if no row is selected or the query fails

//print out array easily with printr($item) method, because echo cannot print array
printr($resultarray);//you can display the query for debug purpose, must be commented in production

//sizeof($array) checks the size of an array
if(sizeof($resultarray) == 1)
{
	//get the first member of the array
	$user = $resultarray[0];
	
	//login success since the user credential matches
	//create an accociate array to be send back to android
	$responseArray = array();
	$responseArray['status'] = 'success';
	$responseArray['userid'] = $user['id'];
	$responseArray['username'] = $user['fullname'];
	
	//sendResponse($array) to response the request from android with a JSON string
	sendResponse($responseArray);
}
else
{
	$responseArray = array();
	$responseArray['status'] = 'failed';
	$responseArray['msg'] = 'Incorrect email or password';
	sendResponse($responseArray);
}
//back to android, you can check the responses with the key name 'userid'
//if the value is 0 means login failed, thus displaying error message
//else if value greater thn 0 means login success, store the userid and username up somewhere for later use
//else means something wrong with the server, responding some other thing eg. php syntax error, db connection error
?>