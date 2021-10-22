<?php

$conn = new mysqli("localhost","root", "", "tijaabo");

if($conn->connect_error){
    echo $conn->error;
}



?>