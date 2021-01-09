<?php
  session_start();

  if (isset($_GET['dt'])) {
    if ($_GET['dt']==1) {
      $_SESSION['DisasterType'] = 'Flood';
    }
    elseif ($_GET['dt']==2) {
      $_SESSION['DisasterType'] = 'Fire';
    }
    elseif ($_GET['dt']==3) {
      $_SESSION['DisasterType'] = 'Tornado';
    }
    elseif ($_GET['dt']==4) {
      $_SESSION['DisasterType'] = 'Earthquake';
    }
    elseif ($_GET['dt']==5) {
      $_SESSION['DisasterType'] = 'War';
    }
    elseif ($_GET['dt']==6) {
      $_SESSION['DisasterType'] = 'Other';
    }
  }
  else {
    $_SESSION['DisasterType'] = '';
  }

  echo $_SESSION['DisasterType'];
  header("Location: post.php");
?>
