    <?php @session_start();?>
    <!doctype html>
    <html lang="en">
    <head>
        <?php include('./head.php'); ?>
        <title>Les Matieres</title>
        
    </head>
    
    <body>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>Gestion des matières</title>
    <link rel="stylesheet" href="search.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
   
        </style>
</head>
<body>


<div class="container" >
    <div class="card card-centered mb-3 mt-4">
    <div class="card-header d-flex justify-content-between">
    <h4 class="card-header-title" >Liste de matières</h4>
        
    <div class="search-box">
            <input class="search-txt"  class="btn btn-primary" type="text" id ="myInput" onkeyup="myFunction()" placeholder="type to search..">
            <a class="search-btn" ></a>
            <i class="fas fa-search"></i>
        </div>
            <a href="add.php"  id="btn" class="btn btn-primar"><i  class="fa-solid fa-plus"></i></a>
            
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered" id="myTable">
            <thead class="header round py-5 my-5">
            <tr>
                <th>Code Matieres</th>
                <th style="width: 50%;">Nom Matieres</th>
                <th style="width: 25%;">Module</th>
                <th style="width: 25%;">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php

            include 'connection.php';

            $query = "select * from matieres limit 200";
            // Fetch all the data from the table customers

            $result = mysqli_query($conn, $query);

            ?>

            <?php if ($result->num_rows > 0): ?>

                <?php while ($array = mysqli_fetch_row($result)): ?>
                    <tr>
                        <td><?php echo $array[0]; ?></td>
                        <td><?php echo $array[1]; ?></td>
                        <td><?php echo $array[2]; ?></td>
                        <td class="text-center">
                            <a href="edit.php?codematieres=<?php echo $array[0]; ?>"
                               class="btn btn-secondar" id="btn1" class="edit"><i class="fa-solid fa-pen"></i></a>

                            <a href="delete.php?codematieres=<?php echo $array[0]; ?>"
                               class="btn btn-dange" id="btn" ><i class="fa-solid fa-trash"></i></a>
                            

                        </td>
                    </tr>
                <?php endwhile; ?>

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
<script>
    function myFunction() {
      // Declare variables
      var input, filter, table, tr, td, i, txtValue;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");
    
      // Loop through all table rows, and hide those who don't match the search query
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        td1 = tr[i].getElementsByTagName("td")[1];
        td2= tr[i].getElementsByTagName("td")[2];
        if (td || td1 || td2) {
          txtValue = td.textContent || td.innerText;
          txtValue1 = td1.textContent || td1.innerText;
          txtValue2 = td2.textContent || td2.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1 || txtValue1.toUpperCase().indexOf(filter) > -1||txtValue2.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }
    </script>

<?php include('../footer.php'); ?>
<?php include('../head.php'); ?>
</body>
</html>


</body>
<!--end::Body-->

</html>

<?php
if(isset($_POST['button'])){
    $_SESSION['matiere']=$_POST['button'];   

    $matricule=21018;
    $matiere=$_SESSION['matiere'];
    $quer = "SELECT * FROM `reponse` where matricule=$matricule and codematieres='$matiere' ";
    $resul= mysqli_query($conn, $quer);
    if ($resul->num_rows > 0){
        echo"<script> alert('cette matiere a été evaluée')</script>";
    }
    else{
        echo"<script>location.replace('form.php')</script>";
    }
     
   
}

?>










