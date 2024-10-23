<?php
include "../artist_class.php";
require_once "../database_class.php";


$artist = new Artist($db);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["artist_id"])) {
    if (isset($_POST["delete"])) {
        $artistId = $_POST["artist_id"];
        $artist->deleteartist($artistId);

        $successMessage = "Artiest is succesvol verwijderd!";
        header("Location: selchange_artist.php");
        exit();
    } else {
        $artistId = $_POST["artist_id"];
        $artistName = $_POST["artist_name"];
        $description = $_POST["artist_description"];
        $genreId = $_POST["artist_genre_id"];
        $countryId = $_POST["artist_country_id"];
        $artistSpotifyId = $_POST["artist_spotify_id"];
        $artist->updateartist($artistId, $artistName, $description, $genreId, $countryId, $artistSpotifyId);

        $successMessage = "Artiest is succesvol bijgewerkt!";
        header("Location: getchange_artist.php?artist_id=" . $artistId);
        exit();
    }
}
?>
