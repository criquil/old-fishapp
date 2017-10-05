<?php
$db_host = "127.0.0.1";
$db_user = "root";
$db_pass = "root";
$db_name = "fishingappdb";
$db = mysql_connect($db_host, $db_user, $db_pass);
if (!$db) {
 die('Could not connect: ' . mysql_error());
}
mysql_select_db($db_name,$db);
$result = mysql_query("SELECT * FROM places", $db);
$xml = new SimpleXMLElement('<xml/>');
while($row = mysql_fetch_assoc($result)) {
 $draw = $xml->addChild('location');
 $draw->addChild('id',$row['id']);
 $draw->addChild('place',$row['name']);
 $draw->addChild('description',$row['description']);
 $draw->addChild('lat',$row['lat']);
 $draw->addChild('long',$row['long']);
}
$fp = fopen("xml/places.xml","wb");
fwrite($fp,$xml->asXML());
fclose($fp);
mysql_close($db);

?>
