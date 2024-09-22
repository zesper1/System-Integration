<?php
$name = "localhost";
$uname = "zedrick";
$upass = "1234";

$db_name = "sdao";

$conn = mysqli_connect($name, $uname, $upass, $db_name);

if(!$conn) {
    die("Something went wrong.");
}