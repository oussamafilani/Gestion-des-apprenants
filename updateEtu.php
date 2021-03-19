<?php
// Initialize the session
session_start();

// Include connect file
require_once "connect.php";


?>

<?php
$id = 0;

if (isset($_GET['modifier'])) {
    $id = $_GET['modifier'];

    $results = mysqli_query($db, "SELECT * FROM etudiant WHERE id_etudiant = '$id'");
    $_SESSION['message'] = "Address Updated!";
    $_SESSION['id_etudiant']  = $id;
}
?>


<?php
if (($_SESSION['modif']) == 1) {
    echo '<script>succes();</script>';
    $_SESSION['modif'] = 0;
}
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
    <link rel="stylesheet" href="sass/insertEtu.css" />

    <title>Modification Etudiant</title>
    <script>
        
        function succes() {
            swal({
                title: "Modification pass avec succes!",
                text: "Thanks",
                icon: "success",
                button: "Continue!",
            });
        }
    </script>
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
                    <a href="enseignant.php" class="nav__link">
                        <i class="bx bx-grid-alt nav__icon"></i>
                        <span class="nav__name">Dashboard</span>
                    </a>

                    <a href="insertEtu.php" class="nav__link active">
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



    <!-- start insert etudiant -->
    <div class="insert-etu-container">
        <form name="insertEtuFrom" method="post" action="server.php">
            <h2>Modification d'un compte etudiant</h2>
            <?php while ($row = mysqli_fetch_array($results)) { ?>
                <label for="cne">CNE *</label>
                <input name="cne" placeholder="CNE" type="text" class="validetu" value="<?php echo $row['CNE']; ?>" />

                <label for="fname">Prenom *</label>
                <input name="fname" placeholder="Prenom" type="text" class="validetu" value="<?php echo $row['prenom_etu']; ?>" />

                <label for="lname">Nom *</label>
                <input name="lname" placeholder="Nom" type="text" class="validetu" value="<?php echo $row['nom_etu']; ?>" />

                <label for="date_naiss">Date Naissance</label>
                <input name="date_naiss" placeholder="Date Naissance" type="date" value="<?php echo $row['date_naiss_etu']; ?>" />

                <label for="adrs">Adresse</label>
                <input name="adrs" placeholder="Adresse" type="text" value="<?php echo $row['adresse_etu']; ?>" />

                <label for="ville">Ville</label>
                <input name="ville" placeholder="Ville" type="text" value="<?php echo $row['ville_etu']; ?>" />

                <label for="email">Email *</label>
                <input name="email" placeholder="Email" type="email" class="validetu" value="<?php echo $row['email_etu']; ?>" />

                <label for="phone">Telephone</label>
                <input name="phone" placeholder="Telephone" type="text" value="<?php echo $row['phone_etu']; ?>" />

                <input name="modifieretu" type="submit" value="Modifier" />
            <?php } ?>
        </form>
        <p style="color: red" id="erreur"></p>
    </div>

    <?php include 'footer.php' ?>
    <!--===== MAIN JS =====-->
    <script src="js/main.js"></script>
    <!-- <script src="js/insertEtudiant.js"></script> -->
</body>

</html>