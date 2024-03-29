<?php
// Initialize the session
session_start();

if (empty($_SESSION['id'])) {

  header('Location:login.php');
} else if ($_SESSION['access'] != 1) {
  header("Location: etudiant.php");
}

// Include connect file
require_once "connect.php";

if (isset($_POST['ajouter'])) {
  $pseudo = $_POST['pseudo'];
  $password = md5($_POST['password']);
  $access = 0;

  $cne = $_POST['cne'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $date_naiss = $_POST['date_naiss'];
  $adrs = $_POST['adrs'];
  $ville = $_POST['ville'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  ///////////////////////

  // echo $pseudo;
  // echo '<br>';
  // echo $password;
  // echo '<br>';
  // echo $access;
  // echo '<br>';
  // echo  $email;
  // echo $cne;
  // echo $fname;
  // echo $lname;
  // echo $date_naiss;
  // echo $adrs;
  // echo $ville;
  // echo $email;
  // echo $phone;

  $sql = "INSERT INTO user (login, password, access, email) VALUES ('$pseudo', '$password', '$access', '$email')";
  mysqli_query($db, $sql);

  $sql_1 = "SELECT * FROM user WHERE login = '$pseudo'";
  $result = mysqli_query($db, $sql_1);
  $row = mysqli_fetch_array($result);
  $fk_user = $row['id_user'];

  // echo '<br>';
  // echo $fk_user;

  $sql_2 = "INSERT INTO etudiant (CNE, nom_etu, prenom_etu, date_naiss_etu, adresse_etu, ville_etu, email_etu, phone_etu, fk_user) VALUES ('$cne', '$lname', '$fname', '$date_naiss', '$adrs', '$ville', '$email', '$phone', '$fk_user')";
  mysqli_query($db, $sql_2);

  // $_SESSION['message'] = "Etudiant saved";
  header('location: insertEtu.php');
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
  <link rel="stylesheet" href="sass/insertEtu.css" />
  <link rel="stylesheet" href="sass/regex.css" />

  <title>Ajout Etudiant</title>
</head>

<body id="body-pd">

  <header class="header" id="header">
    <div class="header__toggle">
      <i class="bx bx-menu" id="header-toggle"></i>
    </div>

    <div class="header__img">
      <a href="index.php">
        <img src="img/logo/logo.png" alt="" />
      </a>
    </div>
    <div>
      <form action="logout.php">
        <button class="btn-log">Log Out</button>
      </form>
    </div>
  </header>

  <div class="l-navbar" id="nav-bar">
    <nav class="nav">
      <div>
        <a href="index.php" class="nav__logo">
          <i class="bx bxs-home nav__logo-icon"></i>
          <span class="nav__logo-name">Academy Code</span>
        </a>

        <div class="nav__list">
          <a href="enseignant.php" class="nav__link">
            <i class="bx bx-grid-alt nav__icon"></i>
            <span class="nav__name">Dashboard</span>
          </a>

          <a href="insertEtu.php" class="nav__link active">
            <i class="fas fa-user-plus nav__icon"></i>
            <span class="nav__name">Add Etudiant</span>
          </a>

          <a href="insertModule.php" class="nav__link">
            <i class="fas fa-book nav__icon"></i>
            <span class="nav__name">Add Module</span>
          </a>

          <a href="insertSeance.php" class="nav__link">
            <i class="fas fa-pen nav__icon"></i>
            <span class="nav__name">Add Seance</span>
          </a>

          <a href="gsNoteAbsence.php" class="nav__link">
            <i class="fas fa-tasks nav__icon"></i>
            <span class="nav__name">Note & Absences</span>
          </a>

          <a href="contact.php" class="nav__link">
            <i class="fas fa-user nav__icon"></i>
            <span class="nav__name">Contact</span>
          </a>
        </div>
      </div>

      <a href="logout.php" class="nav__link">
        <i class="bx bx-log-out nav__icon"></i>
        <span class="nav__name">Log Out</span>
      </a>
    </nav>
  </div>

  <!-- start insert etudiant -->
  <div class="insert-etu-container">
    <form name="insertEtuFrom" method="post" action="insertEtu.php">
      <h2>Creation d'un compte etudiant</h2>
      <label for="pseudo">Pseudo *</label>
      <input name="pseudo" placeholder="Pseudo" type="text" class="validetu" value="" />
      <p>Username must be and contain 1 - 3 characters</p>

      <label for="password">Password *</label>
      <input name="password" class="form-control" placeholder="Password" type="password" class="validetu" value="" />
      <p>Password must alphanumeric (@, _ and - are also allowed) and be 8 - 20 characters</p>

      <label for="cpassword">Confirm Password *</label>
      <input class="form-control" name="cpassword" placeholder="Confirm Password" type="password" class="validetu" value="" />
      <p>Password must alphanumeric (@, _ and - are also allowed) and be 8 - 20 characters</p>

      <label for="cne">CNE *</label>
      <input name="cne" placeholder="CNE" type="text" class="validetu" value="" />

      <label for="fname">Prenom *</label>
      <input name="fname" placeholder="Prenom" type="text" class="validetu" value="" />

      <label for="lname">Nom *</label>
      <input name="lname" placeholder="Nom" type="text" class="validetu" value="" />

      <label for="date_naiss">Date Naissance</label>
      <input name="date_naiss" placeholder="Date Naissance" type="date" value="" />

      <label for="adrs">Adresse</label>
      <input name="adrs" placeholder="Adresse" type="text" value="" />

      <label for="ville">Ville</label>
      <input name="ville" placeholder="Ville" type="text" value="" />

      <label for="email">Email *</label>
      <input name="email" placeholder="Email" type="email" class="validetu" value="" />
      <p>Email invalid, e.g. me@mydomain.com</p>

      <label for="phone">Telephone</label>
      <input name="phone" placeholder="Telephone" type="text" value="" />
      <p>Telephone invalid</p>

      <input name="ajouter" type="submit" value="Ajouter" />
    </form>
    <p style="color: red" id="erreur"></p>
  </div>

  <?php include 'footer.php' ?>
  <!--===== MAIN JS =====-->
  <script src="js/main.js"></script>
  <script src="js/insertEtudiant.js"></script>
  <script src="js/RegexInsertEtu.js"></script>
</body>

</html>