<head>
  <link rel="stylesheet" href="mystyle.css">
</head>
<?php
include 'config-login.php';
session_destroy();
echo "Thank You for Using Our Rental System..";
echo "<div><a href='signin.html' target='_blank' title='Login page' class='linksInPage'>
CLICK HERE TO LOGIN ONCE MORE</a>
 </div>";
?>
