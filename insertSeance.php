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
  <?php include('header.php'); ?>

  <!-- start insert etudiant -->
  <div class="insert-sea-container">
    <form action="">
      <h2>Creation d'une seance</h2>

      <label for="module">Module *</label>
      <select name="module" id="">
        <option value="choix">select</option>
      </select>

      <label for="date_naiss">Date *</label>
      <input name="date_naiss" placeholder="Date Naissance" type="date" />

      <label for="">Heure debut *</label>
      <input name="" placeholder="" type="time" />

      <label for="">Heure fin *</label>
      <input name="" placeholder="" type="time" />

      <label for="cours">Type *</label>
      <select name="cours" id="">
        <option value="choix">cours</option>
      </select>

      <input id="btn" name="submit" type="submit" value="Ajouter" />
    </form>
  </div>
  <?php include('footer.php'); ?>
  <!--===== MAIN JS =====-->
  <script src="js/main.js"></script>
</body>

</html>