<?php require("header.php");

if(isset($_GET["icu_state"])   ) {    
    $_SESSION['icu_state'] = $_GET["icu_state"];  
 }  
//Include class  Vaccination
require_once("model/Vaccination.php");
if (isset($json)){
    $vaccine = json_decode($json,true);      
}      


if (isset($deathbyage)){

    $deaths =  $deathbyage ;      
}  

require ("charts/vaccination.php"); 
require ("charts/icucompare.php"); 
?>   
<style>table td, table td * {
    vertical-align: top; 
}
</style>
 
 <div class="container"> 
    <div row>
          <!-- TO SELECT STATE -->
        <div class="position-relative" style="padding-bottom:50px"> 
            <div class="position-absolute top-0 end-0">
                <form id="form1" action = "<?php $_PHP_SELF ?>" method = "GET"> 
                    <select onchange="this.form.submit()" name="icu_state" class="form-select" aria-label="Default select example" > 
                        <option selected>   <?php  if(!isset($_SESSION['icu_state'])) {  echo 'Johor'; }else{ echo $_SESSION['icu_state'];}?></option>  
                        <?php foreach($stateArr as $row){?>   
                        <option value="<?php echo $row?>"><?php echo $row?></option>  
                        <?php }?> 
                    </select>
                </form> 
            </div> 
        </div> 
 

     </div> 
     
      
        <div class="card mb-5"> 
            <div class="card-body">
            <p class="text-muted">Healthcare <span style="font-size: 12px;padding-top:4px" class="float-end">Data as of <?php echo $vaccine['date']?>, 11:59 pm</span></p>
            <h5 class="card-title">COVID-19 Patients  VS Non-COVID-19 Patients in ICU</h5> 
            <h6 class="card-subtitle mb-2 text-muted">Data for  <?php  if(!isset($_SESSION['icu_state'])) {  echo 'Johor'; }else{ echo $_SESSION['icu_state'];}?></h6> 
                <p class="card-text">     
                <div >
                        <canvas id="icu" width="100%" height="800"> </canvas> 
                    </div>
                </div>
                </p> 
            </div>
        </div>  
 </div>


<?php require("footer.php");?> 