<?php

if(count($_POST)>0)
{    
     include 'connection.php';

     $matricule = $_POST['matricule'];
     $nom = $_POST['nom'];
     $prenom = $_POST['prenom'];
 
     $query = "INSERT INTO `etudient`(`matricule`, `prenom`, `nom`)
     VALUES ('$matricule','$nom','$prenom')";
 
     if (mysqli_query($conn, $query)) {
        $msg = 1;
     } else {
        $msg = 4;
     }
}
  #Redirect to list students
  header ("Location: index.php?msg=".$msg."");
?>