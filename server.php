<?php
// Initialize the session
session_start();

// Include connect file
require_once "connect.php";


$id = 0;
$id = "";
$cne = "";
$fname = "";
$lname = "";
$date_naiss = "";
$adrs = "";
$ville = "";
$email = "";
$phone = "";
$_SESSION['modif'] = 0;
$_SESSION['dell'] = 0;

if (isset($_GET['supprimer'])) {
    $id = $_GET['supprimer'];

    // $sql1 = "DELETE FROM note WHERE note.fk_etudiant = '$id'";
    // mysqli_query($db, $sql1);

    // $sql2 = "DELETE FROM absence WHERE absence.fk_etudiant = '$id'";
    // mysqli_query($db, $sql2);

    $sql = "DELETE FROM etudiant WHERE etudiant.id_etudiant = '$id'";
    mysqli_query($db, $sql);


    $_SESSION['dell'] = 1;
    $_SESSION['message'] = "Etudiant has been deleted!";
    header('location: enseignant.php');
}

if (isset($_POST['modifieretu'])) {
    $id = $_SESSION['id_etudiant'];
    $cne = $_POST['cne'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $date_naiss = $_POST['date_naiss'];
    $adrs = $_POST['adrs'];
    $ville = $_POST['ville'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "UPDATE etudiant SET CNE='$cne', nom_etu='$lname', prenom_etu = '$fname', date_naiss_etu = '$date_naiss' , adresse_etu = '$adrs', ville_etu = '$ville', email_etu = '$email', phone_etu = '$phone'   WHERE id_etudiant=$id";
    mysqli_query($db, $sql);


    $_SESSION['modif'] = 1;
    $_SESSION['message'] = "Etudiant has been edited!";
    header('location: updateEtu.php');
}

if (isset($_POST['ajouterabsences'])) {

    $id_seance = $_POST['abs_id_seance'];
    $id_etudiant = $_POST['abs_id_etudiant'];

    $sql = "INSERT INTO absence (fk_seance, fk_etudiant) VALUES ('$id_seance','$id_etudiant')";

    mysqli_query($db, $sql);

    // $_SESSION['message'] = "Absence saved";
    header('location: gsNoteAbsence.php');
}

if (isset($_POST['ajouternote'])) {

    $id_etudiant = $_POST['nt_id_etudiant'];
    $module = $_POST['nt_module'];
    $note = $_POST['nt_note'];


    $sql = "INSERT INTO note (note_module, fk_module, fk_etudiant) VALUES ('$note','$module','$id_etudiant')";

    mysqli_query($db, $sql);

    // $_SESSION['message'] = "Note saved";
    header('location: gsNoteAbsence.php');
}
