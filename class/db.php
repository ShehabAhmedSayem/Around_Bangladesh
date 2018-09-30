<?php

$dbconnect = mysqli_connect("localhost", "root", "", "around_");
if(mysqli_connect_errno()) {
    die("Connection failed:".mysqli_connect_error());
}

?>