<head>
  <link rel="stylesheet" href="mystyle.css">
</head>
<?php
//This PHP script is responsible for fetching
//user information from database for login purpose

//Initiate a database connection
include "config-login.php";

//Selecting the entered information by user from the database
$email=$_SESSION['email'];
$password=$_SESSION['password'];
$md5_password=md5($password);
$sql_query = "select * from customer where email='".$email."' and password='".$md5_password."'";
$result = mysqli_query($con,$sql_query);
$row = mysqli_fetch_array($result);

//If user exist then redirect to his welcome user echo
if(!$row){
    echo "Invalid email or password.";
    exit();
}
    echo "<b>Welcome</b> ".$row['fname'].$row['lname'];
$city=$row['city'];
$resultSet = $mysqli -> query("SELECT branch_name FROM car_branch cb JOIN location_details ld
On ld.location_id=cb.branch_location
WHERE ld.city='$city'");
?>
<div class="containerMiddle">
<form name="form_branch" action="car.php" method="POST"><!--car.php-->
<label for="branch">Choose branch: </label><br><br>
<select id ="branch" name = "branch" required>
<?php
while($rows = $resultSet->fetch_assoc())
{
 $branch = $rows['branch_name'];
echo "<option value = '$branch'>$branch</option>";
}
?>
</select>
<!-- <button type="submit" name="button">GO TO CARS</button><br><br> -->
<input type="submit" name="savedataa" value="SUBMIT">
</form>
</div>
