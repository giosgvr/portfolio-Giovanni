# Festivalinfo Spotify Integratie Project

---

### Giovanni Slagveer

## Introductie

---

Dit project is gericht op het creëren van een webapplicatie voor Festivalinfo die gebruik maakt van de Spotify API om gedetailleerde informatie over artiesten op te halen en weer te geven. Door simpelweg de Spotify URI van een artiest in te voeren, zal de applicatie automatisch alle albums en singles van de artiest ophalen en opslaan in een SQL database. Deze informatie kan vervolgens worden weergegeven in een gebruiksvriendelijke HTML-interface. Er werd specifiek gekozen om met PHP en HTML te werken, simpelweg omdat dit een vereiste was van de stagebegeleider.

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

## Definition of Done

---

- Code is geimplementeerd en functioneert volgens de acceptatiecriteria van de user story.
- Unit tests zijn geschreven en succesvol uitgevoerd.
- Nieuwe code breekt geen bestaande functionaliteit.
- Code is netjes en overzichtelijk geschreven.
- User story is duidelijk geschreven.

## Globale wensen en eisen

---

**Wensen:**

- De applicatie moet alle albums en singles van een artiest tonen.
- Gebruikers moeten door de discografie van een artiest kunnen bladeren.
- De weergegeven informatie moet up-to-date zijn met Spotify.

**Eisen:**
- De interface moet responsief en gebruiksvriendelijk zijn.
- Gebruikers moeten eenvoudig een Spotify URI kunnen invoeren om artiestinformatie op te halen.
- De applicatie moet veilig kunnen communiceren met de Spotify API.
- Artiestgegevens moeten correct worden opgeslagen in de SQL database.

## User Stories

---

### 1. Spotify URI Invoer

- **Prioriteit:** Hoog
- **Tijdsindicatie:** 4 uur
- **Wie:** Als gebruiker van de Festivalinfo applicatie,
- **Wat:** Wil ik een Spotify URI van een artiest kunnen invoeren,
- **Waarom:** Zodat ik snel informatie over die artiest kan opvragen.
- **Realistisch:** Ja, dit is de kern van de applicatie.
- **Definitie van Ready (DoR):**
  - Er is een invoerveld voor de Spotify URI.
  - Validatie van de URI geïmplementeerd.
  - Succesvolle integratie met Spotify API.

### 2. Artiestinformatie Ophalen

- **Prioriteit:** Hoog
- **Tijdsindicatie:** 4 uur
- **Wie:** Als systeem,
- **Wat:** Wil ik automatisch alle relevante informatie van een artiest ophalen via de Spotify API,
- **Waarom:** Om een complete dataset van de artiest te verkrijgen.
- **Realistisch:** Ja, mits we rekening houden met API-limieten.
- **Definitie van Ready (DoR):**
  - Succesvolle verbinding met Spotify API.
  - Volledige en relevante gegevens opgehaald.
  - Gegevens correct verwerkt en voorbereid.

### 3. Database Opslag

- **Prioriteit:** Hoog
- **Tijdsindicatie:** 4 uur
- **Wie:** Als systeem,
- **Wat:** Wil ik de opgehaalde artiestinformatie opslaan in de SQL database,
- **Waarom:** Om de gegevens persistent te maken en snel te kunnen ophalen.
- **Realistisch:** Ja, dit is een standaard databaseoperatie.
- **Definitie van Ready (DoR):**
  - Database schema geïmplementeerd en getest.
  - Gegevens correct en volledig opgeslagen.
  - Mechanisme tegen duplicaten geïmplementeerd.

### 4. Artiestoverzicht Weergeven

- **Prioriteit:** Gemiddeld
- **Tijdsindicatie:** 6 uur
- **Wie:** Als gebruiker,
- **Wat:** Wil ik een overzichtelijke weergave zien van alle albums en singles van de artiest,
- **Waarom:** Om snel inzicht te krijgen in de discografie van de artiest.
- **Realistisch:** Ja, dit is de hoofdfunctionaliteit van de applicatie.
- **Definitie van Ready (DoR):**
  - Overzicht correct en gebruiksvriendelijk weergegeven.
  - Chronologische weergave volledig functioneel.
  - Relevante informatie duidelijk zichtbaar.

### 5. Detailweergave Album/Single

- **Prioriteit:** laag
- **Tijdsindicatie:** 4 uur
- **Wie:** Als gebruiker,
- **Wat:** Wil ik kunnen doorklikken naar een detailpagina van een album of single,
- **Waarom:** zodat ik meer specifieke informatie over een release kan zien.
- **Realistisch:** Ja, dit verbetert de gebruikerservaring.
- **Definitie van Ready (DoR):**
  - Detailpagina functioneel en toegankelijk.
  - Tracks en aanvullende informatie volledig weergegeven.
  - Consistente navigatie en lay-out.

### 6. Festivaloverzicht incl. artiesten

- **Prioriteit:** laag
- **Tijdsindicatie:** 2 uur
- **Wie:** Als gebruiker van de Festivalinfo applicatie,
- **Wat:** Wil ik artiesten kunnen linken aan een festival,
- **Waarom:** overzichtelijk kan zien welke artiest waar op moet treden.
- **Realistisch:** Ja, dit is een kwestie van een aantal extra pagina's maken + een database sectie.
- **Definitie van Ready (DoR):**

  - Festivaloverzichtspagina volledig functioneel.
  - Functionaliteit voor het linken van artiesten aan festivals.
  - Detailpagina voor festivals met artiestenlijst.

  ### 7. up-to-date houden van de data

- **Prioriteit:** laag
- **Tijdsindicatie:** 2 uur
- **Wie:** Als gebruiker van de Festivalinfo applicatie,
- **Wat:** Wil ik dat de data automatisch word geupdate
- **Waarom:** zodat de data altijd up to date is.
- **Realistisch:** opzich wel maar dit is geen vereiste.
- **Definitie van Ready (DoR):**
  - Automatische updatefunctionaliteit geïmplementeerd en getest
  - Data altijd up-to-date zichtbaar voor gebruikers
  - Documentatie en monitoring aanwezig

## Planning van dit project

---

Dit project zal worden gerealiseerd in 4 sprints van elk 1 dag.

| Sprint   | User Stories Af te Ronden                                                                                       |
| -------- | --------------------------------------------------------------------------------------------------------------- |
| Sprint 1 | US-1 (Spotify URI Invoer), US-2 (Artiestinformatie Ophalen)                                                     |
| Sprint 2 | US-3 (Database Opslag), US-4 (Artiestoverzicht Weergeven)                                                       |
| Sprint 3 | US-4 (Artiestoverzicht Weergeven), US-5 (Detailweergave Album/Single), US-6 (Festivaloverzicht incl. artiesten) |
| Sprint 4 | US-7 (Up-to-date houden van data), Testen en Optimalisatie                                                      |

## Onderbouwing

De uren die aan de verschillende user stories zijn gekoppeld, zijn gebaseerd op een inschatting van de benodigde tijd om de functionaliteiten te realiseren.
Hierbij hebben we gekeken naar de complexiteit van de taken, eventuele afhankelijkheden tussen user stories en het realistisch indelen van de beschikbare tijd in vier sprints.

Allereerst hebben we de complexiteit beoordeeld.
Simpele taken, zoals het toevoegen van een invoerveld (US-1) of het koppelen van artiesten aan festivals (US-6), zijn minder tijdsintensief en hebben daarom een lagere tijdsindicatie gekregen.
Aan de andere kant kosten meer complexe onderdelen, zoals het ophalen van data via de Spotify API (US-2) of het maken van een overzichtelijke lay-out voor artiesten (US-4), meer tijd.

Daarnaast hebben we gekeken naar afhankelijkheden.
Sommige user stories, zoals het opslaan van gegevens in een database (US-3) en het tonen van een artiestoverzicht (US-4), zijn afhankelijk van de functionaliteit voor het ophalen van data (US-2).
Dit heeft invloed gehad op de planning en prioriteit.

De planning is verder afgestemd op de beschikbare tijd.
Om een goede voortgang te waarborgen, hebben we een mix van eenvoudige en complexere taken per sprint ingepland.
Zo houden we de werkdruk beheersbaar en kunnen we zorgen voor een efficiënte voortgang.

Tot slot hebben we prioriteit gegeven aan de kernfunctionaliteiten van de applicatie, zoals het invoeren van een Spotify URI, het ophalen van artiestinformatie en het opslaan van die informatie in de database (US-1, US-2, US-3).
Deze onderdelen hebben we voldoende tijd gegeven om stabiliteit en een goede werking te garanderen.
Minder essentiële, maar gebruikersvriendelijke functies, zoals het koppelen van artiesten aan festivals (US-6) of het automatisch up-to-date houden van data (US-7), hebben minder tijd toegewezen gekregen.

Met deze aanpak zorgen we ervoor dat alle belangrijke functies binnen de beschikbare tijd gerealiseerd worden, met in Sprint 4 nog ruimte voor testen en optimalisatie.

## Voortgang bewaken

### Voortgangsbewaking

Gedurende de sprints heb ik de voortgang van het project nauwlettend bewaakt en waar nodig aanpassingen gemaakt om ervoor te zorgen dat we belangrijke functionaliteiten niet uit het oog verloren. 

De implementatie van **User Story 2 (Artiestinformatie Ophalen)** bleek meer tijd te kosten dan oorspronkelijk ingeschat, waardoor deze moest worden verplaatst naar Sprint 2.
Dit had gevolgen voor de planning van **User Story 4 (Artiestoverzicht Weergeven)**, waarvan een groter gedeelte nu in Sprint 3 moest worden opgenomen om alles op tijd af te krijgen.
Als gevolg hiervan heb ik **User Story 6 (Festivaloverzicht incl. artiesten)** naar Sprint 4 moeten verschuiven, aangezien er niet voldoende tijd meer over was in Sprint 3 om deze af te ronden.
Ook heb ik **User Story 7** geschrapt, zodat er voldoende ruimte overbleef voor testen en het optimaliseren van de reeds gerealiseerde functionaliteiten.

Door deze aanpassingen te maken, kon ik ervoor zorgen dat de belangrijkste functionaliteiten werden voltooid en er voldoende tijd overbleef voor grondig testen in de laatste sprint.
