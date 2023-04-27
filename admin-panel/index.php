<?php require"layouts/header.php"; ?>

<?php

if(!isset($_SESSION['adminname'])){
  header("location: ".ADMINURL."/admins/login-admins.php");
} 
?>

<div class="row">
  <div class="col-md-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Countries</h5>
        <!-- <h6 class="card-subtitle mb-2 text-muted">Bootstrap 4.0.0 Snippet by pradeep330</h6> -->
        <p class="card-text">number of countries: 8</p>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Cities</h5>

        <p class="card-text">number of cities: 4</p>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Admins</h5>

        <p class="card-text">number of admins: 3</p>
      </div>
    </div>
  </div>
</div>

<?php require"layouts/footer.php"; ?>