<?php
session_start();

// initializing variables
$firstname = "";
$lastname    = "";
$email = "";
$password = "";
$date = "";
$org_name = "";
$name = "";
$identity = "";
$id = "";
$errors = array();

if(!isset($_SESSION)) {
  $_SESSION['User'] = "";
  $_SESSION['Email'] = "";
  $_SESSION['Id'] = "";
  $_SESSION['DisasterType']="";
  $_SESSION['i']=40;
}

// echo $_SESSION['Id'] . " " . $_SESSION['Email'] . " " . $_SESSION['User'];

// connect to the database
$db = mysqli_connect('localhost', 'root', 'patatoMpataria2006!', 'mydb');

if($db === false){
    die("ERROR: Ekanes malakia. Vale ton kodiko sou :) </br></br>" . mysqli_connect_error());
}

// REGISTER USER
if (isset($_POST['reg_donor'])) {
  // receive all input values from the form
  $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $phone = mysqli_real_escape_string($db, $_POST['phone']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($firstname)) { array_push($errors, "First Name is required"); }
  if (empty($lastname)) { array_push($errors, "Last Name is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($phone)) { array_push($errors, "Phone is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }


    // first check the database to make sure
    // a user does not already exist with the same username and/or email
    //   $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
    //   $result = mysqli_query($db, $user_check_query);
    //   $user = mysqli_fetch_assoc($result);

    //   if ($user) { // if user exists
    //     if ($user['username'] === $username) {
    //       array_push($errors, "Username already exists");
    //     }

    //     if ($user['email'] === $email) {
    //       array_push($errors, "email already exists");
    //     }
    //   }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $query = "INSERT INTO donor (FirstName, LastName, Email, Phone)
          VALUES('$firstname', '$lastname', '$email' , '$phone')";
    mysqli_query($db, $query);
    // $_SESSION['Id'] = mysqli_insert_id($db);
    $queryaccounts = "INSERT INTO accounts (Email, Pass)
      VALUES('$email','$password')";
    mysqli_query($db, $queryaccounts);
    $_SESSION['Email'] = $email;
    $_SESSION['User'] = "donor";
    $_SESSION['i']=40;
    header('location: index.php');
  }
}

if (isset($_POST['login'])){
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $id = "";
    $name = "";
    $testfundraiser = "";
    $testdonor = "";

    if (empty($email)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        // $password = md5($password);
        $query = "SELECT * FROM accounts WHERE Email='$email' AND Pass='$password' ";
        $querydonor = "SELECT donor.FirstName FROM donor WHERE donor.Email = '$email'";
        $queryfundraiser = "SELECT fundraiser.NameOfFundraiser FROM fundraiser WHERE fundraiser.Email = '$email'";
        $testdonor = mysqli_query($db, $querydonor);
        $testfundraiser = mysqli_query($db, $queryfundraiser);
        $results = mysqli_query($db, $query);

        if (mysqli_num_rows($results) == 1) {
          if(mysqli_num_rows($testdonor) == 1){
            $_SESSION['User'] = "donor";
            $getid = mysqli_fetch_assoc(mysqli_query($db, "SELECT DonorID FROM donor WHERE donor.Email = '$email'; "));
            $_SESSION['Id'] = $getid['DonorID'];
          }
          if(mysqli_num_rows($testfundraiser) == 1){
            $_SESSION['User'] = "fundraiser";
            $getid = mysqli_fetch_assoc(mysqli_query($db, "SELECT FundraiserID FROM fundraiser WHERE Email = '$email'; "));
            $_SESSION['Id'] = $getid['FundraiserID'];
          }
          $_SESSION['Email'] = $email;
          $_SESSION['i']=40;
          header('location: index.php');
        } else {
            array_push($errors, "Incorrect username or password.");
        }

    }
}

if (isset($_POST['reg_organ'])) {
    // receive all input values from the form
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $date = mysqli_real_escape_string($db, $_POST['date']);
    $org_name = mysqli_real_escape_string($db, $_POST['org_name']);
    $numm = mysqli_real_escape_string($db, $_POST['numm']);
    $street = mysqli_real_escape_string($db, $_POST['street']);
    $city = mysqli_real_escape_string($db, $_POST['city']);
    $zip = mysqli_real_escape_string($db, $_POST['zip']);
    $phone = mysqli_real_escape_string($db, $_POST['phone']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($date)) { array_push($errors, "Date is required"); }
    if (empty($org_name)) { array_push($errors, "Organisations Name is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($phone)) { array_push($errors, "Phone is required"); }
    if (empty($password)) { array_push($errors, "Password is required"); }


      // first check the database to make sure
      // a user does not already exist with the same username and/or email
      //   $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
      //   $result = mysqli_query($db, $user_check_query);
      //   $user = mysqli_fetch_assoc($result);

      //   if ($user) { // if user exists
      //     if ($user['username'] === $username) {
      //       array_push($errors, "Username already exists");
      //     }

      //     if ($user['email'] === $email) {
      //       array_push($errors, "email already exists");
      //     }
      //   }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $query = "INSERT INTO fundraiser (Email, NameOfFundraiser)
                  VALUES('$email' , '$org_name')";
        mysqli_query($db, $query);
        $last_id = mysqli_insert_id($db);
        $_SESSION['Id'] = $last_id;
        $query1 = "INSERT INTO organisation (NumOfMembers, DateOfEstablishment, Phone, Street, City, Zip, OrganisationFundraiserID)
                  VALUES('$numm', '$date', '$phone' , '$street', '$city', '$zip','$last_id')";

        mysqli_query($db, $query1);
        $queryaccounts = "INSERT INTO accounts (Email, Pass)
          VALUES('$email','$password')";
        mysqli_query($db, $queryaccounts);
        $_SESSION['Email'] = $email;
        $_SESSION['User'] = "fundraiser";
        header('location: index.php');
    }
}


if (isset($_POST['reg_impacted'])) {
    // receive all input values from the form
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $gender = mysqli_real_escape_string($db, $_POST['gender']);
  $age = mysqli_real_escape_string($db, $_POST['age']);
  $name = mysqli_real_escape_string($db, $_POST['name']);
  $identity = mysqli_real_escape_string($db, $_POST['identity']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($name)) { array_push($errors, "Name is required"); }
  if (empty($identity)) { array_push($errors, "Identity is required"); }
  if (empty($age)) { array_push($errors, "Age is required"); }
  if (empty($gender)) { array_push($errors, "Gender is required"); }
  if (empty($password)) { array_push($errors, "Password is required"); }


  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $queryfundraiser = "INSERT INTO fundraiser (Email, NameOfFundraiser)
          VALUES('$email','$name')";
    mysqli_query($db, $queryfundraiser);

    $last_id = mysqli_insert_id($db);
    $_SESSION['Id'] = $last_id;
    $queryimpacted = "INSERT INTO impacted (Identity, Sex, Age, ImpactedFundraiserID)
          VALUES('$identity', '$gender', '$age', '$last_id')";
    mysqli_query($db, $queryimpacted);

    $queryaccounts = "INSERT INTO accounts (Email, Pass)
          VALUES('$email','$password')";
    mysqli_query($db, $queryaccounts);

    $_SESSION['Email'] = $email;
    $_SESSION['User'] = "fundraiser";
    header('location: index.php');
  }
}

if (isset($_POST['upload_post'])) {
  // receive all input values from the form
  $title = mysqli_real_escape_string($db, $_POST['title']);
  $description = mysqli_real_escape_string($db, $_POST['description']);
  // $photo = mysqli_real_escape_string($db, $_POST['photo']);
  $amount = mysqli_real_escape_string($db, $_POST['amount']);
  $disaster = mysqli_real_escape_string($db, $_POST['disaster']);
  $pdate = date("Y-m-d");

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($title)) { array_push($errors, "Title is required"); }
  if (empty($description)) { array_push($errors, "Description is required"); }
  if (empty($amount)) { array_push($errors, "Amount is required"); }
  if (empty($disaster)) { array_push($errors, "Disaster type is required"); }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $id = $_SESSION['Id'];
    $query = "INSERT INTO fundraising_post (PostTitle, PostDescription, PostPhoto, MoneyToBeRaised, PostFundraiserID, PostDisasterID, PostDate)
          VALUES('$title', '$description', NULL, '$amount', '$id', '$disaster', '$pdate')";
    mysqli_query($db, $query);

    header('location: index.php');
  }
}

if (isset($_POST['report'])) {
  // collect value of input field
  $fid = $_GET['id'];
  $title = $_GET['title'];
  $did = $_SESSION['Id'];

  $rreason = mysqli_real_escape_string($db, $_POST['report_reason']);

  if (empty($rreason)) { array_push($errors, "Report reason is required"); }

  if (count($errors) == 0) {
    $query = "INSERT INTO reports (FundraiserID, DonorID, Reason) VALUES('$fid' , '$did' , '$rreason')";
    mysqli_query($db, $query);
    header('location: post.php');
  }
}

if (isset($_POST['donate'])) {
    // receive all input values from the form
    $price = mysqli_real_escape_string($db, $_POST['price']);
    $dondate =  date('Y-m-d');
    $dontime = date("H:i:s");
    $did = $_SESSION['Id'];
    $title = $_GET['title'];
    $fid = $_GET['id'];

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($price)) { array_push($errors, "Price is required"); }

    if (count($errors) == 0) {
      $query = "INSERT INTO donates (DonorID, PostFundraiserID, PostTitle, Price, DateOfDonation, TimeOfDonation) VALUES ('$did', '$fid', '$title', '$price', '$dondate', '$dontime')";
      mysqli_query($db, $query);
      header('location: post.php');
    }

}

if (isset($_POST['comment'])) {
    // receive all input values from the form
    $ccomment = mysqli_real_escape_string($db, $_POST['comment_context']);
    $comdate =  date('Y-m-d');
    $comtime = date("H:i:s");
    $did = $_SESSION['Id'];
    $title = $_GET['title'];
    $fid = $_GET['id'];
    $_SESSION['i'] = $_SESSION['i'] + 1; 
    $index = $_SESSION['i'];

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($ccomment)) { array_push($errors, "Comment"); }
    

    if (count($errors) == 0) {
      // $last_id = mysqli_insert_id($db);
      // $last_idc = $last_id + 1;
      $query = "INSERT INTO comments  (DonorID, PostTitle, PostFundraiserID, CommentID, Comment, DateOfComment, TimeOfComment) VALUES ('$did', '$title', '$fid', '$index', '$ccomment', '$comdate', '$comtime')";
      mysqli_query($db, $query);
    }
}


?>
