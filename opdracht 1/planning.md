# Festivalinfo Spotify Integratie Project

---

### Giovanni Slagveer

## Introductie

---

Dit project is gericht op het creëren van een webapplicatie voor Festivalinfo die gebruik maakt van de Spotify API om gedetailleerde informatie over artiesten op te halen en weer te geven. Door simpelweg de Spotify URI van een artiest in te voeren, zal de applicatie automatisch alle albums en singles van de artiest ophalen en opslaan in een SQL database. Deze informatie kan vervolgens worden weergegeven in een gebruiksvriendelijke HTML-interface.

## Projectdoel

---

Het hoofddoel van dit project is om een efficiënte en gebruiksvriendelijke tool te ontwikkelen die:
1. Festivalorganisatoren en muziekliefhebbers snel toegang geeft tot uitgebreide artiestinformatie.
2. Makkelijk invoeren van artiesten uit Spotify om up-to-date informatie te genereren.
3. Een overzichtelijke weergave biedt van alle albums en singles van een artiest.

## Gebruikte technieken

---

Dit project zal worden ontwikkeld met de volgende technieken:

- HTML: Voor de structuur van de webpagina's
- CSS: Voor de styling en layout van de interface
- PHP: Voor de backend logica en interactie met de Spotify API en database
- SQL: Voor het opslaan en ophalen van artiestgegevens
- Spotify API: Voor het verkrijgen van actuele artiestinformatie

## Globale wensen en eisen

---

**Wensen:**
- De applicatie moet alle albums en singles van een artiest tonen.
- Gebruikers moeten door de discografie van een artiest kunnen bladeren.
- De interface moet responsief en gebruiksvriendelijk zijn.

**Eisen:**
- Gebruikers moeten eenvoudig een Spotify URI kunnen invoeren om artiestinformatie op te halen.
- De applicatie moet veilig kunnen communiceren met de Spotify API.
- Artiestgegevens moeten correct worden opgeslagen in de SQL database.
- De weergegeven informatie moet up-to-date zijn met Spotify.

## User Stories

---

### 1. Spotify URI Invoer
- **Prioriteit:** Hoog
- **Tijdsindicatie:** 4 uur
- **Wie:** Als gebruiker van de Festivalinfo applicatie,
- **Wat:** Wil ik een Spotify URI van een artiest kunnen invoeren,
- **Waarom:** Zodat ik snel informatie over die artiest kan opvragen.
- **Realistisch:** Ja, dit is de kern van de applicatie.
- **Definitie van klaar (DoD):**
  - Er is een invoerveld voor de Spotify URI.
  - De ingevoerde URI wordt gevalideerd.
  - Bij een geldige URI wordt de Spotify API aangeroepen.

### 2. Artiestinformatie Ophalen
- **Prioriteit:** Hoog
- **Tijdsindicatie:** 6 uur
- **Wie:** Als systeem,
- **Wat:** Wil ik automatisch alle relevante informatie van een artiest ophalen via de Spotify API,
- **Waarom:** Om een complete dataset van de artiest te verkrijgen.
- **Realistisch:** Ja, mits we rekening houden met API-limieten.
- **Definitie van klaar (DoD):**
  - Connectie met Spotify API is succesvol.
  - Alle albums en singles worden opgehaald.
  - De gegevens worden correct geparsed en voorbereid voor opslag.

### 3. Database Opslag
- **Prioriteit:** Hoog
- **Tijdsindicatie:** 5 uur
- **Wie:** Als systeem,
- **Wat:** Wil ik de opgehaalde artiestinformatie opslaan in de SQL database,
- **Waarom:** Om de gegevens persistent te maken en snel te kunnen ophalen.
- **Realistisch:** Ja, dit is een standaard databaseoperatie.
- **Definitie van klaar (DoD):**
  - Er is een goed ontworpen databaseschema.
  - Alle relevante gegevens worden correct opgeslagen.
  - Er zijn geen dubbele entries.

### 4. Artiestoverzicht Weergeven
- **Prioriteit:** Gemiddeld
- **Tijdsindicatie:** 8 uur
- **Wie:** Als gebruiker,
- **Wat:** Wil ik een overzichtelijke weergave zien van alle albums en singles van de artiest,
- **Waarom:** Om snel inzicht te krijgen in de discografie van de artiest.
- **Realistisch:** Ja, dit is de hoofdfunctionaliteit van de applicatie.
- **Definitie van klaar (DoD):**
  - Er is een duidelijke HTML-structuur voor de weergave.
  - Albums en singles worden chronologisch weergegeven.
  - Basis informatie zoals titel, releasedatum en aantal tracks is zichtbaar.

### 5. Detailweergave Album/Single
- **Prioriteit:** Gemiddeld
- **Tijdsindicatie:** 6 uur
- **Wie:** Als gebruiker,
- **Wat:** Wil ik kunnen doorklikken naar een detailpagina van een album of single,
- **Waarom:** zodat ik meer specifieke informatie over een release kan zien.
- **Realistisch:** Ja, dit verbetert de gebruikerservaring.
- **Definitie van klaar (DoD):**
  - Er is een aparte pagina voor albumdetails.
  - Alle tracks van het album worden weergegeven.
  - Extra informatie zoals duur en populariteit is zichtbaar.

## Planning van dit project

---

Dit project zal worden gerealiseerd in 4 sprints van elk 1 week.

|  Sprint  | User Stories Af te Ronden |
|----------|----------------------------------------------------------|
| Sprint 1 | US-1 (Spotify URI Invoer) |
| Sprint 2 | US-2 (Artiestinformatie Ophalen), US-3 (Database Opslag) |
| Sprint 3 | US-4 (Artiestoverzicht Weergeven) |
| Sprint 4 | US-5 (Detailweergave Album/Single), Testen en Optimalisatie |

## Voortgang bewaken


