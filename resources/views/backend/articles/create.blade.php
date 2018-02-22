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

                    <div class="form-group">
                        <label class="control-label col-md-2">Titel: <span class="text-danger">*</span></label>

                        <div class="col-md-4">
                            <input type="text" class="form-control" placeholder="Titel van het nieuwsbericht">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-2">Status: <span class="text-danger">*</span></label>

                        <div class="col-md-4">
                            <select class="form-control" name="status">
                                <option>-- Selecteer een status voor het nieuws bericht --</option>
                                
                                {{-- Status indicators --}}
                                <option value="true" @if (old('status') == 'true') selected @endif> Publiceer nieuws bericht </option>
                                <option value="false" @if (old('status') == 'false') selected @endif> Klad versie van een nieuwsbericht </option>
                             </select>
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