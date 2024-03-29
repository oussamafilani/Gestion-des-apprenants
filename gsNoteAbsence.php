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

$fk_enseigne = $_SESSION['id'];

$results_seance  = mysqli_query($db, "SELECT * FROM seance WHERE fk_seance_enseignant = '$fk_enseigne'");
$results_seance1  = mysqli_query($db, "SELECT module.intitule_module,etudiant.nom_etu,etudiant.prenom_etu, seance.type_seance, seance.date_seance from absence
INNER JOIN seance on absence.fk_seance = seance.id_seance and seance.fk_seance_enseignant = '$fk_enseigne'
INNER JOIN etudiant on absence.fk_etudiant = etudiant.id_etudiant
INNER JOIN module on seance.fk_seance_module = module.id_module");

// $results_seance1  = mysqli_query($db, "SELECT  seance.id_seance,seance.date_seance,module.intitule_module,seance.type_seance from seance inner join module on module.id_module = seance.fk_seance_module WHERE seance.fk_seance_enseignant = '$fk_enseigne'
// ");
// $results_seance1  = mysqli_query($db, "SELECT  seance.id_seance,seance.date_seance,module.intitule_module,seance.type_seance from seance inner join module on module.id_module = seance.fk_seance_module WHERE seance.fk_seance_enseignant = '$fk_enseigne'
// ");

//   select seance.date_seance,module.intitule_module,seance.type_seance from seance inner join module on module.id_module = seance.fk_seance_module

$results_module  = mysqli_query($db, "SELECT * FROM module WHERE fk_enseigne = '$fk_enseigne' ");

$results_etudiant  = mysqli_query($db, "SELECT id_etudiant, nom_etu, prenom_etu FROM etudiant");
$results_etudiant1  = mysqli_query($db, "SELECT id_etudiant, nom_etu, prenom_etu FROM etudiant");

$results_absence = mysqli_query($db, "SELECT module.intitule_module,etudiant.nom_etu,etudiant.prenom_etu, seance.type_seance, seance.date_seance FROM absence,seance,etudiant,module
WHERE module.id_module = seance.id_seance and etudiant.id_etudiant = absence.fk_etudiant and seance.id_seance = absence.fk_seance  and  module.fk_enseigne = '$fk_enseigne' ");


$results_note = mysqli_query($db, "SELECT module.intitule_module,note.note_module,etudiant.nom_etu,etudiant.prenom_etu FROM note
INNER JOIN module on module.id_module = note.fk_module  and module.fk_enseigne = '$fk_enseigne'
INNER JOIN etudiant on etudiant.id_etudiant = note.fk_etudiant;");


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
  <link rel="stylesheet" href="sass/gsNoteAbsence.css" />

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

          <a href="insertEtu.php" class="nav__link">
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

          <a href="gsNoteAbsence.php" class="nav__link active">
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
  <div class="insert-abs-container">
    <form action="server.php" method="post" name="absencesForm">
      <h2>Gestion des absences</h2>

      <label for="abs_id_seance">Module/ Type Seance/ Date *</label>
      <select name="abs_id_seance" id="">
        <?php while ($row = mysqli_fetch_array($results_seance1)) { ?>
          <option value="<?php echo $row['id_seance']; ?>"><?php echo $row['intitule_module'] . " -- " . $row['type_seance'] . " -- " . $row['date_seance']; ?></option>
        <?php } ?>
      </select>
      <label for="abs_id_etudiant">Nom d'étudiant *</label>
      <select name="abs_id_etudiant" id="">
        <?php while ($row = mysqli_fetch_array($results_etudiant)) { ?>
          <option value="<?php echo $row['id_etudiant']; ?>"><?php echo $row['nom_etu'] . " " . $row['prenom_etu']; ?></option>
        <?php } ?>
      </select>

      <input id="btn" name="ajouterabsences" type="submit" value="Ajouter" />
    </form>
    <p style="color: red; text-align: center" id="erreur"></p>
  </div>

  <table style="overflow-x: auto">
    <h2>
      Liste des absences
    </h2>
    <thead>
      <tr>
        <th>Nom d'étudiant</th>
        <th>Module</th>
        <th>Type Seance</th>
        <th>date</th>
        <th>Modifier</th>
        <th>Supprimer</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = mysqli_fetch_array($results_absence)) { ?>
        <tr>
          <td data-column=""><?php echo $row['nom_etu'] . " " . $row['prenom_etu']; ?></td>
          <td data-column=""><?php echo $row['intitule_module']; ?></td>
          <td data-column=""><?php echo $row['type_seance']; ?></td>
          <td data-column=""><?php echo $row['date_seance']; ?></td>

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

  <div class="insert-note-container">
    <form action="server.php" method="post" name="NoteForm">
      <h2>Gestion des notes</h2>

      <label for="nt_module">Module *</label>
      <select name="nt_module" id="">
        <?php while ($row = mysqli_fetch_array($results_module)) { ?>
          <option value="<?php echo $row['id_module']; ?>"><?php echo $row['intitule_module']; ?></option>
        <?php } ?>
      </select>

      <label for="nt_id_etudiant">Nom d'étudiant *</label>
      <select name="nt_id_etudiant" id="">
        <?php while ($row = mysqli_fetch_array($results_etudiant1)) { ?>
          <option value="<?php echo $row['id_etudiant']; ?>"><?php echo $row['nom_etu'] . " " . $row['prenom_etu']; ?></option>
        <?php } ?>
      </select>

      <label for="note">Note *</label>
      <input name="nt_note" value="" placeholder="xx/20" type="number" min="0" max="20">

      <input id="btn" name="ajouternote" type="submit" value="Ajouter" />
    </form>
    <p style="color: red; text-align: center" id="erreur2"></p>
  </div>

  <table style="overflow-x: auto">
    <h2>
      Liste des notes
    </h2>
    <thead>
      <tr>
        <th>Nom d'étudiant</th>
        <th>Module</th>
        <th>Note</th>
        <th>Modifier</th>
        <th>Supprimer</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = mysqli_fetch_array($results_note)) { ?>
        <tr>
          <td data-column=""><?php echo $row['nom_etu'] . " " . $row['prenom_etu']; ?></td>
          <td data-column=""><?php echo $row['intitule_module']; ?></td>
          <td data-column=""><?php echo $row['note_module']; ?></td>
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
  <script src="js/Absence.js"></script>
  <script src="js/Note.js"></script>
</body>

</html>