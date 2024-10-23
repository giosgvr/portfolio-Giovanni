<?php
require_once "../festival_class.php";
require_once "../database_class.php";
require_once "nav.inc.php";

$festival = new Festival($db);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["zoekterm"])) {
    $zoekterm = $_POST["zoekterm"];

    $resultaten = $festival->searchfestivals($zoekterm);

    if (count($resultaten) > 0) {
        foreach ($resultaten as $resultaat) {
            echo "<p><a href='getchange_festival.php?festival_id=" . $resultaat['festival_id'] . "'>" . $resultaat["festival_name"] . "</a></p>";
            echo "<p>" . $resultaat["festival_description"] . "</p>";
        }
    } else {
        echo "Geen resultaten gevonden.";
    }

    exit();
}

$resultaten = $festival->getallfestivals();
?>
    <link rel="stylesheet" type="text/css" href="selchange_festival.css">

<h1>Festivals</h1>

<form id="zoekForm">
    <input type="text" name="zoekterm" id="zoekterm" placeholder="Voer festival in...">
</form>

<div id="zoekresultaten">
    <?php
    foreach ($resultaten as $resultaat) {
        echo "<p><a href='getchange_festival.php?festival_id=" . $resultaat['festival_id'] . "'>" . $resultaat["festival_name"] . "</a></p>";
        echo "<p>" . $resultaat["festival_description"] . "</p>";
    }
    ?>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('#zoekterm').on('input', function() {
            var zoekterm = $(this).val();
            $.ajax({
                type: 'POST',
                data: $('#zoekForm').serialize(),
                success: function(data) {
                    $('#zoekresultaten').html(data);
                }
            });
        });
    });
</script>
