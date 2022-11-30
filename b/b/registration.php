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
    <title>Registration</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
        <div class="containe">
        <div class="signin-signup">
        <div id="line">
        <form action="registration.php" method="POST" autocomplete="off" class="sign-up-form">
        <?php
            if($errors > 0){
                foreach($errors AS $displayErrors){
                ?>
                <div id="alert"><?php echo $displayErrors; ?></div>
                <?php
                }
            }
            ?> 
            

            <h2 class="title">Sign up</h2>
                
      <form name="fo" method="post" action="">
      <div class="input-field">
                    <i class="fas fa-user"></i>
         <input type="text"name="fname" class="name" placeholder="Nom" required /><br />
      </div>
                <div class="input-field">
                    <i class="fas fa-user"></i>
         <input type="text" name="lname" class="name" placeholder="Prénom" required /><br />
                </div>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
         <input type="email" name="email" placeholder="Email"/><br />
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
         <input type="password" name="password" placeholder="Mot de passe" required /><br />
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
         <input type="password" name="confirmPassword" placeholder="Confirmer Mot de passe" required /><br />
                </div>
          
         <input type="submit" name="signup" value="S'authentifier" class="btn"/>
         <p>Vous avez déjà un compte ? <a href="login.php">connectez-vous</a></p>
      </form>
       
    </div>
   </body>
</html>
          