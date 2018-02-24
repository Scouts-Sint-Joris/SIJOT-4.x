@extends('layouts.backend')

@section('title')
    <h1>Takken <small>Beheerspaneel</small></h1>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><i class="fa fa-fw fa-dashboard"></i> <a href="{{ route('home') }}">Home</a></li>
        <li>Takken</li>
    </ol>
@endsection

@section('content')
     <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            @foreach($groups as $navItem) {{-- Loop through the titles for the navigation --}}
                <li class="@if ($loop->first) active @endif">
                    <a data-toggle="tab" href="#{{ $navItem->slug }}">
                        <i class="fa fa-fw fa-leaf"></i> {{ $navItem->titel }}
                    </a>
                </li>
            @endforeach {{-- /END navigation loop --}}
        </ul>
        
        <div class="tab-content">
            @foreach ($groups as $group)
                <div id="{{ $group->slug }}" class="tab-pane fade in  @if ($loop->first) active @endif">
                    <form method="POST" action="{{ route('groups.update', ['slug' => $group->slug]) }}" class="form-horizontal">
                        {{ csrf_field() }}           {{-- Form field protection --}}
                        {{ method_field('PATCH') }}  {{-- HTTP/1 method spoofing --}}
                        @form($group)                {{-- Bind data to the form --}}

                        <div class="form-group @error('titel', 'has-error')">
                            <label class="control-label col-md-2">Naam tak: <span class="text-danger">*</span></label>

                            <div class="col-md-5">
                                <input type="text" placeholder="Naam van de tak" class="form-control" @input('titel')>
                                @error('titel')
                            </div>
                        </div>

                        <div class="form-group @error('sub_titel', 'has-error')">
                            <label class="control-label col-md-2">Sub titel: <span class="text-danger">*</span></label>

                            <div class="col-md-5">
                                <input type="text" placeholder="Sub titel van de tak" class="form-control" @input('sub_titel')>
                                @error('sub_titel')
                            </div>
                        </div>

                        <div class="form-group @error('beschrijving', 'has-error')">
                            <label class="control-label col-md-2">Tak beschrijving: <span class="text-danger">*</span></label>
                       
                            <div class="col-md-10">
                                <textarea placeholder="Beschrijving van de tak" id="group-body">{{ $group->beschrijving }}</textarea>
                                @error('beschrijving')
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-offset-2 col-md-10">
                                <button type="submit" class="btn btn-sm btn-success">
                                    <i class="fa fa-check"></i> Wijzigen
                                </button>

                                <button type="reset" class="btn btn-sm btn-danger">
                                    <i class="fa fa-undo"></i> Annuleren
                                </button>
                            </div>
                        </div>
                    </form>
                </div> 
            @endforeach
        </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/trumbowyg.js') }}"></script>
    <script>
        $('#group-body').trumbowyg({
            lang: 'nl', 
            svgPath: '/fonts/trumbowyg/icons.svg',
        });
        </script>
@endpush

@push('stylesheets')
    <link rel="stylesheet" href="{{ asset('css/trumbowyg.css') }}">
@endpush