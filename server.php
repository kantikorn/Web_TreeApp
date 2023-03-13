<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "datatree";

    $conn = new mysqli($servername , $username , $password ,$db);

    if($conn -> connect_error){
        die("not connect server!" . $conn->connect_error);
    } else {
       
    }

?>