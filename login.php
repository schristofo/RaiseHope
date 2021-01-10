<?php include('connection.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>RaiseHope</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <a href="index.php" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="index.php#disasters">Disasters</a></li>
          <li><a href="organisation.php">Organisations</a></li>
          <li class="active"><a href="login.php">Login</a></li>
          <li><a href="signup.php">Sign up</a></li>

        </ul>
      </nav><!-- .nav-menu -->
      <a href="login.php" class="get-started-btn">Start Fundraising</a>

    </div>
  </header><!-- End Header -->
  </section><!-- End Breadcrumbs -->

  <main id="main">

    <section id="contact" class="contact">
      <div class="container" id="login">

        <div class="section-title">
          <h2>Login</h2>
        </div>
        <div class="row justify-content-center">

          <div class="col-lg-8 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form action="login.php" method="post" role="form" class="php-email-form">
            <?php include('errors.php'); ?>
              <!-- APO DO KAI KATO -->
              <div class="form-group">
				<label class="form-check-label">Don't have an account? <a href="signup.php">Sign Up</a>.</label>
			  </div>
              <div class="form-group">
                <label for="email" class="col-form-label col-form-label-lg">Email</label>
                <input type="email" class="form-control form-control-lg" id="email" name="email" value="<?php echo $email; ?>" required>
              </div>
              <div class="form-group">
                <label for="password" class="col-form-label col-form-label-lg">Password</label>
                <input type="password" class="form-control form-control-lg" id="password" name="password" value="<?php echo $password; ?>" required>
              </div>
              <div class="form-group text-center">
                <button type="submit" class="btn btn-primary" name="login">Login</button>
              </div>
              <!-- APO DO KAI PANO -->
            </form>
          </div>
        </div>
      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <h4>RaiseHope</h4>
      <div class="copyright">
        &copy; Copyright <strong><span>RaiseHope</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <!-- <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script> -->

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>
</html>
