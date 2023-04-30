<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php

     if(!isset($_SESSION['adminname'])){
        header("location: ".ADMINURL."");
     }

//get the id and status
  if(isset($_GET['id']) AND isset($_GET['status'])){

 //grab the situations 
  $id = $_GET['id'];
  $status = $_GET['status'];

  //set a check and call for an update
  if($status == "Pending") {

    $update = $conn->prepare("UPDATE bookings SET status='Booked Successfully' WHERE id='$id'");

    $update->execute();

    header("location: show-bookings.php");
  } else {
    $update = $conn->prepare("UPDATE bookings SET status ='Pending' WHERE id='$id' ");

    $update->execute();

    header("location:show-bookings.php");
  }
}