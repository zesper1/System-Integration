<?php
$name = "localhost";
$uname = "zedrick";
$uname = "cristan";
$upass = "";

$db_name = "sdao";

$conn = mysqli_connect($name, $uname, $upass, $db_name);

if(!$conn) {
    die("Something went wrong.");
}