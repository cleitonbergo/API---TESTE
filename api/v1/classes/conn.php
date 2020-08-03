<?php

$hostname='127.0.0.1';
$dbname='admin';
$username='root';
$password='';

    try {
        $con = new PDO("mysql:host=$hostname;dbname=$dbname",$username,$password);
        // $con = null;
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }


?>