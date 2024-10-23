<?php
include "db_connect.php";

class Album
{
    protected $db;

    public function __construct($conn)
    {
        $this->db = $conn;
    }

    public function insert($albumName, $artistId, $albumSpotifyUrl, $albumNrTracks, $albumUrlCover)
    {
        $sql = "INSERT INTO 
                album (album_name, album_artist_id, album_spotify_uri, album_nr_tracks, album_url_cover) 
            VALUES 
                (:album_name, :album_artist_id, :album_spotify_url, :album_nr_tracks, :album_url_cover)";
        $this->db->query($sql);

        $this->db->bind(":album_name", $albumName);
        $this->db->bind(":album_artist_id", $artistId);
        $this->db->bind(":album_spotify_url", $albumSpotifyUrl);
        $this->db->bind(":album_nr_tracks", $albumNrTracks);
        $this->db->bind(":album_url_cover", $albumUrlCover);

        $this->db->execute();
    }

    public function getalbumsbyartistid($artistId)
    {
        $sql = "SELECT * FROM album WHERE album_artist_id = :artist_id";
        $this->db->query($sql);
        $this->db->bind(":artist_id", $artistId);
        $this->db->execute();
        return $this->db->getRows();
    }
}
