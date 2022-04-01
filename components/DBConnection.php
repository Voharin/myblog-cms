<?php

    $host= "localhost";
    $user= "root";
    $password= "";
    $dbname= "myblog_cms";

    try{
        $conn= new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }

  