<?php

$server="localhost";
$username="root";
$password="";
$dbname="getform";

$con=mysqli_connect($server,$username,$password,$dbname);
if(!$con)
{
    die("failed".mysqli_connect_error());
}


?>