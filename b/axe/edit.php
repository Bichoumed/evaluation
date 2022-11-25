<?php 
session_start();

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php include('../head.php'); ?>
    <link rel="stylesheet" href="search.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <style>
        #btn{
            background-color:#0B546C;
            color:#fff;
            
        }
        #btn1{
            background-color:#A0BACC;
            color:#fff;

        }
        .toast{
  display: none;
  min-width: 20vw
}
.toast.show {
    display: block;
    opacity: 1;
    position: fixed;
    z-index: 99999999;
    margin: 20px;
    right: 0;
    top: 3.5rem;
}
.swal2-container{
    z-index: 99999999;
}
#preloader2 {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  z-index: 9999;
  overflow: hidden;
  background: #ffffff82;
}

#preloader2:before {
  content: "";
  position: fixed;
  top: calc(50% - 30px);
  left: calc(50% - 30px);
  border: 6px solid #1977cc;
  border-top-color: #d1e6f9;
  border-radius: 50%;
  width: 60px;
  height: 60px;
  -webkit-animation: animate-preloader 1s linear infinite;
  animation: animate-preloader 1s linear infinite;
}
@-webkit-keyframes animate-preloader {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

@keyframes animate-preloader {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
.truncate {
    overflow: hidden;
    text-overflow: ellipsis;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    font-size: smaller;
    color: #000000cf;
    font-style: italic;
}
 .modal-dialog.large {
    width: 80% !important;
    max-width: unset;
  }
  .modal-dialog.mid-large {
    width: 50% !important;
    max-width: unset;
  }
  #viewer_modal .btn-close {
    position: absolute;
    z-index: 999999;
    /*right: -4.5em;*/
    background: unset;
    color: white;
    border: unset;
    font-size: 27px;
    top: 0;
}
#viewer_modal .modal-dialog {
        width: 80%;
    max-width: unset;
    height: calc(90%);
    max-height: unset;
}


        
        </style>
</head>
<body>
<?php include('../navbar.php'); ?>
<div class="container">
    <?php include('../msg.php'); ?>
</div>
<div class="container">
    <div class="card card-centered mb-3 mt-4">
        <div class="card-header d-flex justify-content-between">
            <h4 class="card-header-title">Liste des axes</h4>
          
    </div>
  <table style="width: 100%;">  
    <tr style="width: 100%;">
    
<td style="width: 50%;">
    <div  class="table-responsive">
        <table class="table table-bordered" id="myTable">
            <thead class="header round py-5 my-5">
            <tr style="background-color:rgb(27, 24, 24);">
                <th style="width: 25%;">Nom Axe</th>
                <th style="width: 25%;">Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            include 'connection.php';
            $query = "select * from axe ";
            $result = mysqli_query($conn, $query);
            ?>

            <?php if ($result->num_rows > 0): ?>

                <?php while ($array = mysqli_fetch_row($result)): ?>
                    <tr >
                        <td><?php echo $array[1]; ?></td>
                        <td class="text-center">
                            <a href="edit.php?numaxe=<?php echo $array[0]; ?>"
                            class="btn btn-dark"  style="background-color:rgba(19, 17, 17, 0.262);"><i class="fa-solid fa-pen"></i></a>

                            <a href="delete.php?numaxe=<?php echo $array[0]; ?>"
                            class="btn btn-dark" ><i class="fa-solid fa-trash"></i></a>

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
<td>
<td  style="width: 50%;">
<div class="container">
<div class="row">
    <div class="col-md-6 offset-md-3">
        <?php
        include 'connection.php';

        $query = "SELECT * FROM `axe` WHERE numaxe='" . $_GET["numaxe"] . "'";
        $result = mysqli_query($conn, $query);

        $axe=mysqli_fetch_assoc($result);


        ?>
        <form action="update.php" method="POST"
              class="mt-5 border border-top-primary p-4 bg-light shadow border border-top-3-primary">
              <h4 class="mb-5 text-secondary">Modifier un axe</h4>
            
            <div class="row">

                <div class="mb-3 col-md-12">
                    <label for="nom">Nom Axe<span class="text-danger">*</span></label>
                    <input type="text" value="<?php echo $axe['nomaxe']; ?>" name="nomaxe" class="form-control"
                           required="">
                           <input type="hidden" value="<?php $axe['numaxe']; ?>" name="numaxe">
                </div>
                <div class="col-md-12">
                    <input type="submit" id="btn" class="btn btn-primar" name="submit" value="Enregistrer">
                </div>
            </div>
        </form>
    </div>
</div>
</div>
    
    </td>
    <tr>
            </table>

</div>
<?php
echo $_POST['numaxe'];
   ?>
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
        if (td || td1) {
          txtValue = td.textContent || td.innerText;
          txtValue1 = td1.textContent || td1.innerText;
          if (txtValue.toUpperCase().indexOf(filter) > -1 || txtValue1.toUpperCase().indexOf(filter) > -1) {
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
