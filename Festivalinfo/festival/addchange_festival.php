<?php
include "../db_connect.php";
include "../festival_class.php";

$festival = new Festival($db);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["festival_id"])) {
    if (isset($_POST["delete"])) {
        $festivalId = $_POST["festival_id"];

        $festival->deletefestival($festivalId);

        $successMessage = "festival is succesvol verwijderd!";
        header("Location: selchange_festival.php");
        exit();
    } else {
        $festivalId = $_POST["festival_id"];
        $naam = $_POST["festival_name"];
        $datum = $_POST["festival_date"];
        $beschrijving = $_POST["festival_description"];

        $festival->updatefestival($festivalId, $naam, $datum, $beschrijving);

        $successMessage = "festival is succesvol bijgewerkt!";
        header("Location: getchange_festival.php?festival_id=" . $festivalId);
        exit();
    }
}
?>