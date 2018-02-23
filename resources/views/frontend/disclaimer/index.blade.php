@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card component-border">
            <img class="card-img-top rounded-top img-front" src="{{ asset('images/front.jpg') }}" alt="Card image cap">

            <div class="card-img-overlay">
                <h3 class="card-title justify-content-center align-self-center text-white">
                    Scouts en Gidsen Sint-Joris, Turnhout - Disclaimer
                </h3>
            </div>

            <div class="card-body">
                <div class="row"> {{-- new grid needed for the activities and news --}}
                    <div class="col-md-12"> {{-- Disclaimer --}}
                        <p>
                            Deze website is eigendom van Scouts En Gidsen Sint-Joris, Turnhout. Door de toegang tot en het gebruik 
                            van de website verklaart u zich uitdrukkelijk akkoord met de volgende algemene voorwaarden.
                        </p>

                        <h3 class="title-news">Intellectuele eigendomsrechten</h3>

                        <p>
                            De inhoud van deze site met inbegrip van de merken, logo's, tekeningen, data, product of bedrijfsnamen,
                            teksten, beelden e.d zijn beqschermd door intellectuele rechten en behoren toe aan Scouts en Gidsen Sint-Joris, Turnhout 
                            of rechthoudende derden.
                        </p>

                        <h3 class="title-news">Beperking van aansprakelijkheid</h3>

                        <p>
                            De informatie op de website is van algemene aard. De informatie is niet aangepast aan persoonlijke of specifieke 
                            omstandigheden, en kan dus niet als persoonlijk, professioneel of juridisch advies aan de gebruiken worden beschouwd. 
                        </p>     

                        <p>
                            Scouts en Gidsen Sint-Joris, Turnhout levert grote inspanningen opdat de ter beschikking gestelde informatie juist volledig. juist,
                            nauwkeurig en bijgewerkt zou zijn. Ondanks deze inspanningen kunnen onjuistheden zich voordoen in de ter beschiikking gestelde informatie.
                            Indien de verstrekte informatie onjuistheden zou bevatten of indien bepaalde informatie op of via de site onbeschikbaar zou zijn, 
                            zal Scouts en Gidsen Sint-Joris, Turnhout de grootst mogelijke inspanning leveren om dit zo snel mogelijk recht te ztten.
                            Scouts en Gidsen Sint-Joris, Turnhout kan evenwel niet aansprakelijk worden gesteld voor rechtstreekse of onrechtstreekse schade die ontstaan 
                            uit het gebruik van de informatie op deze site. Indien u onjuistheden zou vaststellen in de informatie die via de site ter beschikking wordt gesteld, 
                            kan u de beheerder van de site contacteren.
                        </p> 

                        <p>
                            De inhoud van de site (links inbegrepen) lan te allen tijde zonder aankondiging of kennisgeving aangepast, 
                            gewijzigd of aangevuld worden. Scouts en Gidsen Sint-Joris, Turnhout geeft geen garanties voor de goede werking 
                            van de website en kan op geen enkele wijze aansprakelijk gehouden worden voor een slechte werking of tijdelijke 
                            (on)beschikbaarheid van de webite of voor enige vorm van schade, rechtstreekse of onrechtstreekse, die zou voortvloeien
                            it de toegang tot of het gebruik van de website.
                        </p>                  

                        <p>
                            Scouts en Gidsen Sint-Joris, Turnhout kan in geen geval tegenover wie dan ook op directe of indirecte,
                            bijzondere of andere wijze aansprakelijk worden gesteld voor schade te wijten aan het gebruik van deze site of van een andere, 
                            inzonderheid als gevolg van links of hyperlinnks, met inbegrip, zonder beperking, van alle verliezen, erkonderbrekingen, beschadiging van programma's of andere 
                            gegevens op het computersyseen, van apperatuur, programmatuur of andere van de gebruiker.
                        </p>

                        <p>
                            De website kan hyperlinks bevatten naar websites of pagina's van derden, of daar onrechtstreeks naar verwijzen. Het plaatsten van links naar deze websites of pagina's 
                            impliceert op geen enkele wijze een impliciete goedkeuring van de inhoud ervan. Activisme_be verklaart uitdrukkelijk dat zij geen zeggenschap heeft over de inhoud over 
                            de inhoud of over andere kenmerken van deze websites en kan in geen geval aansprakelijk gehouden worden voor de inhoud of de kenmerken ervan of voor enige andere vorm 
                            van schade door het gebruik ervan.
                        </p>
                    </div> {{-- END disclaimer --}}
                </div> {{-- END grid --}}
            </div>
        </div>
    </div>
@endsection