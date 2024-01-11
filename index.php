<?php
require_once './config/connexion.php';
include './partials/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  


<?php
// $prepareRequest = $connexion->prepare("SELECT ChatUsers.user_name , UserMessages.messages , UserMessages.dateHour FROM `UserMessages` LEFT JOIN ChatUsers ON UserMessages.user_id = ChatUsers.id ORDER BY `UserMessages`. `dateHour` ASC;");

$prepareRequest =  $connexion->prepare(
  "SELECT * FROM `UserMessages` 
  JOIN ChatUsers
      ON UserMessages.user_id = ChatUsers.id
  ORDER BY `UserMessages`. `dateHour` ASC
  ");

$prepareRequest->execute();

$message = $prepareRequest->fetchAll(PDO::FETCH_ASSOC);


$prepareRequest = $connexion->prepare("SELECT * FROM `ChatUsers` ORDER BY `ChatUsers`.`id` ASC ;");

$prepareRequest->execute();

$listusers = $prepareRequest->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="3" aria-valuemin="0" aria-valuemax="100">
  <div class="progress-bar bg-primary" style="width: 50%">50%</div>
</div>

<!-- chat window -->
<section class="container">

    <div class="row align-items-start">
      <div class="chat-container col-9 border rounded ">

        <?php
        foreach ($message as $key) { ?>

          <p class="border border-3 border-black rounded-pill p-3 m-2"> 
           
            <i class="fa-regular fa-comment fa-2xl"></i> 
            
              
              <span class="fw-bold"> <?= $key['user_name'] .  "</span>" . ": " . $key['messages']  ?>
          </p>

        <?php  } ?>

      </div>


      <div class="chat-container col-3 border rounded bg-transparent">
        <h3 class="text-white border border-5 rounded">Profil and users online</h3>

        <?php
        foreach ($listusers as $key) { ?>

          <p class="text-white border-bottom border-3 p-3 m-2"> <img src="./images//Circulo_verde.png" width="40px" alt=""> <span class="fw-bold"> <?= $key['user_name'] . "</span>" ?> </p> 

        <?php  } ?>



      </div class="users-online">
    </div>
  </div>
</div>
</div>



</section>



<?php
if(isset($_COOKIE['username_cookie'])){ ?>

  <section class="container chat-form">
  <div class="form row align-items-start">

    <form action="./process/addUser+Message.php" method="post">
      <div class="input-group p-3 m-2">

        <span class="input-group-text" id="basic-addon1"><img class="fa-beat" width="30px" src="./images/red-devil-png.png" alt="" srcset=""></span>
        <input type="text" class="form col-2 rounded" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="user_name" value="<?= $_COOKIE['username_cookie'] ?>">
      </div>

      <div class="input-group">
        <span class="input-group-text">Message</span>
        <textarea class="form-control rounded" aria-label="With textarea" id="messages" name="messages"></textarea>
        <input type="hidden" name="user_ip" value="<?= $_SERVER['REMOTE_ADDR'] ?> ">
        <button type="submit" class="btn btn-warning p-1 m-1 rounded">Send Message</button>
      </div>
    </form>
  </div>
</section>




<?php }else{  

?>
<section class="container chat-form">
  <div class="form row align-items-start">

    <form action="./process/addUser+Message.php" method="post">
      <div class="input-group p-3 m-2">

        <span class="input-group-text" id="basic-addon1"><img class="fa-beat" width="30px" src="./images/red-devil-png.png" alt="" srcset=""></span>
        <input type="text" class="form col-2 rounded" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="user_name">
      </div>

      <div class="input-group">
        <span class="input-group-text">Message</span>
        <textarea class="form-control rounded" aria-label="With textarea" id="messages" name="messages"></textarea>
        <input type="hidden" name="user_ip" value="<?= $_SERVER['REMOTE_ADDR'] ?> ">
        <button type="submit" class="btn btn-warning p-1 m-1 rounded">Send Message</button>
      </div>
    </form>
  </div>

  
</section>


<?php } ?>

<!-- 
<input type="button" value="saludame" onclick="ajaxfunction();"> -->



<footer>


</footer>
  <script src="./javascript/index.js"></script>
</body>
</html>

<?php
include './partials/footer.php'
?>