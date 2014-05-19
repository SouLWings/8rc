<?php
$rid = $_POST['readerID'];

$con = new Mysqli('127.0.0.1','root','','student_rtvs');
$result = $con->query("SELECT tp.tag_x_position as x, tp.tag_y_position as y, t.tagID as id FROM `reader` r INNER JOIN `read tag` rt on rt.ReaderID = r.ReaderID INNER JOIN `tag` t on t.tagID = rt.TagID INNER JOIN `tag position` tp on tp.tagID = t.tagID WHERE r.readerID = $rid AND r.classroomID = t.classroomID");

while($row = $result->fetch_assoc())
	$positions[] = $row;

echo json_encode($positions);