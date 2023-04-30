<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php

  
if(!isset($_SESSION['adminname'])){
  header("location: ".ADMINURL."");
}


$admin = $conn->query("SELECT * FROM admin");
$admin->execute();
$allAdmin = $admin->fetchAll(PDO::FETCH_OBJ);

?>

    <div class="container-fluid">

      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4 d-inline">Admins</h5>
             <a  href="<?php echo ADMINURL; ?>/admins/create-admins.php" class="btn btn-primary mb-4 text-center float-right">Create Admins</a>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">ADMIN-NAME</th>
                    <th scope="col">E-mail</th>
                  </tr>
                </thead>
                <tbody>

                <?php foreach( $allAdmin as $admin) : ?>
                  <tr>
                    <th scope="row"><?php echo $admin->id ?></th>
                    <td><?php echo $admin->adminname; ?></td>
                    <td><?php echo $admin->email; ?></td>
                   
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table> 
            </div>
          </div>
        </div>
      </div>



  </div>
  <?php require "../layouts/footer.php"; ?>