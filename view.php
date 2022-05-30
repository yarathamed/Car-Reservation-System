<?php
include "config-login.php";
$view = "SELECT b.reservation_id, c.fname, c.lname,  b.reservation_date, b.pickup_date, b.return_date, b.pickup_location, ca.model_name, b.license_plate
FROM booking_details b NATURAL JOIN car ca NATURAL JOIN customer c";
    echo $view;
    $result=mysqli_query($con,$view);
    if (mysqli_num_rows($result) > 0) {
      echo "<table border=\"2\"><tr><th>Reservation id</th><th>First name</th><th>Last name</th><th>Reservation date</th><th>Pickup date</th><th>Return date</th><th>Pickup location</th><th>Model name</th><th>License plate</th></tr>";
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "<tr class='clickable' onclick=\"window.location='search.html'\">
        <td>".$row["reservation_id"]."</td><td>".$row["fname"]."</td>
        <td>".$row["lname"]."</td><td>".$row["reservation_date"]."</td>
        <td>".$row["pickup_date"]."</td><td>".$row["return_date"]."</td>
        <td>".$row["pickup_location"]."</td><td>".$row["model_name"]."</td>
        <td>".$row["license_plate"]."</tr>";
      }
      echo "</table>";
    } else {
      echo "0 results";
    }
?>
