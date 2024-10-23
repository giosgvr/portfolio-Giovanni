<?php
include "../db_connect.php";
include "../festival_class.php";

$festival = new Festival($db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $naam = $_POST["festival_name"];
    $datum = $_POST["festival_date"];
    $beschrijving = $_POST["festival_description"];

    $festival_id = $festival->addfestival($naam, $datum, $beschrijving);

    $successMessage = "festival is succesvol toegevoegd!";

    header("Location: getchange_festival.php?festival_id=" . $festival_id);
    exit();
}
?>