### Ethiek
Bij het ontwerp van deze database heb ik rekening gehouden met ethiek door alleen openbare gegevens van artiesten en festivals te verzamelen en op te slaan. De gegevens die worden toegevoegd, zoals de naam van de artiest, het genre en de Spotify URI, zijn al openbaar beschikbaar. Er is dus bewust gekozen om alleen gegevens op te slaan die niet privé zijn en die iedereen online kan vinden. Dit voorkomt onnodige inbreuk op de privacy van de artiesten.

Daarnaast is het platform bedoeld om bezoekers te informeren over artiesten en festivals zonder dat gebruikers zelf iets kunnen aanpassen. Dit zorgt ervoor dat de gegevens betrouwbaar en accuraat blijven. Door aanpassingsrechten alleen aan de admin toe te wijzen, worden onbedoelde wijzigingen door bezoekers voorkomen, wat de kwaliteit van de gegevens ten goede komt en ethisch verantwoord is.

### Privacy
In dit ontwerp heb ik privacy gewaarborgd door uitsluitend openbare gegevens van artiesten en festivals te gebruiken. Er worden dus geen persoonlijke gegevens van artiesten opgeslagen die niet al openbaar toegankelijk zijn, wat bijdraagt aan de bescherming van hun privacy. Alle informatie over artiesten wordt bijvoorbeeld verkregen via de Spotify API, wat alleen publieke data ophaalt. Dit voorkomt dat onnodige of privé-informatie per ongeluk wordt opgeslagen.

Bovendien hebben alleen beheerders bewerkrechten. Bezoekers kunnen enkel door de database bladeren zonder iets aan te passen. Op deze manier blijft de privacy van de gegevens gewaarborgd, aangezien gebruikers alleen leesrechten hebben en er geen gevoelige of niet-openbare gegevens worden opgeslagen.

### Security
Voor de beveiliging is vooral toegangsbeheer van belang in dit ontwerp. Alleen de admin heeft rechten om artiesten, albums en festivals toe te voegen of aan te passen. Deze beperkingen zijn belangrijk om te voorkomen dat gebruikers per ongeluk of opzettelijk gegevens kunnen wijzigen, wat de dataveiligheid waarborgt en de kans op fouten vermindert.

Ook heb ik aandacht besteed aan het correct vastleggen van relaties tussen artiesten en festivals met behulp van een koppeltabel. Dit zorgt ervoor dat de data-integriteit gewaarborgd blijft en dat de juiste artiesten aan de juiste festivals worden gekoppeld. Verder wordt de Spotify API alleen door de admin gebruikt, wat externe beveiligingsrisico’s verkleint. De API wordt toegepast om publieke informatie van artiesten op te halen met behulp van hun unieke URI, wat ervoor zorgt dat alleen de correcte albums aan de juiste artiesten gekoppeld worden.

Door ethiek, privacy en security op deze manier te integreren, is het systeem gebruiksvriendelijk voor bezoekers en blijft de informatie beschermd en betrouwbaar voor beheerdoeleinden.
