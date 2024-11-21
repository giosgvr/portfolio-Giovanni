# Spotify URI Invoer

## User Story
- **Wie:** Als gebruiker van de Festivalinfo-applicatie,
- **Wat:** Wil ik een Spotify URI van een artiest kunnen invoeren,
- **Waarom:** Zodat ik snel informatie over die artiest kan opvragen.

## Doel van de test
Controleren of de functionaliteit om een Spotify URI in te voeren werkt zoals bedoeld, inclusief:
- Weergave van het invoerveld.
- Valideren van ingevoerde URI’s.
- Ophalen van artiestinformatie via de Spotify API.

## Gerelateerde user story
- **Weergave van artiestinformatie**: Controleert dat de informatie correct wordt weergegeven na invoer van een geldige URI.

## Scenario’s om te testen
1. Een geldige URI invoeren.
2. Een ongeldige URI invoeren.
3. Een leeg invoerveld verzenden.


---

# Testscenario’s: Spotify URI Invoer

## Scenario 1: Geldige URI invoeren
### Hoofdscenario:
| **Stap** | **Actie**                     | **Testdata**          | **Verwacht resultaat**                                |
|----------|-------------------------------|-----------------------|------------------------------------------------------|
| 1        | Navigeer naar de applicatie   | -                     | Applicatie wordt geladen zonder fouten.             |
| 2        | Voer een geldige Spotify URI in | `spotify:artist:6zEaCvF0CqEHs7kFyBkLHi` | De invoer wordt geaccepteerd.                       |
| 3        | Klik op de verzendknop        | -                     | De Spotify API wordt aangeroepen en geeft albums ,indien aanwezig, terug van de artiest. |

### Alternatief scenario 1: Voer een onvolledige URI in
| **Stap** | **Actie**                     | **Testdata**          | **Verwacht resultaat**                                |
|----------|-------------------------------|-----------------------|------------------------------------------------------|
| 1        | Voer een onvolledige URI in   | `spotify:artist:`      | Er verschijnt een foutmelding: "Ongeldige URI of artiest niet gevonden. Probeer opnieuw." |

### Alternatief scenario 2: doe een verzoek zonder netwerkverbinding
| **Stap** | **Actie**                     | **Testdata**          | **Verwacht resultaat**                                |
|----------|-------------------------------|-----------------------|------------------------------------------------------|
| 1        | Doe een verzoek zonder netwerkverbinding | -                     | Er verschijnt een foutmelding: "Geen netwerkverbinding beschikbaar." |

---

## Scenario 2: Ongeldige URI invoeren
| **Stap** | **Actie**                     | **Testdata**          | **Verwacht resultaat**                                |
|----------|-------------------------------|-----------------------|------------------------------------------------------|
| 1        | Voer een willekeurige string in als URI | `testinvoer` | Foutmelding: "Ongeldige URI of artiest niet gevonden. Probeer opnieuw."           |
| 2        | Klik op de verzendknop        | -                     | Geen API-aanroep. De foutmelding blijft zichtbaar.   |

---

## Scenario 3: Leeg invoerveld verzenden
| **Stap** | **Actie**                     | **Testdata**          | **Verwacht resultaat**                                |
|----------|-------------------------------|-----------------------|------------------------------------------------------|
| 1        | Laat het invoerveld leeg      | -                     | Een foutmelding verschijnt: "Het invoerveld mag niet leeg zijn." |

---

# Testrapport: Spotify URI Invoer

| **Testcase**                        | **Resultaat**     | **Opmerkingen**                                                                 |
|-------------------------------------|-------------------|---------------------------------------------------------------------------------|
| **Scenario 1: Geldige URI invoeren**| Geslaagd       | Artiestinformatie wordt correct opgehaald en weergegeven.                      |
| **Alternatief scenario 1: Voer een onvolledige URI in**|  Geslaagd      | Correcte foutmelding weergegeven. "Ongeldige URI of artiest niet gevonden. Probeer opnieuw ".                     |
| **Alternatief scenario 2: doe een verzoek zonder netwerkverbinding**|  Geslaagd      | Correcte foutmelding weergegeven. "Geen netwerkverbinding beschikbaar."                     |
| **Scenario 2: Ongeldige URI invoeren**|  Geslaagd      | Correcte foutmelding weergegeven. Geen API-aanroep gedaan.                     |
| **Scenario 3: Leeg invoerveld verzenden**|  Geslaagd     | Correcte foutmelding weergegeven. "Het invoerveld mag niet leeg zijn."                              |

## Conclusie
- De functionaliteit voor invoer van een Spotify URI werkt zoals bedoeld. 
- Alle scenario’s tonen aan dat de applicatie adequaat omgaat met geldige en ongeldige invoer, en lege velden.
- **Samenhang met andere user stories:** Het correct valideren en verwerken van de URI maakt het mogelijk om artiestinformatie correct weer te geven in het artiestenoverzicht.

---
---

# Artiestinformatie Ophalen

## User Story
- **Wie:** Als systeem,  
- **Wat:** Wil ik automatisch alle relevante informatie van een artiest ophalen via de Spotify API,  
- **Waarom:** Om een complete dataset van de artiest te verkrijgen.

---

## Doel van de test
Controleren of de functionaliteit om artiestinformatie via de Spotify API op te halen werkt zoals bedoeld, inclusief:
- Correcte connectie met de Spotify API.
- Ophalen van alle albums, singles, en aanvullende artiestinformatie.
- Juistheid van parsing en voorbereide gegevens.

---

## Gerelateerde user story
- **Spotify URI Invoer:** Verifieert dat een geldige URI wordt aangeleverd voor het ophalen van artiestinformatie.

---

## Scenario’s om te testen
1. Een geldige URI leidt tot correcte artiestinformatie.
2. Geen resultaten bij een onbekende artiest.
3. Foutafhandeling bij API-problemen.
4. Controle op API-limieten.
5. Netwerkproblemen.

---

## Testscenario’s: Artiestinformatie Ophalen

### Scenario 1: Geldige URI leidt tot correcte artiestinformatie
#### Hoofdscenario:
| **Stap** | **Actie**                     | **Testdata**          | **Verwacht resultaat**                                |
|----------|-------------------------------|-----------------------|------------------------------------------------------|
| 1        | Aanroepen van Spotify API met een geldige URI | `spotify:artist:6zEaCvF0CqEHs7kFyBkLHi` | API retourneert artiestinformatie inclusief albums en singles. |
| 2        | Parse de ontvangen gegevens   | JSON-response met artiestinformatie | De gegevens worden correct geparsed en klaargemaakt voor opslag. |

#### Alternatief scenario 1: Voer een onvolledige URI in
| **Stap** | **Actie**                     | **Testdata**          | **Verwacht resultaat**                                |
|----------|-------------------------------|-----------------------|------------------------------------------------------|
| 1        | Voer een incomplete URI in    | `spotify:artist:`     | Er verschijnt een foutmelding: "Ongeldige URI of artiest niet gevonden. Probeer opnieuw." |


#### Alternatief scenario 2: Artiest heeft geen albums of singles
| **Stap** | **Actie**                     | **Testdata**          | **Verwacht resultaat**                                |
|----------|-------------------------------|-----------------------|------------------------------------------------------|
| 1        | Aanroepen van Spotify API met een geldige URI | `spotify:artist:1234567890abcdef` | API retourneert een geldige response zonder albums of singles. |
| 2        | Controleer de response         | Lege albums/singles-sectie in JSON | De applicatie toont melding: "Geen albums of singles gevonden voor deze artiest." |

---

### Scenario 2: Geen resultaten bij een onbekende artiest
| **Stap** | **Actie**                     | **Testdata**          | **Verwacht resultaat**                                |
|----------|-------------------------------|-----------------------|------------------------------------------------------|
| 1        | Aanroepen van Spotify API met een onbekende URI | `spotify:artist:unknown` | API retourneert een lege dataset of foutmelding. |
| 2        | Controleer de response         | Lege dataset          | Toont melding: "Geen resultaten gevonden."          |

---

### Scenario 3: Controle op API-limieten
| **Stap** | **Actie**                     | **Testdata**          | **Verwacht resultaat**                                |
|----------|-------------------------------|-----------------------|------------------------------------------------------|
| 1        | Verstuur meerdere API-verzoeken binnen korte tijd | 10+ verzoeken        | De applicatie pauzeert en toont melding: "API-limiet bereikt." |

---

# Testrapport: Artiestinformatie Ophalen

| **Testcase**                        | **Resultaat**     | **Opmerkingen**                                                                 |
|-------------------------------------|-------------------|---------------------------------------------------------------------------------|
| **Scenario 1: Geldige URI**         | Geslaagd          | API retourneert correcte artiestinformatie en parsing is succesvol.            |
| **Alternatief scenario 1: Voer een onvolledige URI in**     | Geslaagd          | Correcte foutmelding weergegeven. "Ongeldige URI of artiest niet gevonden. Probeer opnieuw "                                  |
| **Alternatief scenario 2: Artiest heeft geen albums of singles**     | Niet geslaagd          | Artiest word geverifieerd en toegevoegd ook als er geen albums en/of singles op de pagina zijn.                                  |
| **Scenario 2: Geen resultaten**     | Geslaagd          | Lege dataset correct afgehandeld met melding.                                  |
| **Scenario 3: API-limieten**        | Niet geslaagd     | limietoverschrijding komt niet naar voren. er kunnen meerdere verzoeken binnen 30 seconden worden gedaan waardoor het niet mogelijk is door het programma te laten vastlopen. |

---

## Conclusie
- De functionaliteit voor het ophalen van artiestinformatie werkt zoals bedoeld. 
- (Bijna) alle scenario’s tonen aan dat de applicatie adequaat omgaat met geldige en foutieve situaties.
- **Samenhang met andere user stories:** Correcte implementatie van het ophalen en verwerken van artiestinformatie is essentieel voor het tonen van gegevens aan de gebruiker.

---
---

