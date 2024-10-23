<?php
include "nav.inc.php";
include "../db_connect.php";

?>
<link rel="stylesheet" type="text/css" href="get_festival.css">

<h1>Voeg Festival toe</h1>

<form method="post" action="add_festival.php">
    <label for="festival_name">Naam:</label>
    <input type="text" name="festival_name" required>
    <br>
    <label for="festival_date">Datum:</label>
    <input type="date" name="festival_date" required>
    <br>
    <label for="festival_description">Beschrijving:</label>
    <textarea name="festival_description" rows="4" required></textarea>
    <br>
    <input type="submit" value="Voeg Toe">
</form>

<a href="selchange_festival.php"><button>Terug</button></a>

</body>
</html>
