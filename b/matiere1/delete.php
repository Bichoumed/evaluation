<?php


include 'connection.php';

$query = "DELETE FROM matieres WHERE codematieres='". $_GET["codematieres"]."'"; 
// Delete data from the table matieres using id

 if (mysqli_query($conn, $query)) {
   echo" <div class='alert alert-danger' role='alert'>
  This is a danger alert—check it out!
</div>";

 } 

header ("Location: index.php");
?>
