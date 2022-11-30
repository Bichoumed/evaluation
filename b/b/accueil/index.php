<?php session_start();
if (!isset($_SESSION['matricule'])) {
    header('location:../login.php');
}
include("connection.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php include('../head.php'); ?>
    <title>Gestion des matières</title>
    <link rel="stylesheet" href="search.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="/b/b/bootstrap.min.css" rel="stylesheet">
    <style>
        #btn{
            background-color:#0B546C;
            color: #fff;
        }
        #btn1{
            background-color:#A0BACC;
            color:#fff;

        }
        
        </style>
</head>
<body>
<?php include('../navbar.php'); ?>
    <?php include('../msg.php');   

    ?>

<div class="container" >
   
<div class="card-header d-flex justify-content-between">
    <h4 class="card-header-title" >Matières à évaluer</h4>
        
   
    </div>

    <div class="table-responsive">
        <table class="table table-bordered" id="myTable">
            <thead class="header round py-5 my-5">
            <div class="table-responsive">
       
            <tr>
                <th style="width: 20%;">Code Matieres</th>
                <th style="width: 30%;">Nom Matieres</th>
                <th style="width: 30%;">Module</th>
                <th style="width: 15%;">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php

            include 'connection.php';
            $matricule=$_SESSION['matricule'];
            $s="SELECT `semestre` FROM `etudiants` WHERE matricule=$matricule;";
            $l=mysqli_query($conn, $s);
            $a = mysqli_fetch_row($l);
            $p=str_split($a[0]);
            $query = "SELECT * from matieres WHERE codematieres not in (SELECT codematieres from v_repoinse WHERE matricule=$matricule) and debut <= NOW() and debut is not null  and fin > NOW() and codematieres like \"___$p[1]%\";";
            $result = mysqli_query($conn, $query);
             if ($result->num_rows > 0  ): 
                 while($array = mysqli_fetch_row($result)):
               ?>
                    <tr>
                    <td data-th="CODE"><?php echo $array[0]; ?></td>
                    <td data-th="Nom"><?php echo $array[1]; ?></td>
                    <td data-th="Module"><?php echo $array[2]; ?></td>
                    <td data-th="Action"class="text-center">
                            <a href="form.php?codematieres=<?php echo $array[0]; ?>"
                               class="btn btn-secondar" id="btn1" class="edit">evalue</a>

                        </td>
                    </tr>
                
                <?php
 
                
                endwhile;
             
                
        ?>

            <?php else: ?>
                <tr>
                    <td colspan="3" rowspan="1" headers="" class="text-center">
                        <h2>Aucune donnée disponible</h2>
                    </td>
                </tr>
            <?php endif; ?>

            <?php mysqli_free_result($result); ?>

            </tbody>
        </table>
    
</div>

</div>





<div class="container" >
    
    <div class="card-header d-flex justify-content-between">
    <h4 class="card-header-title" >Matières déja évaluées</h4>
        
   
    </div>

    <div class="table-responsive">
        <table class="table table-bordered" id="myTable">
            <thead class="header round py-5 my-5">
            <div class="table-responsive">
       
            <tr>
            <th style="width: 20%;">Code Matieres</th>
                <th style="width: 40%;">Nom Matieres</th>
                <th style="width: 40%;">Module</th>
            </tr>
            </thead>
            <tbody>
            <?php


            include 'connection.php';
            $matricule=$_SESSION['matricule'];
            $query = "SELECT distinct( `codematieres`),`nommatieres`,`module` FROM `v_repoinse` where matricule=$matricule and fin>=now();";
            // Fetch all the data from the table customers

           $result = mysqli_query($conn, $query);
             if ($result->num_rows > 0) : ?>

                <?php while ($array = mysqli_fetch_row($result)):
               ?>
                    <tr>
                        <td><?php echo $array[0]; ?></td>
                        <td><?php echo $array[1]; ?></td>
                        <td><?php echo $array[2]; ?></td>
                    </tr>
                <?php  
            endwhile; ?>

            <?php else: ?>
                <tr>
                    <td colspan="3" rowspan="1" headers="" class="text-center">
                        <h2>Aucune donnée disponible</h2>
                    </td>
                </tr>
            <?php endif; ?>

            <?php mysqli_free_result($result); ?>

            </tbody>
        </table>
    
</div>
            </div>

    </div>

<div class="container" >
   
    <div class="card-header d-flex justify-content-between">
    <h4 class="card-header-title" >Durée d'évaluation expirée</h4>
        
   
    </div>

    <div class="table-responsive">
        <table class="table table-bordered" id="myTable">
            <thead class="header round py-5 my-5">
            <div class="table-responsive">
       
            <tr>
                <th style="width: 25%;">Code Matieres</th>
                <th style="width: 40%;">Nom Matieres</th>
                <th style="width: 40%;">Module</th>
            </tr>
            </thead>
            <tbody>
            <?php


            include 'connection.php';
            $query1 = "SELECT * FROM `v_repoinse` WHERE fin < NOW() and scores is null and codematieres like \"___$p[1]%\";";
         
            // Fetch all the data from the table customers

           $result = mysqli_query($conn, $query1);
             if ($result->num_rows > 0) : ?>

                <?php while ($array = mysqli_fetch_row($result)):
               ?>
                    <tr>
                        <td><?php echo $array[0]; ?></td>
                        <td><?php echo $array[1]; ?></td>
                        <td><?php echo $array[2]; ?></td>
                     
                    </tr>
                <?php  
            endwhile; ?>

            <?php else: ?>
                <tr>
                    <td colspan="3" rowspan="1" headers="" class="text-center">
                        <h2>Aucune donnée disponible</h2>
                    </td>
                </tr>
            <?php endif; ?>

            <?php mysqli_free_result($result); ?>

            </tbody>
        </table>
    
</div>





</body>
</html>
<?php