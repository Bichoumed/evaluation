<?php


include 'connection.php';

$query = "DELETE FROM question WHERE numquestion='". $_GET["numquestion"]."'";

 if (mysqli_query($conn, $query)) {
    $msg = 3;
 } else {
    $msg = 4;
 }

header ("Location: index.php?msg=".$msg."");
?>
