<?php

class Artist
{
    protected $db;

    public function __construct($conn)
    {
        $this->db = $conn;
    }

    public function getallartists()
    {
        $sql = "SELECT * FROM artist";
        $this->db->query($sql);
        $this->db->execute();

        return $this->db->getRows();
    }

    public function getartistbyid($artistId)
    {
        $sql =
            "SELECT 
                * 
            FROM 
                artist 
            WHERE 
                artist_id = :artist_id";

        $this->db->query($sql);
        $this->db->bind(":artist_id", $artistId);
        $this->db->execute();

        return $this->db->getRow();
    }

    public function getartistgenres()
    {
        $sql = "SELECT * FROM genre";
        $this->db->query($sql);
        $this->db->execute();

        return $this->db->getRows();
    }

    public function getartistcountries()
    {
        $sql = "SELECT * FROM country";
        $this->db->query($sql);
        $this->db->execute();

        return $this->db->getRows();
    }

    public function deleteartist($artistId)
    {
        $sql = "DELETE FROM artist WHERE artist_id = :artist_id";
        $this->db->query($sql);
        $this->db->bind(":artist_id", $artistId);
        $this->db->execute();
    }

    public function updateartist($artistId, $artistName, $description, $genreId, $countryId, $artistSpotifyId)
    {
        $sql = "UPDATE 
                    artist 
                SET 
                    artist_name = :artist_name, artist_description = :artist_description, artist_genre_id = :artist_genre_id, artist_country_id = :artist_country_id, artist_spotify_id = :artist_spotify_id 
                WHERE 
                    artist_id = :artist_id";
        $this->db->query($sql);

        $this->db->bind(":artist_name", $artistName);
        $this->db->bind(":artist_description", $description);
        $this->db->bind(":artist_genre_id", $genreId);
        $this->db->bind(":artist_id", $artistId);
        $this->db->bind(":artist_country_id", $countryId);
        $this->db->bind(":artist_spotify_id", $artistSpotifyId);
        $this->db->execute();
    }

    public function insertartist($artistName, $description, $genreId, $countryId, $artistSpotifyId)
    {
        $sql = "INSERT INTO 
                    artist (artist_name, artist_description, artist_genre_id, artist_country_id, artist_spotify_id) 
                VALUES 
                    (:artist_name, :artist_description, :artist_genre_id, :artist_country_id, :artist_spotify_id)";
        $this->db->query($sql);
        $this->db->bind(":artist_name", $artistName);
        $this->db->bind(":artist_description", $description);
        $this->db->bind(":artist_genre_id", $genreId);
        $this->db->bind(":artist_country_id", $countryId);
        $this->db->bind(":artist_spotify_id", $artistSpotifyId);

        $this->db->execute();

        return $this->db->lastInsertId();
    }

    public function searchartists($searchTerm)
    {
        $sql = "SELECT * FROM artist WHERE artist_name ILIKE :search_term";
        $searchTerm = "%" . $searchTerm . "%";
        $this->db->query($sql);
        $this->db->bind(":search_term", $searchTerm);
        $this->db->execute();
        return $this->db->getRows();
    }
}
