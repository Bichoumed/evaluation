<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php include('../head.php'); ?>
    <title>Ajouter une matière</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
        #btn{
            background-color:#0B546C;
            color:#fff;
        }
        
        </style>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <?php
            include 'connection.php';
            $query = "SELECT * FROM matieres WHERE codematieres='" . $_GET["codematieres"] . "'";
            // Fetch data from the table matieres using id
            $result = mysqli_query($conn, $query);
            $matieres = mysqli_fetch_assoc($result);
            ?>
            
            <form action="update.php" method="POST"
                  class="mt-5 border border-top-primary p-4 bg-light shadow border border-top-3-primary">
                  <a href="index.php"   class="btn btn-dark" ><i  class="fa-solid fa-arrow-left"></i></a>
                <h4 class="mb-5 text-secondary">Modifier une matière</h4>
                <div class="row">
                    <div class="mb-3 col-md-12">
                        <label>Code du matière<span class="text-danger">*</span></label>
                        <input type="text" value="<?php echo $matieres['codematieres']; ?>" name="codematieres"
                               class="form-control" required="">
                    </div>
                    <div class="mb-3 col-md-12">
                        <label>Nom du matière<span class="text-danger">*</span></label>
                        <input type="text" value="<?php echo $matieres['nommatieres']; ?>" name="nommatieres" class="form-control"
                               required>
                    </div>
                    <div class="mb-3 col-md-12">
                        <label>Module<span class="text-danger">*</span></label>
                        <input type="text" value="<?php echo $matieres['module']; ?>" name="Module" class="form-control"
                               required>
                    </div>
                    <div class="col-md-12">
                        <input type="submit" style="background-color:rgb(24, 21, 21);" id="btn" name="submit" value="Enregistrer">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php 



?>

<!--------------------------------------------fin edit ------------------------------------------------------->

</body>
</html>


