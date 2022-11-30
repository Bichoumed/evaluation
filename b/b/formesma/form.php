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
      <form  method="POST" >  
<?php
    include ('./conn.php');
    $i=0;
    $sql1 = "SELECT * FROM `axe` ";
    $result1= mysqli_query($conn, $sql1);
    $n=$result1->num_rows;
    while ($array1 = mysqli_fetch_row($result1)): ;
      $sql = "SELECT * FROM `question`where numaxe=$array1[0]; ";
      $result = mysqli_query($conn, $sql);
?>
  <div class="tab">
      <table class="table " >
        <thead class="thead thead-info">
            <tr class="th"  style="  background-color: #008080;;color:aliceblue;width: 50%; padding:0%;">
                <th scope="col-4" >Questions</th>
                <th scope="col" >Oui </th>
                <th scope="col" >Plutot Oui</th>
                <th scope="col">Plutot Non</th>
                <th scope="col">Non</th>
            </tr>

        </thead>
        <?php echo '<p style="font-size:22px;color:#1A1A80;" >'."$array1[1]...".'</p>'; 
            if ($result->num_rows>0):;    
        while ($array = mysqli_fetch_row($result)): ;
         
                echo '
                <tr>
                  <th scope="row" style="background-color:LightGray;">'.$array[1].'<br> </th>
                  <td style="text-align: center;background-color:LightGray;"> <input  type="radio" name="rep'.$i.'" value="1" required></td>
                  <td style="text-align: center;background-color:LightGray;"><input type="radio" name="rep'.$i.'" value="2" required></td>
                  <td style="text-align: center;background-color:LightGray;"><input type="radio" name="rep'.$i.'" value="3" required></td>
                  <td style="text-align: center;background-color:LightGray;"><input type="radio" name="rep'.$i.'" value="4" required></td>
                  </tr>';
                $i+=1                     
        ?>      
                      
          <?php endwhile; ?>   
          
        <?php endif; ?>
               <?php endwhile; ?> 
               
                </table>
                <button class="button" name="submit">Envoyer</button>
     </form>    
     </div>
     <?PHP

     if(isset($_POST["submit"])){
   
       include ('./insertion.php');              
}
?>
            
</body>
</html>