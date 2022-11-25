<?php
session_start();
 $errors = [];
$login=$_POST['email'];
include("connection.php");
if(count($_POST)>0) {
    $sel=mysqli_query($conn,"SELECT * from users WHERE login='$login'");
    $tab=mysqli_fetch_assoc($sel);
      if(count($tab)>0){
if(md5($_POST["currentPassword"]) == $tab["pass"] && $_POST["newPassword"] == $_POST["confirmPassword"] ) {
 $sel1=mysqli_query($conn,"UPDATE users set pass='" .md5($_POST["newPassword"] ). "' WHERE login='$login'");?>
 <script type="text/javascript">
   alert("Password Changed Sucessfully")
 </script>
<?php
} else{
  $errors['Password']= "Password is not correct";
}
}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Password Change</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="containe">
  <div class="signin-signup">
    <form method="post" action="" autocomplete="off" class="sign-in-form">
      <h2 class="title">CHANGER MOT DES PASSE</h2>
<div class="input-field">
  <i class="fas fa-user"></i>
<input type="email" name="email" placeholder="Email">
</div>
<div class="input-field">
  <i class="fas fa-lock"></i>

<input type="password" placeholder="Current Password" name="currentPassword"><span id="currentPassword" class="required"></span>
</div>
<div class="input-field">
                    <i class="fas fa-lock"></i>
<input type="password" placeholder="New Password" name="newPassword"><span id="newPassword" class="required"></span>
</div>
<div class="input-field">
                    <i class="fas fa-lock"></i>
<input type="password" placeholder="Confirm Password" name="confirmPassword"><span id="confirmPassword" class="required"></span>
</div>
<input type="submit"  class="btn">
<h3><a href="login.php">connectez-vous</a></h3>
</form>
<br>
<br>
</div>
</body>
</html>