<?php


include 'connection.php';

$query = "DELETE FROM matieres WHERE codematieres='". $_GET["codematieres"]."'"; 
// Delete data from the table matieres using id

 if (mysqli_query($conn, $query)) {
    $msg = 3;
 } else {
    $msg = 4;
 }

header ("Location: index.php?msg=".$msg."");
?>
