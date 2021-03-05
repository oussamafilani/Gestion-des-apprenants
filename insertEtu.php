<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- ===== BOX ICONS ===== -->
  <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

  <!-- ===== CSS ===== -->
  <link rel="stylesheet" href="sass/insertEtu.css" />

  <title>Ajout Etudiant</title>
</head>

<body id="body-pd">
  <?php include('header.php'); ?>


  <!-- start insert etudiant -->
  <div class="insert-etu-container">
    <form action="">
      <h2>Creation d'un compte etudiant</h2>
      <label for="pseudo">Pseudo *</label>
      <input name="pseudo" placeholder="Pseudo" type="text" />

      <label for="password">Password *</label>
      <input class="form-control" name="password" placeholder="Password" type="password" />

      <label for="cpassword">Confirm Password *</label>
      <input class="form-control" name="cpassword" placeholder="Confirm Password" type="password" />

      <label for="cne">CNE *</label>
      <input name="cne" placeholder="CNE" type="text" />

      <label for="fname">Prenom *</label>
      <input name="fname" placeholder="Prenom" type="text" />

      <label for="lname">Nom *</label>
      <input name="lname" placeholder="Nom" type="text" />

      <label for="date_naiss">Date Naissance</label>
      <input name="date_naiss" placeholder="Date Naissance" type="date" />

      <label for="adrs">Adresse</label>
      <input name="adrs" placeholder="Adresse" type="text" />

      <label for="ville">Ville</label>
      <input name="ville" placeholder="Ville" type="text" />


      <label for="email">Email *</label>
      <input name="email" placeholder="Email" type="text" />

      <label for="phone">Telephone</label>
      <input name="phone" placeholder="Telephone" type="text" />

      <input name="submit" type="submit" value="Ajouter" />
    </form>
  </div>
  <?php include('footer.php'); ?>
  <!--===== MAIN JS =====-->
  <script src="js/main.js"></script>
</body>

</html>