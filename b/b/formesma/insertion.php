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
      
      $sql1 = "SELECT * FROM `axe` ";
      $result1= mysqli_query($conn, $sql1);
      $n=$result1->num_rows;
      $i=0;
      while ($array1 = mysqli_fetch_row($result1)): ;
        $sql = "SELECT * FROM `question`where numaxe=$array1[0]; ";
        $result = mysqli_query($conn, $sql);
        $sql2 = "SELECT * FROM `question`";
        $result2 = mysqli_query($conn, $sql2);
        foreach( $_POST as $cle=>$val){
         ${$cle}=$val;
         if(isset($submit)){
            if ($result->num_rows> 0):;                
            ?>
            <?php while ($array = mysqli_fetch_row($result)): ;
            
               $numquestion=$i+1;
               $esm=" INSERT INTO `reponse`(numquestion,numreponse) VALUES ($numquestion,${"rep$i"})";
               $res = mysqli_query($conn,$esm);
$i+=1;
endwhile; 
endif;
            }}
          
      endwhile; 
        if($res)  {
         echo "skooooy";
      }
      else {
         echo "noooo";
      }
?>
 </body>
 </html>
 