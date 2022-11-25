<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php include('../head.php'); ?>
    <title>Ajouter un étudiant</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
        #btn{
            background-color:#0B546C;
            color:#fff;
        }
        
        </style>
</head>
<body>
<?php include('../navbar.php'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="">
                <form action="insert.php" method="post"
                      class="mt-5 border border-top-primary p-4 bg-light shadow border border-top-3-primary">
                      <a href="index.php"  id="btn" class="btn btn-primar"><i  class="fa-solid fa-arrow-left"></i></a>
                      <h4 class="mb-5 text-secondary">Ajouter un étudiant</h4>
                    <div class="row">
                        <div class="form-group">
                            <label>Matricule</label>
                            <input type="text" name="matricule" class="form-control" required="">
                        </div>

                        <div class="mb-3 col-md-12">
                            <label>Nom<span class="text-danger">*</span></label>
                            <input type="text" name="nom" class="form-control" required="">
                        </div>
                        <div class="mb-3 col-md-12">
                            <label>Prénom<span class="text-danger">*</span></label>
                            <input type="text" name="prenom" class="form-control" required="">
                        </div>
                        <div class="col-md-12">
                            <input type="submit" id="btn" class="btn btn-primar" name="submit" value="Enregistrer">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include('../footer.php'); ?>
</body>
</html>

