<?php


include 'connection.php';

$query = "DELETE FROM `etudient` WHERE matricule='". $_GET["matricule"]."'"; 
// Delete data from the table students using id

 if (mysqli_query($conn, $query)) {
    $msg = 3;
 } else {
    $msg = 4;
 }

header ("Location: index.php?msg=".$msg."");
?>