<head>
  <link rel="stylesheet" href="mystyle.css">
</head>
<?php
//include 'config-login.php';

  if(isset($_POST['savedata'])){
    $payment_method = mysqli_real_escape_string($con,$_POST['payment_method']);
    $_SESSION['payment_method']=$payment_method;
  if(!empty($_POST['license_plate'])){
    $license_plate=$_POST['license_plate'];
    $_SESSION['license_plate']=$license_plate;
    $branch_name=$_SESSION['branch'];
    $resultSet = $mysqli -> query("SELECT c.* FROM  car c,car_branch cb WHERE
    and c.license_plate='$license_plate'");
}

if(!empty($_POST['return_date']) && !empty($_POST['pickup_date']) && !empty($_POST['payment_date']) ){
  $_SESSION['pickup_date']=$_POST['pickup_date'];
  $pickup_date=new DateTime($_POST['pickup_date']);
  $_SESSION['return_date']=$_POST['return_date'];
  $return_date=new DateTime($_POST['return_date']);
  $_SESSION['payment_date']=$_POST['payment_date'];
  $payment_date=new DateTime($_POST['payment_date']);

  $rent_interval=$return_date->diff($pickup_date);
  $_SESSION['rent_interval']=$rent_interval;

  $late_interval=$payment_date->diff($pickup_date);
  $_SESSION['late_interval']=$late_interval;
}
else {
  echo "please enter the dates";
}
}
?>


<head>
  <link rel="stylesheet" href="mystyle.css">
</head>
<div class="containerMiddle">
 <form name="form_rent" action="paymentt.php" method="POST">
<label for="model_name">Choose The Car: </label><br><br>
<?php
include "config-login.php";
if(isset($_POST['savedataa'])){
  if(!empty($_POST['branch'])){
$branch=$_POST['branch'];
$_SESSION['branch']=$branch;
echo "$branch";
$resultSet = $mysqli -> query("SELECT c.* FROM car_branch cb JOIN car c
On c.branch_id=cb.branch_id
WHERE cb.branch_name='$branch'
and c.availability=true
 AND c.car_status='active'");
}
}

?>
<select id ="license_plate" name = "license_plate" size ="2" required>
   <optgroup label="Model Name Color Rental Price$/day">
<?php

while($rows = $resultSet->fetch_assoc())
{
  $license_plate=$rows['license_plate'];
  $model_name=$rows['model_name'];
  $color=$rows['color'];
  $rental_price=$rows['rental_price'];
  echo "<option value = '$license_plate'>$model_name $color $rental_price</option>";
}
?>
</optgroup>
</select>

  <label>Choose pickup date</label><br><br>
  <input type="date" id="pickup_date" name="pickup_date" required><br><br>

  <label>Choose return date</label><br><br>
  <input type="date" id="return_date" name="return_date" required><br><br>

  <label>Choose payment date</label><br><br>
  <input type="date" id="payment_date" name="payment_date" required><br><br>

  <label for="payment_method">Payment Method</label><br>
  <input type="radio" id="payment_method" name="payment_method" value="Cash">
  <label for="payment_method">Cash</label><br>
  <input type="radio" id="payment_method" name="payment_method" value="Visa">
  <label for="payment_method">Visa</label><br>

  <input type="submit" name="savedata" value="GO TO CAR OPTIONS">
</form>
</div>
