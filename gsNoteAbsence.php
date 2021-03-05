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
  <script src="js/main.js"></script>
</body>

</html>