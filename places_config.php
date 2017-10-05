<?php
/*$db = new Mysqli("localhost", "root", "root", "fishingappdb");
if (mysqli_connect_errno()){
	die('Connect Error: ' .  mysqli_connect_error());
}*/


$user = 'root';
$password = 'root';
$dba = 'test';
$host = 'localhost';
$port = 3306;

$link = mysqli_init();
$db = mysqli_real_connect(
   $link,
   $host,
   $user,
   $password,
   $dba,
   $port
);

if (success){
	echo $db;
}
?>
