<?php
$db = new Mysqli("ec2-54-213-110-183.us-west-2.compute.amazonaws.com", "Admin", "", "test");
if ($db->connect_errno){
	die('Connect Error: ' . $db->connect_errno);
}
?>
