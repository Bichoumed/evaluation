<?php
if (count($_POST) > 0) {
    include 'connection.php';
    $query = "UPDATE `question` set question='" . $_POST['question'] .
        "',nomaxe='" . $_POST['nomaxe'] .
        "'WHERE numquestion='" . $_POST['numquestion'] . "'";
    if (mysqli_query($conn, $query)) {
        $msg = 2;
    } else {
        $msg = 4;
    }
}
header("Location: index.php?msg=" . $msg . "");
?>