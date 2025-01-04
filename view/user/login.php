<!DOCTYPE html>
<html>

    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="../../styles/login-style.css">

        <title>Login</title>
    
    </head>
    <body>
      
            <div class="glass-container">
                <div class="login-box">
                <h2>Login</h2>
                <?php if (isset($error)): ?>
                    <div class="alert alert-danger"><?php echo htmlspecialchars($error); ?></div>
                <?php endif; ?>
                <form action="/../../php-project/index.php?action=login" method="post">
 
                    <input type="text" id="username" name="username" required placeholder="Username" required value="<?php htmlspecialchars($username ?? ''); ?>">
                    <p></p>
                    <input type="password" id="password" name="password" required placeholder="Password" required>
          
                     <p></p>
                    <button type="submit">Login</button>
                
                <p class="mt-3">Don't have an account? <a href="/../../php-project/view/user/register.php" id="register"  >Register here</a>.</p>
                </form>           
            </div>
         </div>
    </body>
</html>