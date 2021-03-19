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

if (isset($_GET['supprimer'])) {
    $id = $_GET['supprimer'];

    $sql1 = "DELETE FROM note WHERE note.fk_etudiant = '$id'";
    mysqli_query($db, $sql1);

    $sql2 = "DELETE FROM absence WHERE absence.fk_etudiant = '$id'";
    mysqli_query($db, $sql2);

    $sql = "DELETE FROM etudiant WHERE etudiant.id_etudiant = '$id'";
    mysqli_query($db, $sql);



    $_SESSION['message'] = "Address deleted!";
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
    // $_SESSION['modif'] = 1;

    $sql = "UPDATE etudiant SET CNE='$cne', nom_etu='$lname', prenom_etu = '$fname', date_naiss_etu = '$date_naiss' , adresse_etu = '$adrs', ville_etu = '$ville', email_etu = '$email', phone_etu = '$phone'   WHERE id_etudiant=$id";
    mysqli_query($db, $sql);





    // $_SESSION['message'] = "Address deleted!";
    header('location: enseignant.php');
}
