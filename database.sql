-- Maak de database aan
CREATE DATABASE IF NOT EXISTS festivalinfo;
USE festivalinfo;

-- Tabel: album
CREATE TABLE IF NOT EXISTS album (
    album_id INT(11) NOT NULL AUTO_INCREMENT,
    album_name VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
    album_artist_id INT(11) NOT NULL,
    album_spotify_uri VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
    album_nr_tracks INT(11) DEFAULT NULL,
    album_url_cover VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
    PRIMARY KEY (album_id),
    INDEX (album_artist_id)
);

-- Tabel: artist
CREATE TABLE IF NOT EXISTS artist (
    artist_id INT(11) NOT NULL AUTO_INCREMENT,
    artist_name VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
    artist_description TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
    artist_genre_id INT(11) DEFAULT NULL,
    artist_country_id INT(11) DEFAULT NULL,
    artist_spotify_id VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
    PRIMARY KEY (artist_id)
);

-- Tabel: artist2festival
CREATE TABLE IF NOT EXISTS artist2festival (
    artist2festival_id INT(11) NOT NULL AUTO_INCREMENT,
    artist2festival_artist_id INT(11) DEFAULT NULL,
    artist2festival_festival_id INT(11) DEFAULT NULL,
    PRIMARY KEY (artist2festival_id),
    INDEX (artist2festival_artist_id),
    INDEX (artist2festival_festival_id)
);

-- Tabel: country
CREATE TABLE IF NOT EXISTS country (
    country_id INT(11) NOT NULL AUTO_INCREMENT,
    country_name VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
    country_continent VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
    PRIMARY KEY (country_id)
);

-- Tabel: festival
CREATE TABLE IF NOT EXISTS festival (
    festival_id INT(11) NOT NULL AUTO_INCREMENT,
    festival_name VARCHAR(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
    festival_date DATE DEFAULT NULL,
    festival_description TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
    PRIMARY KEY (festival_id)
);

-- Tabel: genre
CREATE TABLE IF NOT EXISTS genre (
    genre_id INT(11) NOT NULL AUTO_INCREMENT,
    genre_name VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
    genre_description VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
    PRIMARY KEY (genre_id)
);
