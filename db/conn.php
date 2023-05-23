<?php
    $host="localhost";
    $db="attendance";
    $user="root";
    $pass="";

    $dsn="mysql:host=$host;dbname=$db";

    try{
        $pdo=new PDO($dsn,$user,$pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        throw new PDOException($e->getmessage());
    }
    require_once 'crud.php';
    $crud=new crud($pdo);
?>