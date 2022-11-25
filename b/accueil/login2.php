<?php 
session_start();

if (isset( $_SESSION['U']) && isset( $_SESSION['p'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>login Page</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>
	<div class="container vh-100">
		<div class="row justify-content-center h-100">
			<div class="card w-45 my-auto shadow" style="padding:4%";>


                <?php
      if(isset($_POST['submit'])){
        session_start();

        $_SESSION['matricule']=$_POST['matricule'];
        $_SESSION['Group']=$_POST['Group'];
        $_SESSION['TD']=$_POST['TD'];
        echo"<script>location.replace('/eee/accueil/index.php')</script>";


    }
    
    
    
    
   
?>


				<div class="card-body">
					<form  method="POST">
                    
						<div class="form-group">
                            <p style="color:#1A1A80;">
                                <label for="text">matricule</label>
                                <input type="matricule" id="matricule" class="form-control" name="matricule" />
                            </p>
						</div>
                        
                        <div class="form-group">
                            <p style="color:#1A1A80;">
                              <h3 style="text-align: center;">group</h3>
                              <select name="Group" id="nomaxe" class="form-control" required autocomplete="off" >
                                     <option>G1</option>
                                     <option >G2</option> 
                              </select>
                            </p>
						</div>

						<div class="form-group">
                            
                                 <h3 style="text-align: center;">classe TD</h3>
                                 <select name="TD" id="nomaxe" class="form-control" required autocomplete="off" >
                                     <option>TD1</option>
                                     <option >TD2</option>
                                     <option>TD3</option>
                                     <option >TD4</option>
                                 </select>
                            
						</div>
                        
						<center><input type="submit" class="btn btn-primary w-50" style="background-color:#1A1A80;" value="Entrer" name="submit"></center>
					</form>
				</div>
				
			</div>
		</div>
	</div>

</body>
</html>
<?php 
}else{
     header("Location: login.php");
     exit();
}
 ?>