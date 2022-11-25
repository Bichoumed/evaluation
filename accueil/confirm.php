<?php 
@session_start();

if (isset( $_SESSION['U']) && isset( $_SESSION['p'])) {
	?>
	<!DOCTYPE html>
<html>
<head>
	<title>confirmation</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="styl.css">
</head>
<body style="background-color:#181c32; color:#fff;">
<div class="container vh-100">
		<div class="row justify-content-center h-100">
			<div class="card w-45 my-auto shadow" style="padding:4%";>
	<div class="form-group">
    <h2 class="form-control button" style="background-color:#181c32; color:#fff;">Votre réponse a bien été enregistrée</h2>
    <a href="matieres.php" style=" text-align: center; left:10%;">Cliquez ici pour envoyer une autre réponse </a>
</div>
</div>
</div>
</div>
</body>
</html>

<?php 
}else{
     header("Location: login.php");
     exit();
}
 ?>
 