<?php session_start();
//  Enter your appropriate Enter_USERNAME, Enter_PASSWORD, DATABASE_NAME, TABLE_NAME
 $servername = "localhost";
$username = 'Enter_USERNAME';
$password = 'Enter_PASSWORD';
$conn = new PDO("mysql:host=$servername;dbname=DATABASE_NAME", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully"; 

    $sql = "SELECT  heading, dateevent, duration, summary FROM TABLE_NAME";
?>
<html>
<head>
<?php include "header.php";?>
<title>Adventures</title>
</head>
<body>
<?php  include "nav.php" ?>
<mainAd>
<div class="hero">
    <div class="heroText ">
        <h1>Come Experience Canada</h1>
    </div>
    <img src="img/canoe1200.jpg" class="heroImg" alt="canoe"> </div> 
  <div class="city">
  <h1>Upcoming Adventures</h1>
  <div class="tableDiv"><table>
    
    <?php foreach($conn->query($sql) as $row) { ?>  
        <tr>
            <tr><td><h2><?php print $row["heading"] ?></h2></td></tr>
            <tr> <td class="condenseFont">Date: <?php print $row["dateevent"] ?></td></tr>
            <tr> <td>Duration: <?php print $row["duration"] ?></td>
            <tr> <td><h3>Summary:</h3><?php print $row["summary"] ?></td>
        </tr>
    <?php } 
    $conn=null;
    ?>
    </table></div>
  </div></mainAd>
</main>
<?php include "footer.php";?>
</body>
</html>
