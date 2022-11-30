
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php include('../head.php'); ?>
    <title>Gestion des étudiants</title>
    <link rel="stylesheet" href="search.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    
</head>
<body>
<?php include('../navbar.php'); ?>
<div class="container">
    <?php include('../msg.php'); ?>
</div>
<div class="container">
    <div class="card card-centered mb-3 mt-4">
        <div class="card-header d-flex justify-content-between">
            <h4 class="card-header-title">Liste de étudiants</h4>
               
    <div class="search-box">
            <input class="search-txt"  class="btn btn-primary" type="text" id="myInput" onkeyup="myFunction()" placeholder="type to search..">
            <a class="search-btn" href="#"></a>
            <i class="fas fa-search"></i>
        </div>
            <a href="add.php"  class="btn btn-dark"><i class="fa-solid fa-plus"></i></a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered" id="myTable">
            <thead class="header round py-5 my-5">
            <tr style="background-color:rgb(27, 24, 24);">
                <th>Matricule</th>
                <th style="width: 35%;">Prénom</th>
                <th style="width: 20%;">Nom</th>
                <th style="width: 20%;">semester</th>
                <th style="width: 15%;">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            include 'connection.php';
            $query = "select * from etudiants ";
            $result = mysqli_query($conn, $query);
            ?>

            <?php if ($result->num_rows > 0): ?>

                <?php while ($array = mysqli_fetch_row($result)): ?>
                    <tr>
                        <td><?php echo $array[0]; ?></td>
                        <td><?php echo $array[1]; ?></td>
                        <td><?php echo $array[2]; ?></td>
                        <td><?php echo $array[3]; ?></td>
                        <td class="text-center">
                            <a href="edit.php?matricule=<?php echo $array[0]; ?>"
                            class="btn btn-dark"  style="background-color:rgba(19, 17, 17, 0.262);"><i class="fa-solid fa-pen"></i></a>

                            <a href="delete.php?matricule=<?php echo $array[0]; ?>"
                            class="btn btn-dark" id="btn"><i class="fa-solid fa-trash"></i></a>

                        </td>
                    </tr>
                <?php endwhile; ?>

            <?php else: ?>
                <tr>
                    <td colspan="4" rowspan="1" headers="" class="text-center">
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
<?php include('footer.php'); ?>
</body>
</html>
<?php 

