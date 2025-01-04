<?php
 session_start();

  include './controller/UserController.php';
  
   /*$https = filter_input(INPUT_SERVER, 'HTTPS');
   
    if (!$https) {
        $host = filter_input(INPUT_SERVER, 'HTTP_HOST');
        $uri = filter_input(INPUT_SERVER, 'REQUEST_URI');
        $url = 'https://' . $host . $uri;
        header("Location: " . $url);
        exit;
    }
    */
?>
<!DOCTYPE html>
<html lang="en">
<?php 

   $title="Home Page";
   include './include/head.inc.php';

?>
<style>
    .carousel-item img {
    filter: blur(2px); 
    }
    h5,p{
        font-family: "Montserrat";
        color:silver;
        font-size: 30px;
    }
    .sec{
        color:black;
    }
    
</style>
<?php
require_once './controller/UserController.php';

$action = filter_input(INPUT_GET, 'action');
$userController = new UserController();

switch ($action) {
    case 'show_register_form':
        $userController->show_register_form();
        break;
    case 'register':
        $userController->register();
        break;
    case 'login':
        $userController->login();
        break;
    case 'show_login_form':
        $userController->show_login_form();
        break;
    case 'logout':
        $userController->logout();
        break;
}
?>

<body>
    <?php
    include './include/navigation.inc.php'
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="./images/frizura.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-flex flex-column h-100 align-items-center justify-content-center">
        <h5>Get the best style</h5>
        <p>Want to dress to impress? Get your hairstyle here</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="./images/boja.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-flex flex-column h-100 align-items-center justify-content-center">
        <h5 class="sec">Finding your color</h5>
        <p class="sec">Blonde? Black? Pink? We have every color!</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="./images/sisanje.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-flex flex-column h-100 align-items-center justify-content-center">
        <h5>Always wanted to look different?</h5>
        <p>Get your signature look today!</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
</body>
</html>