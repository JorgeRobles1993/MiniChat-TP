<?php
require_once './config/connexion.php';
include './partials/header.php';


$prepareRequest =  $connexion->prepare(
  "SELECT * FROM `UserMessages` 
  JOIN ChatUsers
      ON UserMessages.user_id = ChatUsers.id
  ORDER BY `UserMessages`. `dateHour` ASC
  "
);

$prepareRequest->execute();

$message = $prepareRequest->fetchAll(PDO::FETCH_ASSOC);


$prepareRequest = $connexion->prepare("SELECT * FROM `ChatUsers` ORDER BY `ChatUsers`.`id` ASC ;");

$prepareRequest->execute();

$listusers = $prepareRequest->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="progress" role="progressbar" aria-label="Success example" aria-valuenow="3" aria-valuemin="0" aria-valuemax="100">
  <div class="progress-bar bg-primary" style="width: 70%">70%</div>
</div>

<!-- chat window -->
<section class="container">

  <div class="row align-items-start" id="chat-window">
    <div class="chat-container col-9 border rounded ">

      <ul>
      </ul>

    </div>


    <div class="chat-container col-3 border rounded bg-transparent">
      <h3 class="text-white border border-5 rounded">Profil and users online</h3>

      <?php
      foreach ($listusers as $key) { ?>

        <p class="text-white border-bottom border-3 p-3 m-2"> <img src="./images//Circulo_verde.png" width="40px" alt=""> <span class="fw-bold"> <?= $key['user_name'] . "</span>" ?> </p>

      <?php  } ?>

    </div>

    <!-- </div class="users-online"> </div> -->
  </div>

</section>



<?php
if (isset($_COOKIE['username_cookie'])) { ?>

  <section class="container chat-form">
    <div class="form row align-items-start">

      <form action="./process/addUser+Message.php" method="post">
        <div class="input-group p-3 m-2">

          <span class="input-group-text" id="basic-addon1"><img class="fa-beat" width="30px" src="./images/red-devil-png.png" alt="" srcset=""></span>
          <input type="text" class="form col-2 rounded" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" id="username" name="user_name" value="<?= $_COOKIE['username_cookie'] ?>">
        </div>

        <div class="input-group">
          <span class="input-group-text">Message</span>
          <textarea class="form-control rounded" aria-label="With textarea" id="messages" name="messages"></textarea>
          <input type="hidden" id="user_ip" name="user_ip" value="<?= $_SERVER['REMOTE_ADDR'] ?>">
          <button type="submit" class="btn btn-warning p-1 m-1 rounded">Send Message</button>
        </div>
      </form>
    </div>
  </section>




<?php } else {

?>
  <section class="container chat-form">
    <div class="form row align-items-start">

      <form action="./process/addUser+Message.php" method="post">
        <div class="input-group p-3 m-2">

          <span class="input bg-transparent m-2" id="basic-addon1"><img class="fa-beat bg-transparent" width="30px" src="./images/red-devil-png.png" alt="" srcset=""></span>
          <input type="text" class="form col-2 rounded" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" id="username" name="user_name">
        </div>

        <div class="input-group">
          <span class="input-group-text">Message</span>
          <textarea class="form-control rounded" aria-label="With textarea" id="messages" name="messages"></textarea>
          <input type="hidden" id="user_ip" name="user_ip" value="<?= $_SERVER['REMOTE_ADDR'] ?> ">
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


<?php
include './partials/footer.php'
?>