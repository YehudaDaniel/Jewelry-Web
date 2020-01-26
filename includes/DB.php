<?php
$conn = mysqli_connect('localhost', 'root', '', 'MomsWeb');

if(!$conn){
    die("Connection Failed! " . mysqli_connect_error());
}

?>