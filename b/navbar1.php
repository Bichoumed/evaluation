<!DOCTYPE html>
<html>
<head>
<meta name="author" content="name">
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/> <!--Replace with your tailwind.css once created-->
    <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet"> <!--Totally optional :) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js" integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>
   
</head>
<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="../index.php">
            <img src="../static/logo.jpg" alt="" width="41" height="31" class="d-inline-block align-text-top">
              </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../index.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../matiere1/index.php">Matières</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../student/index.php">Étudiants</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../axe/index.php">Axes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../question/index.php">Questions</a>
                </li>
                <li class="nav-item">
                    <!-- <a class="nav-link" href="../reponse/index.php">Réponses</a> -->
                </li>
                
                
                <!--<li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        Ajouter
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="../student/add.php">Un étudiant</a></li>
                        <li><a class="dropdown-item" href="../matiere/add.php">Une matière</a></li>
                        <li><a class="dropdown-item" href="../axe/add.php">Un axe</a></li>
                        <li><a class="dropdown-item" href="../reponse/add.php">Une réponses</a></li>
                        <li><a class="dropdown-item" href="../question/add.php">Une question</a></li>
                        <li><a class="dropdown-item" href="../inscription/add.php">Une inscription</a></li>
                    </ul>
                </li>
                
                <div class="relative inline-block" >
                            <div class="nav-link" id="hi"><button  onclick="toggleDD('myDropdown')" class="drop-button text-white py-2 px-2"> <span class="pr-2"><i class="em em-robot_face"></i></span> <p>admin</p> <svg class="h-3 fill-current inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg></button></div>
                            <div id="myDropdown" class="dropdownlist absolute bg-gray-800 text-white right-0 mt-3 p-3 overflow-auto z-30 invisible">
                                <input type="text" class="drop-search p-2 text-gray-600" placeholder="Search.." id="myInput" onkeyup="filterDD('myDropdown','myInput')">
                                <a href="#" class="p-2 hover:bg-gray-800 text-white text-sm no-underline hover:no-underline block"><i class="fa fa-user fa-fw"></i> Profile</a>
                                
                                <div class="border border-gray-800"></div>
                                <a href="login/login.php" class="p-2 hover:bg-gray-800 text-white text-sm no-underline hover:no-underline block"><i class="fas fa-sign-out-alt fa-fw"></i> Log Out</a>
                            </div>
                        </div>
                        </li>

    -->
    
            </ul>
        </div>
    </div>
    <?php
                
                if (isset($_SESSION['U'])) {
                    echo('<a href="./logout.php" class="btn btn-secondary" style="background-color:#08546c; color:#fff;">Se déconnecter</a>');
                } else {
                    echo('<a href="../login.php" class="btn btn-primary">S\'identifier </a>');
                }
                ?>
</nav>