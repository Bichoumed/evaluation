<?php
if(count($_POST)>0){
include 'connection.php';
$query = "UPDATE `etudient` set matricule='". $_POST['matricule'] .
 "',nom='" . $_POST['nom'] . "', prenom='" . $_POST['prenom'] .
  "'WHERE matricule='" . $_POST['matricule'] . "'"; 
  // update form data from the database
 if (mysqli_query($conn, $query)) {
    $msg = 2;
 } else {
    $msg = 4;
 }
}
header ("Location: index.php?msg=".$msg."");
?>