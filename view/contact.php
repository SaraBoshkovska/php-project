<!DOCTYPE html>
<html lang="en">

<?php
 session_start();
  $title="Contact";
  include '../include/head.inc.php';
?>

<link href="https://fonts.googleapis.com/css?family=Quicksand&display=swap" rel="stylesheet">
<body class="contact">

    <?php
    include '../include/navigation.inc.php';
    ?>

    <h1>Contact Us</h1>
    <h2 class="contact-desc">Reach out to find out more about our services.</h2>
    <div class="contact-container">
        <div class="contact-info">
            <h2>Contact Info</h2>
            <p></p>
            <div>
                <i class="fa-solid fa-phone"></i>
                <p>Phone: (+389)-444-444</p>
            </div>
            <div>
                <i class="fa-solid fa-envelope"></i>
                <p>saraboskovska23@gmail.com</p>
            </div>
            <div>
                <i class="fa-solid fa-location-dot"></i>
                <p>Mechka street 23A, SK</p>
            </div>
        </div>
        
        <?php
        include __DIR__ . '/../include/contactForm.inc.php';
        ?>
    </div>
    </body>

</html>