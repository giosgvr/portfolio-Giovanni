# Verbetervoorstellen op basis van testen 

### 1. Voorkomen van dubbele artiesten in de database  
De database slaat momenteel dezelfde artiest meerdere keren op als deze dubbel wordt ingevoerd. Dit kan worden opgelost door een aanpassing toe te voegen op de artiest-ID en een controle in de applicatie in te bouwen die dubbele invoer voorkomt. Dit maakt de database efficiënter en voorkomt duplicaten wat in de toekomst voor problemen zou kunnen zorgen(denk aan 2 artiestoverzichten die beide aan andere festivals worden gelinkt).

### 2. Weergave van zowel albums als singles  
Op dit moment worden alleen albums van een artiest weergegeven, terwijl singles ontbreken. Door de parsing aan te passen, kan ook informatie over singles worden opgeslagen en weergegeven. Dit biedt de gebruiker een completer overzicht van de discografie van een artiest. Ook is het zo dat sommige artiesten nog geen albums hebben uitgebracht en wel meerdere singles. Zo krijg je dat een artiestenprofiel totaal niet representatief wordt voor de activiteit van een artiest.

### 3. Correcte afhandeling van API-limieten  
Bij het bereiken van de API-limiet loopt de applicatie vast en toont statuscode: HTTP 429 too many requests . Ondanks het feit dat dit pas gebeurt wanneer je onmenselijk veel verzoeken verstuurt (50+ verzoeken per seconde, per app), is het handig om een backoff-mechanisme te implementeren dat verzoeken tijdelijk pauzeert en later hervat. Dit zorgt ervoor dat de applicatie robuuster wordt.
