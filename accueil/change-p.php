<?php 
session_start();

if (isset( $_SESSION['U']) && isset( $_SESSION['p'])) {

	include "connection.php";

if (isset($_POST['op']) && isset($_POST['np'])
    && isset($_POST['c_np'])&& isset($_POST['email'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$op = validate($_POST['op']);
	$np = validate($_POST['np']);
	$c_np = validate($_POST['c_np']);
	$email = validate($_POST['email']);
    
    if(empty($op)){
      header("Location: change-password.php?error=Old Password is required");
	  exit();
    }else if(empty($np)){
      header("Location: change-password.php?error=New Password is required");
	  exit();
    }else if($np !== $c_np){
      header("Location: change-password.php?error=The confirmation password  does not match");
	  exit();
	}else if(empty($email)){
		header("Location: change-password.php?error=Email is required");
		exit();
    }else {
    	// hashing the password
    	$op = $_POST['op'];
    	$np = $_POST['np'];
        $email =$_POST['email'];

        $sql = "SELECT password
                FROM users WHERE 
                email='$email' AND password='$op'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) === 1){
        	
        	$sql2 = "UPDATE users
        	          SET password='$np'
        	          WHERE email='$email'";
        	mysqli_query($conn, $sql2);
        	header("Location: change-password.php?success=Your password has been changed successfully");
	        exit();

        }else {
        	header("Location: change-password.php?error=Incorrect password");
	        exit();
        }

    }

    
}else{
	header("Location: change-password.php");
	exit();
}

}else{
     header("Location: login.php");
     exit();
}