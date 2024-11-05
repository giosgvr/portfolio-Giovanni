<?php

include "nav.inc.php";
include "../db_connect.php";
include "../artist_class.php";

$artist = new Artist($db);
$genres = $artist->getartistgenres();
$countries = $artist->getartistcountries();
?>

<html>

<head>
    <title>Voeg Artiest toe</title>
    <link rel="stylesheet" href="selchange_artist.css">
</head>

<body>
    <h1>Voeg Artiest toe</h1>
    <form method="post" action="add_artist.php">
        <label for="artist_name">Artiest:</label>
        <input type="text" name="artist_name" required>
        <br>
        <label for="artist_description">Beschrijving:</label>
        <textarea name="artist_description" rows="4" required></textarea>
        <br>
        <label for="artist_genre_id">Genre:</label>
        <select name="artist_genre_id" required>
            <?php foreach ($genres as $genre) : ?>
                <option value="<?php echo $genre['genre_id']; ?>"><?php echo $genre['genre_name']; ?></option>
            <?php endforeach; ?>
        </select>
        <label for="artist_country_id">land:</label>
        <select name="artist_country_id" required>
            <?php foreach ($countries as $country) : ?>
                <option value="<?php echo $country['Country_ID']; ?>"><?php echo $country['Country_Name']; ?></option>
            <?php endforeach; ?>
        </select>
        <br>
        <label for="artist_spotify_id">Spotify Uri:</label>
        <textarea name="artist_spotify_id" rows="4" required></textarea>
        <br>
        <input type="submit" value="Voeg Toe">
    </form>

    <a href="selchange_artist.php"><button>Terug</button></a>

</body>

</html>
