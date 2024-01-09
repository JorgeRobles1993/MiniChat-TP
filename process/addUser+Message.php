<?php 
date_default_timezone_set('Europe/Paris');
require_once '../config/connexion.php';

$preparerequest = $connexion->prepare("SELECT * FROM ChatUsers WHERE user_name = " . "'" . $_POST['user_name'] . "'");

$preparerequest->execute();

$user = $preparerequest->fetch();

var_dump($user, $_POST);


if(!empty($user)){
    
    $preparedRequest = $connexion->prepare(
        "INSERT INTO UserMessages (messages , user_ip , user_id , dateHour) VALUES (?,?,?,?)"
    );
    $preparedRequest->execute([
        $_POST['messages'],
        $_POST['user_ip'],
        $user['user_name'],
        date("Y-m-d H:i:s")
        
    ]

    );
}else{
    
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
        date("Y-m-d H:i:s")
        
    ]);
        
    }



    