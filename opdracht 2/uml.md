### ik heb de uml diagram gemaakt in lucidchart omdat dit mij door het internet werd aangeraden. ik had er nog nooit mee gewerkt en het voelde erg intuitief om te gebruiken het uml diagram beschrijft het databaseontwerp die ik maak voor festivalinfo om artiesten met hun albums in op te slaan, en eventueel nog toe te kunnen voegen aan een festival.

**dit is de erd die ik heb gemaakt in lucidchart**

ARTIST ||--|| BIOGRAPHY : "1:1"
COUNTRY ||--o{ ARTIST : "1:N"
GENRE ||--o{ ARTIST : "1:N"
ARTIST ||--o{ ALBUM : "1:N"
ARTIST }|--o{ ARTIST2FESTIVAL : "M:N"
FESTIVAL }o--|| ARTIST2FESTIVAL : "M:N"

- Elke **ARTIST** heeft eenn **BIOGRAPHY** (1:1 relatie).
- Een **COUNTRY** kan meerdere **ARTISTS** hebben (1:N relatie).
- Een **GENRE** kan meerdere **ARTISTS** hebben (1:N relatie).
- Een **ARTIST** kan meerdere **ALBUMS** hebben (1:N relatie).
- Een **ARTIST** kan aan meerdere **FESTIVALS** deelnemen via de **ARTIST2FESTIVAL** tussentabel (M:N relatie).
- Een **FESTIVAL** kan meerdere **ARTISTS** hebben via de **ARTIST2FESTIVAL** tussentabel (M:N relatie).

BIOGRAPHY 
    int biography_id
    int artist_id,
    text full_biography
}

COUNTRY {
   int country_id
   varchar country_name  
   varchar country_continent
}

GENRE {
   int genre_id
   varchar genre_name
   text genre_description
}

ARTIST {
   int artist_id
   varchar artist_name
   text artist_description
   int artist_genre_id
   int artist_country_id
   varchar artist_spotify_id
}

ALBUM {
   int album_id
   varchar album_name
   int album_artist_id
   varchar album_spotify_url
   int album_nr_tracks
   varchar album_url_cover
}

FESTIVAL {
   int festival_id
   varchar festival_name
   date festival_date
   text festival_description
}

ARTIST2FESTIVAL {
   int artist2festival_id
   int artist2festival_artist_id
   int artist2festival_festival_id
}

**hier een screenshot en link naar de diagram**

[ERD_Diagram](erd_diagram.png)

https://lucid.app/lucidchart/db4d2baa-9bef-49b7-9279-1426a15bb622/edit?viewport_loc=-2213%2C-764%2C2211%2C887%2C0_0&invitationId=inv_75537f5c-f8ed-4261-baf3-8204c09bbc6f

**ik zal hieronder even een uitleg geven over de tabellen die ik heb gebruikt. daarbij verklaar ik wat de functies van de tabellen zijn en hoe ze een relatie kunnen vormen met een andere tabel.**

1. **Artist:** 
   Dit is de belangrijkste tabel, zonder deze kunnen de andere geen stand houden(op de festival tabel na). in deze tabel staat de info van een artiest beschreven. Deze tabel is gekoppeld aan andere tabbellen.

2. **Genre:** 
   Deze tabel is gekoppeld aan de Artist tabel. in deze tabel staan de genres muziek met bij elk genre hun eigen omschrijving. deze tabel is gekoppeld aan de artist table. De artist_genre_id is hetzelfde met de genre_id van de tabel genre zodat het juiste genre word weergegeven bij de desbetreffende artiest daarvoor.

3. **Biography:** 
   Deze tabel bevat de biografie van een artiest die word gekoppeld aan de artist tabel door middel van de artist_id die linkt met artist_id uit de tabel biography. dit betekent dat er een 1 op 1 relatie is tussen de tabellen aangezien een biografie uniek is aan een enkele artiest. 

4. **Country:** 
   Deze tabel bevat de Landen waar de artiesten afkomstig van kunnen zijn. deze landen zijn gelinkt aan de artist tabel door middel van de country_id die linkt aan artist_country_id in de artist tabel. dit is een one to many relatie aangezien een land aan meerdere artiesten gelinkt kan worden.

5. **Album:** 
   Deze tabel bevat de albums die van een artiest worden opgehaald bij het toevoegen van de artiesten(als er albums aanwezig zijn). Deze albums worden gelinkt aan een artiest door het album_artist_id te linken aan de artist_id uit de artist tabel. dit is een one to many relatie aangezien een artiest meerdere albums kan hebben.

6. **Festival:** 
   Deze tabel bestaat uit festivallen die er zijn. ze kunnen op de festivalpage worden gelinkt aan een artiest door gebruik te maken van een koppeltabel(artist2festival) dit is een many to many relatie aangezien meerdere festivallen ook aan meerdere artiesten kunnen worden gelinkt.

7. **artist2festival:** 
   Deze tabel bevat informatie over welke artiest aan welk festival word gelinkt. er word een nieuwe id aangemaakt die staat voor 1 artiest en 1 festival samen. dit gebeurt door de artist id te pakken van een artist en deze samen te voegen met de festival_id van het desbetreffende festival.

## hieronder de tables die ik heb gebruikt voor de ERD:

```sql

-- Maak de database aan
CREATE DATABASE IF NOT EXISTS festivalinfo;
USE festivalinfo;

-- Tabel: album
CREATE TABLE IF NOT EXISTS album (
    album_id INT(11) NOT NULL AUTO_INCREMENT,
    album_name VARCHAR(255),
    album_artist_id INT(11),
    album_spotify_uri VARCHAR(255),
    album_nr_tracks INT(11),
    album_url_cover VARCHAR(255),
    PRIMARY KEY (album_id),
    INDEX (album_artist_id)
);

-- Tabel: artist
CREATE TABLE IF NOT EXISTS artist (
    artist_id INT(11) NOT NULL AUTO_INCREMENT,
    artist_name VARCHAR(255),
    artist_description TEXT,
    artist_genre_id INT(11),
    artist_country_id INT(11),
    artist_spotify_id VARCHAR(255),
    PRIMARY KEY (artist_id)
);

-- Tabel: artist2festival
CREATE TABLE IF NOT EXISTS artist2festival (
    artist2festival_id INT(11) NOT NULL AUTO_INCREMENT,
    artist2festival_artist_id INT(11),
    artist2festival_festival_id INT(11),
    PRIMARY KEY (artist2festival_id),
    INDEX (artist2festival_artist_id),
    INDEX (artist2festival_festival_id)
);

-- Tabel: country
CREATE TABLE IF NOT EXISTS country (
    country_id INT(11) NOT NULL AUTO_INCREMENT,
    country_name VARCHAR(255),
    country_continent VARCHAR(255),
    PRIMARY KEY (country_id)
);

-- Tabel: festival
CREATE TABLE IF NOT EXISTS festival (
    festival_id INT(11) NOT NULL AUTO_INCREMENT,
    festival_name VARCHAR(100),
    festival_date DATE,
    festival_description TEXT,
    PRIMARY KEY (festival_id)
);

-- Tabel: genre
CREATE TABLE IF NOT EXISTS genre (
    genre_id INT(11) NOT NULL AUTO_INCREMENT,
    genre_name VARCHAR(255),
    genre_description VARCHAR(255),
    PRIMARY KEY (genre_id)
);

-- Tabel: biography
CREATE TABLE IF NOT EXISTS biography (
    biography_id INT PRIMARY KEY AUTO_INCREMENT,
    artist_id INT,
    full_biography TEXT
);

```