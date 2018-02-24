@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card component-border">
            <img class="card-img-top rounded-top img-front" src="{{ asset('images/front.jpg') }}" alt="Card image cap">

            <div class="card-img-overlay">
                <h3 class="card-title justify-content-center align-self-center text-white">
                    Scouts en Gidsen Sint-Joris, Turnhout - Privacy beleid
                </h3>
            </div>

            <div class="card-body">
                <div class="row"> {{-- new grid needed for the activities and news --}}
                    <div class="col-md-12"> {{-- Disclaimer --}}
                        <p class="lead">Scouts en Gidsen - Sint-Joris, Turnhout hecht waarde en belang aan uw privacy.</p>

                        <p>In geval de gebruiker van de website om persoonlijke informatie gevraagd wordt:</p>

                        <p>
                            De verantwoordelijke voor de verwerking, Scouts en Gidsen Sint-Joris, Turnhout respecteert de Belgische
                            wetgeving van 8 december 1992 met betrekking tot de bescherming van het priveleven in de verwerking van
                            de persoonlijke gegeven. De door u megedeelde persoonsgegevens zullen gebruikt worden voor de volgende doeleinden:
                            Ons ledenbeheer en het verwerken van verhuringen. 
                        </p>

                        <p>
                            U beschikt over een wettelijk recht op inzage en eventuele correctie van uw persoonsgegevens. Met bewijs van identiteit (kopie identiteitskaart)
                            kunt u via een schriftelijke gedateerde en ondertekende aanvraag aan <a href="contact@st-joris-turnhout.">Scouts en Gidsen Sint-Joris, Turnhout</a>
                            gratis de schriftelijke mededeling bekomen van uw persoonsgegevens. Indien nodig kunt u ook vragen de gegevens te corrigeren die onjuist,
                            niet volledig of pertinent zouden zijn.
                        </p>

                        <p>
                            Het is mogelijk dat de verkregen persoonsgegevens worden doorgegeven aan de de technische mensen van Scouts en Gidsen Sint-Joris, Turnhout.
                            Uw persoonsgegevens worden niet doorgegeven aan derde partijen.
                        </p>

                        <p>
                            De technische mensen van Scouts en Gidsen Sint-Joris, Turnhout kunnen ook tevens geaggregeerde gegevens verzamelen van niet 
                            persoonlijke aard. Zoals browser type of IP adres, het besturingsprogramma dat u gebruikt of de domeinnaam van de website langs
                            waar u op deze website gekomen bent, of waarlangs u deze verlaat. Dit maakt het mogelijk voor ons om de wbesite permanent te optimaliseren
                            voor de gebruikers 
                        </p>

                        <h3 class="title-news">Het gebruik van "cookies"</h3>

                        <p>
                            Tijdens een bezoek aan de site kunnen 'cookies' op de harde schrijf van uw computer geplaatst worden. 
                            Een cookie is een tekstbestand dat door de server van een website in de browser van uw computer of op uw mobiel apperaat 
                            geplaatst wordt wanneer u een website raadpleegt. Cookie kunnen niet worden gebruikt om personen te identificeren, een cookie kan selechts 
                            een machine indentificeren.
                        </p>

                        <p>
                            U kan uw internetbrowser zodaning instellen dat cookies niet worden geaccepteerd. Dat u een waarschuwing ontvangt wanneer een cookie geinstalleerd wordt 
                            of dat de cookies nadien van uw harde schrijf worden verwijderd. Dit kan u doen via de instellingen van uw browser (via de help functie). 
                            Hou er hierbij wel rekening dat bepaalde grafische elementen niet correct kunnen verschijnven, of dat u bepaalde applicaties niet zal kunnen gebruiken.
                        </p>

                        <p>Door gebruik van onze website, gaat u akkoort met ons gebruik van cookies.</p>

                        <h3 class="title-news">Google analytics</h3>

                        <p>
                            Deze website maakt gebruik van Google Analytics. een webanalyse-service die wordt aangeboden door Google Inc. Google Analytics maakt gebruik van "cookies". 
                            (tekstbestandjes die op uw computer worden geplaatst) Om de website te helpen analyseren hoe de gebruikers de site gebruiken. De door het cookie gegenereerde 
                            informatie over uw gebruik van de website (met inbegrip van uw ip-adres) wordt overgebracht naar en door Google opgeslagen op servers in de Vernigde Staten. 
                            Google gebruikt deze informatie om bij te houden hoe u de website gebruikt, rapporten over de website-activiteit op te stellen voor de website-exploitanten en 
                            andere diensten aan te bieden met betrekking tot website-activiteit en internetgebruik. Google mag deze informatie aan derden verschaffen indien 
                            Google hiertoe wettelijk wordt verplicht, of voor zover deze derden deze informatie verwerken namens Google. Google zal uw ip-adres niet combineren met andere gegevens waarover Google beschikt.
                        </p>
                    </div> {{-- END disclaimer --}}
                </div> {{-- END grid --}}
            </div>
        </div>
    </div>
@endsection