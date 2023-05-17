<?php
session_start();
$_SESSION['counter'] = 0;
 ?>
<!DOCTYPE html5>
<html>
<head>
<?php include "header.php";?>
<title>Add New Event</title>
</head>
<body>
<?php  include "nav.php" ?>
<main>
    <div class="city">

<p>Enter information about upcoming events</p>

<form class="formLog" action="admin-confirm.php" method="POST">
  
    <label for="heading">Heading</label>
    <input type="text" name="heading" />

    <label for="datevent">Trip Date</label>
    <input type="date" name="dateevent" />
   
    <label for="duration">Duration</label>
    <input type="text" name="duration" />

    <label for="summary">Summary</label>
    <input type="text" name="summary" />

    <input type="submit" name="saveevent" value="submit" /> 
</form>
</div>
</main>
<?php include "footer.php";?>
</body>
</html>
