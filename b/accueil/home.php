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
<body>
     <h1>Hello </h1>
     <nav class="home-nav">
     	<a href="change-password.php">Change Password</a>
        <a href="./login2.php">Skip</a>
     </nav>
     
</body>
</html>

<?php 
}else{
     header("Location: login.php");
     exit();
}
 ?>