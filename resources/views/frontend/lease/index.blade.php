@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card component-border">
            <img class="card-img-top rounded-top img-front" src="{{ asset('images/front.jpg') }}" alt="Card image cap">

            <div class="card-img-overlay">
                <h3 class="card-title justify-content-center align-self-center text-white">
                    Scouts en Gidsen Sint-Joris, Turnhout - Verhuur
                </h3>
            </div>

            <div class="card-body">
                <div class="row"> {{-- new grid needed for the activities and news --}}
                    <div class="col-md-9"> {{-- News --}}
                         <p>
                            Onze Lokalen zijn het hele jaar te huur voor verenigingen.<br>
                            Of je een kampplaats in een mooie, avontuurlijke omgeving met speelterrein voor kinderen;<br>
                            een overnachtings plaats zoekt, of ...! We zijn rustig gelegen nabij het stadspark van Turnhout.
                        </p>

                        <div class="row">
                            <div class="col-md-6">
                                <img class="rounded img-thumbnail" style="width: 400px; height: 200px;" src="{{ asset('images/verhuur-1.jpg') }}" alt="">
                            </div>

                            <div class="col-md-6">
                                <img class="img-rounded img-thumbnail" style="width: 400px; height: 200px;" src="{{ asset('images/verhuur-2.jpg') }}" alt="">
                            </div>                                
                        </div>

                         <p class="lease-text">
                            Onze lokalen Bestaan uit 2 Blokken. Waarin 1 grote zaal en 5 lokalen en sanitaire blok gevestigd zijn. <br> 
                            De grote zaal is polyvalente. Verder is er ook nog een keuken. Deze keuken is voorzien 2 gasfornuizen, <br> 
                            friet ketel,keuken eilend, enz...
                        </p>

                        <div class="row">
                            <div class="col-md-6">
                                <img class="img-rounded img-thumbnail" style="width: 400px; height: 200px;" src="{{ asset('images/verhuur-3.jpg') }}" alt="">
                            </div>

                            <div class="col-md-6">
                                <img class="img-rounded img-thumbnail" style="width: 400px; height: 200px;" src="{{ asset('images/verhuur-4.jpg') }}" alt="">
                            </div>
                        </div>

                        <p class="lease-text">
                            In alle gebouwen is er verwarming aanwezig. Aan de gebouwen grenst er zich een groot grasveld, bos, vuurplaats
                            + u bevindt zich op wandel afstand van het stadspark. U hoeft ook echter 2 km te rijden voor zich u aan een supermarkt bevind.
                        </p>
                    </div> {{-- END news --}}

                    <div class="col-md-3"> {{-- Sidenav --}}
                        @include('frontend.lease.partials.sidenav')
                    </div> {{-- END Sidenav --}}
                </div> {{-- END grid --}}
            </div>
        </div>
    </div>
@endsection