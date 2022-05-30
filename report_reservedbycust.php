<?php
include "config-login.php";

 if(isset($_POST['customer_id']))
 {
    $customerid = mysqli_real_escape_string($con,$_POST['customer_id']);

    $sql = "SELECT b.reservation_id, b.reservation_date, b.pickup_date, b.return_date, b.pickup_location, b.customer_id, b.license_plate,c.fname,c.lname,c.email,c.password,c.city,c.street, c.zipcode, c.gender, ca.model_name
    FROM booking_details b NATURAL JOIN car ca NATURAL JOIN customer c WHERE c.customer_id = '$customerid'";
         if (mysqli_query($con, $sql)) {
            echo "Found";
        
          } else {
           echo "Error: " . $sql . "<br>" . mysqli_error($con);
          }

    echo $sql;
    $result=mysqli_query($con,$sql);
    if (mysqli_num_rows($result) > 0) 
    {
      echo "<table border=\"2\"><tr><th>Reservation id</th><th>Reservation date</th><th>Pickup date</th><th>Return date</th><th>Pickup location</th><th>customer id</th><th>license_plate</th><th>first name</th><th>last name</th><th>email</th><th>passsword/th><th>city</th><th>street</th><th>zipcode</th><th>gender</th><th>model_name</th></tr>";
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "<tr class='clickable' onclick=\"window.location='search.html'\">
        <td>".$row["reservation_id"]."</td><td>".$row["reservation_date"]."</td>
        <td>".$row["pickup_date"]."</td><td>".$row["return_date"]."</td>
        <td>".$row["pickup_location"]."</td><td>".$row["customer_id"]."</td>
        <td>".$row["license_plate"]."</td><td>".$row["fname"]."</td>
        <td>".$row["lname"]."</td><td>".$row["email"]."</td>
        <td>".$row["password"]."</td><td>".$row["city"]."</td>
        <td>".$row["street"]."</td><td>".$row["zipcode"]."</td>
        <td>".$row["gender"]."</td>
        <td>".$row["model_name"]."</tr>";
      }
      echo "</table>";
    } else {
      echo "0 results";
    
    }}
?>
