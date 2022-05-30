<?php
include "config-login.php";


 if(isset($_POST['start'], $_POST['end']))
 {
    $start = mysqli_real_escape_string($con,$_POST['start']);
    $end = mysqli_real_escape_string($con,$_POST['end']);


    $sql = "SELECT * FROM customer c NATURAL JOIN car ca NATURAL JOIN booking_details b WHERE b.reservation_date BETWEEN '$start' AND '$end'";
         if (mysqli_query($con, $sql)) {
            echo "Found";
        
          } else {
           echo "Error: " . $sql . "<br>" . mysqli_error($con);
          }

    echo $sql;
    $result=mysqli_query($con,$sql);
    if (mysqli_num_rows($result) > 0) 
    {
      echo "<table border=\"2\"><tr><th>Customer id</th><th>First name</th><th>Last name</th><th>Email</th><th>Password</th><th>City</th><th>Street</th><th>Zip code</th><th>Gender</th><th>User</th><th>Model name</th><th>Branch id</th><th>Car status</th><th>License plate</th><th>Manufacturing year</th><th>Rental price</th><th>Reservation id</th><th>Reaservation date</th><th>Pickup date</th><th>Return date</th><th>Pickup location</th></tr>";
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "<tr class='clickable' onclick=\"window.location='search.html'\">
        <td>".$row["customer_id"]."</td><td>".$row["fname"]."</td>
        <td>".$row["lname"]."</td><td>".$row["email"]."</td>
        <td>".$row["password"]."</td><td>".$row["city"]."</td>
        <td>".$row["street"]."</td><td>".$row["zipcode"]."</td>
        <td>".$row["gender"]."</td><td>".$row["user"]."</td>
        <td>".$row["model_name"]."</td>
        <td>".$row["branch_id"]."</td><td>".$row["car_status"]."</td>
        <td>".$row["license_plate"]."</td>
        <td>".$row["manufacturing_year"]."</td><td>".$row["rental_price"]."</td>
        <td>".$row["reservation_id"]."</td><td>".$row["reservation_date"]."</td>
        <td>".$row["pickup_date"]."</td><td>".$row["return_date"]."</td>
        <td>".$row["pickup_location"]."</tr>";
      }
      echo "</table>";
    } else {
      echo "0 results";
    
    }}
?>