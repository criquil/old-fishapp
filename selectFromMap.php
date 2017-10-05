<?php
//$lat = $_GET['lat'];
//$lng = $_GET['lng'];
$json=array();
$user = 'root';
$password = 'root';
$dba = 'test';
$host = 'localhost';
$port = 3306;
/*
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
mysqli_select_db($db, $dba);
//$query=mysql_real_escape_string("SELECT * from `tbl_places` where `lat`="+$lat+" and `lng`="+$lng);
$query=mysqli_real_escape_string($db, "SELECT * from `tbl_places`"); // where `lat`=".$lat." and `lng`=".$lng);
$result = mysqli_query($db, $query );

*/


$con=mysqli_connect($host,$user,$password,$dba);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$sql="SELECT * from `tbl_places`";
$result=mysqli_query($con,$sql);







$row = mysqli_fetch_assoc($result);
if ($row)
{
$name = $row["name"];
$description = $row["description"];
$lat = $row["lat"];
$lng = $row["lng"];
$place_id = $row["place_id"];
$true1="true";
echo json_encode(array("bool" => $true1, "name" => $name, "description" => $description, "lat" => $lat, "lng" => $lng, "place_id" => $place_id));
}
else
{
$true1="false";
echo json_encode(array("bool" => $true1));
echo $lat;
echo $lng;
print $row;
}
mysql_close($db);

?>
