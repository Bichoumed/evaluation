<?php
@session_start();
include ('./conn.php');
$nbr=array();
$i=0;
$j=0;
$sql2 = "SELECT * FROM `question`";
$result2 = mysqli_query($conn, $sql2);
if ($result2->num_rows> 0){           
 while ($array = mysqli_fetch_row($result2)){
array_push($nbr, array($i+=1,0,0,0,0));
}}
$matiere=$_SESSION['matiere'];
$sql = "SELECT * FROM `reponse` where codematieres= '$matiere'";
$result = mysqli_query($conn, $sql);
if ($result->num_rows> 0){ 
while ($array = mysqli_fetch_row($result)){
    $qes=intval($array[3]);
    $rep=intval($array[0]);
    $nbr[$qes-1][$rep]+=1;
}}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="esma.css">
    <title>form</title>
    </head>
<body>
   
        <?PHP 
        if ($result->num_rows> 0){ ?>
              <table class="table-style" >
        <thead class="thead thead-info">
            <tr class="th">
                <th >Questions</th>
                <th >Oui </th>
                <th >Plutot Oui</th>
                <th>Plutot Non</th>
                <th>Non</th>
            </tr>

        </thead>
        <tbody>
      <?php  while ($j<($result2->num_rows)):;
       $s=$j+1;
         ?>
    
    <tr>
                  <th><?php echo "$s";?></th>
                  <?php $n=$s-1;?>
                  <td> <?PHP echo strval($nbr[$n][1]);?></td>
                  <td> <?PHP echo strval($nbr[$n][2]);?></td>
                  <td> <?PHP echo strval($nbr[$n][3]);?></td>
                  <td> <?PHP echo strval($nbr[$n][4]);?></td>
                  </tr>
                  <?php $j+=1;?> 
                               
                                    
                                
                       <?php endwhile; }?>
                       </tbody>
    </table>             
        <?PHP 
$i=1;
$j=0;
$result_ax=array();
$sql3="SELECT distinct(numaxe) from question;";
$result3=mysqli_query($conn, $sql3);
if ($result3->num_rows> 0){           
  while ($array3=mysqli_fetch_row($result3)){
array_push( $result_ax, array(0,0,0,0,0));
}}
$sql2 ="SELECT * FROM `question`";
$result2 = mysqli_query($conn, $sql2);
while($i<=($result2->num_rows)){
$sql4="SELECT numaxe from question where numquestion=$i;";
$result4=mysqli_query($conn, $sql4);
if ($result4->num_rows> 0){ 
while ($array=mysqli_fetch_row($result4)){
    $axe=intval($array[0]);
    $n1=$i-1;
    
    
$result_ax[$axe-1][0]+=$nbr[$n1][1];
$result_ax[$axe-1][1]+=$nbr[$n1][2];
$result_ax[$axe-1][2]+=$nbr[$n1][3];
$result_ax[$axe-1][3]+=$nbr[$n1][4];
$result_ax[$axe-1][4]+=1;
 
    $i+=1;
}}
}

$score=array();?>
   
<?PHP
if ($result->num_rows> 0){ ?>
    <table class="table-style" >
    <thead class="thead thead-info">
        <tr class="th">
            <th >AXE</th>
            <th >score</th>
            </tr>
        </thead>
        <tbody> 

<?php
     foreach (@$result_ax as $axi => $n):;
    $a=($n[0]*3+$n[1]*2+$n[2]*1)/(3*$n[4]*($n[0]+$n[1]+$n[2]+$n[3]));
    $nbr_axe=$axi+1;?>
        <tr>
                  <th><?php echo " $nbr_axe";?></th>
                 
                  <td><?php echo "$a";?></td>
                 
                  </tr>
                    
                                
                       <?php endforeach;
                       }?>

                       </tbody>
    </table>       
    <?PHP
if ($result->num_rows== 0){ ?>
 <h1><?php echo "matiere non evaluer"?></h1>
 <?PHP
}?>
</body>
</html>