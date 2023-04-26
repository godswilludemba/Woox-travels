<footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright © 2036 <a href="#">WoOx Travel</a> Company. All rights reserved. 
          <br>Design: <a href="https://templatemo.com" target="_blank" title="free CSS templates">TemplateMo</a> Distribution: <a href="https://themewagon.com target="_blank" >ThemeWagon</a></p>
        </div>
      </div>
    </div>
  </footer>

    <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="<?php echo APPURL; ?>/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo APPURL; ?>/vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="<?php echo APPURL; ?>/assets/js/isotope.min.js"></script>
  <script src="<?php echo APPURL; ?>/assets/js/owl-carousel.js"></script>
  <script src="<?php echo APPURL; ?>/assets/js/wow.js"></script>
  <script src="<?php echo APPURL; ?>/assets/js/tabs.js"></script>
  <script src="<?php echo APPURL; ?>/assets/js/popup.js"></script>
  <script src="<?php echo APPURL; ?>/assets/js/custom.js"></script>
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <script>
    function bannerSwitcher() {
      next = $('.sec-1-input').filter(':checked').next('.sec-1-input');
      if (next.length) next.prop('checked', true);
      else $('.sec-1-input').first().prop('checked', true);
    }

    var bannerTimer = setInterval(bannerSwitcher, 5000);

    $('nav .controls label').click(function() {
      clearInterval(bannerTimer);
      bannerTimer = setInterval(bannerSwitcher, 5000)
    });
  </script>
 