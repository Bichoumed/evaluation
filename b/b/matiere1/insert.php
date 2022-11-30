<?php

if(count($_POST)>0)
{    
     include 'connection.php';

     $codematieres = $_POST['codematieres'];
     $nommatieres = $_POST['nommatieres'];
     $Module = $_POST['Module'];
     
 
     $query = "INSERT INTO `matieres`(`codematieres`, `nommatieres`,`Module`)
     VALUES ('$codematieres','$nommatieres','$Module')";
 
     mysqli_query($conn, $query)
     
}
  #Redirect to list students
  header ("Location: index.php?msg=".$msg."");
?>