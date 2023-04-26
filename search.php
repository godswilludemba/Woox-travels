<?php require "includes/header.php"; ?>
<?php require "config/config.php"; ?>

<?php

  if(isset($_POST['submit'])) {
    if(empty($_POST['country_id']) OR empty($_POST['price'])) {
    echo "<script> alert ('some inputs are empty'); </script>" ;
    } else {

$country_id = $_POST['country_id'];
$price = $_POST['price'];


$searchs = $conn->query("SELECT * FROM cities WHERE country_id = $country_id AND price < $price");

$searchs->execute();
$allSearchs = $searchs->fetchAll(PDO::FETCH_OBJ);


    }
}
?>
 
  <div class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h4>Search Result</h4>
          <h2>Amazing Prices &amp; More</h2>
        </div>
      </div>
    </div>
  </div>


  <div class="amazing-deals">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading text-center">
            <h2>Best Weekly Offers In Each City</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
          </div>
        </div>

     

        <?php foreach ($allSearchs  as $searchs) : ?>
          <div class="col-lg-6 col-sm-6">
          <div class="item">
            <div class="row">
              <div class="col-lg-6">
                <div class="image">
                  <img src="assets/images/<?php echo $searchs->image; ?>" alt="">
                </div>
              </div>
              <div class="col-lg-6 align-self-center">
                <div class="content">
                  <span class="info">*Limited Offer Today</span>
                  <h4><?php echo $searchs->name; ?></h4>
                  <div class="row">
                    <div class="col-6">
                      <i class="fa fa-clock"></i>
                      <span class="list"><?php echo $searchs->trip_days; ?> days</span>
                    </div>
                    <div class="col-6">
                      <i class="fa fa-map"></i>
                      <span class="list">Daily Places</span>
                    </div>
                  </div>
                  <p>Limited Price: $<?php echo $searchs->price; ?> Per person</p>
                  <div class="main-button">
                    <a href="reservation.php?id=<?php echo $searchs->id; ?>">Make a Reservation</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach; ?>

      </div>
    </div>
  </div> 


  <?php require "includes/footer.php"; ?>
