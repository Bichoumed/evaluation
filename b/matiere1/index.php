<?php 
session_start();

include 'connection.php';
/*************** semestre php****************/
$a = 'semester' ;
$query= "SELECT * FROM matieres ;";
if (!isset($_SESSION['semester'])) {
     $query= "SELECT * FROM matieres ;";
     $a = 'semester' ;
}
if (isset($_POST['s'])) {
     $_SESSION['semester'] = $_POST['s'] ;
     if ($_SESSION['semester'] == 'semester') {
          $query= "SELECT * FROM matieres ;";
          $a = 'semester' ;
     }
    else{
     $query= "SELECT * FROM matieres where codematieres like '_".$_SESSION['semester'][1]."%';";
     $a = $_SESSION['semester'] ;
    }


   }



   
   /*************** fin semestre php****************/

if(isset($_POST["on"])){
     if ($_POST["on"] == 'off') {
           $code=$_POST["code"];
         $rsql = "UPDATE matieres set debut = null ,fin = null where codematieres ='$code';";
         mysqli_query($conn,$rsql);
     }
     else {
          $debut=$_POST["debut"];
          $fin=$_POST["fin"];
          $f=explode("-",$fin);
          ///print_r($f);
          $d=explode("-",$debut);
          //print_r($d);
          $today=date("Y-m-d");
          //$_SESSION['fin'] = $fin;
          //$_SESSION['code'] = $code;
          strval($today);
          $code=$_POST["code"];
          if($f[0]>=$d[0]){
               if($f[1]>=$d[1] ){
                    if($f[2]>$d[2]){
                         $query="UPDATE `matieres` set `debut`='$debut',`fin`='$fin' WHERE `codematieres` ='$code';";
                       $sql=mysqli_query($conn,$query);
                    }
               }
          }  
     }
     
     
      }



/*************** semestre php****************/
$a = 'semester' ;
$query= "SELECT * FROM matieres ;";
if (!isset($_SESSION['semester'])) {
     $query= "SELECT * FROM matieres ;";
     $a = 'semester' ;
}
if (isset($_POST['s'])) {
     $_SESSION['semester'] = $_POST['s'] ;
     if ($_SESSION['semester'] == 'semester') {
          $query= "SELECT * FROM matieres ;";
          $a = 'semester' ;
     }
    else{
     $query= "SELECT * FROM matieres where codematieres like '___".$_SESSION['semester'][1]."%';";
     $a = $_SESSION['semester'] ;
    }


   }

   /*************** fin semestre php****************/
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php include('../head.php'); ?>
    <title>Gestion des matières</title>
    <link rel="stylesheet" href="search.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet"/>      
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> 
           <script src=”https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js”></script>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="dist/jquery.tabledit.js"></script>
<script type="text/javascript" src="custom_table_edit.js"></script> 
           <meta charset="UTF-8">
           
           <style>
               .img{
                    margin-top:2px;
                    height:20px;
                    width:20px;
                    margin-left:10px;
               }
           </style>
     
   
</head>
<body>

<?php include('../navbar/navbar.php'); ?>
    <?php include('../msg.php'); ?>
    <?php require 'config.php'; ?>
	 <div class="container">
        <div class="row">
            <div class="col-12">
            <div class="data_table">
		<form  style ="display:flex;justify-content:space=between;"class="" action="" method="post" enctype="multipart/form-data" >
			<input type="file" name="excel" required value="">
			<button style="background-color:black; color:white;border-radius :5%; width:109px;" type="submit" name="import">Importer</button><br>
          </form>
           
<!-------------------------------------------------- semestre -------------------------------------------------------->
<form action="index.php" method="post" >  
          <select style="background-color:rgba(7, 30, 30, 0.658);color:white;width:10%; height:100%; margin-left:90%;margin-bottom:-3%;" name="s" onchange="this.form.submit()">
                  <?php

                        echo '<option value="'.$a.'" >'.$a.'</option>';
                        
                   if($_SESSION['semester'] != 'semester'){
                    echo '<option value="semester" >tous</option>';
               
                   }
                        ?>
                         <?php 
                         
                              for($i = 1 ; $i <= 6 ; $i ++){
                              
                                   if ($a != 'S'.$i) {
                                        echo '<option value="S'.$i.'" >S'.$i.'</option>';
                                   }
                              }
                         
                         
                              ?>
                         
                          
                    </select>
          </form>

<!------------------------------------------------fin semestre----------------------------------------------------->
          <br>
          
		<hr style="color:black;size :900px;height : 100%;  border:1px solid #000000;">
          <br>
          <div class="position-relative">
          <button style =" margin-left:97%;" type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-light"><i  class="fa-solid fa-plus"></i></button>  
          </div>
          </div>
          <!--==================================================IMPORT==============================-->
		<?php
          
		if(isset($_POST["import"])){
			$fileName = $_FILES["excel"]["name"];
			$fileExtension = explode('.', $fileName);
      $fileExtension = strtolower(end($fileExtension));
			$newFileName = date("Y.m.d") . " - " . date("h.i.sa") . "." . $fileExtension;

			$targetDirectory = "uploads/" . $newFileName;
			move_uploaded_file($_FILES['excel']['tmp_name'], $targetDirectory);

			error_reporting(0);
			ini_set('display_errors', 0);

			require 'excelReader/excel_reader2.php';
			require 'excelReader/SpreadsheetReader.php';

			$reader = new SpreadsheetReader($targetDirectory);
			foreach($reader as $key => $row){
				$code  = $row[0];
				$nom   = $row[1];
				$module= $row[2];
				$sql="INSERT INTO `matieres`(`codematieres`, `nommatieres`, `module`) VALUES ('$code','$nom','$module');";
echo $sql;
				$query=mysqli_query($conn,$sql);
			}

			echo
			"
			<script>
			alert('importer avec succes');
			document.location.href = '';
			</script>
			";
		}
		?>
 <!--======================================== fin======================================================== -->
  <!--======================================== AJOUTER ======================================================== -->
<?php
     if(isset($_POST['ins']))  
     {  
          $code = $_POST['code'];
          $nom =  $_POST['nom'];
          $Module = $_POST['Module'];

          $query1="INSERT INTO `matieres`(`codematieres`, `nommatieres`,`Module`)

          VALUES ('$code','$nom','$Module')";

          mysqli_query($conn, $query1);
     }
 ?>
 
 <!--===================================================== fin ===============================================-->
  <!--======================================== EXPORT ET TABLE ET RECHERCHE ======================================================== -->
 <table id="example" class="display nowrap" style="width:100%">
 <thead class="table-dark">
            <tr>
                <th style="width: 8%;">Code Matieres</th>
                <th style="width: 29%;">Nom Matieres</th>
                <th style="width: 43%;">Module</th>
                <th >selection</th>
                <th >selection</th>
                <th style="width: 25%;">Action</th>
            </tr>
        <tbody>
             
            <?php
            $result = mysqli_query($conn, $query);
                     if ($result->num_rows > 0): 
                              $i=0;
                while ($array = mysqli_fetch_row($result)):
               
                    $code=$array[0]; 
                    $nom=$array[1];
                    $module=$array[2];
                    ?>
                    <tr>
                        <td><form action="../../../statistique/graphique.php" method="POST">

            <?php   $query_m = "SELECT * FROM  reponse where codematieres='".$array[0]."'";
                    $result_m = mysqli_query($conn, $query_m);
                    if ($result_m->num_rows > 0) {
                    echo  $array[0]."<input type='hidden' name='hidden' value='".$array[1]."'>
                   <button class='img' name='mat' value='".$array[0]."'><img class='img' src='oeil.png' alt=''></button>";
                                                 }
                    else{
                         echo $array[0];
                        } ?>
                            </form method="POST">
                         </td>
                        <td><?php echo $array[1]; ?></td>
                        <td><?php echo $array[2]; ?></td>
                        
                        <td>
                        <div class="bhero--row">
                        <div class="hbero--wrapper">
                        <div id="hero--buttons">
                        <?php 
                    if ($array[4] == null){
                         echo '<input type="submit" id="'.$i.'"value="on" style="color:white;border-radius:5px; width: 100%; background-color:green; font-size:150%;">';
                        
                    }
                    else {
                         if (date("Y-m-d") < $array[4]) {
                              if (date("Y-m-d") >= $array[3]) {
                                   echo '<form method="post" style=" width: 100%; "><input type="hidden" name="code" value="'.$array[0].'" > <input type="submit" value="off" id="'.$i.'" name="on" style="color:white;border-radius:5px; width: 100%; background-color:orange; font-size:150%;"></form>';
                              }
                              else {
                                   echo '<form method="post" style=" width: 100%; "><input type="hidden" id="'.$i.'" name="code" value="'.$array[0].'" > <input type="submit"  value="off" name="on" style="color:white;border-radius:5px; width: 100%; background-color:red; font-size:150%;"></form>';
                              }
                         }
                         else {
                              echo '<input type="submit" id="'.$i.'" value="on" style="color:white;border-radius:5px; width: 100%; background-color:green; font-size:150%;">';
                         }
                    }

                   ?></form>
                      </div>
                        <form  style="display: none;" class="i" id="<?php echo $i + 10000;?>" method="post">
                         <input type="date" class='btn' name="debut">
                       <input type="date" class='btn' name="fin">
                       <input type="submit" name ="on" value="envoyer">
                      <input type='hidden' name="code" value='<?php echo $array[0]; ?>' >
                     </d>
                     <td><input   value='Qualité' class="btn btn-success" type="submit" name="hidden">
                      <input type='hidden'  name='ON1' value='<?php echo $array[0]?>'>
                      <input type='hidden' name='Nom_matiere' value='<?php echo $array[1]?>'>
                   </td>
                  </form>
                    </div>
                   </d>
                
                    </td>
                        <td class="text-center">
                        <a href="edit.php?codematieres=<?php echo $array[0]; ?>"
                               class="btn btn-secondar" id="btn1" class="edit"><i class="fa-solid fa-pen"></i></a>


                                <a href="delete.php?codematieres=<?php echo $array[0]; ?>"
                                   class="btn btn-dange" id="btn" ><i class="fa-solid fa-trash"></i></a>
                         
                               </td>
                    </tr>
                <?php 
               $i++; 
               endwhile; 
              ?>
   
</div>
    </div>
</div>
</div>
 <!--======================================== debut et fin boutton ======================================================== -->
<script>
for(let i = 0 ; i< 10000 ; i++){
let borrower = document.getElementById(i);
let borrowerShow = document.getElementById(i+10000);

borrower.addEventListener('click', function() {
    if(borrowerShow.style.display == 'block') {
      borrowerShow.style.display = 'none';
      
    }
    else {
      borrowerShow.style.display = 'block';
      brokerShow.style.display = 'none';
    }
  }, false)
}


</script>

            <?php else: ?>
                <tr>
                    <td colspan="3" rowspan="1" headers="" class="text-center">
                        <h2>Aucune donnée disponible</h2>
                    </td>
                </tr>
                
            <?php endif;?>

            <?php mysqli_free_result($result); ?>

            </tbody>
            
        </table>
    </div>
</div>

<div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header" >  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title"></h4>  
                </div>  
                <div class="modal-body" id="employee_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
<?php
 

?>
   <!--======================================== fin ======================================================== -->                        

 <!---------------------------------------- button add --------------------------------------------->
  

 <div id="add_data_Modal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                </div>  
                <div class="modal-body">  
                     <form method="POST" action="index.php">  
                     <label>Code du matière<span class="text-danger">*</span></label>
                          <input type="text" name="code" id="code" class="form-control" />  
                          <br />  
                          <label>Nom du matière<span class="text-danger">*</span></label> 
                          <input type="text" name="nom" id="nom" class="form-control" />   
                          <br /> 
                          <div class="mb-3 col-md-12">
                        <?php
                            $query="SELECT distinct(Module) from matieres ";
                            $result=mysqli_query($conn,$query); ?>
                            <label for="Module">Module<span class="text-danger">*</span></label>
                            <select id="Module" class="form-control" name="Module" required autocomplete="off">
                            <option selected  type="text" name="Module" class="form-control" required="" id="Module"></option>
                            <?php
                            while ($row=mysqli_fetch_array($result))
                            {
                            echo "<option>".$row['Module']."</option>";
                            }
                            ?>
                            </select>
                        </div>  
                        <input type="hidden" name="id" id="id" /> 
                          <input type="submit" name="ins" id="insert" onClick="document.location.href='index.php   &refresh=on'" value="Insert" class="btn btn-primary" />  
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">fermer</button>  
                </div>  
           </div>  
      </div>  
 </div>  
 <!------------------------------------------------ fin ------------------------------------------------>




<script>
$(document).ready(function(){
$('#exemple').Tabledit({
deleteButton: false,
editButton: false,
columns: {
identifier: [1, 'code'],
editable: [[1, 'code'], [2, 'nom'], [3, 'module'], [4, 'semestre']]
},
hideIdentifier: true,
url: 'edit.php'
});
});

 </script>       

<!---------------------------------------------- fin ------------------------------------------->

 <script> 
 
 $(document).ready(function(){  
      $('#add').click(function(){  
           $('#insert').val("Insert");  
           $('#insert_form')[0].reset();  
      });  
      $(document).on('click', '.edit_data', function(){  
           var id = $(this).attr("code");  
           $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{id:id},  
                dataType:"json",  
                success:function(data){  
                     $('code').val(data.code);  
                     $('#nom').val(data.nom);  
                     $('#Module').val(data.Module);   
                     $('#insert').val("Update");  
                     $('#add_data_Modal').modal('show');  
                }  
           });  
      });  
      $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
           if($('#code').val() == "")  
           {  
                alert("nom is required");  
           }  
           else if($('#nom').val() == '')  
           {  
                alert("version is required");  
           }  
           else if($('#Module').val() == '')  
           {  
                alert("licence is required");  
            }
           else  
           {  
                $.ajax({  
                     url:"insert.php",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form')[0].reset();  
                          $('#add_data_Modal').modal('hide');  
                          $('#employee_table').html(data);  
                     }  
                });  
           }  
      });    
 });  
 </script>
<!------------------------------==============javascript========================------------------------>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>


    <script>
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>
</body>
</html>

<?php

if (isset($_POST['ON1'])){

    session_start();
    $_SESSION['matiere']=$_POST['ON1'];
    $_SESSION['Nom_matiere']=$_POST['Nom_matiere'];
    echo"<script>location.replace('test_export.php')</script>";
}

?>