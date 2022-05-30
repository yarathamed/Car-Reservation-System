<head>
  <link rel="stylesheet" href="mystyle.css">
</head>
<?php
include "config-login.php";

 if(isset($_POST['beginsearch']))
 {
    $model_name=mysqli_real_escape_string($con,$_POST['model_name']);
    $color=mysqli_real_escape_string($con,$_POST['color']);
    $man_year=mysqli_real_escape_string($con,$_POST['man_year']);
    $rent_price=mysqli_real_escape_string($con,$_POST['rent_price']);
    $branch=mysqli_real_escape_string($con,$_POST['branch']);


    $resultSet = $mysqli -> query("SELECT b.* FROM car_branch as b where b.branch_name='$branch'");
    $rows = $resultSet->fetch_assoc();
    $branch_id=$rows['branch_id'];

    $sql= "SELECT c.* FROM car as c where c.model_name='$model_name' and c.color='$color' AND c.manufacturing_year='$man_year'
    AND c.rental_price <= '$rent_price' AND c.branch_id='$branch_id' AND c.availability=true and c.car_status='active'";


    $result=mysqli_query($con,$sql);
    if (mysqli_num_rows($result) > 0)
    {
      echo "<form action='logout.php'>";
      echo "<table border=\"2\"><tr><th>Model Name</th><th>Color</th><th>Manufacturing Year</th><th>Rental Price per day</th><th>Branch</th></tr>";

      while($row = $result->fetch_assoc()) {
        $license_plate=$row['license_plate'];
        $_SESSION['license_plate']=$license_plate;

        echo "<tr class='clickable' onclick=\"window.location='custsearchpaymentt.php'\">
        <td>".$row["model_name"]."</td><td>".$row["color"]."</td>
        <td>".$row["manufacturing_year"]."</td><td>".$row["rental_price"]."</td>
        <td>".$branch."</tr>";
      }
      echo "</table>";
      echo "Click On The Desired Car To Reserve";
      echo "<button  type='submit' name='logout' formaction='logout.php'>Log Out</button>";
      echo "</form>";
    } else {
      echo "Car Not Available";

    }}
?>
