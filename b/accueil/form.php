<?php
@session_start();


    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <?php include('./head.php'); ?>
        <title>Formulaire</title>
    </head>
    <body id="kt_body" data-bs-spy="scroll" data-bs-target="#kt_landing_menu" data-bs-offset="200"
          class="bg-white position-relative">
    <div class="d-flex flex-column flex-root">
        <div class="mb-0" id="home">
            <div class="bgi-no-repeat bgi-position-x-center bgi-position-y-bottom landing-dark-bg">
                <?php include('./nav.php'); ?>
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
                <h1 class='mat'>Evaluation</h1>
                <form method="POST" class="shadow p-5 rounded border border-top border-primary">
                    <?php
                    include('./conn.php');
                   $sql1="SELECT * FROM v_question ";
                   $result1 = mysqli_query($conn, $sql1);
                 while($a=mysqli_fetch_assoc($result1)){
                
                 $l=$a['numaxe'];
               
                  $sql = "SELECT * FROM `question` where `numaxe`=$l;";
                    $result = mysqli_query($conn, $sql);
                    ?>
                    <div class="table-responsive my-5">
                        <table class="table table-row-bordered gy-5 table-hover table-rounded border gy-7 gs-7">
                            <thead>
                            <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                                <th>Question</th>
                                <th>Oui</th>
                                <th>Plutôt oui</th>
                                <th>Plutôt non</th>
                                <th>Non</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php echo '<p style="font-size:18px;color:#1A1A80;" >'.$a['nomaxe'].'</p>';
                            if ($result->num_rows > 0): $i = 0;
                                ?>
                                <?php while ($array = mysqli_fetch_row($result)): ;
                               
                                
                                    echo '
                                            <tr>
                                              <td>' . $array[1] . '</td>
                                              <td> <input  type="radio" name="rep' .$l. $i . '" value="1" required checked></td>
                                              <td><input type="radio" name="rep' .$l. $i . '" value="2" required></td>
                                              <td><input type="radio" name="rep' .$l. $i . '" value="3" required></td>
                                              <td><input type="radio" name="rep'. $l. $i . '" value="4" required></td>
                                              </tr>';
                                    $i += 1;
                                    ?>
                                <?php endwhile; ?>
                            <?php endif; ?>
                            <?php 
                            }?>
                            </tbody>
                        </table>
                        <label for=""><p style="font-size:18px;color:#1A1A80;"> les points fort du cours </p></label><br>
                        <textarea cols="47%" rows="5%" name="fort"></textarea>
                        <br>
                        <label for=""><p style="font-size:18px;color:#1A1A80;"> les points faible du cours </p></label><br>
                        <textarea cols="47%" rows="5%" name="faible"></textarea>
                        <br><br>
                    ,,,,,    <button class="btn btn-success" name="submit">Envoyer</button>
                    </div>

                </form>

                <?php
                
                if (isset($_POST["retour"])) {
                    echo"<script>location.replace('matieres.php')</script>";
                }
                ?>

            </div>
        </div>

    </div>

    <?php include('./footer-imports.php'); ?>
    <?php include('./footer.php'); ?>
    </body>
    </html>
   
   
   
   <?php


if (isset($_POST["submit"])) {
    $k=0;
    include('./conn.php');
    $sql1="SELECT * FROM v_question ";
    $result1 = mysqli_query($conn, $sql1);
    while($a=mysqli_fetch_assoc($result1)){
    $l=$a['numaxe'];
    $sql = "SELECT * FROM `question`where numaxe=$l";
    $result = mysqli_query($conn, $sql);
    if(isset($_POST["submit"])){
            for ($i=0;$i<(@$result->num_rows);$i++){
                $reponse="rep$l$i";
            if($_POST[$reponse]==1){
               $score=3;
            }
            elseif($_POST[$reponse]==2){
                $score=2;
            }
             elseif($_POST[$reponse]==3){
                $score=1;
            }
             else{
                $score=0;
            }
                $numreponse=$_POST[$reponse];
               $matiere=$_GET["codematieres"];
                include('./conn.php');
                $k=$k+1;
                $matricule=$_SESSION['matricule'];
             $sql=" INSERT INTO `reponse`(numreponse,matricule,scores,numquestion,codematieres,numaxe)
             VALUES ($numreponse,$matricule,$score,$k,'$matiere',$l);";
             echo $sql;
             mysqli_query($conn,$sql);
             if(isset($_POST['faible']) && isset($_POST['fort'])){
                $fort=$_POST['fort'];
                $faible=$_POST['faible'];
                 $sql1="INSERT INTO `point` (codematieres,pointsfort,pointsfaible)
                 VALUES('$matiere','$fort','$faible');";
                 mysqli_query($conn,$sql1);
                 echo"<script> alert('vous avez maintenant évalué cet matiere')</script>";
                 echo"<script>location.replace('index.php')</script>";
            }
             echo"<script> alert('vous avez maintenant évalué cet matiere')</script>";
             echo"<script>location.replace('index.php')</script>";
                
            }

         
    }
    
}
$sql3="UPDATE `v_repoinse` SET `debut`=null WHERE matricule= $matricule and codematieres='$matiere';";
$_SESSION['m']=$sql3;
mysqli_query($conn,$sql3);
    }
   
?>
