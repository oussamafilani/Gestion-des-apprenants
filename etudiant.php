<?php
// Initialize the session
session_start();

// Include connect file
require_once "connect.php";

$id = $_SESSION['id_user'];


$results  = mysqli_query($db, "SELECT * FROM etudiant where fk_user = '$id'");
$results_1  = mysqli_query($db, "SELECT * FROM etudiant where fk_user = '$id'");
$data =  $results_1->fetch_assoc();
$id_etu = $data['id_etudiant'];


$results_note  = mysqli_query($db, "SELECT module.intitule_module,note.note_module FROM module,note,etudiant
WHERE module.id_module = note.fk_module and etudiant.id_etudiant = note.fk_etudiant and etudiant.id_etudiant = '$id_etu'");

$results_abs  = mysqli_query($db, "SELECT module.intitule_module,seance.date_seance,seance.heure_debut,seance.heure_fin,seance.type_seance,absence.justifiee,absence.comm_abs
FROM module,absence,seance,etudiant
WHERE absence.fk_seance = seance.id_seance and absence.fk_etudiant = etudiant.id_etudiant
and module.id_module = seance.fk_seance_module and etudiant.id_etudiant = '$id_etu'");

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
  <link rel="stylesheet" href="sass/etudiant.css" />

  <title>Etudiant Dashboard</title>
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
          <!-- <i class="bx bx-layer nav__logo-icon"></i> -->
          <i class="bx bxs-home nav__logo-icon"></i>
          <span class="nav__logo-name">Academy Code</span>
        </a>

        <div class="nav__list">
          <a href="etudiant.php" class="nav__link active">
            <i class="bx bx-grid-alt nav__icon"></i>
            <span class="nav__name">Dashboard</span>
          </a>

          <a href="contact.php" class="nav__link">
            <i class="fas fa-user nav__icon"></i>
            <span class="nav__name">Contact</span>
          </a>
        </div>
      </div>

      <a href="#" class="nav__link">
        <i class="bx bx-log-out nav__icon"></i>
        <span class="nav__name">Log Out</span>
      </a>
    </nav>
  </div>

  <!-- start Cart etudiant -->
  <?php while ($row = mysqli_fetch_array($results)) { ?>
    <div class="title-sec"><?php echo ucwords($row['prenom_etu'] . " " . $row['nom_etu']); ?></div>

    <div class="etu-cart">
      <div class="etu-avatar">
        <img src="img/avatar/ETU1.jpg" alt="" />
      </div>
      <div class="etu-content">
        <p><b>CNE : </b><?php echo $row['CNE']; ?></p>
        <p><b>Nom : </b><?php echo $row['nom_etu']; ?></p>
        <p><b>Prenom : </b><?php echo $row['prenom_etu']; ?></p>
        <p><b>Date de naissance : </b><?php echo $row['date_naiss_etu']; ?></p>
        <p><b>Ville : </b><?php echo $row['ville_etu']; ?></p>
        <p><b>Adresse : </b><?php echo $row['adresse_etu']; ?></p>
        <p><b>Email : </b><?php echo $row['email_etu']; ?></p>
        <p><b>Telephone : </b><?php echo $row['phone_etu']; ?></p>
      </div>
    </div>
  <?php } ?>

  <!-- end Cart etudiant -->

  <!-- Start Note Etudiant table -->
  <table>
    <h2>
      Les Notes
    </h2>
    <thead>
      <tr>
        <th>Module</th>
        <th>Note</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = mysqli_fetch_array($results_note)) { ?>
        <tr>
          <td data-column="Module"><?php echo $row['intitule_module']; ?></td>
          <td data-column="Note"><?php echo $row['note_module']; ?></td>
        </tr>
      <?php } ?>

    </tbody>
  </table>
  <!-- end  Note Etudiant table -->
  <!-- Start Absences Etudiant table -->
  <div style="overflow-x:auto;"></div>
  <table>
    <h2>
      Liste des absences
    </h2>
    <thead>
      <tr>
        <th>Module</th>
        <th>Date de séance</th>
        <th>Heure debut</th>
        <th>Heure fin</th>
        <th>Type seance</th>
        <th>Justifiée</th>
        <th>Commentaire</th>
      </tr>
    </thead>
    <tbody>

      <?php while ($row = mysqli_fetch_array($results_abs)) { ?>
        <tr>
          <td data-column="Module"><?php echo $row['intitule_module']; ?></td>
          <td data-column="Date de séance"><?php echo $row['date_seance']; ?></td>
          <td data-column="Heure debut"><?php echo $row['heure_debut']; ?></td>
          <td data-column="Heure fin"><?php echo $row['heure_fin']; ?></td>
          <td data-column="Type seance"><?php echo $row['type_seance']; ?></td>
          <td data-column="Justifiée"><?php echo $row['justifiee']; ?></td>
          <td data-column="Commentaire"><?php echo $row['comm_abs']; ?></td>
        </tr>
      <?php } ?>

    </tbody>
  </table>
  </div>
  <!-- <p style="text-align: center">Nombre total des absences : 3</p> -->
  <!-- end  Absences Etudiant table -->

  <?php include 'footer.php' ?>
  <!--===== MAIN JS =====-->
  <script src="js/main.js"></script>
</body>

</html>