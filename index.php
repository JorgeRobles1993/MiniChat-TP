<?php
require_once './config/connexion.php';
include './partials/header.php';

$prepareRequest = $connexion->prepare("SELECT ChatUsers.user_name , UserMessages.messages , UserMessages.dateHour FROM `UserMessages` LEFT JOIN ChatUsers ON UserMessages.user_id = ChatUsers.id ORDER BY `UserMessages`. `dateHour` ASC;");

$prepareRequest->execute();

$message = $prepareRequest->fetchAll(PDO::FETCH_ASSOC);


?>

<div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="3" aria-valuemin="0" aria-valuemax="100">
    <div class="progress-bar bg-primary" style="width: 15%">15%</div>
</div>

<!-- chat window -->
<section class="container">

<div class="chat-container container-fluid text-center">
  <div class="row align-items-start">
    <div class="col-9 border">
      
    <?php 
  foreach ($message as $key) { ?>

    <p> <?= $key['user_name'] . ": " . $key['messages']  ?></p>
  






<?php  } ?>

    </div>




    <div class="col-3 border">
      Profil and users online


    </div class="users-online"> </div>
    </div>
  </div>
</div>



</section>




<section class="container chat-form">
    <div class="form">
        
        <form action="./process/addUser+Message.php" method="post">
            <div class="input-group mb-3">
                
                <span class="input-group-text" id="basic-addon1"><i class="fa-regular fa-user fa-2xl" style="color: #000000;"></i></span>
                <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" name="user_name">
            </div>
            
            <div class="input-group">
                <span class="input-group-text">Message</span>
                <textarea class="form-control" aria-label="With textarea" name="messages"></textarea>
                <input type="hidden" name="user_ip" value="<?= $_SERVER['REMOTE_ADDR'] ?> ">
                
            </div>
            <button type="submit" class="btn btn-danger">Send Message</button>
        </form>
    </div>
</section>







<?php
include './partials/footer.php'
?>