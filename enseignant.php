<?php
// Initialize the session
session_start();

// Include connect file
require_once "connect.php";

$results  = mysqli_query($db, "SELECT * FROM etudiant");

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- ===== BOX ICONS ===== -->
  <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


  <!-- ===== CSS ===== -->
  <link rel="stylesheet" href="sass/enseignant.css" />

  <title>Sidebar menu responsive</title>
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
          <a href="enseignant.php" class="nav__link active">
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

  <!-- Start Etudiant table -->
  <table style="overflow-x: auto">
    <caption>
      Liste des Etudiants
    </caption>
    <thead>
      <tr>
        <th class="cut-col">CNE</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th class="cut-col">Date naissance</th>
        <th class="cut-col">Adresse</th>
        <th class="cut-col">Ville</th>
        <th class="cut-col">Email</th>
        <th class="cut-col">Telephone</th>
        <th>Modifier</th>
        <th>Supprimer</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = mysqli_fetch_array($results)) { ?>
        <tr>
          <td class="cut-col" data-column="CNE"><?php echo $row['CNE']; ?></td>
          <td data-column="Nom"><?php echo $row['nom_etu']; ?></td>
          <td data-column="Prenom"><?php echo $row['prenom_etu']; ?></td>
          <td class="cut-col" data-column="Date naissance"><?php echo $row['date_naiss_etu']; ?></td>
          <td class="cut-col" data-column="Adresse"><?php echo $row['adresse_etu']; ?></td>
          <td class="cut-col" data-column="Ville"><?php echo $row['ville_etu']; ?></td>
          <td class="cut-col" data-column="Email"><?php echo $row['email_etu']; ?></td>
          <td class="cut-col" data-column="Telephone"><?php echo $row['phone_etu']; ?></td>
          <form name="" method="get" action="updateEtu.php">
            <td data-column="Modifier">
              <button name="modifier" type="submit" value="<?php echo $row['id_etudiant']; ?>"> <i class="fas fa-edit table-edit-icon"></i></button>
            </td>
          </form>
          <form name="" method="get" action="server.php">
            <td data-column="Supprimer">
              <button name="supprimer" type="submit" value="<?php echo $row['id_etudiant']; ?>"> <i class="fas fa-trash table-trash-icon"></i></button>
            </td>
          </form>
        </tr>
      <?php } ?>

    </tbody>
  </table>
  <!-- end  Etudiant table -->

  <?php include 'footer.php' ?>
  <!--===== MAIN JS =====-->
  <script src="js/main.js"></script>
  <script src="js/valide.js"></script>
  <script>
    // function delete_popup(id_user) {
    //   swal({
    //       title: "Are you sure?",
    //       text: "Once deleted, you will not be able to recover this imaginary file!",
    //       icon: "warning",
    //       buttons: true,
    //       dangerMode: true,
    //     })
    //     .then((willDelete) => {
    //       if (willDelete) {
    //         window.location.href = "assets/php/delete.php?id=${id_user}";
    //       } else {
    //         swal("Your imaginary file is safe!");
    //       }
    //     });

    // }
  </script>
</body>

</html>