<?php
   //session_start();
   include_once ("controller.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
        <div class="signin-signup">
        <div id="line">
        <form action="login.php" method="POST" autocomplete="off" class="sign-in-form">
        <?php
            if($errors > 0){
                foreach($errors AS $displayErrors){
                ?>
                <div id="alert"><?php echo $displayErrors; ?></div>
                <?php
                }
            }
            ?>
            <h2 class="title">Sign in</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
            <input type="email" name="email" placeholder="Email"><br>
            </div>
            <div class="input-field">
                    <i class="fas fa-lock"></i>
            <input type="password" name="password" placeholder="Password"><br>
            </div>
            <input type="submit" name="login" value="Login" class="btn">
            <a href="forgot.php" id="forgot">Mot de passe oublier?</a>
            <p style="margin-top: 10px;">Cree un compte <a href="registration.php" id="sign-up-btn2">Sign Up</a></p>
        
        </form> 
</div>    
</body>
</html>