<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- ===== BOX ICONS ===== -->
  <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

  <!-- ===== CSS ===== -->
  <link rel="stylesheet" href="sass/contact.css" />

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
          <a href="contact.php" class="nav__link active">
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

  <section class="bg-image">
    <div class="support-bg">
      <div class="content-bg">
        <h2>Help & Support</h2>
        <p>Feel free to contact us</p>
        <br />
        <div class="arobas">
          <img src="img/background/arroba.png" />

          <p>support@academycode.com</p>
        </div>
        <br />
        <br />
        <div class="home-icon">
          <img src="img/background/home.png" width="auto" height="auto" />
          <p>support@academycode.com</p>
        </div>
      </div>
      <div class="info-bg">
        <img src="img/background/Info-bg.png" width="100%" height="auto" />
      </div>
    </div>

    <div class="contact-bg">
      <div class="contact-form">
        <form action="" name="contactForm">
          <h2>Contact Now</h2>
          <input class="name" name="lname" placeholder="Nom" type="text" id="name" />
          <input class="prenom" name="fname" placeholder="Prenom" type="text" />
          <input name="email" placeholder="Email" type="email" id="email" />
          <textarea id="message" name="" rows="4" cols="50"></textarea>

          <input name="submit" type="submit" value="Contact" />
        </form>
        <p style="color: red" id="erreur"></p>
      </div>
      <div class="contact-pic">
        <img src="img/background/contact.png" width="100%" height="auto" />
      </div>
    </div>
  </section>

  <?php include 'footer.php' ?>
  <!--===== MAIN JS =====-->
  <script src="js/main.js"></script>
  <script src="js/contact.js"></script>
</body>

</html>