<?php include_once ("controller.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bleulabs mot de passe oublier</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="contain">
        <div class="signin-signup">
        
        <div id="line">
        <form action="forgot.php" method="POST" autocomplete="off" class="sign-in-form">
            <?php
            if ($errors > 0) {
                foreach ($errors as $displayErrors) {
            ?>
                    <div id="alert"><?php echo $displayErrors; ?></div>
            <?php
                }
            }
            ?>
            <h2 class="title">Verification d'Email</h2>
            <div class="input-field">
                    <i class="fas fa-user"></i>
            <input type="email" name="email" placeholder="Email"><br>
            </div>
            <input type="submit" name="forgot_password" value="Check" class="btn">
            <a href="login.php">connectez-vous</a></p>
        </form>
    </div>
    </div>
</body>

</html>