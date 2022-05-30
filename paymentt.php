<head>
  <link rel="stylesheet" href="mystyle.css">
</head>
<form method="post" action="logout.php">
  <?php
  include 'config-login.php';

    $license_plate=$_SESSION['license_plate'];
    $branch_name=$_SESSION['branch'];
    $rent_interval=$_SESSION['rent_interval'];
    echo "Rent Period".$rent_interval->days;
    $resultSet = $mysqli -> query("SELECT c.* FROM  car c
    where c.license_plate='$license_plate'");
    $rows = $resultSet->fetch_assoc();
    $rental_price=$rows['rental_price'];
    $model_name=$rows['model_name'];
    $color=$rows['color'];
    $normal_amount=($rent_interval->days)*$rental_price;
    $email=$_SESSION['email'];

    $resultSet = $mysqli -> query("SELECT c.customer_id FROM customer c
    WHERE c.email='$email'");
    $rows=$resultSet->fetch_assoc();
    $customer_id=$rows['customer_id'];
    $return_date=$_SESSION['return_date'];
    $payment_date=$_SESSION['payment_date'];
    $branch_name=$_SESSION['branch'];

    $resultSet = $mysqli -> query("SELECT cb.branch_id FROM car_branch cb
    WHERE cb.branch_name='$branch_name'");
    $rows=$resultSet->fetch_assoc();
    $branch_id=$rows['branch_id'];

    $pickup_date=$_SESSION['pickup_date'];
    $sql="INSERT INTO `booking_details`(`pickup_date`, `return_date`, `pickup_location`, `customer_id`, `license_plate`)
    VALUES ('$pickup_date','$return_date','$branch_id','$customer_id','$license_plate')";
    if ($con->query($sql) === TRUE) {
    echo "New record inserted in reservations successfully <br><br>";

    $sql = "UPDATE car c SET c.availability=false WHERE c.license_plate='$license_plate' ";

    if ($con->query($sql) === TRUE) {
    echo "Car availability updated successfully <br><br>";


    $resultSet = $mysqli -> query("SELECT bd.reservation_id FROM booking_details bd
    WHERE bd.license_plate='$license_plate' and bd.customer_id='$customer_id'");
    $rows=$resultSet->fetch_assoc();
    $reservation_id=$rows['reservation_id'];

    $late_interval=$_SESSION['late_interval'];
    $late_fees=($late_interval->days)*$rental_price*0.25;
    $total_amount=$normal_amount+$late_fees;

    $_SESSION['total_amount']=$total_amount;
    $payment_method=$_SESSION['payment_method'];
    $sql="INSERT INTO `invoice_details`(`payment_date`, `late_fees`, `payment_method`, `normal_amount`, `total_amount`, `reservation_id`)
    VALUES ('$payment_date','$late_fees','$payment_method','$normal_amount','$total_amount','$reservation_id')";

    if ($con->query($sql) === TRUE) {
    echo "New record inserted in invoice successfully <br><br>";

    echo "<label>Your Chosen Car is $model_name</label><br><br>";
    echo "<label>Color: $color</label><br><br>";
    echo "<label>License Plate: $license_plate</label><br><br>";
    echo "<label>Rental price: $rental_price</label><br><br>";
    echo "<label>Renting period: $rent_interval->days </label><br><br>";
    echo "<label>Total price without late fees = $normal_amount</label><br><br>";
    echo "<label>Late fees = $late_fees</label><br><br>";
    echo "<label>Total price including late fees = $total_amount</label><br><br>";
    echo "<button  type='submit' name='logout' formaction='logout.php'>Log Out</button>";
    } else {
    echo "Error: " . $sql . "<br>" . $con->error;
    }
    } else {
    echo "Error: " . $sql . "<br>" . $con->error;
    }
    } else {
    echo "Error: " . $sql . "<br>" . $con->error;
    }
   ?>

</form>
