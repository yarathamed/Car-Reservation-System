<?php
include "config-login.php";

if(isset($_POST['license_check']))
{
    $license_plate = mysqli_real_escape_string($con,$_POST['license_check']);


    $get_license = "SELECT license_plate FROM car WHERE license_plate = '$license_plate'";
    if(mysqli_num_rows($get_license)>0)
    {
    
        if($con->query($get_license) === TRUE){
            //$_SESSION['license_plate'] = $license_plate;
            //header("Location: http://localhost/finproj/editcar.php");
            echo "Success";
        }
        else{
            
            echo "Error: " . $get_license . "<br>" . $con->error;
            }
    }
    else{
        echo "This license plate does not correspond to any existing car.";
    }
}
?>