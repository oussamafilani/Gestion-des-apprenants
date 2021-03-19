<?php
// Initialize the session
session_start();

// Include connect file
require_once "connect.php";

$fk_enseigne = $_SESSION['id_user'];

$results_seance  = mysqli_query($db, "SELECT * FROM seance WHERE fk_seance_enseignant = '$fk_enseigne' ");
$results_module  = mysqli_query($db, "SELECT * FROM module WHERE fk_enseigne = '$fk_enseigne' ");
$results  = mysqli_query($db, "SELECT * FROM module WHERE fk_enseigne = '$fk_enseigne' ");

if (isset($_POST['ajouter'])) {

  $date_seance = $_POST['date_seance'];
  $heure_d = $_POST['heure_d'];
  $heure_f = $_POST['heure_f'];
  $cours = $_POST['cours'];
  $fk_module = $_POST['fk_module'];

  $sql = "INSERT INTO seance (date_seance, heure_debut, heure_fin, type_seance, fk_seance_module, fk_seance_enseignant) VALUES ('$date_seance','$heure_d','$heure_f','$cours','$fk_module','$fk_enseigne')";

  mysqli_query($db, $sql);

  $_SESSION['message'] = "Seance saved";
  header('location: insertSeance.php');
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
  <link rel="stylesheet" href="sass/insertSeance.css" />

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

          <a href="insertModule.php" class="nav__link">
            <i class="fas fa-book nav__icon"></i>
            <span class="nav__name">Add Module</span>
          </a>

          <a href="insertSeance.php" class="nav__link active">
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
  <div class="insert-sea-container">
    <form action="insertSeance.php" name="seanceForm" id="seanceForm" method="post">
      <h2>Creation d'une seance</h2>

      <label for="module">Module *</label>
      <?php while ($row = mysqli_fetch_array($results_module)) { ?>
        <input type="hidden" name="fk_module" value="<?php echo $row['id_module']; ?>">
      <?php } ?>
      <select name="module" id="">
        <?php while ($row = mysqli_fetch_array($results)) { ?>
          <option value="<?php echo $row['intitule_module']; ?>"><?php echo $row['intitule_module']; ?></option>
        <?php } ?>
      </select>

      <label for="date_seance">Date *</label>
      <input name="date_seance" placeholder="Date Seance" type="date" />

      <label for="heure_d">Heure debut *</label>
      <input name="heure_d" placeholder="" type="time" />

      <label for="heure_f">Heure fin *</label>
      <input name="heure_f" placeholder="" type="time" />

      <label for="cours">Type *</label>
      <select name="cours" id="">
        <option value="cours">cours</option>
        <option value="TP">TP</option>
        <option value="TD">TD</option>
      </select>

      <input id="btn" name="ajouter" type="submit" value="Ajouter" />
    </form>
    <p style=" color: red; text-align: center" id="erreur"></p>
  </div>

  <table style="overflow-x: auto">
    <h2>
      Liste des Séances
    </h2>
    <thead>
      <tr>
        <th class="cut-col">Module</th>
        <th>Date</th>
        <th>heure debut</th>
        <th class="cut-col">heure fin</th>
        <th class="cut-col">Type</th>
        <th>Modifier</th>
        <th>Supprimer</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = mysqli_fetch_array($results_seance)) { ?>
        <tr>
          <td class="cut-col" data-column="JS">
            <?php
            $fk_m = $row['fk_seance_module'];
            $results_m  = mysqli_query($db, "SELECT intitule_module FROM module WHERE id_module = '$fk_m'");
            while ($row1 = mysqli_fetch_array($results_m)) {
              echo $row1['intitule_module'];
            }
            ?>
          </td>
          <td data-column="Date"><?php echo $row['date_seance']; ?></td>
          <td data-column="heure debut"><?php echo $row['heure_debut']; ?></td>
          <td class="cut-col" data-column="heure fin"><?php echo $row['heure_fin']; ?></td>
          <td class="cut-col" data-column="Type"><?php echo $row['type_seance']; ?></td>
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

  <?php include 'footer.php' ?>
  <!--===== MAIN JS =====-->
  <script src="js/main.js"></script>
  <script src="js/Seance.js"></script>
</body>

</html>