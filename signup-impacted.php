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
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <!-- <h1 class="logo mr-auto"><a href="index.html">Green</a></h1> -->
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="index.php" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="index.php#disasters">Disasters</a></li>
          <li><a href="organisation.php">Organisations</a></li>
          <li><a href="login.php">Login</a></li>
          <li class="active"><a href="signup.php">Sign up</a></li>

        </ul>
      </nav><!-- .nav-menu -->

      <a href="make-post.php" class="get-started-btn scrollto">Start Fundraising</a>

    </div>
  </header><!-- End Header -->

    <!-- ======= Breadcrumbs ======= -->

  <main id="main">

   <section id="contact" class="contact">
    <div class="carousel-container"  id="blank">
      <div class="container">

        <div class="section-title">
          <h2>SIGN UP AS AN IMPACTED</h2>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-8 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form action="signup-impacted.php" method="post" role="form" class="php-email-form">
              <?php include('errors.php'); ?>
              <div class="form-group">
                      <label class="form-check-label">If you want to be an Organisation Signup<a href="signup-organisation.php"> here</a>.</label>
              </div>

                    <div class="form-group">
                      <label >Email address</label>
                      <!-- <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email"> -->
                      <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email" required>
                    </div>
                    <div class="form-group">
                      <label >Gender</label>
                      <input type="gender" class="form-control" id="exampleInputEmail1" placeholder="Write M for Male and F for Female" name="gender" required>
                    </div>
                    <div class="form-inline">
                      <div class="form-group mb-2">
                        <label for="staticEmail2">Age :</label>
                      </div>
                      <div class="form-group mx-sm-3 mb-2">
                        <input type="Number" class="form-control" id="inputPassword2" name="age" placeholder="Your Age">
                      </div>
                    </div>
                     <div class="form-group">
                      <label>Your Full Name</label>
                      <!-- <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email"> -->
                      <input type="name" class="form-control" placeholder="Your Full name" name="name" required>
                    </div>
                    <div class="form-group">
                      <label>Identity</label>
                      <input type="Identity" class="form-control" placeholder="Enter your Identity" name="identity" required>
                    </div>
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter your new Password" name="password" required>
                    </div>

                    <div class="form-check form-check-inline">
                      <input class="form-check-input" id="checkbox" type="checkbox" required>
                      <label for="checkbox" class="form-check-label"> I agree to these <a href="#">Terms and Conditions</a>.</label>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="reg_impacted">Create Account</button>
                    </div>
                    <div class="form-group">
                      <label class="form-check-label">Already have an account? <a href="login.html">Login</a>.</label>
                    </div>
              <!-- APO DO KAI PANO -->
            </form>
          </div>

        </div>

      </div>
    </div>
     </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <h4>RaiseHope</h4>
      <!-- <p>Et aut eum quis fuga eos sunt ipsa nihil. Labore corporis magni eligendi fuga maxime saepe commodi placeat.</p> -->
      <!-- <div class="social-links">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div> -->
      <div class="copyright">
        &copy; Copyright <strong><span>RaiseHope</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/green-free-one-page-bootstrap-template/ -->
        <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a> -->
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>

  <script src="assets/js/main.js"></script>-->
  </body>
  </html>
