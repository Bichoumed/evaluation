<?php
// foo.php
$errors = array (
    1 => "L'enregistrement a été inséré avec succès",
    2 => "L'enregistrement a été mis à jour avec succès",
    3 => "L'enregistrement a été supprimé avec succès",
    4 => "Erreur de la base de données. Veuillez vérifier votre requête",
);

$error_id = isset($_GET['msg']) ? (int)$_GET['msg'] : 0;

if ($error_id != 0 && in_array($error_id, [1,2,3,4])) {
            echo ('<div class="col-md-12 mt-3">');
            echo ('<div class="alert alert-success alert-dismissible fade show" role="alert">');
            echo '<strong>' .$errors[$error_id]. '</strong>';
            echo '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>';
            echo '</div>';
            echo '</div>';
}else{
    echo '';
}
?>
