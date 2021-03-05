<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- ===== BOX ICONS ===== -->
    <link
      href="https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
      integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w=="
      crossorigin="anonymous"
    />

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="sass/etudiant.css" />

    <title>Etudiant Dashboard</title>
  </head>
  <body id="body-pd">
  <?php include('header.php'); ?>

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
    <div class="title-sec">
        EL MESKINE Anas
    </div>

    <div class="etu-cart">
      <div class="etu-avatar">
        <img src="img/avatar/ETU1.jpg" alt="" />
      </div>

      <div class="etu-content">
        <p><b>CNE : </b>12345678</p>
        <p><b>Nom : </b>EL MESKINE</p>
        <p><b>Prenom : </b>Anas</p>
        <p><b>Date de naissance : </b>98/23/2021</p>
        <p><b>Ville : </b>Safi</p>
        <p><b>Adresse : </b>32 rue 57 quartier la paix Safi</p>
        <p><b>Email : </b>Anaselmeskine@Gmail.Com</p>
        <p><b>Telephone : </b>0612345678</p>
      </div>
    </div>

    <!-- end Cart etudiant -->

    <!-- Start Note Etudiant table -->
    <table>
      <caption>
        Les Notes
      </caption>
      <thead>
        <tr>
          <th>Module</th>
          <th>Note</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td data-column="Module">C++</td>
          <td data-column="Date de séance">16/20</td>
        </tr>
        <tr>
          <td data-column="Module">HTML/CSS</td>
          <td data-column="Date de séance">12/20</td>
        </tr>
        <tr>
          <td data-column="Module">javascript</td>
          <td data-column="Date de séance">17/20</td>
        </tr>
        <tr>
          <td data-column="Module">Moyenne générale</td>
          <td data-column="Date de séance">15/20</td>
        </tr>
      </tbody>
    </table>
    <!-- end  Note Etudiant table -->
    <!-- Start Absences Etudiant table -->
    <table>
      <caption>
        Liste des absences
      </caption>
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
        <tr>
          <td data-column="Module">C++</td>
          <td data-column="Date de séance">03/02/2021</td>
          <td data-column="Heure debut">9:00</td>
          <td data-column="Heure fin">5:00</td>
          <td data-column="Type seance">Cours</td>
          <td data-column="Justifiée">Oui</td>
          <td data-column="Commentaire">Lorem ipsum</td>
        </tr>
        <tr>
          <td data-column="Module">HTML/CSS</td>
          <td data-column="Date de séance">03/02/2021</td>
          <td data-column="Heure debut">9:00</td>
          <td data-column="Heure fin">5:00</td>
          <td data-column="Type seance">Cours</td>
          <td data-column="Justifiée">Oui</td>
          <td data-column="Commentaire">Lorem ipsum</td>
        </tr>
        <tr>
          <td data-column="Module">Javascript</td>
          <td data-column="Date de séance">03/02/2021</td>
          <td data-column="Heure debut">9:00</td>
          <td data-column="Heure fin">5:00</td>
          <td data-column="Type seance">Cours</td>
          <td data-column="Justifiée">Oui</td>
          <td data-column="Commentaire">Lorem ipsum</td>
        </tr>
      </tbody>
    </table>
    <p style="text-align: center;">Nombre total des absences : 3</p>
    <!-- end  Absences Etudiant table -->

    <?php include('footer.php'); ?>
    <!--===== MAIN JS =====-->
    <script src="js/slider.js"></script>
  </body>
</html>