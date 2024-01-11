<?php 
date_default_timezone_set('Europe/Paris');
require_once '../config/connexion.php';

$preparerequest = $connexion->prepare("SELECT * FROM ChatUsers WHERE user_name = " . "'" . $_POST['user_name'] . "'");

$preparerequest->execute();

$user = $preparerequest->fetch();


if(!empty($user) && (!empty($_POST['messages']) && (!empty($_POST['user_name'])))){
    
    $preparedRequest = $connexion->prepare(
        "INSERT INTO UserMessages (messages , user_ip , user_id , dateHour) VALUES (?,?,?,?)"
    );
    $preparedRequest->execute([
        $_POST['messages'],
        $_POST['user_ip'],
        $user['id'],
        date("d-m-y h:i:s")
        
    ]);
    
    $valeurcookie = $_POST['user_name'];
    setcookie('username_cookie' , $valeurcookie, time()+3600, "/");
    
    header('Location: ../index.php');

}else if(!empty($_POST['messages']) && !empty($_POST['user_name'])){
    
    $preparedRequest = $connexion->prepare("INSERT INTO ChatUsers (user_name) VALUES (?)");

    $preparedRequest->execute([
        $_POST['user_name']
    ]);

    
    $userID = $connexion->lastInsertId();
    
    $preparedRequest = $connexion->prepare(
        "INSERT INTO UserMessages (messages , user_ip , user_id , dateHour) VALUES (?,?,?,?)"
    );
    $preparedRequest->execute([
        $_POST['messages'],
        $_POST['user_ip'],
        $userID,
        date("d-m-y h:i:s")
        
      
    ]);
    $valeurcookie = $_POST['user_name'];
    setcookie('username_cookie' , $valeurcookie, time()+3600, "/");
    
    header('Location: ../index.php');
    }else{
    header('Location: ../index.php');


    }



    