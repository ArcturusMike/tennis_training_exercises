<?php
error_reporting(0);
$db = mysqli_connect("localhost", "username", "password", "tennistraining");

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
?>