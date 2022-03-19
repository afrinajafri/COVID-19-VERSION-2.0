<?php require("header.php");?> 

<?php   
//Include class  StateVaccination
require_once("model/StateVaccination.php");
 
 
if (isset($json)){
    $vaccine = json_decode($json,true);      
}  
 

if(isset($_GET["state"])   ) {    
    $_SESSION['state'] = $_GET["state"];  
 } 

 if(isset($_GET["date"])   ) {    
    $_SESSION['date'] = $_GET["date"];  
 } 
  
require ("charts/confirmedcases.php"); 
require ("charts/malaysiadaily.php"); 
require ("charts/deathchart.php"); 
require ("charts/ventilated.php"); 
require ("charts/icuchart.php"); 
require ("charts/hospitalchart.php"); 
require ("charts/testchart.php"); 
?> 

    <div class="container">

        <!-- TO SELECT STATE -->
        <div class="position-relative" style="padding-bottom:50px"> 
            <div class="position-absolute top-0 end-0">
                <form id="form1" action = "<?php $_PHP_SELF ?>" method = "GET"> 
                    <select onchange="this.form.submit()" name="state" class="form-select" aria-label="Default select example" > 
                        <option selected>   <?php  if(!isset($_SESSION['state'])) {  echo 'Johor'; }else{ echo $_SESSION['state'];}?></option>  
                        <?php foreach($stateArr as $row){?>   
                        <option value="<?php echo $row?>"><?php echo $row?></option>  
                        <?php }?> 
                    </select>
                </form> 
            </div> 
        </div> 

 
        <div class="row">
            <div class="col-xl-5">
                <div class="card mb-5"> 
                    <div class="card-body">
                    <p class="text-muted">Vaccinations <span style="font-size: 12px;padding-top:4px" class="float-end">Data as of <?php echo $vaccine['date']?>, 11:59 pm</span></p>
                    <h5 class="card-title">Population Vaccinated</h5> 
                    <h6 class="card-subtitle mb-2 text-muted">Data for <?php echo $vaccine['state'];  ?> | Total Population</h6> 
                        <p class="card-text"> 
                        

                        <div class="row mt-4">
                                <div class="col">
                                    <span class="text-muted">Daily - Administered</span>
                                <h4>+ <?php echo number_format($vaccine['daily'])?></h4> 
                                </div>  
                                <div class="col">
                                    <span class="text-muted">Total - Administered</span>
                                    <h4><?php echo number_format($vaccine['cumul'])?></h4>
                                </div>  
                            </div>    

                            <div class="row mt-2">
                                <div class="col">
                                    <span class="text-muted">Daily - 1st Dose</span>
                                    <h4>+ <?php echo number_format($vaccine['daily_partial'])?></h4>
                                </div> 
                                <div class="col">
                                    <span class="text-muted">Total - At Least 1 Dose</span>
                                    <h4><?php echo number_format($vaccine['cumul_partial'])?></h4>
                                </div>  
                            </div>    

                            <div class="row mt-2">
                                <div class="col">
                                    <span class="text-muted">Daily - 2 Doses</span>
                                    <h4>+ <?php echo number_format($vaccine['daily_full'])?></h4>
                                </div> 
                                <div class="col">
                                    <span class="text-muted">Total - 2 Doses</span>
                                    <h4><?php echo number_format($vaccine['cumul_full'])?></h4>
                                </div>  
                            </div>    

                            <div class="row mt-2" style="margin-bottom:120px">
                                <div class="col">
                                    <span class="text-muted">Daily - Booster</span>
                                    <h4>+ <?php echo number_format($vaccine['daily_booster'])?></h4>
                                </div> 
                                <div class="col">
                                    <span class="text-muted">Total - Boosters</span>
                                    <h4><?php echo number_format($vaccine['cumul_booster'])?></h4>
                                </div>  
                            </div>     
                        </p> 
                    </div>
                </div>
            </div> 

            <div class="col-xl-7">
                <div class="card mb-4"> 
                    <div class="card-body">
                    <p class="text-muted">Cases   <span style="font-size: 12px;padding-top:4px" class="float-end">Data as of <?php echo $vaccine['date']?>, 11:59 pm</span></p>
                    <h5 class="card-title">Confirmed COVID-19 Cases in Malaysia</h5> 
                    <h6 class="card-subtitle mb-2 text-muted">Data for All Malaysia State</h6> 
                        <p class="card-text"> 
                        <canvas id="malaysia" width="100%" height="400"> </canvas>
                        </p> 
                    </div>
                </div>
            </div> 

        </div>

         <!-- TO SELECT DATE -->
         <div class="position-relative" style="padding-bottom:50px"> 
            <div class="position-absolute top-0 end-0">
                 <form id="form1" action = "<?php $_PHP_SELF ?>" method = "GET"> 
                <select onchange="this.form.submit()" name="date" class="form-select" aria-label="Default select example" > 
                <option selected>   <?php  if(!isset($_SESSION['date'])) {  echo '2 Weeks Ago'; }else{ echo $_SESSION['date'];}?></option>  
                    <?php foreach($dateArr as $row){?>   
                    <option  value="<?php echo $row?>"><?php echo $row?></option>  
                    <?php }?> 
                </select>
                </form> 
            </div> 
        </div> 

        <div class="row">

            <div class="col-xl-4">
                <div class="card mb-4"> 
                    <div class="card-body">
                    <p class="text-muted">Deaths   <span style="font-size: 12px;padding-top:4px" class="float-end">Data as of <?php echo $vaccine['date']?>, 11:59 pm</span></p>
                    <h5 class="card-title">COVID-19 Deaths by Date of Death</h5> 
                    <h6 class="card-subtitle mb-2 text-muted">Data for <?php echo $vaccine['state'] ?></h6> 
                        <p class="card-text">
                        <canvas id="deathbar" width="100%" height="400"> </canvas>
                        </p> 
                    </div>
                </div>
            </div> 


            <div class="col-xl-4">
                <div class="card mb-4"> 
                    <div class="card-body">
                    <p class="text-muted">Healthcare   <span style="font-size: 12px;padding-top:4px" class="float-end">Data as of <?php echo $vaccine['date']?>, 11:59 pm</span></p>
                    <h5 class="card-title">COVID-19 Patients Ventilated</h5> 
                    <h6 class="card-subtitle mb-2 text-muted">Data for <?php echo $vaccine['state'] ?></h6> 
                        <p class="card-text">
                        <canvas id="ventilated" width="100%" height="400"> </canvas>
                        </p> 
                    </div>
                </div>
            </div> 

            <div class="col-xl-4">
                <div class="card mb-4"> 
                    <div class="card-body">
                    <p class="text-muted">Healthcare   <span style="font-size: 12px;padding-top:4px" class="float-end">Data as of <?php echo $vaccine['date']?>, 11:59 pm</span></p>
                    <h5 class="card-title">COVID-19 Patients in ICU</h5> 
                    <h6 class="card-subtitle mb-2 text-muted">Data for <?php echo $vaccine['state'] ?></h6> 
                        <p class="card-text">
                        <canvas id="icu" width="100%" height="400"> </canvas>
                        </p> 
                    </div>
                </div>
            </div> 

            <div class="col-xl-4">
                <div class="card mb-4"> 
                    <div class="card-body">
                    <p class="text-muted">Healthcare   <span style="font-size: 12px;padding-top:4px" class="float-end">Data as of <?php echo $vaccine['date']?>, 11:59 pm</span></p>
                    <h5 class="card-title">COVID-19 Hospital Admissions</h5> 
                    <h6 class="card-subtitle mb-2 text-muted">Data for <?php echo $vaccine['state'] ?></h6> 
                        <p class="card-text">
                        <canvas id="hospitalchart" width="100%" height="400"> </canvas>
                        </p> 
                    </div>
                </div>
            </div> 

            <div class="col-xl-4">
                <div class="card mb-4"> 
                    <div class="card-body">
                    <p class="text-muted">Cases   <span style="font-size: 12px;padding-top:4px" class="float-end">Data as of <?php echo $vaccine['date']?>, 11:59 pm</span></p>
                    <h5 class="card-title">Confirmed COVID-19 Cases</h5> 
                    <h6 class="card-subtitle mb-2 text-muted">Data for <?php echo $vaccine['state'] ?></h6> 
                        <p class="card-text">
                        <canvas id="confirmed_cases" width="100%" height="400"> </canvas>
                        </p> 
                    </div>
                </div>
            </div> 

            <div class="col-xl-4">
                <div class="card mb-4"> 
                    <div class="card-body">
                    <p class="text-muted">Testing   <span style="font-size: 12px;padding-top:4px" class="float-end">Data as of <?php echo $vaccine['date']?>, 11:59 pm</span></p>
                    <h5 class="card-title">COVID-19 Tests Conducted</h5> 
                    <h6 class="card-subtitle mb-2 text-muted">Data for <?php echo $vaccine['state'] ?></h6> 
                        <p class="card-text">
                        <canvas id="testchart" width="100%" height="400"> </canvas>
                        </p> 
                    </div>
                </div>
            </div> 
        </div>



       
    </div> 
    <?php require("footer.php");?> 