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
            <?php
            include 'connection.php';

            $query = "SELECT * FROM `etudient` WHERE matricule='" . $_GET["matricule"] . "'";
            $result = mysqli_query($conn, $query);

            $student = mysqli_fetch_assoc($result);


            ?>
            <form action="update.php" method="POST"
                  class="mt-5 border border-top-primary p-4 bg-light shadow border border-top-3-primary">
                <input type="hidden" name="matricule" value="<?php echo $_GET["matricule"]; ?>"
                       class="form-control" required="">
                       <a href="index.php"  id="btn" class="btn btn-primar"><i  class="fa-solid fa-arrow-left"></i></a>
                       <h4 class="mb-5 text-secondary">Modifier un étudiant</h4>
                <div class="row">
                    <div class="mb-3 col-md-12">
                        <label for="matricule">Matricule<span class="text-danger">*</span></label>
                        <input type="text" value="<?php echo $student['matricule']; ?>" name="matricule"
                               class="form-control" required="">
                    </div>
                    <div class="mb-3 col-md-12">
                        <label for="nom">Nom<span class="text-danger">*</span></label>
                        <input type="text" value="<?php echo $student['nom']; ?>" name="nom" class="form-control"
                               required="">
                    </div>
                    <div class="mb-3 col-md-12">

                        <label for="prenom">Prénom<span class="text-danger">*</span></label>
                        <input type="text" value="<?php echo $student['prenom']; ?>" name="prenom" class="form-control"
                               required="">
                    </div>
                    <div class="col-md-12">
                        <input type="submit" id="btn" class="btn btn-primar" name="submit" value="Enregistrer">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include('../footer.php'); ?>

</body>
</html>


