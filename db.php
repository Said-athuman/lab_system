<?php
$conn = mysqli_connect("localhost","root","","lab_system");
if(!$conn){
    die("Connection failed");
}
session_start();
?>