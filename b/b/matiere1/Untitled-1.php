<form method="post">
<input type='date' name="debut" >[]
</form>
<?php

$debut=$_POST["debut"];
$today= date("d/m/Y H:i:s"); // Affiche la date du jour
$fin=$_POST["fin"];
echo "Il est " . date("H:i:s") ; // Affiche l'heure
?>