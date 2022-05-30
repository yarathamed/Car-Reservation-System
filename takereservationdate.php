<!DOCTYPE html>
<html>
    <head>
<title>Search by reservation date </title>
<link rel="stylesheet" href="mystyle.css">
    </head>
    <body>
<form name="date_check"  action = "searchbyreservationdate.php" method="post">
<label class="labels"><b>Enter reservation date:</b></label><br>
<input type="date" name="date_check" id="date_check">
<br>
<br>
<button type="submit" name="button">Proceed</button><br><br>
<button type="submit" class="button" value="logout" formaction = "logout.php" name = "logout">Log out </button><br>
<br>
<br>

</form>
    </body>
</html>