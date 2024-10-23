<?php

class Festival
{
    protected $db;

    public function __construct($conn)
    {
        $this->db = $conn;
    }

    public function getallfestivals()
    {
        $sql = "SELECT * FROM festival";
        $this->db->query($sql);
        $this->db->execute();
        return $this->db->getrows();
    }

    public function getfestivalbyid($festival_id)
    {
        $sql = "SELECT * FROM 
                    festival 
                WHERE 
                    festival_id = :festival_id";
        $this->db->query($sql);
        $this->db->bind(":festival_id", $festival_id);
        $this->db->execute();
        return $this->db->getRow();
    }

    public function addfestival($name, $date, $description)
    {
        $sql = "INSERT INTO 
                    festival (festival_name, festival_date, festival_description) 
                VALUES 
                    (:festival_name, :festival_date, :festival_description)";
        $this->db->query($sql);

        $this->db->bind(":festival_name", $name);
        $this->db->bind(":festival_date", $date);
        $this->db->bind(":festival_description", $description);
        $this->db->execute();

        return $this->db->lastInsertId();
    }

    public function updatefestival($festivalId, $name, $date, $description)
    {
        $sql =
            "UPDATE 
                festival 
            SET 
                festival_name = :festival_name, festival_date = :festival_date, festival_description = :festival_description 
            WHERE 
                festival_id = :festival_id";
        $this->db->query($sql);

        $this->db->bind(":festival_name", $name);
        $this->db->bind(":festival_date", $date);
        $this->db->bind(":festival_description", $description);
        $this->db->bind(":festival_id", $festivalId);
        $this->db->execute();
    }

    public function deleteFestival($festivalId)
    {
        $sql =
        "DELETE FROM 
            festival 
        WHERE 
        festival_id = :festival_id";
        $this->db->query($sql);
        $this->db->bind(":festival_id", $festivalId);
        $this->db->execute();
    }

    public function getlinkedartists($festivalId)
    {
        $sql =
            "SELECT 
                artist.artist_name 
            FROM 
                artist 
            INNER JOIN 
                artist2festival 
            ON 
                artist.artist_id = artist2festival.artist2festival_artist_id
            WHERE 
                artist2festival.artist2festival_festival_id = :festival_id";

            $this->db->query($sql);

        $this->db->bind(":festival_id", $festivalId);
        $this->db->execute();
        return $this->db->getRows();
    }

    public function addartisttofestival($festivalId, $artistId)
    {
        $sql = "SELECT 
                    COUNT(*) 
                AS 
                    count 
                FROM 
                    artist2festival 
                WHERE 
                    artist2festival_artist_id = :selected_artist_id 
                AND 
                    artist2festival_festival_id = :festival_id";
            $this->db->query($sql);

        $this->db->bind(":selected_artist_id", $artistId);
        $this->db->bind(":festival_id", $festivalId);
        $this->db->execute();
        $result = $this->db->getRow();

        if ($result['count'] > 0) {
            return "Deze artiest is al gekoppeld aan het festival.";
        } else {
            $sql =
            "INSERT INTO 
                artist2festival (artist2festival_artist_id, artist2festival_festival_id) 
            VALUES 
                (:selected_artist_id, :festival_id)";
            $this->db->query($sql);

            $this->db->bind(":selected_artist_id", $artistId);
            $this->db->bind(":festival_id", $festivalId);
            $this->db->execute();

            return "Artiest is succesvol toegevoegd aan het festival!";
        }
    }

    public function deleteartistfromfestival($festivalId, $artistName)
    {
        $sql =
        "DELETE FROM 
            artist2festival 
        WHERE 
            artist2festival_festival_id = :festival_id 
        AND 
            artist2festival_artist_id 
        IN (SELECT artist_id FROM artist WHERE artist_name = :artist_name)";

        $this->db->query($sql);
        $this->db->bind(":festival_id", $festivalId);
        $this->db->bind(":artist_name", $artistName);
        $this->db->execute();
    }

    public function searchfestivals($searchTerm)
    {
        $sql =
        "SELECT * FROM 
            festival 
        WHERE 
            festival_name 
        ILIKE 
            :searchTerm";
        $this->db->query($sql);

        $this->db->bind(":searchTerm", "%$searchTerm%");
        $this->db->execute();
        return $this->db->getRows();
    }
}
