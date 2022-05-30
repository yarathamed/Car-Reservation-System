<?php
include "config-login.php";

if(isset($_POST['model_id'], $_POST['model_name'], $_POST['branch_id'], $_POST['car_status'], $_POST['license_plate'], $_POST['manufacturing_year'], $_POST['rental_price']))
{
$model_id = mysqli_real_escape_string($con,$_POST['model_id']);
$model_name = mysqli_real_escape_string($con,$_POST['model_name']);
$branch_id = mysqli_real_escape_string($con,$_POST['branch_id']);
$car_status = mysqli_real_escape_string($con,$_POST['car_status']);
$license_plate = mysqli_real_escape_string($con,$_POST['license_plate']);
$manufacturing_year = mysqli_real_escape_string($con,$_POST['manufacturing_year']);
$rental_price = mysqli_real_escape_string($con,$_POST['rental_price']);

$sql = "INSERT INTO car (model_id, model_name, branch_id, car_status, license_plate, manufacturing_year, rental_price)
        VALUES ('".$model_id."','".$model_name."','".$branch_id."', '".$car_status."', '".$license_plate."','".$manufacturing_year."', '".$rental_price."' );";
         if (mysqli_query($con, $sql)) {
            echo "New car added successfully<br/>";
        
          } else {
           echo "Error: " . $sql . "<br>" . mysqli_error($con);
          }
}

?>
<!DOCTYPE html>
<html>
    <head>
<title>Enter new car specipications </title>
<link rel="stylesheet" href="mystyle.css">
    </head>
    <body>
<form name="myForm"  method="post">
<label class="labels"><b>Model Id:</b></label><br>
<input type="text" name="model_id" id="model_id">
<br>
<br>
<label class="labels"><b>Model name:</b></label> <br>  
<input type="text" name="model_name" id="model_name">
<br>
<br>
<label class="labels"><b>Branch Id:</b></label> <br>  
<input type="text" name="branch_id" id="branch_id">
<br>
<br>
<label class="labels"><b>Car status:</b></label> <br>  
<input type="text" name="car_status" id="car_status">
<br>
<br>
<label class="labels"><b>License plate:</b></label> <br>  
<input type="text" name="license_plate" id="license_plate">
<br>
<br>
<label class="labels"><b>Manufacturing year:</b></label> <br>  
<input type="text" name="manufacturing_year" id="manufacturing_year">
<br>
<br>
<label class="labels"><b>Rental price:</b></label> <br>  
<input type="text" name="rental_price" id="rental_price">
<br>
<br>
<button type="submit" name="button">ADD CAR</button><br><br>
<button type="submit" class="button" value="logout" formaction = "logout.php" name = "logout">Log out </button><br>
<br>
<br>

</form>
    </body>
</html>