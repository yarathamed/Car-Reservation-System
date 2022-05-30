<head>
  <link rel="stylesheet" href="mystyle.css">
</head>
<?php
include "config-login.php";
if(isset($_POST['savedata'])){
    $payment_method = mysqli_real_escape_string($con,$_POST['payment_method']);
    $_SESSION['payment_method']=$payment_method;
    $branch_name=$_SESSION['branch'];
    $license_plate=$_SESSION['license_plate'];
    $resultSet = $mysqli -> query("SELECT c.* FROM  car c,car_branch cb WHERE
    and c.license_plate='$license_plate'");


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
<html>
<head>
  <link rel="stylesheet" href="mystyle.css">
</head>
<div class="containerMiddle">
 <form name="form_rent" action="paymentt.php" method="POST">
  <label>Choose pickup date</label><br><br>
  <input type="date" id="pickup_date" name="pickup_date"><br><br>

  <label>Choose return date</label><br><br>
  <input type="date" id="return_date" name="return_date"><br><br>

  <label>Choose payment date</label><br><br>
  <input type="date" id="payment_date" name="payment_date"><br><br>

  <label for="payment_method">Payment Method</label><br>
  <input type="radio" id="payment_method" name="payment_method" value="Cash">
  <label for="payment_method">Cash</label><br>
  <input type="radio" id="payment_method" name="payment_method" value="Visa">
  <label for="payment_method">Visa</label><br>

  <input type="submit" name="savedata" value="GO TO CAR OPTIONS">
</form>
</div>
</html>
