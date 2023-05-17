<?php
 session_start();
 if( isset( $_SESSION['counter'] ) ) {
    $_SESSION['counter'] += 1;
 }
//  Enter your appropriate Enter_USERNAME, Enter_PASSWORD, DATABASE_NAME, TABLE_NAME
 $servername = "localhost";
 $username = 'Enter_USERNAME';
 $password = 'Enter_PASSWORD';
 $conn = new PDO("mysql:host=$servername;dbname=DATABASE_NAME", $username, $password);
   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   echo "Connected successfully"; 
 
if(isset($_POST["heading"]) && isset($_POST["dateevent"]) && isset($_POST["duration"]) && isset($_POST["summary"])){

    if($_SESSION['counter'] === 1){
    
        $dateevent = $_POST['dateevent'];
         $timea = strtotime($dateevent);
        $timea = date("Y-m-d");
        $heading = $_POST["heading"];
        $duration = $_POST["duration"];
        $summary = $_POST["summary"];

         $STH = $conn->prepare("INSERT INTO TABLE_NAME (heading, dateevent, duration, summary) values (:heading, :dateevent, :duration, :summary)");
         $STH->bindParam(':heading', $heading);
         $STH->bindParam(':dateevent', $timea);
         $STH->bindParam(':duration', $duration);
         $STH->bindParam(':summary', $summary);
        $denter = $STH->execute(); 
        $_SESSION['count']++;
       
    } else {$msDone = "done";}}
    
        unset($_POST);
        $conn = null;      
?>
<!DOCTYPE html5>
<html>
<head>
<?php include "header.php";?>
<title>Confirmation Event Added</title>
</head>
<body>
<?php  include "nav.php" ?>
<main>
    <div class="city">
 <div>
 <div class="j"><h1 class="under">Admin - Confirm</h1></div>
</div>
<div class="mess">

    <?php 
if (isset($denter)){
    echo "Information successfully entered";  
   } 
   if (isset($msDone)) {echo "Information already entered";}
$conn = null;
?>
    </div>
    <div class="logbox"><span><a href="all-adventures.php" class="greenbtntext" title="logout">View Adventures</a> </span></div>
</main>
<?php include "footer.php";?>
</body>
</html>

