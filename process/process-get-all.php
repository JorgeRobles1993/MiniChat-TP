<?php
    require_once "../config/connexion.php"; 

    // $preparedRequest = $connexion->prepare(
    //     "SELECT * FROM UserMessages"
    // );

    $preparedRequest =  $connexion->prepare(
        "SELECT * FROM `UserMessages` 
        JOIN ChatUsers
            ON UserMessages.user_id = ChatUsers.id
        ORDER BY `UserMessages`. `dateHour` ASC
        "
      );


    $preparedRequest->execute();

    $todos = $preparedRequest->fetchAll(PDO::FETCH_ASSOC);


    echo json_encode($todos);