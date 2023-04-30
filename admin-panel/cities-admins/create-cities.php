<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php


if(!isset($_SESSION['adminname'])){
  header("location: ".ADMINURL."");
}


if(isset($_POST['submit'])) {
       if(empty($_POST['name']) OR empty($_POST['trip_days']) OR empty($_POST['price']) 
       OR empty($_POST['country_id'])) {
       echo "<script> alert ('some inputs are empty'); </script>" ;
       } else {
    
              $name = $_POST['name'];
              $trip_days = $_POST['trip_days'];
              $price = $_POST['price'];
              $country_id = $_POST['country_id'];
              $image = $_FILES['image']['name'];

               // b/c we want to update and upload a file, we must first create a directory
               //  create the directory folder in to the mother folder and
               // concatenate it with base name. which has been declared.
              $dir = "images_cities/" . basename($image);
            

                //insert them in to a handler on our DB
              $insert = $conn->prepare("INSERT INTO cities (name, trip_days, price, country_id, image) 
              VALUES (:name, :trip_days, :price, :country_id, :image)");

              //create an executor
              $insert->execute([
                 ":name" => $name,
                 ":trip_days" => $trip_days,
                 ":price" => $price,
                 ":country_id" => $country_id,
                 ":image" => $image,
        ]);

                       if(move_uploaded_file($_FILES['image']['tmp_name'], $dir)) {

                        header("location: show-cities.php");
                       }        
        
        
       }

   }

   $countries = $conn->query("SELECT * FROM countries");
   $countries->execute();
     $allCountries = $countries->fetchAll(PDO::FETCH_OBJ);

?>
    <div class="container-fluid">
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Create Cities</h5>
          <form method="POST" action="create-cities.php" enctype="multipart/form-data">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="name" id="form2Example1" class="form-control" placeholder="name" />
                 
                </div>
                <div class="form-outline mb-4 mt-4">
                  <input type="file" name="image" id="form2Example1" class="form-control"  />
                 
                </div>
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="trip_days" id="form2Example1" class="form-control" placeholder="trip_days" />
                 
                </div>
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="price" id="form2Example1" class="form-control" placeholder="price" />
                 
                </div>
                <div class="form-outline mb-4 mt-4">

                  <select name="country_id" class="form-select  form-control" aria-label="Default select example">
                       <option selected>Choose Country</option>
                        <?php foreach( $allCountries as $country) : ?>
                          <option value="<?php echo $country->id; ?>"><?php echo $country->name; ?></option>
                        <?php endforeach; ?>
                  </select>
                </div>

                <br>
              

      
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>

          
              </form>

            </div>
          </div>
        </div>
      </div>
  </div>
  <?php require "../layouts/footer.php"; ?>