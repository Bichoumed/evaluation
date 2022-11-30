<?php


include 'connection.php';

$query = "DELETE FROM axe WHERE numaxe='". $_GET["numaxe"]."'";

if (mysqli_query($conn, $query)) {
    $msg = 3;
} else {
    $msg = 4;
}

header ("Location: index.php?msg=".$msg."");
?>