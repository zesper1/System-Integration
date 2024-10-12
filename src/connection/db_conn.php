<?php
$name = "localhost";
$uname = "root";
$upass = "";

$db_name = "sdao";

$conn = mysqli_connect($name, $uname, $upass, $db_name);

if(!$conn) {
    die("Something went wrong.");
}