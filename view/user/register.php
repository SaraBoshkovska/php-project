<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/login-style.css">   
  
        <title>Register</title>
    </head>
    <body>

        <div class="glass-container2">
          <div class="register-box">
          <h2>Register</h2>
           <?php if (isset($error)): ?>
              <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
            <?php endif; ?>
                <form action="/../../php-project/index.php?action=register" method="post">
                
                    <input type="text" id="username" name="username" placeholder="Username" required value="<?php htmlspecialchars($username ?? ''); ?>">
                    
                    <input type="email" id="email" name="email" placeholder="Email"  required value="<?php htmlspecialchars($email ?? ''); ?>">
                    
                    <input type="password" id="password" name="password" placeholder="Password" required>
  
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" required>

                    <input type="text" id="name" name="name" placeholder="Name" required value="<?php htmlspecialchars($name ?? ''); ?>">

                    <input type="text" id="country" name="country" placeholder="Country" required value="<?php htmlspecialchars($country ?? ''); ?>">
                    
                    <input type="tel" id="phone" name="phone" placeholder="Phone Number" required value="<?php htmlspecialchars($phone ?? ''); ?>">
                    <input type="hidden" id="role" name="role" value="Customer">
                    <button type="submit" >Register</button>
                    <p class="mt-3">Already have an account? <a href="/../../php-project/view/user/login.php" id="register"  >Login here</a>.</p>
                </form>
               
           </div>
        </div>
    </body>
</html>