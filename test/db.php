<?php
include '../utils/include.php';
// $db = new medoo ();

// $username = "root";
// $password = "root";
// $db_database = "testdb";
// $db2 = new mysql ( "localhost", $username, $password, $db_database, "pconn", "UTF8" );
// Tools::set ( $db, "password", $username );
// Tools::set ( $db, "username", $password );
// $table = "persons";
// $datas = array (
// 'id' => "00003",
// 'FirstName' => "35",
// 'LastName' => "37",
// 'Age' => "43"
// );
// $db2->insert($table, "id, FirstName, LastName, Age", "'00004', '35', '37', '43'");
// $result = $db2->select ( $table );
// $person = new Persons ();

// Tools::set ( $person, "name", $username );
// Tools::set ( $person, "username", $password );

// while($row = mysql_result($result)){
// echo $row['Age'];
// }

$con = mysql_connect ( "localhost", "root", "root" );
if (! $con) {
	die ( 'Could not connect: ' . mysql_error () );
}

mysql_select_db ( "testdb", $con );

$result = mysql_query ( "SELECT * FROM persons" );

while ( $row = mysql_fetch_array ( $result ) ) {
	echo $row ['FirstName'] . " " . $row ['LastName'];
}

mysql_close ( $con );
?>