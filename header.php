<?php
session_start();  

$stateArr = ['Johor','Kedah','Kelantan', 'Melaka', 'Negeri Sembilan', 'Pahang', 'Perak', 'Perlis','Pulau Pinang', 'Sabah', 'Sarawak', 'Selangor', 'Terengganu', 'W.P. Kuala Lumpur', 'W.P. Labuan', 'W.P. Putrajaya' ];
$dateArr = ['2 Weeks Ago','2 Months Ago','This Year', 'All Time'];
?>
 
<!DOCTYPE html>
<html lang="en">
<head> 
    <title>COVID-19 Tracker</title>

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/Chart.min.js"></script> 

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link href="css/style.css" rel="stylesheet"> 

 
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm p-3 mb-5 bg-white rounded">
    <a class="navbar-brand  " style="margin-left:30px" href="index.php"><img src="https://img.icons8.com/doodle/48/000000/coronavirus.png"/><b style="margin-left:10px">MY COVID19 Tracker</b></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
        
        <li <?php if ($_SERVER['SCRIPT_NAME'] == "/index.php") { ?> 
            class="nav-item active" 
        <?php   } else {  ?>
            class="nav-item"
        <?php } ?>>
            <a <?php if ($_SERVER['SCRIPT_NAME'] == "/index.php") { ?> 
            class="nav-link active" 
        <?php   } else {  ?>
            class="nav-link"
        <?php } ?>   href="index.php">Home  </a>
        </li>

        <li <?php if ($_SERVER['SCRIPT_NAME'] == "/vaccination.php") { ?> 
            class="nav-item active" 
        <?php   } else {  ?>
            class="nav-item"
        <?php } ?>>
            <a <?php if ($_SERVER['SCRIPT_NAME'] == "/vaccination.php") { ?> 
            class="nav-link active" 
        <?php   } else {  ?>
            class="nav-link"
        <?php } ?>   href="vaccination.php">Vaccination  </a>
        </li>

        <li <?php if ($_SERVER['SCRIPT_NAME'] == "/deaths.php") { ?> 
            class="nav-item active" 
        <?php   } else {  ?>
            class="nav-item"
        <?php } ?>>
            <a <?php if ($_SERVER['SCRIPT_NAME'] == "/deaths.php") { ?> 
            class="nav-link active" 
        <?php   } else {  ?>
            class="nav-link"
        <?php } ?>   href="deaths.php">Deaths  </a>
        </li>

        <li <?php if ($_SERVER['SCRIPT_NAME'] == "/ventilations.php") { ?> 
            class="nav-item active" 
        <?php   } else {  ?>
            class="nav-item"
        <?php } ?>>
            <a <?php if ($_SERVER['SCRIPT_NAME'] == "/ventilations.php") { ?> 
            class="nav-link active" 
        <?php   } else {  ?>
            class="nav-link"
        <?php } ?>   href="ventilations.php">Ventilations  </a>
        </li>

        <li <?php if ($_SERVER['SCRIPT_NAME'] == "/icu.php") { ?> 
            class="nav-item active" 
        <?php   } else {  ?>
            class="nav-item"
        <?php } ?>>
            <a <?php if ($_SERVER['SCRIPT_NAME'] == "/icu.php") { ?> 
            class="nav-link active" 
        <?php   } else {  ?>
            class="nav-link"
        <?php } ?>   href="icu.php">ICU  </a>
        </li>

        <li <?php if ($_SERVER['SCRIPT_NAME'] == "/hospitalisations.php") { ?> 
            class="nav-item active" 
        <?php   } else {  ?>
            class="nav-item"
        <?php } ?>>
            <a <?php if ($_SERVER['SCRIPT_NAME'] == "/hospitalisations.php") { ?> 
            class="nav-link active" 
        <?php   } else {  ?>
            class="nav-link"
        <?php } ?>   href="hospitalisations.php">Hospitalisations  </a>
        </li> 
        </ul>
    </div>
    </nav>