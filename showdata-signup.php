<head>
    <link rel="stylesheet" href="mystyle.css">
  </head>

<?php
//This PHP script is responsible for creating a new user

//Initiate a database connection
include "config-login.php";

//Get username, email and password from registration form
$fname = mysqli_real_escape_string($con,$_POST['fname']);
$lname = mysqli_real_escape_string($con,$_POST['lname']);
$email = mysqli_real_escape_string($con,$_POST['email']);
$password_1 = mysqli_real_escape_string($con,$_POST['password_1']);
$gender = mysqli_real_escape_string($con,$_POST['gender']);
$city = mysqli_real_escape_string($con,$_POST['city']);
$zipcode = mysqli_real_escape_string($con,$_POST['zipcode']);
$street = mysqli_real_escape_string($con,$_POST['street']);

$_SESSION['fname']=$fname;
$_SESSION['lname']=$lname;
$_SESSION['email']=$email;
$_SESSION['password_1']=$password_1;
$_SESSION['gender']=$gender;
$_SESSION['city']=$city;
$_SESSION['zipcode']=$zipcode;
$_SESSION['street']=$street;

//Get the md5 of the entered password
$md5_password=md5($password_1);

//Check if the user is already registred
$sql_query1="SELECT * from customer where (email='$email')";
      $res1=mysqli_query($con,$sql_query1);
      if (mysqli_query($con, $sql_query1)) {
      if (mysqli_num_rows($res1) > 0) {
        $row = mysqli_fetch_assoc($res1);
        if($email==isset($row['email']))
        {
          echo "
            <script type='text/javascript'>
           alert('Email already exists')
            </script>
        ";
        }
      }
      else {
        //Insert the user information in the database
        $sql_query2 = "INSERT INTO customer (fname, lname, email, password, gender, city, street, zipcode)
        VALUES ('".$fname."','".$lname."','".$email."' ,'".$md5_password."', '".$gender."', '".$city."', '".$street."', '".$zipcode."')";
         if (mysqli_query($con, $sql_query2)) {
          echo "New account created successfully<br/>";
          echo "<b>Welcome</b> "."$fname". "$lname";
        } else {
         echo "Error: " . $sql_query2 . "<br>" . mysqli_error($con);
        }
      }
		}
  else {
  echo "Error: " . $sql_query1 . "<br>" . mysqli_error($con);
  }
  // $city=$_POST['city'];
  // $resultSet = $mysqli -> query("SELECT branch_name FROM car_branch cb JOIN location_details ld
  // On ld.location_id=cb.branch_location
  // WHERE ld.city='$city'");
?>
<div class="containerMiddle">
<form name="form_branch" action="signin.html" method="POST">
<!-- <label for="branch">Choose branch wanted: </label><br><br> -->
<!-- <select id ="branch" name = "branch"> -->

<?php

// while($rows = $resultSet->fetch_assoc())
// {
//  $branch = $rows['branch_name'];
// echo "<option value = '$branch'>$branch</option>";
// }

?>
</select>CLICK HERE TO CONTINUE
<input type="submit" name="savedataa" value="SUBMIT">
</form>
</div>
