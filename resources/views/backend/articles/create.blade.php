@extends ('layouts.backend')

@section('title')
    <h1> Nieuwsbericht toevoegen</h1>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><i class="fa fa-fw fa-dashboard"></i> <a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('nieuws.index') }}">Nieuws berichten</a></li>
        <li>Bericht toevoegen</li>
    </ol>
@endsection

@section('content')
    <div class="nav-tabs-custom">
        @include('backend.articles.partials.navigation')
        
        <div class="tab-content">
            <div class="tab-pane active">
                <form method="POST" action="{{ route('nieuws.store') }}" class="form-horizontal">
                    @csrf {{-- Form field protection --}}

                    <div class="form-group @error('titel', 'has-error')">
                        <label class="control-label col-md-2">Titel: <span class="text-danger">*</span></label>

                        <div class="col-md-4">
                            <input type="text" class="form-control" @input('titel') placeholder="Titel van het nieuwsbericht">
                            @error('titel')
                        </div>
                    </div>

                    <div class="form-group @error('status', 'has-error')">
                        <label class="control-label col-md-2">Status: <span class="text-danger">*</span></label>

                        <div class="col-md-4">
                            <select class="form-control" @input('status')>
                                <option value="">-- Selecteer een status voor het nieuws bericht --</option>
                                
                                {{-- Status indicators --}}
                                <option value="1" @if (old('status')) selected @endif> Publiceer nieuws bericht </option>
                                <option value="0" @if (old('status')) selected @endif> Klad versie van een nieuwsbericht </option>
                            </select>

                             @error('status') {{-- Validation error view instance.  --}} 
                        </div>
                    </div>

                    <div class="form-group @error('bericht', 'has-error')">
                        <label class="control-label col-md-2">Bericht: <span class="text-danger">*</span></label>

                        <div class="col-md-8">
                            <textarea id="article-body" @input('bericht') placeholder="Welk nieuws wil je delen met de wereld?">{{ old('bericht') }}</textarea>
                            
                            @if ($errors->has('bericht'))
                                @error('bericht')
                            @else
                                <span class="help-block">
                                    <span class="text-danger">*</span> 
                                    Dit veld is <a href="">markdown</a> ondersteund.
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-offset-2 col-md-10">
                            <button class="btn btn-sm btn-success" type="submit">
                                <i class="fa fa-check"></i> Opslaan
                            </button>

                            <a href="{{ route('nieuws.index') }}" class="btn btn-sm btn-danger">
                                <i class="fa fa-undo"></i> Annuleren
                            </a>
                        </div>
                    </div>

                </form>
            </div> {{-- /.tab-pane --}}
        </div> {{-- /.tab-content --}}
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/trumbowyg.js') }}"></script>
    <script>
        $('#article-body').trumbowyg({
            lang: 'nl', 
            svgPath: '/fonts/trumbowyg/icons.svg',
        });
        </script>
@endpush

@push('stylesheets')
    <link rel="stylesheet" href="{{ asset('css/trumbowyg.css') }}">
@endpush