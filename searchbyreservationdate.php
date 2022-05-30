<?php
include "config-login.php";

 if(isset($_POST['date_check']))
 {
    $date = mysqli_real_escape_string($con,$_POST['date_check']);

    $sql = "SELECT c.customer_id, c.fname, c.lname, c.email, c.city, c.gender, ca.model_id, ca.model_name, ca.license_plate, ca.branch_id, ca.rental_price, b.reservation_date
    FROM car ca NATURAL JOIN customer c NATURAL JOIN booking_details b WHERE b.reservation_date = '$date'";
         if (mysqli_query($con, $sql)) {
            echo "Found";
        
          } else {
           echo "Error: " . $sql . "<br>" . mysqli_error($con);
          }

    echo $sql;
    $result=mysqli_query($con,$sql);
    if (mysqli_num_rows($result) > 0) 
    {
      echo "<table border=\"2\"><tr><th>Customer id</th><th>First name</th><th>Last name</th><th>Email</th><th>City</th><th>Gender</th><th>Model name</th><th>License plate</th><th>Branch id</th><th>Rental price</th><th>Reservation date</th></tr>";
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "<tr class='clickable' onclick=\"window.location='search.html'\">
        <td>".$row["customer_id"]."</td><td>".$row["fname"]."</td>
        <td>".$row["lname"]."</td><td>".$row["email"]."</td>
        <td>".$row["city"]."</td><td>".$row["gender"]."</td>
        <td>".$row["model_name"]."</td>
        <td>".$row["license_plate"]."</td><td>".$row["branch_id"]."</td>
        <td>".$row["rental_price"]."</td><td>".$row["reservation_date"]."</tr>";
      }
      echo "</table>";
    } else {
      echo "0 results";
    
    }}
?>
