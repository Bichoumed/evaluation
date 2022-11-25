<?php

if(count($_POST)>0)
{    
     include 'connection.php';

     $numquestion = $_POST['numquestion'];
     $question = $_POST['question'];
     $numaxe = $_POST['numaxe'];
     

 
     $query = "INSERT INTO `question`(`numquestion`, `question`, `numaxe`)
     VALUES ('$numquestion','$question','$numaxe')";
 
     if (mysqli_query($conn, $query)) {
        $msg = 1;
     } else {
        $msg = 4;
     }
}
  #Redirect to list students
  header ("Location: index.php?msg=".$msg."");
?>