<?php
if(count($_POST)>0){
include 'connection.php';
$query = "UPDATE `matieres` set codematieres='". $_POST['codematieres'] .
 "',nommatieres='" . $_POST['nommatieres'] . "',Module='" . $_POST['Module'] .
  "'WHERE codematieres='" . $_POST['codematieres'] . "'"; 
  // update form data from the database
mysqli_query($conn, $query);
 
}
header ("Location: index.php?msg=".$msg."");
?>