<?php    
    $is_logged_in = isset($_SESSION['userID']);
    $user_role = $_SESSION['role'] ?? 'Customer';

?>

<link rel="stylesheet" href="/php-project/styles/styles.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container-fluid">
    <a href="index.php" class="d-flex align-items-center">
        <img src="/php-project/images/logo.png" alt="logo" class="navbar-logo me-2">
    </a>
  
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="navlink active" href="/../php-project/index.php" aria-current="page" >Salon Sara</a>
        </li>
        <li class="nav-item">
          <a class="navlink" href="/../php-project/service_router.php?action=index">Services</a>
        </li>
        <?php if($user_role == 'Admin'): ?>
        <li class="nav-item">
          <a class="navlink" href="/../php-project/appointments.php">Appointments</a>
        </li>
        <?php endif; ?>
        <?php if ($is_logged_in): ?>
        <li class="nav-item">
          <a class="navlink" href="/php-project/view/appointments/create_appointment.php">Schedule an appointment</a>
        </li>
        <?php endif; ?>
        <li class="nav-item">
          <a class="navlink" href="/php-project/view/contact.php">Contact</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto">
      <?php if ($is_logged_in): ?>
      <li class="nav-item">
      <a class="nav-link" style="color:azure" ><?php echo htmlspecialchars($_COOKIE['username']); ?></a>
      </li>
      <li class="nav-item">
       <a class="nav-link" href="/php-project/index.php?action=logout" style="color:azure">Logout</a>
        </li>
       <?php else: ?>
      <li class="nav-item">
      <a class="nav-link" href="../php-project/view/user/register.php" style="color:azure">Register</a>
      </li>
       <li class="nav-item">
      <a class="nav-link" href="../php-project/view/user/login.php" style="color:azure">Login</a>
     </li>
       <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>


    
