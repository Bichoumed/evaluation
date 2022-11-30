<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="./css/bootstrap.css">
    <title>Liste </title>
    <link rel="stylesheet" href="search.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
#myTable {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  margin:30px;
}

#myTable td, #myTable th {
  border: 1px solid #ddd;
  padding: 8px;
  
}

#myTable tr:nth-child(even){background-color: #f2f2f2;}

#myTable tr:hover {background-color: #ddd;}

#myTable th {
  
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  color: white;
}
.search-box{
  display:file_exists;
  top:13px;
}
</style>
<body>
<div class="search-box">
            <input class="search-txt"  class="btn btn-primary" type="text" id="myInput" onkeyup="myFunction()" placeholder="type to search..">
            <a class="search-btn" href="#"></a>
            <i class="fas fa-search"></i>
        </div>
  <?php
include 'conn.php';?>

 <table class="table table-bordered" id="myTable">
 <thead class="header round py-5 my-5">
   <tr >
   <th scope="col"></th>
   <?php $sqli="SELECT `codematieres` FROM `matieres` ";
$reslt=mysqli_query($conn,$sqli);
?>
<?php while ($mat = mysqli_fetch_row($reslt)):?>
  <?php echo '
 
  <th scope="col" style="background-color:#08546c; color:#fff;">'.$mat[0].'</th>
  '
  ?>
    <?php endwhile?>
    </tr>

 </thead>

    <?php $sql="SELECT `matricule` FROM `etudient`";
$res=mysqli_query($conn,$sql);?>


<?php 




foreach ($res as $etud ): 
  echo '   <tr >
  <td scope="row" style="background-color:#08546c; color:#fff;">'. $etud ['matricule'].'</td>';
foreach( $reslt as $mat){
  $mat1=$mat['codematieres'];

  
  $checked=false;
    
     
    $mysql="SELECT DISTINCT `matricule` FROM `reponse` WHERE `codematieres`='$mat1'";
    $resulta=mysqli_query($conn,$mysql);
  
  foreach($resulta as $student){
      if($etud ['matricule'] == $student['matricule']){
    $checked=true;
      
      }}
if($checked){
  echo"<td style='color:green'> a évalué </td>";

}

else{
     echo"<td style='color:red'> n'a pas évalué </td>";
   }
  }



echo '</tr>';
endforeach;

?>

    
   
   
 </tbody>
   
</table>
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
        if (td ) {
          txtValue = td.textContent || td.innerText;
          
          if (txtValue.toUpperCase().indexOf(filter) > -1 ) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }
    </script>
</body>
</html>
<?php

?>

