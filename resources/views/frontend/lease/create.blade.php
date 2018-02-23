@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card component-border">
            <img class="card-img-top rounded-top img-front" src="{{ asset('images/front.jpg') }}" alt="Card image cap">

            <div class="card-img-overlay">
                <h3 class="card-title justify-content-center align-self-center text-white">
                    Scouts en Gidsen Sint-Joris, Turnhout - Verhuur aanvragen
                </h3>
            </div>

            <div class="card-body">
                <div class="row"> {{-- new grid needed for the activities and news --}}
                    <div class="col-md-9"> {{-- lease request content --}}
                         <p>
                            Heb je intresse in onze lokalen als kampplaats, weekend, of bijeenkomst?
                            Dan kun je hier een verhuring aanvragen. Tijdens het werkingsjaar (September - Juni)
                            verhuren wij het laatste weekend van de maand niet.
                        </p>

                        <hr>

                        @include('flash::message')

                        <form action="{{ route('verhuur.store') }}" method="POST">
                            @csrf {{-- Form field protection --}}

                            <div class="form-group row">
                                <label class="col-md-3 col-form-label"><strong>Periode <span class="text-danger">*</span></strong></label>

                                <div class="col-md-4">
                                    <input type="date" @input('start_datum') class="form-control" placeholder="Start datum verhuring">
                                </div>

                                 <label class="text-center col-md-1 col-form-label">tot</label>

                                 <div class="col-md-4">
                                    <input type="date" @input('eind_datum') class="form-control" placeholder="Start datum verhuring">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 col-form-label"><strong>Groep/Persoon <span class="text-danger">*</span></strong></label>

                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="Naam van de groep of uw naam">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 col-form-label"><strong>Contact email <span class="text-danger">*</span></strong></label>

                                <div class="col-md-9">
                                    <input type="email" class="form-control" placeholder="Email adres v/d groep of persoon">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 col-form-label"><strong>Tel. Nr</strong></label>

                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="Tel nr. zodat we je indien nodig ook telefonisch kunnen contacteren">
                                </div>
                            </div>

                            <hr>

                            <div class="form-group row">
                                <label class="col-md-3 col-form-label"><strong>Extra info</strong></label>

                                <div class="col-md-9">
                                    <textarea class="form-control" rows="5" placeholder="Extra informatie indien dit nodig is."></textarea>
                                </div>
                            </div>

                            <hr>

                            <div class="form-group row">
                                <div class="offset-md-3 col-md-10">
                                    <button type="submit" class="btn btn-outline-success">
                                        <i class="fas fa-check"></i> aanvragen
                                    </button>

                                    <button type="reset" class="btn btn-outline-danger">
                                        <i class="fas fa-undo"></i> annuleren
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div> {{-- END lease request content --}}

                    <div class="col-md-3"> {{-- Sidenav --}}
                        @include('frontend.lease.partials.sidenav')
                    </div> {{-- END Sidenav --}}
                </div> {{-- END grid --}}
            </div>
        </div>
    </div>
@endsection