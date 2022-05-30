<?php
include "config-login.php";


 if(isset($_POST['start'], $_POST['end']))
 {
    $start = mysqli_real_escape_string($con,$_POST['start']);
    $end = mysqli_real_escape_string($con,$_POST['end']);


    $sql = "SELECT total_amount FROM invoice_details WHERE payment_date BETWEEN '$start' AND '$end'";
         if (mysqli_query($con, $sql)) {
            echo "Found";
        
          } else {
           echo "Error: " . $sql . "<br>" . mysqli_error($con);
          }

    echo $sql;
    $result=mysqli_query($con,$sql);
    if (mysqli_num_rows($result) > 0) 
    {
      echo "<table border=\"2\"><tr><th>Daily payments</th></tr>";
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "<tr class='clickable' onclick=\"window.location='search.html'\">
        <td>".$row["total_amount"]."</tr>";
      }
      echo "</table>";
    } else {
      echo "0 results";
    
    }}
?>