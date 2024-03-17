<?php
$locahost="localhost";
$user="root";
$pass="";
$db="brightly";

$conn=mysqli_connect($locahost,$user,$pass,$db);
if(!$conn)
{
 die("Connection Failed:".mysqli_connect_error());
}
?>