<?php 
// date_default_timezone_set('Europe/Paris');

include '../config/debug.php';

if (!empty($_POST['messages'])) {

    require_once '../config/connexion.php';

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


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>