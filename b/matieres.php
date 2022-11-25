<?php
session_start();


    ?>
   <!doctype html>
    <html lang="fr">
    <head>
    
        <title>L’évaluation des enseignements par les étudiants (EEE)</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="author" content="name">
        <meta name="description" content="description here">
        <meta name="keywords" content="keywords,here">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
        <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css"/>
        <!--Replace with your tailwind.css once created-->
        <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet"> <!--Totally optional :) -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"
                integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>

    </head>
    <!--begin::Body-->
    <body id="kt_body" data-bs-spy="scroll" data-bs-target="#kt_landing_menu" data-bs-offset="200"
          class="bg-white position-relative">
          <?php include('navbar.php'); ?>
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Header Section-->
        <div class="mb-0" id="home">
            <!--begin::Wrapper-->
            <div class="bgi-no-repeat bgi-position-x-center bgi-position-y-bottom landing-dark-bg"
            >
                <!--begin::Header-->
                <!--end::Header-->
                <!--begin::Landing hero-->
                <div class="d-flex flex-column flex-center px-9">
                    <!--begin::Heading-->
                    <!--end::Heading-->
                    <!--begin::Clients-->
                    <!--end::Clients-->
                </div>
                <!--end::Landing hero-->
            </div>
            <!--end::Wrapper-->
            <!--begin::Curve bottom-->
            <div class="landing-curve landing-dark-color mb-10 mb-lg-20">
                <svg viewBox="15 12 1470 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 11C3.93573 11.3356 7.85984 11.6689 11.7725 12H1488.16C1492.1 11.6689 1496.04 11.3356 1500 11V12H1488.16C913.668 60.3476 586.282 60.6117 11.7725 12H0V11Z"
                          fill="currentColor"></path>
                </svg>
            </div>
            <!--end::Curve bottom-->
        </div>
        <!--end::Header Section-->
        <!--begin::How It Works Section-->
        <div class="mb-5 mb-lg-n20 z-index-2">
            <!--begin::Container-->
            <div class="container pb-20">
                <h1 class='mat'>Les matières</h1>
                <?php
                include('conn.php');
                $modules = ['Programmation et développement 1', 'Systemes et reseaux', 'Outils mathematiques et informatiques ', 'Développement personnel'];
                   $n = sizeof($modules);
                for ($j = 0; $j < $n; $j++) {
                    $query = "SELECT * FROM `matieres` WHERE Module ='$modules[$j]' ";
                    $result = mysqli_query($conn, $query);
                    echo '
                    <div class="card border border-primary my-5">
                        <div class="card-header card-header-stretch">
                            <div class="card-title d-flex align-items-center">
                                <h3 class="fw-bolder m-0 text-gray-800">' . $modules[$j] . '</h3>
                            </div>
                        </div>';
                    echo '<div class="card-body">';

                    if ($result->num_rows > 0):$i = 0;
                        while ($array = mysqli_fetch_row($result)):
                             ?>      <div class="timeline">
                                    <div class="timeline-item">
                                        <div class="timeline-line w-40px"></div>
                                            <div class="timeline-content mt-n1">
                                                <div class="overflow-auto pb-5">
                                                    <div class="d-flex align-items-center border border-dashed border-gray-300 rounded min-w-750px px-7 py-3">
                                                    
                                                    <form method="POSt"> 
                                                    <input class="d-flex align-items-center border border-dashed border-gray-400 rounded min-w-950px px-7 py-3"  value='<?php echo $array[$i]?>' type="submit" name="button">
                                                    <form>

                                                    </div> 
                                                </div>
                                            </div>
                                       </div>
                                    </div>

                                    <?php
                      
                            $i += 1;
                        endwhile;
                    endif;
                    echo '</div>';
                    echo '</div>';



                }
               
                ?>
            </div>
            <!--end::Container-->
        </div>


    </div>
    <!--end::Root-->
    <!--end::Main-->


    
     <?php include('footer.php'); ?>
    </body>
    <!--end::Body-->

    </html>
    <?php
if(isset($_POST['button'])){
    session_start();
    $_SESSION['matiere']=$_POST['button'];
    echo"<script>location.replace('formesma/nbrrep.php')</script>";
}