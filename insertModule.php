<?php
// Initialize the session
session_start();

// Include connect file
require_once "connect.php";

$fk_enseigne = $_SESSION['id_user'];

$results  = mysqli_query($db, "SELECT * FROM module WHERE fk_enseigne = '$fk_enseigne' ");

if (isset($_POST['ajouter'])) {

  $module = $_POST['module'];

  $sql = "INSERT INTO module (intitule_module,fk_enseigne) VALUES ('$module','$fk_enseigne')";
  mysqli_query($db, $sql);

  $_SESSION['message'] = "Module saved";
  header('location: insertModule.php');
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

  <!-- ===== CSS ===== -->
  <link rel="stylesheet" href="sass/insertModule.css" />

  <title>Ajout Seance</title>
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
      <button class="btn-log">Log Out</button>
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

          <a href="insertEtu.php" class="nav__link">
            <i class="fas fa-user-plus nav__icon"></i>
            <span class="nav__name">Add Etudiant</span>
          </a>

          <a href="insertModule.php" class="nav__link active">
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

      <a href="login.php" class="nav__link">
        <i class="bx bx-log-out nav__icon"></i>
        <span class="nav__name">Log Out</span>
      </a>
    </nav>
  </div>

  <!-- start insert etudiant -->
  <div class="insert-mod-container">
    <form name="moduleForm" action="insertModule.php" method="post">
      <h2>Creation d'un module</h2>

      <label for="module">Module *</label>
      <input name="module" placeholder="module" type="text" />
      <input name="ajouter" type="submit" value="Ajouter" />
    </form>
    <p style="color: red;text-align: center;" id="erreur"></p>
  </div>

  <!-- Start Note Etudiant table -->
  <table>
    <h2>
      Les modules
    </h2>
    <thead>
      <tr>
        <th>Module</th>
        <th>Modifier</th>
        <th>Supprimer</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = mysqli_fetch_array($results)) { ?>
        <tr>
          <td data-column="Module"><?php echo $row['intitule_module']; ?></td>
          <td data-column="Modifier">
            <i class="fas fa-edit table-edit-icon"></i>
          </td>
          <td data-column="Supprimer">
            <i class="fas fa-trash table-trash-icon"></i>
          </td>
        </tr>
      <?php } ?>

    </tbody>
  </table>
  <!-- end  Note Etudiant table -->

  <?php include 'footer.php' ?>
  <!--===== MAIN JS =====-->
  <script src="js/main.js"></script>
  <script src="js/Module.js"></script>
</body>

</html>