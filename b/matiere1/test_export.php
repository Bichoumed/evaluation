<?php

 session_start();
    $matiere=$_SESSION['matiere'];
    $Nom_matiere=$_SESSION['Nom_matiere'];
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        
        <title>Formulaire</title>
    </head>

    <body id="kt_body" data-bs-spy="scroll" data-bs-target="#kt_landing_menu" data-bs-offset="100"
          class="bg-white position-relative">
            <div class="d-flex flex-column flex-root">
                <div class="mb-0" id="home">
                    <div class="bgi-no-repeat bgi-position-x-center bgi-position-y-bottom landing-dark-bg">
                       
                            <div class="d-flex flex-column flex-center px-9">
                            </div>
                                </div>
                                <div class="landing-curve landing-dark-color mb-10 mb-lg-20">
                                    <svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z"
                                              fill="currentColor"></path>
                                    </svg>
                                </div>
                </div>

                <div class="mb-5 mb-lg-n20 z-index-2">
                    <div class="container my-20 pb-10 mt-n10">
                       
                        <form method="POST" class="shadow p-5 rounded border border-top border-primary">
                         
                            <div class="table-responsive my-5">
                                <table class="table" >
                                     <tr colspan="5" rowspan="3"><h1 style="text-align: center;"> <?php echo  $Nom_matiere ?></h1></tr>
                                    <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                                        <th ></th>
                                        <th>Oui</th>
                                        <th>Plutôt oui</th>
                                        <th>Plutôt non</th>
                                        <th>Non</th>
                                    </tr>
                                <?php
                                        include('connection.php');
                                      $scor1=0;
                                       $sql1="SELECT * FROM axe ";
                                       $result1 = mysqli_query($conn, $sql1);
                                             while($a=mysqli_fetch_assoc($result1)){
                                            
                                                   $l=$a['numaxe']; 
                                      $sql = "SELECT * FROM `question` where `numaxe`=$l";
                                                   $result = mysqli_query($conn, $sql);

                                 ?>
                                    <tr >
                                        <th  ><?php echo $a['nomaxe']; ?></th> 
                                        <th ></th>  
                                        <th ></th> 
                                        <th ></th> 
                                        <th ></th>   
                                    </tr>
                                    
                                    <tbody>
                                   <?php
                                    if ($result->num_rows > 0): $i = 0;
                                        ?>
                                        <?php while ($array = mysqli_fetch_row($result)): 
                                            
                            $sql5 = "SELECT count(*) as oui FROM `reponse`  WHERE  `numquestion` = $array[0] and numreponse=1 and codematieres='$matiere';";
                               $resul1=mysqli_query($conn, $sql5);
                               $oui=mysqli_fetch_assoc($resul1);
                               

                                   include('connection.php');              
                            $sql2= "SELECT count(*) as plutoui FROM `reponse` WHERE `numquestion` = $array[0] and numreponse=2 and codematieres='$matiere';";
                              $result2=mysqli_query($conn, $sql2);
                              $plutoui=mysqli_fetch_assoc($result2);
                               

                            $sql3= "SELECT count(*) as plutnon FROM `reponse` WHERE `numquestion` = $array[0] and numreponse=3 and codematieres='$matiere';";
                               $result3=mysqli_query($conn, $sql3);
                              $plutnon=mysqli_fetch_assoc($result3);
                               


                            $sql4= "SELECT count(*) as non FROM `reponse` WHERE `numquestion` = $array[0] and numreponse=4 and codematieres='$matiere';";
                              $result4=mysqli_query($conn, $sql4);
                              $non=mysqli_fetch_assoc($result4);
                               
if($oui['oui'] !=0 or $plutoui['plutoui'] !=0 or $plutnon['plutnon'] !=0){
                           $scor=($oui['oui']*3+$plutoui['plutoui']*2+$plutnon['plutnon']);
                          $nb=$scor1+$scor;
                                   }   
                                            echo '
                                                    <tr>
                                                      <td>' . $array[1] . '</td>
                                                      <td  >'.$oui['oui'].'</td>
                                                      <td >'.$plutoui['plutoui'].'</td>
                                                      <td >'.$plutnon['plutnon'].'</td>
                                                      <td >'.$non['non'].'</td>
                                                    </tr>';

                                            
                                            $i += 1;


                                            ?>
                                        
                                        <?php endwhile; ?>
                                                <?php endif; ?>
                                            
                                                <?php 
                                        }
                                        // $scor1=$nb*12/(($oui['oui']+ $plutoui['plutoui']+$plutnon['plutnon']));

                                        ?>
                                        <!-- <th  colspan="5" style=" text-align:right;"><?php //echo $scor1; ?></th> -->
                                    </tbody>

                              <button id="btnExport" onclick="tableToExcel()"  class="btn btn-success">Export</button>
                            </div>

                        </form>

                    </div>
                </div>

            </div>
   
    </body>
    </html>
   <?php include('footer_export.php');
         ?>
   <script type="text/javascript" src="js/table2excel.js"></script>
   <script type="text/javascript" src="js/script.js"></script>




