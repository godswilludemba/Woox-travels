<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php

if(isset($_POST['submit'])) {
       if(empty($_POST['name']) OR empty($_POST['continent']) OR empty($_POST['population']) 
       OR empty($_POST['territory']) OR empty($_POST['description'])) {
       echo "<script> alert ('some inputs are empty'); </script>" ;
       } else {
    
              $name = $_POST['name'];
              $continent = $_POST['continent'];
              $population = $_POST['population'];
              $territory = $_POST['territory'];
              $description = $_POST['description'];
              $image = $_FILES['image']['name'];

               // b/c we want to update and upload a file, we must first create a directory
               //  create the directory folder in to the mother folder and
               // concatenate it with base name. which has been declared.
              $dir = "images_countries/" . basename($image);
            

                //insert them in to a handler on our DB
              $insert = $conn->prepare("INSERT INTO countries (name, continent, population, territory, description, image) 
              VALUES (:name, :continent, :population, :territory, :description, :image)");

              //create an executor
              $insert->execute([
                 ":name" => $name,
                 ":continent" => $continent,
                 ":population" => $population,
                 ":territory" => $territory,
                 ":description" => $description,
                 ":image" => $image,
        ]);

                       if(move_uploaded_file($_FILES['image']['tmp_name'], $dir)) {

                        header("location: show-country.php");
                       }        
        
        
       }

   }

?>

    <div class="container-fluid">
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Create Countries</h5>
          <form method="POST" action="create-country.php" enctype="multipart/form-data">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="name" id="form2Example1" class="form-control" placeholder="name" />
                 
                </div>
                <div class="form-outline mb-4 mt-4">
                  <input type="file" name="image" id="form2Example1" class="form-control" />
                </div>  

                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="continent" id="form2Example1" class="form-control" placeholder="continent" />
                 
                </div> 
                 <div class="form-outline mb-4 mt-4">
                  <input type="text" name="population" id="form2Example1" class="form-control" placeholder="population" />
                 
                </div>  <div class="form-outline mb-4 mt-4">
                  <input type="text" name="territory" id="form2Example1" class="form-control" placeholder="territory" />
                 
                </div> 
                <div class="form-floating">
                  <textarea name="description" class="form-control" placeholder="description" id="floatingTextarea2" style="height: 100px"></textarea>
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