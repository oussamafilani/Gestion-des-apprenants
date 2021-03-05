<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- ===== BOX ICONS ===== -->
  <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

  <!-- ===== CSS ===== -->
  <link rel="stylesheet" href="sass/enseignant.css" />

  <title>Sidebar menu responsive</title>
</head>

<body id="body-pd">
  <?php include('header.php'); ?>

  <!-- Start Etudiant table -->
  <table>
    <caption>
      Liste des Etudiants
    </caption>
    <thead>
      <tr>
        <th>CNE</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Date naissance</th>
        <th>Adresse</th>
        <th>Ville</th>
        <th>Email</th>
        <th>Telephone</th>
        <th>Modifier</th>
        <th>Supprimer</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td data-column="CNE">1985858585</td>
        <td data-column="Nom">James</td>
        <td data-column="Prenom">Matman</td>
        <td data-column="Date naissance">2000-03-06</td>
        <td data-column="Adresse">Safi N1</td>
        <td data-column="Ville">Safi</td>
        <td data-column="Email">test@gmail.com</td>
        <td data-column="Telephone">066666666</td>
        <td data-column="Modifier">
          <i class="fas fa-edit table-edit-icon"></i>
        </td>
        <td data-column="Supprimer">
          <i class="fas fa-trash table-trash-icon"></i>
        </td>
      </tr>
      <tr>
        <td data-column="CNE">1985858585</td>
        <td data-column="Nom">James</td>
        <td data-column="Prenom">Matman</td>
        <td data-column="Date naissance">2000-03-06</td>
        <td data-column="Adresse">Safi N1</td>
        <td data-column="Ville">Safi</td>
        <td data-column="Email">test@gmail.com</td>
        <td data-column="Telephone">066666666</td>
        <td data-column="Modifier">
          <i class="fas fa-edit table-edit-icon"></i>
        </td>
        <td data-column="Supprimer">
          <i class="fas fa-trash table-trash-icon"></i>
        </td>
      </tr>
      <tr>
        <td data-column="CNE">1985858585</td>
        <td data-column="Nom">James</td>
        <td data-column="Prenom">Matman</td>
        <td data-column="Date naissance">2000-03-06</td>
        <td data-column="Adresse">Safi N1</td>
        <td data-column="Ville">Safi</td>
        <td data-column="Email">test@gmail.com</td>
        <td data-column="Telephone">066666666</td>
        <td data-column="Modifier">
          <i class="fas fa-edit table-edit-icon"></i>
        </td>
        <td data-column="Supprimer">
          <i class="fas fa-trash table-trash-icon"></i>
        </td>
      </tr>
      <tr>
        <td data-column="CNE">1985858585</td>
        <td data-column="Nom">James</td>
        <td data-column="Prenom">Matman</td>
        <td data-column="Date naissance">2000-03-06</td>
        <td data-column="Adresse">Safi N1</td>
        <td data-column="Ville">Safi</td>
        <td data-column="Email">test@gmail.com</td>
        <td data-column="Telephone">066666666</td>
        <td data-column="Modifier">
          <i class="fas fa-edit table-edit-icon"></i>
        </td>
        <td data-column="Supprimer">
          <i class="fas fa-trash table-trash-icon"></i>
        </td>
      </tr>
      <tr>
        <td data-column="CNE">1985858585</td>
        <td data-column="Nom">James</td>
        <td data-column="Prenom">Matman</td>
        <td data-column="Date naissance">2000-03-06</td>
        <td data-column="Adresse">Safi N1</td>
        <td data-column="Ville">Safi</td>
        <td data-column="Email">test@gmail.com</td>
        <td data-column="Telephone">066666666</td>
        <td data-column="Modifier">
          <i class="fas fa-edit table-edit-icon"></i>
        </td>
        <td data-column="Supprimer">
          <i class="fas fa-trash table-trash-icon"></i>
        </td>
      </tr>
      <tr>
        <td data-column="CNE">1985858585</td>
        <td data-column="Nom">James</td>
        <td data-column="Prenom">Matman</td>
        <td data-column="Date naissance">2000-03-06</td>
        <td data-column="Adresse">Safi N1</td>
        <td data-column="Ville">Safi</td>
        <td data-column="Email">test@gmail.com</td>
        <td data-column="Telephone">066666666</td>
        <td data-column="Modifier">
          <i class="fas fa-edit table-edit-icon"></i>
        </td>
        <td data-column="Supprimer">
          <i class="fas fa-trash table-trash-icon"></i>
        </td>
      </tr>
      <tr>
        <td data-column="CNE">1985858585</td>
        <td data-column="Nom">James</td>
        <td data-column="Prenom">Matman</td>
        <td data-column="Date naissance">2000-03-06</td>
        <td data-column="Adresse">Safi N1</td>
        <td data-column="Ville">Safi</td>
        <td data-column="Email">test@gmail.com</td>
        <td data-column="Telephone">066666666</td>
        <td data-column="Modifier">
          <i class="fas fa-edit table-edit-icon"></i>
        </td>
        <td data-column="Supprimer">
          <i class="fas fa-trash table-trash-icon"></i>
        </td>
      </tr>
    </tbody>
  </table>
  <!-- end  Etudiant table -->

  <?php include('footer.php'); ?>
  <!--===== MAIN JS =====-->
  <script src="js/main.js"></script>
</body>

</html>