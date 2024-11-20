<?php

include "../db_connect.php";
include "../artist_class.php";
include "../album_class.php";

$queries = new Artist($db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $artistName = $_POST["artist_name"];
    $description = $_POST["artist_description"];
    $genreId = $_POST["artist_genre_id"];
    $countryId = $_POST["artist_country_id"];
    $artistSpotifyId = $_POST["artist_spotify_id"];

    // Controleer of alle velden zijn ingevuld
    if (empty($artistName) || empty($description) || empty($genreId) || empty($countryId) || empty($artistSpotifyId)) {
        echo "<script>alert('Vul alle velden in.'); window.history.back();</script>";
        exit();
    }

    // Verwijder 'spotify:artist:' uit de URI
    $artistSpotifyId = str_replace('spotify:artist:', '', $artistSpotifyId);

    // OAuth-token ophalen van Spotify
    $client_id = 'cb147a2cc317448d9db54d39b0afcd85';
    $client_secret = 'c3bd38862ad54b5c99ab205fb4222283';

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://accounts.spotify.com/api/token');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query([
        'grant_type' => 'client_credentials',
        'client_id' => $client_id,
        'client_secret' => $client_secret,
    ]));

    $response = curl_exec($ch);

    // Controleer of er een netwerkprobleem is (curl error)
    if ($response === false) {
        echo "<script>alert('Geen netwerkverbinding beschikbaar.'); window.history.back();</script>";
        exit();
    }

    curl_close($ch);

    $token_data = json_decode($response, true);

    if (isset($token_data['access_token'])) {
        $access_token = $token_data['access_token'];

        // Albums ophalen van Spotify
        $albums_url = 'https://api.spotify.com/v1/artists/' . $artistSpotifyId . '/albums';
        $options = array(
            'http' => array(
                'header'  => "Authorization: Bearer " . $access_token,
                'method'  => 'GET'
            )
        );

        $context  = stream_context_create($options);
        $response = file_get_contents($albums_url, false, $context);

        // Controleer of er een netwerkprobleem is bij het ophalen van albums
        if ($response === false) {
            echo "<script>alert('Geen netwerkverbinding beschikbaar.'); window.history.back();</script>";
            exit();
        }

        $albums_data = json_decode($response, true);

        // Controleer of er een geldige artiest is gevonden
        if (!isset($albums_data['items']) || empty($albums_data['items'])) {
            echo "<script>alert('Ongeldige URI of artiest niet gevonden. Probeer opnieuw.'); window.history.back();</script>";
            exit();
        }

        // Artiest toevoegen aan database
        $artist_id = $queries->insertartist($artistName, $description, $genreId, $countryId, $artistSpotifyId);

        // Albums aan database toevoegen
        $albumObj = new Album($db);
        foreach ($albums_data['items'] as $album) {
            if ($album['album_type'] === 'album') { 
                $albumName = $album['name'];
                $albumSpotifyUrl = $album['external_urls']['spotify'];
                $albumNrTracks = $album['total_tracks'];
                $albumUrlCover = $album['images'][0]['url'];
                $albumObj->insert($albumName, $artist_id, $albumSpotifyUrl, $albumNrTracks, $albumUrlCover);
            }
        }

        // Doorsturen naar de wijzigingspagina
        header("Location: getchange_artist.php?artist_id=" . $artist_id);
        exit();
    } else {
        echo "<script>alert('Fout bij het ophalen van het toegangstoken.'); window.history.back();</script>";
        exit();
    }
}
?>
