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
</head>
<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <a href="index.php" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>
      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li><a href="index.php">Home</a></li>
          <li class="active"><a href="index.php#disasters">Disasters</a></li>
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

    <!-- ======= Post Section ======= -->
    <section id="team" class="post section-bg">
      <div class="container">

        <div class="section-title" id="blank">
          <h2>Fundraising Post</h2>
          <h3 style = color:#157430> <?php echo $_SESSION['DisasterType']; ?></h3>
        </div>

        <div class="row">
            <?php
                    // $select = "SELECT fundraising_post.PostTitle ,PostDescription, PostDate, Location , MoneyToBeRaised
                    // FROM disaster
                    // JOIN fundraising_post ON disaster.DisasterID = fundraising_post.PostDisasterID
                    // WHERE disaster.TypeOfDisaster = '$distype'";
                $distype = $_SESSION['DisasterType'];
                $select = "DROP TABLE IF EXISTS Q1a;";
                $select .="CREATE TEMPORARY TABLE Q1a SELECT *
                FROM disaster JOIN fundraising_post ON disaster.DisasterID = fundraising_post.PostDisasterID
                WHERE disaster.TypeOfDisaster = '$distype';";

                $select .= "DROP TABLE IF EXISTS Q1b;";
                $select .="CREATE TEMPORARY TABLE Q1b  SELECT Price, Q1a.PostFundraiserID, Q1a.Location, Q1a.PostTitle, Q1a.MoneyToBeRaised, Q1a.PostDescription, Q1a.PostDate
                FROM Q1a LEFT OUTER JOIN donates ON Q1a.PostFundraiserID = donates.PostFundraiserID AND Q1a.PostTitle = donates.PostTitle;";

                $select .="SELECT ifnull(sum(Price) ,0) AS MoneyCovered, PostFundraiserID, Location, PostTitle, MoneyToBeRaised, PostDescription, PostDate
                FROM Q1b
                GROUP BY Q1b.PostFundraiserID ";

                // $result = $db -> multi_query($select);
                // $result=mysqli_multi_query($db, $select);
                if ($db -> multi_query($select)) {
                    do {
                      // Store first result set
                      if ($result = $db -> store_result()) {
                        while ($row = $result -> fetch_assoc()) {
            ?>
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                  <div class="member">
                      <img src="assets/img/team/fire.jpg" class="img-fluid" alt="">
                      <h5 style="color: #157430 "><?php echo $row["Location"]. "<br>"; ?></h5>
                      <a href="#" style="color: #333">
                      <h4><?php echo $row["PostTitle"]; ?></h4>
                      </a>
                      <hr style="width:50%;">
                      <!-- <span><?php echo $row["PostDate"]; ?></span> -->
                      <p>
                        <?php echo $row["PostDescription"]; ?>
                      </p>
                      <h4 class="money"><?php echo $row["MoneyCovered"]. "€ of ". $row["MoneyToBeRaised"].'€ '; ?></h4>
                      <div class="progress" style="margin-top: 10px; width: 60%; margin-left: auto; margin-right: auto; position: center;" >
                        <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo ceil(100 * $row['MoneyCovered'] / $row['MoneyToBeRaised']); ?>%" aria-valuenow="25" id="progress" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                    <?php if($_SESSION['User'] == 'donor') { ?>
                      <a href="donate.php?id=<?php echo $row['PostFundraiserID']; ?>&title=<?php echo $row['PostTitle']; ?>" class="btn btn-primary btn-sm"  style="background-color: #157430; border-color: #179039; margin-top:10px; top: 0; right: 0;">Donate</a>
                    <?php } else { ?>
                      <a href="login.php" class="btn btn-primary btn-sm"  style="background-color: #157430; border-color: #179039; margin-top:10px; top: 0; right: 0;">Donate</a>
                    <?php } ?>
                    </div>
                </div>

            <?php
                        }
                        $result -> free_result();
                    }
                        //Prepare next result set
                    } while ($db -> next_result());
                }
                else {
                    echo "0 results";
                }
            ?>

        </div>

      </div>
    </section><!-- End Post Section -->
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
        &copy; Copyright <strong><span>Bootstrap</span></strong>. All Rights Reserved
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
