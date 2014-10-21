<?php
include '../utils/include.php';
$medoo = new medoo ();
Tools::set ( $medoo, "username", "apple" );

echo Tools::get ( $medoo, "username" );
?>