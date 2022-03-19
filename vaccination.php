<?php require("header.php");

if(isset($_GET["vac_state"])   ) {    
    $_SESSION['vac_state'] = $_GET["vac_state"];  
 } 

 if(isset($_GET["vac_date"])   ) {    
    $_SESSION['vac_date'] = $_GET["vac_date"];  
 } 
  

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
    
 </div>
<?php require("footer.php");?> 