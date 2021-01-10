<?php
// session_start();
include('connection.php');
?>

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

  <!-- =======================================================
  * Template Name: Green - v2.3.0
  * Template URL: https://bootstrapmade.com/green-free-one-page-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar =======
  <div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
    <div class="container d-flex">
      <div class="contact-info mr-auto">
        <i class="icofont-envelope"></i> <a href="mailto:contact@example.com">contact@example.com</a>
        <i class="icofont-phone"></i> +1 5589 55488 55
      </div>
      <div class="social-links">
        <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
        <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
        <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
        <a href="#" class="skype"><i class="icofont-skype"></i></a>
        <a href="#" class="linkedin"><i class="icofont-linkedin"></i></i></a>
      </div>
    </div>
  </div> -->

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <a href="index.php" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>
      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li><a href="index.php#disasters">Disasters</a></li>
          <li><a href="organisation.php">Organisations</a></li>
          <?php
            if($_SESSION['User'] == "donor") {
              echo "<li><a href='logout.php'>Log Out</a></li> </ul> </nav>";
            }
            elseif($_SESSION['User'] == "fundraiser" ) {
              echo "<li><a href='logout.php'>Log Out</a></li> </ul> </nav> <a href='make-post.php' class='get-started-btn'>Start Fundraising</a>";
            }
            else {
              echo "<li><a href='login.php'>Login</a></li> <li><a href='signup.php'>Sign up</a></li> </ul> </nav> <a href='login.php' class='get-started-btn'>Start Fundraising</a>";
            }
          ?>
    </div>
  </header><!-- End Header -->


  <main id="main">


    <section id="contact" class="contact">
      <div class="container" id="blank">

        <div class="section-title">
          <h2>Make a Fundraising Post</h2>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-8 mt-5 mt-lg-0 d-flex align-items-stretch">

            <form method="post" action="make-post.php" role="form" class="php-email-form">
              <?php include('errors.php'); ?>
              <div class="form-group">
                <label for="postTitle" class="col-form-label col-form-label-lg">Title</label>
                <input type="text" class="form-control" id="postTitle" name="title" required>
              </div>
              <div class="form-group">
                <label for="description" class="col-form-label col-form-label-lg">Description</label>
                <textarea class="form-control" id="description" rows="4" name="description" required></textarea>
              </div>
              <div class="form-group">
                <div class="custom-file">
                  <label for="postImage" class="col-form-label col-form-label-lg">Post photo</label>
                  <input type="file" class="form-control-file" id="postImage">
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-6 mb-3">
                  <label for="moneyToBeRaised" class="col-form-label col-form-label-lg">Amount to be raised (&euro;)</label>
                  <input type="text" class="form-control form-control-lg" id="moneyToBeRaised" name="amount" required>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="disaster" class="col-form-label col-form-label-lg">Disaster</label>
                  <select class="form-control form-control-lg" id="disaster" name="disaster" required>
                    <option value="" selected></option>
                    <?php
                      $sql = "SELECT * FROM disaster";
                      $result = mysqli_query($db, $sql);

                      if (mysqli_num_rows($result) > 0) {
                       // output data of each row
                        while($row = mysqli_fetch_array($result)) {
                    ?>
                      <option value="<?php echo $row["DisasterID"]?>"><?php echo $row["TypeOfDisaster"] . ", " . $row["Location"]; ?></option>
                    <?php
                        }
                      } else {
                        echo "No disasters to select";
                      }
                    ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary" name="upload_post">Upload Post</button>
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
        &copy; Copyright <strong><span>Bootstrap</span></strong>. All Rights Reserved
      </div>
    </div>
  </footer>
  <!-- End Footer -->

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
  <!-- <script src="assets/js/main.js"></script> -->

</body>

</html>
