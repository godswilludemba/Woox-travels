<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php


if(!isset($_SESSION['adminname'])){
  header("location: ".ADMINURL."");
}



if(isset($_GET['id'])){

  //selecting from the DB  and unlinking.
   $id = $_GET['id'];

  // $image_delete = $conn->query("SELECT * FROM cities WHERE id = '$id ' ");
  // $image_delete->execute();
  //   $getImage =  $image_delete->fetch(PDO::FETCH_OBJ);

  //   unlink("images_cities/" .  $getImage->image );

    //deleting the variable

    $deleteRecord = $conn->query("DELETE FROM bookings WHERE id = '$id' ");
    $deleteRecord->execute();

    header("location: show-bookings.php");
    
}

  
?>