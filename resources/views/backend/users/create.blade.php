@extends('layouts.backend')

@section('title')
    <h1>Nieuwe gebruiker toevoegen</h1>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><i class="fa fa-fw fa-dashboard"></i> <a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('gebruikers.index') }}">Gebruikers overzicht</a></li>
        <li>Gebruiker toevoegen</li>
    </ol>
@endsection

@section('content')
    <div class="nav-tabs-custom">
        @include('backend.users.partials.navigation')
        
        <div class="tab-content">
            <div class="tab-pane active">
                
                <form class="form-horizontal" method="POST" action="{{ route('gebruikers.store') }}">
                    @csrf {{-- Form field protection --}}

                    <div class="form-group">
                        <label class="control-label col-md-2">Naam: <span class="text-danger">*</span></label>

                        <div class="col-md-5">
                            <input type="text" class="form-control" placeholder="Voor en achternaam">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2">E-mail adres: <span class="text-danger">*</span></label>
                    
                        <div class="col-md-5">
                            <input type="text" class="form-control" placeholder="E-mail adres van de gebruiker">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-10">
                            <button type="submit" class="btn btn-sm btn-success">
                                <i class="fa fa-check"></i> Opslaan
                            </button>

                            <a href="{{ route('gebruikers.index') }}" class="btn btn-sm btn-danger">
                                <i class="fa fa-undo"></i> Annuleren
                            </a>
                        </div>
                    </div>
                </form>

            </div> {{-- /.tab-pane --}}
        </div> {{-- /.tab-content --}}
    </div>
@endsection