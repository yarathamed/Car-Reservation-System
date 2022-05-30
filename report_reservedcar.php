<?php
include "config-login.php";

 if(isset($_POST['start'],$_POST['end']))
 {
    $start = mysqli_real_escape_string($con,$_POST['start']);
    $end = mysqli_real_escape_string($con,$_POST['end']);

    $sql = "SELECT *
    FROM booking_details b NATURAL JOIN car ca WHERE b.reservation_date BETWEEN '$start' AND '$end'";
         if (mysqli_query($con, $sql)) {
            echo "Found";
        
          } else {
           echo "Error: " . $sql . "<br>" . mysqli_error($con);
          }

    echo $sql;
    $result=mysqli_query($con,$sql);
    if (mysqli_num_rows($result) > 0) 
    {
      echo "<table border=\"2\"><tr><th>Reservation id</th><th>Reservation date</th><th>Pickup date</th><th>Return date</th><th>Pickup location</th><th>customer id</th><th>license_plate</th><th>model name</th><th>branch_id</th><th>car status</th><th>manufacturing year</th><th>Rental price</th></tr>";
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "<tr class='clickable' onclick=\"window.location='search.html'\">
        <td>".$row["reservation_id"]."</td><td>".$row["reservation_date"]."</td>
        <td>".$row["pickup_date"]."</td><td>".$row["return_date"]."</td>
        <td>".$row["pickup_location"]."</td><td>".$row["customer_id"]."</td>
        <td>".$row["license_plate"]."</td>
        <td>".$row["model_name"]."</td><td>".$row["branch_id"]."</td>
        <td>".$row["car_status"]."</td><td>".$row["manufacturing_year"]."</td>
        <td>".$row["rental_price"]."</tr>";
      }
      echo "</table>";
    } else {
      echo "0 results";
    
    }}
?>
