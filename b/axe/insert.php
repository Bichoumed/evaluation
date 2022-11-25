<?php

if(count($_POST)>0)
{    
     include 'connection.php';

     $numaxe = $_POST['numaxe'];
     $nomaxe = $_POST['nomaxe'];

     $query = "INSERT INTO `axe`(`numaxe`, `nomaxe`)
     VALUES ('$numaxe','$nomaxe')";
 
     if (mysqli_query($conn, $query)) {
        $msg = 1;
     } else {
        $msg = 4;
     }
}
  #Redirect to list students
  header ("Location: index.php?msg=".$msg."");
  
?>