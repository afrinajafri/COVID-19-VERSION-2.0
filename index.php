<?php  
require ("charts/confirmedcases.php"); 
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
    <a class="navbar-brand  " style="margin-left:30px" href="index.php"><img src="https://img.icons8.com/doodle/48/000000/coronavirus.png"/><b style="margin-left:10px">COVID-19 Malaysia</b></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="nav-link active" href="#">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Vaccination</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Deaths</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Ventilations</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">ICU</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Hospitalisations</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Cases</a>
        </li> 
        </ul>
    </div>
    </nav>

    <div class="container">

        <div class="col-xl-4">
            <div class="card mb-4"> 
                <div class="card-body">
                <p class="text-muted">Cases   <span style="font-size: 12px;padding-top:4px" class="float-end">Data as of 10 Mar 2022, 11:59 pm</span></p>
                <h5 class="card-title">Confirmed COVID-19 Cases</h5> 
                    <p class="card-text">
                    <canvas id="mycanvas" width="100%" height="400"> </canvas>
                    </p> 
                </div>
            </div>
        </div> 
    </div> 
</body>



<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>  