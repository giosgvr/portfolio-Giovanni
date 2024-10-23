<?php
require_once "../artist_class.php";
require_once "../database_class.php";
require_once "nav.inc.php";

$artist = new Artist($db);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["zoekterm"])) {
    $zoekterm = $_POST["zoekterm"];

    if (!empty($zoekterm)) {
        $resultaten = $artist->searchartists($zoekterm);
    } else {
        $resultaten = $artist->getallartists();
    }

    if (count($resultaten) > 0) {
        foreach ($resultaten as $resultaat) {
            echo "<p><a href='getchange_artist.php?artist_id=" . $resultaat['artist_id'] . "'>" . $resultaat["artist_name"] . "</a></p>";
            echo "<p>" . $resultaat["artist_description"] . "</p>";
        }
    } else {
        echo "Geen resultaten gevonden.";
    }

    exit();
}

$resultaten = $artist->getallartists();

?>

<link rel="stylesheet" href="selchange_artist.css">
<h1>Artiesten</h1>

<form id="zoekForm">
    <input type="text" name="zoekterm" id="zoekterm" placeholder="Voer artiestnaam in...">
</form>

<div id="zoekresultaten">
    <?php
    foreach ($resultaten as $resultaat) {
        echo "<p><a href='getchange_artist.php?artist_id=" . $resultaat['artist_id'] . "'>" . $resultaat["artist_name"] . "</a></p>";
        echo "<p>" . $resultaat["artist_description"] . "</p>";
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
