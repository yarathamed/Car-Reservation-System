<?PHP
include 'config-login.php';
if(!empty($_POST['email'])&&!empty($_POST['password'])){
$emailAdmin=$_POST['email'];
$emailAdminWanted="m123@yahoo.com";
$passwordAdmin=$_POST['password'];
$passwordAdminWanted="m123";
if(strcmp($emailAdmin,$emailAdminWanted)){
    exit("INVALID EMAIL");
  if(strcmp($passwordAdmin,$passwordAdminWanted)){
 exit("INVALID PASSWORD");
  }
}
}

?>
<!DOCTYPE html>
<html>
    <head>
<title>Welcome back!<br>Please choose the function you want to perform.</title>
<link rel="stylesheet" href="mystyle.css">
    </head>
    <body>
<form name="myForm"  method="post">

<button type="submit" class="button" value="Add car"  formaction = "addcar.php" name = "Add car">Add car</button><br>
<br>
<br>
<button type="submit" class="button" value="Update a car" formaction = "licenceplate.php" name = "Update a car">Update a car</button><br>
<br>
<br>
<button type="submit" class="button" value="View reservations" formaction = "view.php" name = "View reservations">View reservations</button><br>
<br>
<br>
<button type="submit" class="button" value="Search by customer" formaction = "takecustid.php" name = "Search by customer">Search by customer</button><br>
<br>
<br>
<button type="submit" class="button" value="Search by Car" formaction = "takecarlicense.php" name = "Search by car">Search by car</button><br>
<br>
<br>
<button type="submit" class="button" value="Search by date" formaction = "takereservationdate.php" name = "Search by date">Search by reservation date</button><br>
<br>
<br>
<button type="submit" class="button" value="Reports" formaction = "adminreports.html" name = "Reports">View Reports</button><br>
<br>
<br>

</form>
    </body>
</html>
