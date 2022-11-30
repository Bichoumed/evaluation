<?php 
session_start();

if (isset( $_SESSION['U']) && isset( $_SESSION['p'])) {
	?>
	<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
	<link rel="stylesheet" type="text/css" href="styl.css">
</head>
<body style="background-color:#fff; color:#fff;">
	
    <form action="change-p.php" method="post" >
     	<h2>Change Password</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

     	<?php if (isset($_GET['success'])) { ?>
            <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>
		<label>Email</label>
     	<input type="email" 
     	       name="email" 
     	       placeholder="votre email">
     	       <br>
     	<label>Old Password</label>
     	<input type="password" 
     	       name="op" 
     	       placeholder="ancien mot de passe">
     	       <br>

     	<label>New Password</label>
     	<input type="password" 
     	       name="np" 
     	       placeholder="Nouveau mot de passe">
     	       <br>

     	<label>Confirm New Password</label>
     	<input type="password" 
     	       name="c_np" 
     	       placeholder="Confirmer le nouveau mot de passe">
     	       <br>

     	<button type="submit">CHANGER</button>
          <a href="home.php" class="ca">Accueil</a>
     </form>
</body>
</html>

<?php 
}else{
     header("Location: login.php");
     exit();
}
 ?>
 