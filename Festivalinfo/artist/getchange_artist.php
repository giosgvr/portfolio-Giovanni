<?php
include "nav.inc.php";
include "../artist_class.php";
include "../album_class.php";
include "../db_connect.php";

$artist = new Artist($db);

$artist_id = $_REQUEST["artist_id"];
$row = $artist->getartistbyid($artist_id);

if (empty($row)) {
    exit("Geen artiest gevonden.");
}

$genres = $artist->getartistgenres();
$countries = $artist->getartistcountries();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["delete"])) {
        $artist->deleteartist($artist_id);
        exit(header("Location: selchange_artist.php"));
    } else {
        $artistName = $_POST["artist_name"];
        $description = $_POST["artist_description"];
        $genreId = $_POST["artist_genre_id"];
        $countryId = $_POST["artist_country_id"];
        $artistSpotifyId = $_POST["artist_spotify_id"];

        $artist->updateartist($artist_id, $artistName, $description, $genreId, $countryId, $artistSpotifyId);

        exit(header("Location: getchange_artist.php?artist_id=$artist_id"));
    }
}

$albumObj = new Album($db);
$albums_data = $albumObj->getalbumsbyartistid($artist_id);

?>
<html>

<head>
    <title>Artiest Bewerken</title>
</head>

<body>
    <h1>Artiest Bewerken</h1>


    <form method="post" action="addchange_artist.php">
        <input type="hidden" name="artist_id" value="<?php echo $row["artist_id"]; ?>">
        <label for="artist_name">Artiest:</label>
        <input type="text" name="artist_name" value="<?php echo $row["artist_name"]; ?>" required>
        <br>
        <label for="artist_description">Beschrijving:</label>
        <textarea name="artist_description" rows="4" required><?php echo $row["artist_description"]; ?></textarea>
        <br>
        <label for="artist_genre_id">Genre:</label>
        <select name="artist_genre_id" required>
            <?php foreach ($genres as $genre) : ?>
                <option value="<?php echo $genre['genre_id']; ?>" <?php echo ($genre['genre_id'] == $row["artist_genre_id"]) ? 'selected' : ''; ?>><?php echo $genre['genre_name']; ?></option>
            <?php endforeach; ?>
        </select>
        <label for="artist_country_id">land:</label>
        <select name="artist_country_id" required>
            <?php foreach ($countries as $country) : ?>
                <option value="<?php echo $country['country_id']; ?>" <?php echo ($country['country_id'] == $row["artist_country_id"]) ? 'selected' : ''; ?>><?php echo $country['country_name']; ?></option>
            <?php endforeach; ?>
        </select>
        <label for="artist_spotify_id">Spotify Uri:</label>
        <textarea name="artist_spotify_id" rows="4" required><?php echo $row["artist_spotify_id"]; ?></textarea>
        <br>
        <h2>Albums</h2>
        <?php if (!empty($albums_data)) : ?>
            <ul>
                <?php foreach ($albums_data as $album) : ?>
                    <li><?php echo $album['album_name']; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php else : ?>
            <p>Geen albums gevonden voor deze artiest.</p>
        <?php endif; ?>
        <input type="submit" value="Bijwerken">
    </form>

    <form method="post" action="">
        <input type="hidden" name="artist_id" value="<?php echo $row["artist_id"]; ?>">
        <input type="hidden" name="delete" value="true">
        <input type="submit" value="Verwijderen" onclick="return confirm('Weet je zeker dat je deze artiest wilt verwijderen?');">
    </form>

    <a href="selchange_artist.php?artist_id=<?php echo $row['artist_id']; ?>"><button>Terug naar Artiest zoeken</button></a>
</body>

</html>
