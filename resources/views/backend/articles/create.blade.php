@extends ('layouts.backend')

@section('title')
    <h1> Nieuwsbericht toevoegen</h1>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> <a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('nieuws.index') }}">Nieuws berichten</a></li>
        <li>Bericht toevoegen</li>
    </ol>
@endsection

@section('content')
    <div class="nav-tabs-custom">
        @include('backend.articles.partials.navigation')
        
        <div class="tab-content">
            <div class="tab-pane active">
                
            </div> {{-- /.tab-pane --}}
        </div> {{-- /.tab-content --}}
    </div>
@endsection