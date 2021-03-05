<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- ===== BOX ICONS ===== -->
  <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

  <!-- ===== CSS ===== -->
  <link rel="stylesheet" href="sass/gsNoteAbsence.css" />

  <title>Ajout Seance</title>
</head>

<body id="body-pd">
  <?php include('header.php'); ?>

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

      <a href="#" class="nav__link">
        <i class="bx bx-log-out nav__icon"></i>
        <span class="nav__name">Log Out</span>
      </a>
    </nav>
  </div>

  <!-- start insert etudiant -->
  <div class="insert-abs-container">
    <form action="">
      <h2>Gestion des absences</h2>

      <label for="module">Module *</label>
      <select name="module" id="">
        <option value="choix">select</option>
      </select>
      <label for="date">Date *</label>
      <select name="date" id="">
        <option value="choix">JJ/MM/AAAA</option>
      </select>
      <label for="ename">Nom d'étudiant *</label>
      <select name="ename" id="">
        <option value="choix">Nom d'étudiant</option>
      </select>

      <input id="btn" name="submit" type="submit" value="Ajouter" />
    </form>
  </div>
  <div class="insert-note-container">
    <form action="">
      <h2>Gestion des notes</h2>

      <label for="module">Module *</label>
      <select name="module" id="">
        <option value="choix">select</option>
      </select>

      <label for="ename">Nom d'étudiant *</label>
      <select name="ename" id="">
        <option value="choix">Nom d'étudiant</option>
      </select>

      <label for="note">Note *</label>
      <select name="note" id="">
        <option value="choix">xx/20</option>
      </select>

      <input id="btn" name="submit" type="submit" value="Ajouter" />
    </form>
  </div>

  <?php include('footer.php'); ?>
  <!--===== MAIN JS =====-->
  <script src="js/slider.js"></script>
</body>

</html>