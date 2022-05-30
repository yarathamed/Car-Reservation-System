<head>
  <link rel="stylesheet" href="mystyle.css">
</head>
<?PHP

include "config-login.php";

//Get user name and password from login form
$email = mysqli_real_escape_string($con,$_POST['email']);
$password = mysqli_real_escape_string($con,$_POST['password']);
$_SESSION['email']=$email;
$_SESSION['password']=$password;

//Get the md5 of the entered password
$md5_password=md5($password);

//Selecting the entered information by user from the database
$sql_query = "select * from customer where email='".$email."' and password='".$md5_password."'";
$result = mysqli_query($con,$sql_query);
$row = mysqli_fetch_array($result);

//If user exist then redirect to his welcome user echo
if(!$row){
    echo "Invalid email or password.";
    exit();
}
?>
<head>
  <link rel="stylesheet" href="mystyle.css">
</head>
<a href="http://localhost/FinalProject/custsearch.html"><button type="button" name="searchbutton" class="btn-btn-primary" >Search For A Car</button></a>
<br><br/>
<a href="http://localhost/FinalProject/showdata-signin.php"><button type="button" name="reservebutton" class="btn-btn-primary" >Reserve A Car</button></a>
