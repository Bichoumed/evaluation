<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
if($email == false){
  header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create a New Password</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
   
</head>
<body>
<div class="container vh-100">
		<div class="row justify-content-center h-100">
			<div class="card w-45 my-auto shadow" style="padding:4%;";>
                <form action="new-password.php" method="POST" autocomplete="off">
                    <h2 class="text-center">Nouveau mot de passe</h2>
                    <?php 
                    if(isset($_SESSION['info'])){
                        ?>
                        <div class="alert alert-success text-center">
                            <?php echo $_SESSION['info']; ?>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="form-group">
                        <input class="form-control" type="password" name="password" placeholder="Créer nouveau mot de passe" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" name="cpassword" placeholder="Confirmer votre mot de passe" required>
                    </div>
                    <div class="form-group">
                        <input class="form-control button" style="background-color:#1A1A80; color:#fff;" type="submit" name="change-password" value="Change">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>