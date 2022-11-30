<?php
if(count($_GET)>0){
include 'connection.php';
echo $_POST['numaxe'];
$query = "UPDATE `axe` set nomaxe='" . $_POST['nomaxe'] . "' WHERE numaxe='". $_GET["numaxe"]."'";
echo $query;
 if (mysqli_query($conn, $query)) {
    echo "biem";
 } else {
    $msg = 4;
 }
}
header ("Location: index.php?msg=".$msg."");
?>