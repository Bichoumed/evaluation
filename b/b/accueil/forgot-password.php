<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>
    <div class="container vh-100">
		<div class="row justify-content-center h-100">
			<div class="card w-45 my-auto shadow" style="padding:4%";>
            <h2 class="text-center">Forgot Password</h2>
                    <p class="text-center">Enter your email address</p>
				

                    
                    <?php
                        if(count($errors) > 0){
                            ?>
                            <div class="alert alert-danger text-center">
                                <?php 
                                    foreach($errors as $error){
                                        echo $error;
                                    }
                                ?>
                            </div>
                            <?php
                        }
                    ?>
                    
                    <div class="card-body">
					<form  method="POST">
                    
						<div class="form-group">
                            <p style="color:#1A1A80;">
                                <input type="email" id="email" class="form-control" name="email"  placeholder="Enter email address" required value="<?php echo $email ?>"/>
                            </p>
						</div>
                    
                    <center> <input class="form-control button" type="submit" name="check-email" value="Continue" style="background-color:#1A1A80; color:#fff;" ></center>
                    
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>