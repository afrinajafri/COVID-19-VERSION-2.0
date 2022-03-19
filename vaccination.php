<?php require("header.php");

if(isset($_GET["vac_state"])   ) {    
    $_SESSION['vac_state'] = $_GET["vac_state"];  
 } 

 if(isset($_GET["vac_date"])   ) {    
    $_SESSION['vac_date'] = $_GET["vac_date"];  
 } 
//Include class  Vaccination
require_once("model/Vaccination.php");
if (isset($json)){
    $vaccine = json_decode($json,true);      
}   


require ("charts/vaccination.php"); 
?>   
 
 <div class="container"> 
     <div row>
          <!-- TO SELECT STATE -->
        <div class="position-relative" style="padding-bottom:50px"> 
            <div class="position-absolute top-0 end-0">
                <form id="form1" action = "<?php $_PHP_SELF ?>" method = "GET"> 
                    <select onchange="this.form.submit()" name="vac_state" class="form-select" aria-label="Default select example" > 
                        <option selected>   <?php  if(!isset($_SESSION['vac_state'])) {  echo 'Johor'; }else{ echo $_SESSION['vac_state'];}?></option>  
                        <?php foreach($stateArr as $row){?>   
                        <option value="<?php echo $row?>"><?php echo $row?></option>  
                        <?php }?> 
                    </select>
                </form> 
            </div> 
        </div> 

         <!-- TO SELECT vac_DATE -->
         <div class="position-relative" style="padding-bottom:50px"> 
            <div class="position-absolute top-0 end-0">
                 <form id="form1" action = "<?php $_PHP_SELF ?>" method = "GET"> 
                <select onchange="this.form.submit()" name="vac_date" class="form-select" aria-label="Default select example" > 
                <option selected>   <?php  if(!isset($_SESSION['vac_date'])) {  echo '2 Weeks Ago'; }else{ echo $_SESSION['vac_date'];}?></option>  
                    <?php foreach($dateArr as $row){?>   
                    <option  value="<?php echo $row?>"><?php echo $row?></option>  
                    <?php }?> 
                </select>
                </form> 
            </div> 
        </div> 

     </div> 
     
      
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

                    <div class="row mt-2 mb-2"  >
                        <div class="col">
                            <span class="text-muted">Daily - Booster</span>
                            <h4>+ <?php echo number_format($vaccine['daily_booster'])?></h4>
                        </div> 
                        <div class="col">
                            <span class="text-muted">Total - Boosters</span>
                            <h4><?php echo number_format($vaccine['cumul_booster'])?></h4>
                        </div>  
                    </div>     
 
                    <div >
                        <canvas id="vaccination" width="100%" height="800"> </canvas> 
                    </div>
                </p> 
            </div>
        </div>  
 </div>


<?php require("footer.php");?> 