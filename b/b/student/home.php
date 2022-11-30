<?php 
session_start();

if (isset( $_SESSION['U']) && isset( $_SESSION['p'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" type="text/css" href="styl.css">
</head>
<body style="background-color:#022534; color:#fff;">
     <h1>Bienvenu</h1>
     <nav class="home-nav">
     	<a href="change-password.php">Change le mote de passe</a>
        <a href="./login2.php">passer</a>
     </nav>
     
</body>
</html>

<?php 
}else{
     header("Location: login.php");
     exit();
}
 ?>