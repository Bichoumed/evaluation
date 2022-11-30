<?php @session_start(); ?>
<!DOCTYPE html>
 <html>
    <head>
            <meta charset="UTF-8">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" 
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
            <link rel="stylesheet" href="form.css">
            <title>form</title>
    </head>
 <body>
 <?php
   
    include ('./conn.php');
    $nomaxe=['Deroulement','Le Contenue du cours','Activités(TD,TP,projet)','Presentation',"Méthode d'enseignement",'Evaluation de Comp et Conn'];
    $n=sizeof($nomaxe);
    $K=0;
    for ($j=0;$j<$n;$j++){
      $sql = "SELECT * FROM `question`where nomaxe='$nomaxe[$j]'; ";
      $result = mysqli_query($conn, $sql);
      if(isset($_POST["submit"])){
            for ($i=0;$i<(@$result->num_rows);$i++){
                $reponse="rep$j$i";
                $matricule=$_SESSION['matricule'];
                $Group=$_SESSION['Group'];
                $TD=$_SESSION['TD'];
                include ('./conn.php');
               // $esm=" INSERT INTO `réponse`(numreponse) VALUES ('$_POST[$reponse]')";
                  $K+=1;
                
               $esm=" INSERT INTO `reponse`(numreponse,matricule,codematieres,numquestion,groupe,classeTD)
                VALUES ($_POST[$reponse],$matricule,'DEV22',$K,'$Group','$TD')";

               

                $res = mysqli_query($conn,$esm);
               
                
            }

        }  
    }
    
?>








 </body>
 </html>
 