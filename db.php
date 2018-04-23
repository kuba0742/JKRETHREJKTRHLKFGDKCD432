<?php

$host = "";
$user = "";
$pass = "";
$data = "";

$con = new mysqli($host, $user, $pass, $data);

if($con->connect_errno)
{
    printf("Connect failed: %s\n", $con->connect_error);
}