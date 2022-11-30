<?php
    include_once("connection.php");
    // Connection Created Successfully

    session_start();

    // Store All Errors
    $errors = [];

    // When Sign Up Button Clicked
    if (isset($_POST['signup'])) {
        function test($data){
        $data=htmlspecialchars($data) ;
        $data=trim($data) ;
        $data=strtolower($data) ;
    return $data ;
}
        $fname = test(mysqli_real_escape_string($conn, $_POST['fname']));
        $lname = test(mysqli_real_escape_string($conn, $_POST['lname']));
        $email = test($_POST['email']);
        @$test=explode("@", test($_POST['email']));
         $query1="select droit from utilisateurs where email='$email' limit 1";
         $query=mysqli_query($conn,$query1);
         $droit=mysqli_fetch_assoc($query);
         if(count($droit)==0){
           $errors['password'] = "Vous n'avez pas les droits pour cree un compt!";}
         else{
            if($test[1]=='supnum.mr'){
        if (strlen(trim($_POST['password'])) < 8) {
            $errors['password'] = 'Utilisez 8 caractères ou plus avec un mélange de lettres, de chiffres et de symboles';
        } else {
            // if password not matched so
            if ($_POST['password'] != $_POST['confirmPassword']) {
                $errors['password'] = 'Mot de passe ne correspondant pas';
            } else {
                $password = md5($_POST['password']);
            }
        }
        // generate a random Code
        $code = rand(999999, 111111);
        // set Status
        $status = "Not Verified";
        $sql = "SELECT * FROM users WHERE login = '$email'";
        $res = mysqli_query($conn, $sql) or die('échec de la requête');
        if (mysqli_num_rows($res) > 0) {
            $errors['login'] = 'L’e-mail est déjà pris';
        }

        // count erros
        if (count($errors) === 0) {
            $insertQuery = "INSERT INTO users (droit,nom,prenom,login,pass,code,STATUS)
            VALUES ('".$droit['droit']."','$fname','$lname','$email','$password','$code','$status');";
            $insertInfo = mysqli_query($conn, $insertQuery) or die("hhh");

            // Send Varification Code In Gmail
            if ($insertInfo) {
                $subject = 'Code de vérification des e-mails';
                $message = "notre code de vérification est $code";
                 $url =  "https://script.google.com/macros/s/AKfycbw2MsBGjkJ7hzw_cnE5jW-CmqHZbibaNjrEz_DNXZZgCXfptPo5B1yy7x37kFrwSZkeFg/exec";
                    $ch = curl_init($url);
            curl_setopt_array($ch, [
               CURLOPT_RETURNTRANSFER => true,
               CURLOPT_FOLLOWLOCATION => true,
               CURLOPT_POSTFIELDS => http_build_query([
                  "recipient" => $email,
                  "subject"   =>$subject,
                  "body"      =>$message
               ])
            ]);                
               $result = curl_exec($ch);
                if ($result) {
                    $message = "Nous avons envoyé un code de vérification à votre adresse e-mail<br> $email";

                    $_SESSION['message'] = $message;
                    header('location: otp.php');
                } else {
                    $errors['otp_errors'] = 'Échec lors de l’envoi du code!';
                }
            } else {
                $errors['db_errors'] = "Échec lors de l’insertion de données dans la base de données!!!";
            }
        }
    }
}
}


    // if Verify Button Clicked
    if (isset($_POST['verify'])) {
        $_SESSION['message'] = "";
        $otp = mysqli_real_escape_string($conn, $_POST['otp']);
        $otp_query = "SELECT * FROM users WHERE code = $otp";
        $otp_result = mysqli_query($conn, $otp_query) or die("jj");

        if (mysqli_num_rows($otp_result) > 0) {
            $fetch_data = mysqli_fetch_assoc($otp_result);
            $fetch_code = $fetch_data['code'];
            print($fetch_code);
            $update_status = "Verified";
            $update_code = 0;

            $update_query = "UPDATE users SET STATUS = '$update_status' , code = $update_code WHERE code = $fetch_code";
            $update_result = mysqli_query($conn, $update_query);

            if ($update_result) {
                header('location: login.php');
            } else {
                $errors['db_error'] = "Impossible d’insérer des données dans la base de données!";
            }
        } else {
            $errors['otp_error'] = "Vous entrez un code de vérification non valide!";
        }
    }

    // if login Button clicked so

    if (isset($_POST['login'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = md5($_POST['password']);
        $matricule=explode("@",$email);
        $_SESSION['matricule']=$matricule[0];
        echo $matricule[0];
        $emailQuery = "SELECT * FROM users WHERE login = '$email'";
        $email_check = mysqli_query($conn, $emailQuery) or die("erreur");
        if (mysqli_num_rows($email_check) > 0) {
            $passwordQuery = "SELECT * FROM users WHERE login = '$email' AND pass = '$password'";
            echo  $passwordQuery ;
            $password_check = mysqli_query($conn, $passwordQuery);
            if (mysqli_num_rows($password_check) > 0) {
                echo "vffg";
                $fetchInfo = mysqli_fetch_assoc($password_check);
                $status = $fetchInfo['STATUS'];
                echo $status;
                $name = $fetchInfo['nom'] . " " . $fetchInfo['prenom'];
                $_SESSION['name'] = $name;
                $_SESSION['email'] = $fetchInfo['login'];
                $_SESSION['password'] = $fetchInfo['pass'];
                if ($status == 'Verified') {
                    @$login=$_POST["email"];
                    @$pass=md5($_POST["password"]);
                    @$valider=$_POST["login"];
                    $erreur="";
      $query=mysqli_query($conn,"select droit from users where login='$login' and pass='$pass' limit 1");
      $tab=mysqli_fetch_assoc($query)or die("tfou");
      print_r($tab['droit']);
      if(count($tab)>0){
        print_r($tab);
         if($tab['droit']=='user'){
             header("location:\b\b\accueil\index.php");
      }
      elseif($tab['droit']=='admin'){
         header("<location:\b\b\matiere1\index.php");

      }
   }
         else {
            $errors['email'] = 'Le mot de passe ne correspondait pas';
        }
   
                   
                } else {
                    $info = "Il semble que vous n’ayez pas encore vérifié votre e-mail $email";
                    $_SESSION['message'] = $info;
                    header('location: otp.php');
                    echo $emailQuery;

                }
            } else {
                $errors['email'] = 'Adresse e-mail non valide';
            }
        }
    }
    
    

    // if forgot button will clicked
    if (isset($_POST['forgot_password'])) {
        $email = $_POST['email'];
        $_SESSION['email'] = $email;

        $emailCheckQuery = "SELECT * FROM users WHERE login= '$email'";
        $emailCheckResult = mysqli_query($conn, $emailCheckQuery);

        // if query run
        if ($emailCheckResult) {
            // if email matched
            if ($emailCheckResult ->num_rows > 0) {
                $code = rand(999999, 111111);
                $updateQuery = "UPDATE users SET code = $code WHERE login = '$email'";
                $updateResult = mysqli_query($conn, $updateQuery) or die("hh");
                if ($updateResult) {
                       $subject = 'Code de vérification des e-mails';
                    $message = "notre code de vérification est $code";
                 $url = "https://script.google.com/macros/s/AKfycbw2MsBGjkJ7hzw_cnE5jW-CmqHZbibaNjrEz_DNXZZgCXfptPo5B1yy7x37kFrwSZkeFg/exec";
            $ch = curl_init($url);
            curl_setopt_array($ch, [
               CURLOPT_RETURNTRANSFER => true,
               CURLOPT_FOLLOWLOCATION => true,
               CURLOPT_POSTFIELDS => http_build_query([
                  "recipient" => $email,
                  "subject"   =>$subject,
                  "body"      =>$message
               ])
            ]);                
               $result = curl_exec($ch);
                 
                    if ($result) {
                        $message = "Nous avons envoyé un code de vérification à votre adresse e-mail <br> $email";

                        $_SESSION['message'] = $message;
                        header('location: verifyEmail.php');
                    } else {
                        $errors['otp_errors'] = 'Échec lors de l’envoi du code!';
                    }
                } else {
                    $errors['db_errors'] = "Échec lors de l’insertion de données dans la base de données !";
                }
            }
            else{
                $errors['invalidEmail'] = "Adresse e-mail non valide";
            }
        }else {
            $errors['db_error'] = "Échec lors de la vérification des e-mails de la base de données!";
        }
    }
if(isset($_POST['verifyEmail'])){
    $_SESSION['message'] = "";
    $OTPverify = mysqli_real_escape_string($conn, $_POST['OTPverify']);
    $verifyQuery = "SELECT * FROM users WHERE code = $OTPverify";
    $runVerifyQuery = mysqli_query($conn, $verifyQuery);
    if($runVerifyQuery){
        if(mysqli_num_rows($runVerifyQuery) > 0){
            $newQuery = "UPDATE users SET code = 0";
            $run = mysqli_query($conn,$newQuery);
            header("location: newPassword.php");
        }else{
            $errors['verification_error'] = "Code de vérification non valide";
        }
    }else{
        $errors['db_error'] = "Échec lors de la vérification du code de vérification de la base de données!";
    }
}

// change Password
if(isset($_POST['changePassword'])){
    $password = md5($_POST['password']);
    $confirmPassword = md5($_POST['confirmPassword']);
    
    if (strlen($_POST['password']) < 8) {
        $errors['password_error'] = 'Utilisez 8 caractères ou plus avec un mélange de lettres, de chiffres et de symboles';
    } else {
        // if password not matched so
        if ($_POST['password'] != $_POST['confirmPassword']) {
            $errors['password_error'] = 'Mot de passe ne correspondant pas';
        } else {
            $email = $_SESSION['email'];
            $updatePassword = "UPDATE users SET pass = '$password' WHERE login = '$email'";
            $updatePass = mysqli_query($conn, $updatePassword) or die("Query Failed");
           // session_unset($email);
            session_destroy();
            header('location: login.php');
        }
    }
}