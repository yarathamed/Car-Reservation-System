<?php
include "config-login.php";
if(isset($_POST['pick_date'])){
        $date = mysqli_real_escape_string($con,$_POST['pick_date']);
        //$fSQL = "SELECT c.license_plate, c.model_name, c.car_status FROM car c NATURAL JOIN booking_details b WHERE '$date' BETWEEN b.pickup_date AND b.return_date";
        //$sSQL = "SELECT c1.license_plate, c1.model_name, c1.car_status  FROM car c1 LEFT OUTER JOIN booking_details b1 ON c1.license_plate = b1.license_plate WHERE c1.lisence_plate NOT IN (SELECT cc.license_plate FROM car cc NATURAL JOIN booking_details bb  WHERE '$date' BETWEEN bb.pickup_date AND bb.return_date) AND '$date' BETWEEN bb.pickup_date AND bb.return_date ";
      //  $finalSQL= "SELECT c.license_plate, c.model_name, c.car_status FROM car c NATURAL JOIN booking_details b WHERE '$date' BETWEEN b.pickup_date AND b.return_date UNION SELECT c1.license_plate, c1.model_name, c1.car_status  FROM car c1 LEFT OUTER JOIN booking_details b1 ON c1.license_plate = b1.license_plate WHERE c1.lisence_plate NOT IN (SELECT cc.license_plate FROM car cc NATURAL JOIN booking_details bb  WHERE '$date' BETWEEN bb.pickup_date AND bb.return_date) AND '$date' BETWEEN bb.pickup_date AND bb.return_date ";
      $fSQL = "SELECT c.license_plate,c.model_name,c.car_status FROM car c INNER JOIN booking_details b ON c.license_plate = b.license_plate WHERE '$date' BETWEEN b.pickup_date AND b.return_date";
        $sSQL = "SELECT c.license_plate,c.model_name,c.car_status  FROM car c LEFT OUTER JOIN booking_details ON c.license_plate = b.license_plate WHERE c.license_plate NOT IN (SELECT c.license_plate FROM car c INNER JOIN booking_details b ON c.license_plate = b.license_plate WHERE "."'$date' BETWEEN b.pickup_date AND b.return_date)";  
      echo $fSQL;
        echo $sSQL;
        $fresult = mysqli_query($con,$fSQL);
        $sresult = mysqli_query($con,$sSQL);
        if (mysqli_num_rows($fresult) > 0 ) {
            echo "<table border=\"1\"><tr><th>License Plate</th><th>Model name</th><th>Car status</th></tr>";
            // output data of each row from first result
            if (mysqli_num_rows($fresult) > 0){
                while($row1 = $fresult->fetch_assoc()) {
                    echo "<tr class='clickable' onclick=\"window.location='search.html'\">
                    <td>".$row1["license_plate"]."</td>
                    <td>".$row1["model_name"]."</td>
                    <td>".$row1["car_status"]."</tr>";
                }
            }
            // output data of each row from second result
            echo "<table border=\"1\"><tr><th>License Plate</th><th>Model name</th><th>Car status</th></tr>";
            if (mysqli_num_rows($sresult) > 0){
                while($row2 = $sresult->fetch_assoc()) {
                    echo "<tr class='clickable' onclick=\"window.location='search.html'\">
                    <td>".$row2["car_id"]."</td>
                    <td>".$row2["model_name"]."</td>
                    <td>".$row2["car_status"]."</tr>";
                }
            }
            echo "</table>";
        } else {
            echo "0 results";
          }
    }
    ?>