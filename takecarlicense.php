<!DOCTYPE html>
<html>
    <head>
<title>License plate </title>
<link rel="stylesheet" href="mystyle.css">
    </head>
    <body>
<form name="license_check"  action = "searchbycar.php" method="post">
<label class="labels"><b>Enter license plate:</b></label><br>
<input type="text" name="plate_check" id="plate_check">
<br>
<br>
<button type="submit" name="button">Proceed</button><br><br>
<button type="submit" class="button" value="logout" formaction = "logout.php" name = "logout">Log out </button><br>
<br>
<br>
</form>
    </body>
</html>