<?php 
// date_default_timezone_set('Europe/Paris');

//include '../config/debug.php';

if(!empty($_POST['messages']) && !empty($_POST['user_name'])) {

    require_once '../config/connexion.php';

    $preparerequest = $connexion->prepare("SELECT id FROM ChatUsers WHERE user_name = ?");

    $preparerequest->execute(array($_POST['user_name']));
    
    $user = $preparerequest->fetch();



    if(empty($user)){

        $preparedRequest = $connexion->prepare("INSERT INTO ChatUsers (user_name) VALUES (?)");

        $preparedRequest->execute([
            $_POST['user_name']
        ]);
        $user['id'] = $connexion->lastInsertId();

    }
        

        $preparedRequest = $connexion->prepare(
            "INSERT INTO UserMessages (messages , user_ip , user_id , dateHour) VALUES (?,?,?,?)"
        );
        $preparedRequest->execute([
            $_POST['messages'],
            $_POST['user_ip'],
            $user['id'],
            date("d-m-y h:i:s")
            
        ]);
}
?>
