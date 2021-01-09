<?php
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
  <?php echo $_GET["id"]; ?>
  <?php echo $_GET["title"]; ?>

    <main id="main">
        <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Fundraising Post</h2>
        </div>

        <div class="row">
            <?php
              $fundraiserid = $_GET['id'];
              $posttitle = $_GET['title'];
              $select = "SELECT *
              FROM disaster JOIN fundraising_post ON disaster.DisasterID = fundraising_post.PostDisasterID
              WHERE fundraising_post.PostFundraiserID = '$fundraiserid' AND fundraising_post.PostTitle = '$posttitle';";
              $result = mysqli_fetch_assoc(mysqli_query($db,$select));
            ?>

            <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="form-row" style="text-align: center; width: 100%; margin-top: 5%">
                    <div class="form-group col-md"> 
                    <img src="assets/img/team/fire.jpg" class="img-fluid" alt="" style="margin-bottom:5%"> 
                    
                    <h5 style="color: #157430 "><?php echo $result["Location"]. "<br>"; ?></h5>
                    <h4><?php echo $result["PostTitle"]; ?></h4>
                    <!-- <span><?php echo $row["PostDate"]; ?></span> -->
                    <p>
                    <?php echo $result["PostDescription"]; ?>
                    </p>
                    <h4 class="money"><?php echo  $result["MoneyToBeRaised"]. '€'; ?></h4>
                    <!-- <hr style="width:50%;"> -->
                    </div>
                </div>
            </form>
          </div>

          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
            <h5 style = "margin-left: 38%">Donate</h5>
                <form method="post" style="margin-top:5%">
                    <div class="form-group mx-sm-3 mb-2">
                    <input type="text" class="form-control" name="price" id="form1" placeholder="Price" required>
                    </div>
                    <button type="submit" name="donate" class="btn btn-primary mb-2" style="background-color: #157430; border-color: #179039; margin-left: 38%">Donate</button>
                </form>
                <hr style="width:70%;">
                <h5 style = "margin-left: 35%">Comments</h5>
                    
                    <div style = "margin : 0 auto;">
                        <?php
                        $sql = "SELECT Comment , FirstName ,LastName FROM comments JOIN donor ON comments.DonorID = donor.DonorID WHERE comments.PostFundraiserID = '$fundraiserid' AND comments.PostTitle = '$posttitle';";
                        $comment = $db->query($sql);

                        if ($comment->num_rows > 0) {
                            // output data of each row
                            while($com = $comment->fetch_assoc()) {
                        ?>
                        <p><?php echo $com["FirstName"]. " ". $com["LastName"].  " : " .$com["Comment"]; ?></p>   
                        
                        <?php
                            }
                        } else {
                        echo "<p style = 'margin-left: 10%'> This post has no comments </p>";
                        }
                        $db->close();
                        ?>
                    </div>
                <form method="post" role="form" style="margin-top:5%">
                    <div class="form-group mx-sm-3 mb-2">
                        <input type="text" class="form-control" name="comment_context" placeholder="Your comment" style="background-color: transparent; flex-grow: 2;">
                    </div>
                    <button type="submit" class="btn btn-primary mb-2" name="comment" style="background-color: #157430e5; border-color: #179039; margin-left: 41%">Post</button>
                </form>
                <hr style="width:70%;">
                <h5 style = "margin-left: 38%">Report</h5>
                <form method="post" role="form" style="margin-top:5%">
                    <div class="form-group mx-sm-3 mb-2">
                        <input type="text" class="form-control" name="report_reason" placeholder="Report issue" style="background-color: transparent; flex-grow: 2;">
                    </div>
                    <button type="submit" class="btn btn-primary mb-2" name="report" style="background-color: white; color:black; border-color: #179039; margin-left: 38%">Report</button>
                </form>

                    
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

    <!-- Vendor JS Files -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/venobox/venobox.min.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>