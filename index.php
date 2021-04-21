<?php
// Initialize the session
session_start();
error_reporting(0);

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
  <link rel="stylesheet" href="sass/style.css" />

  <title>Academy Code</title>
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
      <?php if ($_SESSION['id']) { ?>
        <?php echo '<form action="logout.php"> <button class="btn-log">Log Out</button> </form>' ?>
      <?php } else { ?>
        <?php echo ' <a href="login.php"><button class="btn-log">Login</button></a>' ?>
      <?php } ?>
    </div>
  </header>

  <div class="l-navbar" id="nav-bar">
    <nav class="nav">
      <div>
        <a href="index.php" class="nav__logo active">
          <i class="bx bxs-home nav__logo-icon"></i>
          <span class="nav__logo-name">Academy Code</span>
        </a>


        <?php if ($_SESSION['id']) {    ?>

          <?php if ($_SESSION['access'] == 1) { ?>

            <?php echo '<div class="nav__list">
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

              <a href="gsNoteAbsence.php" class="nav__link">
                <i class="fas fa-tasks nav__icon"></i>
                <span class="nav__name">Note & Absences</span>
              </a>

              <a href="contact.php" class="nav__link">
                <i class="fas fa-user nav__icon"></i>
                <span class="nav__name">Contact</span>
              </a>
              </div>' ?>
          <?php } else if ($_SESSION['access'] == 0) { ?>

            <?php echo '<div class="nav__list">
            <a href="etudiant.php" class="nav__link">
              <i class="bx bx-grid-alt nav__icon"></i>
              <span class="nav__name">Dashboard</span>
            </a>

            <a href="contact.php" class="nav__link">
              <i class="fas fa-user nav__icon"></i>
              <span class="nav__name">Contact</span>
            </a>
            </div>' ?>
          <?php } ?>
        <?php } else { ?>

          <?php echo '<div class="nav__list">
            <a href="contact.php" class="nav__link">
              <i class="fas fa-user nav__icon"></i>
              <span class="nav__name">Contact</span>
            </a>
            </div>' ?>
        <?php } ?>

      </div>

      <?php if ($_SESSION['id']) {    ?>
        <?php echo '<a href="logout.php" class="nav__link">
          <i class="bx bx-log-out nav__icon"></i>
          <span class="nav__name">Log Out</span>
        </a>' ?>

      <?php } else { ?>
        <?php echo '<a href="login.php" class="nav__link">
          <i class="bx bx-log-in nav__icon"></i>
          <span class="nav__name">Login</span>
        </a>' ?>
      <?php } ?>
    </nav>
  </div>

  <section class="bg-image">
    <div class="welcome">
      <img src="img/background/welcome.png" alt="" width="40%" height="auto" />

      <div class="content-bg">
        <h2>
          Creative Space For <br />
          Creative Thinkers
        </h2>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
          eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
          ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
          aliquip ex ea commodo consequatt sed do eiusmod tempor incididun
        </p>
        <?php if (empty($_SESSION['id'])) {    ?>
          <?php echo '<div class="btn-div">
          <a href="login.php"><button class="btn-hm">Login</button></a>
        </div>' ?>
        <?php } ?>
      </div>
    </div>
  </section>

  <?php include 'footer.php' ?>
  <!--===== MAIN JS =====-->
  <script src="js/main.js"></script>
</body>

</html>