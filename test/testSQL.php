<?php
error_reporting(E_ALL & ~E_NOTICE);
include '../utils/include.php';
$db = new SQLUtils ( "testdb" );

$result = $db->select ( "persons", "Age", "Age > 20");
while ( $row = mysql_fetch_array ( $result ) ) {
	echo $row ['0'] . "======";
}
?>