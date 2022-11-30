
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
            <h3 style="color:#1A1A80;"><i> evaluation des enseignement </i></h3>
				<div>
					<h2> <center><img src="login.jpg" width="130px"></center></h2>
				</div>


                <?php
    if(isset($_POST['submit'])){
            
           
            if(! $con=mysqli_connect("localhost","root","","evaluation")){
                die("Erreur de connection");

            }
            else{
                
        
            $sql1="SELECT * FROM users WHERE email='".$_POST['Email']."' && password= '".$_POST['password']."' ";
            
            $query=mysqli_query($con,$sql1);
            
            $NBperson=0;
            while($a=mysqli_fetch_assoc($query)){
                $NBperson += 1;
                
            }
            if($NBperson==1){
                $email =$_POST['Email'];
                $password=$_POST['password'];
                session_start();
                #ha4o session mavet che9lethom hom el secerite yalthom i3odo chor pagat le5reyn e3od mayged 7ad e5ech ey sev7 mavat et5a6e login
                $_SESSION['U'] = $email;
                $_SESSION['p'] = $password;
                $_SESSION['l'] = true;

                echo"<script> location.replace('user.php')</script>";
            }


            elseif($NBperson==0){ 
                $sql1="SELECT * FROM `admin` WHERE email='".$_POST['Email']."' && password= '".$_POST['password']."' ";
                $query=mysqli_query($con,$sql1);
            
                $NBperson=0;
                while($a=mysqli_fetch_assoc($query)){
                    $NBperson += 1;
                }

                if($NBperson==1){
                    $email = $_POST['Email'];
                    $password= $_POST['password'];
                    session_start();
                    #ha4o session mavet che9lethom hom el secerite yalthom i3odo chor pagat le5reyn e3od mayged 7ad e5ech ey sev7 mavat et5a6e login
                    $_SESSION['U'] = $email;
                    $_SESSION['p'] = $password;
                    $_SESSION['l'] = true;

                    echo"<script> location.replace('/eee/index.php')</script>";
               }
               else{
                echo "<div class='alert alert-danger' role='alert'>
                L'adresse e-mail ou le mot de passe saisis sont incorrects.
                </div>";
            
            }
        }
    }
}
?>










				<div class="card-body">
					<form  method="POST">
                    
						<div class="form-group">
                            <p style="color:#1A1A80;">
                                <label for="email">Email</label>
                                <input type="email" id="email" class="form-control" name="Email" />
                            </p>
						</div>
                        
						<div class="form-group">
                            <p style="color:#1A1A80;">
                                <label for="password">Password</label>
                                <input type="password" id="password" class="form-control" name="password" />
                            </p>
						</div>
						<center><input type="submit" class="btn btn-primary w-50" style="background-color:#1A1A80;" value="Login" name="submit"></center>
					</form>
				</div>
				
			</div>
		</div>
	</div>

</body>
</html>