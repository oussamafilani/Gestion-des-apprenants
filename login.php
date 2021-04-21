<?php

// Initialize the session
session_start();
error_reporting(0);

if ($_SESSION['id']) {

  if ($_SESSION['access'] == 1) {
    header("Location: enseignant.php");
  } else if ($_SESSION['access'] == 0) {
    header("Location: etudiant.php");
  }
}


// Include connect file
require_once "connect.php";

if (isset($_POST['login'])) {
  $user = $_POST['user'];
  $pass = md5($_POST['pass']);


  $sql  = "SELECT * FROM user WHERE (login = '$user' or email = '$user') and password = '$pass' ";
  $result = mysqli_query($db, $sql);
  $row = mysqli_fetch_array($result);
  $rows = mysqli_num_rows($result);
  if ($rows == 1) {
    // Initialize the session
    session_start();


    if ($row['access'] == 1) {
      $_SESSION['id'] =  $row['id_user'];
      $_SESSION['access'] =  1;

      // Redirect user to index.php
      header("Location: enseignant.php");
    } else {
      $_SESSION['id'] = $row['id_user'];
      $_SESSION['access'] =  0;

      header("Location: etudiant.php");
    }
  }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- ===== BOX ICONS ===== -->
  <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

  <!-- ===== Normalize ===== -->
  <link rel="stylesheet" href="sass/normalize.css" />
  <!-- ===== CSS ===== -->
  <link rel="stylesheet" href="sass/login.css" />
  <link rel="stylesheet" href="sass/regex.css" />

  <title>Academy Code - login</title>
</head>

<body>
  <!-- start login -->
  <div class="logo-bg-display">
    <a href="index.php"><img src="img/logo/logo1.png" alt="" /></a>
  </div>
  <div class="login-bg">
    <img src="img/background/loginbackground.png" alt="" />
  </div>

  <section class="form-container">
    <div class="space"></div>
    <div class="logo-form">
      <div class="logo">
        <a href="index.php"><img src="img/logo/logo1.png" alt="" /></a>
      </div>
      <div class="login-form">
        <form name="loginform" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <h2>Login</h2>
          <hr />
          <label for="user">Username</label>
          <input class="" name="user" placeholder="Username" type="text" id="user" value="" />
          <p>Username must be and contain 1 - 3 characters</p>

          <label for="pass">Password</label>
          <input class="" name="pass" placeholder="Password" type="password" id="pass" value="" />
          <p>Password must alphanumeric (@, _ and - are also allowed) and be 8 - 20 characters</p>

          <input name="login" type="submit" value="login" />
        </form>
        <p style="color: red" id="erreur"></p>
      </div>
    </div>
  </section>

  <!-- end login -->

  <!--===== MAIN JS =====-->
  <script src="js/main.js"></script>
  <script src="js/login.js"></script>
  <script src="js/regexlogin.js"></script>
</body>

</html>