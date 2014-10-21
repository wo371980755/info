<?php
include '../utils/include.php';
$name = $_POST ["name"];
$password = $_POST ["password"];
$email = $_POST ["email"];
// $comment = $_POST ["comment"];
$comment = "comment";
$table = "users";
$db_database = "testdb";
$now = date ( "Y-m-d H:i:s" );

$db = new SQLUtils ( $db_database );

$db->insert ( $table, "name, password, email, comment, creation_date", "'$name', '$password', '$email', '$comment', '$now'" );

// $result = $db->select ( $table, "count(*) as count" );
// while ( $row = mysql_fetch_array ( $result ) ) {
// 	echo $row ['count'];
// }
$db->closeConn ();
unset ( $db );
?>