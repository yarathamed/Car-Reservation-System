<?php
include "config-login.php";

if(isset($_POST['license_check']))
{
$model_name = mysqli_real_escape_string($con,$_POST['model_name']);
$branch_id = mysqli_real_escape_string($con,$_POST['branch_id']);
$car_status = mysqli_real_escape_string($con,$_POST['car_status']);
$manufacturing_year = mysqli_real_escape_string($con,$_POST['manufacturing_year']);
$rental_price = mysqli_real_escape_string($con,$_POST['rental_price']);

$license_plate = mysqli_real_escape_string($con,$_POST['license_check']);


$sql_update = "UPDATE car SET  model_name = '$model_name' , branch_id = '$branch_id' , car_status ='$car_status' , 
manufacturing_year = '$manufacturing_year', rental_price= '$rental_price' WHERE license_plate = '$license_plate'";


         if ($con->query($sql_update)===TRUE) {
            echo "Car updated successfully !<br/>";
        
          } else {
           echo "Error: " . $sql_update . "<br>" . mysqli_error($con);
          }

        
}
?>
