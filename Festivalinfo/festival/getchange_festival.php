<?php
require_once "../db_connect.php";
require_once "../festival_class.php";
require_once "../artist_class.php";
require_once "nav.inc.php";

$festival = new Festival($db);
$artistquery = new Artist($db);


$festival_id = $_REQUEST["festival_id"];
$row = $festival->getfestivalbyid($festival_id);

if (empty($row)) {
    exit("Geen festival gevonden.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_artist"])) {
    $selected_artist_id = $_POST["artist_id"];

    $message = $festival->addartisttofestival($festival_id, $selected_artist_id);
}

$linked_artists = $festival->getlinkedartists($festival_id);

?>

<html>

<head>
    <title>Festival Bewerken</title>
    <link rel="stylesheet" type="text/css" href="getchange.css">

</head>

<body>
    <h1>Festival Bewerken</h1>
    <form method="post" action="addchange_festival.php">
        <input type="hidden" name="festival_id" value="<?php echo $row["festival_id"]; ?>">
        <label for="festival_name">naam:</label>
        <input type="text" name="festival_name" value="<?php echo $row["festival_name"]; ?>" required>
        <br>
        <label for="festival_date">datum:</label>
        <input type="date" name="festival_date" value="<?php echo $row["festival_date"]; ?>" required>
        <br>
        <label for="festival_description">beschrijving:</label>
        <textarea name="festival_description" rows="4" required><?php echo $row["festival_description"]; ?></textarea>
        <br>
        <input type="submit" value="Bijwerken">
    </form>

    <form method="post" action="addchange_festival.php">
        <input type="hidden" name="festival_id" value="<?php echo $row["festival_id"]; ?>">
        <input type="hidden" name="delete" value="true">
        <input type="submit" value="Verwijderen" onclick="return confirm('Weet je zeker dat je dit festival wilt verwijderen?');">
    </form>

    <h2>Artiesten Gekoppeld aan dit Festival</h2>
    <?php foreach ($linked_artists as $linked_artist) : ?>
        <div>
            <h4><?php echo $linked_artist['artist_name']; ?></h4>
            <form method="post" action="">
                <input type="hidden" name="artist_name" value="<?php echo $linked_artist['artist_name']; ?>">
                <input type="hidden" name="festival_id" value="<?php echo $festival_id; ?>">
                <input type="submit" name="remove_artist" value="Verwijder">
            </form>
        </div>
    <?php endforeach; ?>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["remove_artist"])) {
        $remove_artist_name = $_POST["artist_name"];

        $festival->deleteartistfromfestival($festival_id, $remove_artist_name);

        header("Location: " . $_SERVER['PHP_SELF'] . "?festival_id=" . $festival_id);
        exit();
    }
    ?>

    <h2>Artiest Toevoegen aan Festival</h2>
    <form method="post" action="">
        <input type="hidden" name="festival_id" value="<?php echo $festival_id; ?>">
        <label for="artist_id">Selecteer een artiest:</label>
        <select name="artist_id" id="artist_id">
            <?php
            $artists = $artistquery->getallartists();
            
            foreach ($artists as $artist) {
                echo "<option value='" . $artist['artist_id'] . "'>" . $artist['artist_name'] . "</option>";
            }
            ?>
        </select>
        <input type="submit" name="add_artist" value="Voeg Toe">
    </form>

    <?php if (isset($message)) {
        echo "<p>$message</p>";
    } ?>

    <a href="selchange_festival.php?festival_id=<?php echo $row['festival_id']; ?>"><button>Terug naar festival zoeken</button></a>
</body>

</html>
