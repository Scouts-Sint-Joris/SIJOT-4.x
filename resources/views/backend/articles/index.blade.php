@extends('layouts.backend')

@section('title')
    <h1> Nieuwsberichten <small>Beheerspaneel</small></h1>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><i class="fa fa-fw fa-dashboard"></i> <a href="{{ route('home') }}">Home</a></li>
        <li>Nieuws berichten</li>
    </ol>
@endsection

@section('content')
    <div class="nav-tabs-custom">
        @include('backend.articles.partials.navigation')
        
        <div class="tab-content">
            <div class="tab-pane active">
                <div class="table-responsive">
                    <table class="table table-condensed table-hover table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Status:</th>
                                <th>Auteur:</th>
                                <th>Titel:</th>
                                <th>Aangemaakt op:</th>
                                <th colspan="2">Laatst aangepast:</th> {{-- Colspan="2" needed for the functions --}}
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($articles) > 0) {{-- There are articles found  --}} 
                                @foreach ($articles as $article) {{-- Loop through the articles --}}
                                    <tr>
                                        <td><strong>#{{ $article->id }}</strong></td>
                                        
                                        <td>  {{-- Status field --}}
                                            @if ($article->status) {{-- Public version --}}
                                                <span class="label label-success">Gepubliceerd</span>
                                            @else {{-- Draft version --}}
                                                <span class="label label-info">Klad versie</span>
                                            @endif
                                        </td> {{-- /Status field --}}

                                        <td>{{ $article->author->name }}</td>
                                        <td><a href="{{ route('nieuws.show', ['nieuw' => $article->slug]) }}">{{ $article->titel }}</a></td>
                                        <td>{{ $article->created_at->format('d/m/Y H:i:s') }}</td>
                                        <td>{{ $article->updated_at->format('d/m/Y H:i:s') }}</td>
                                        
                                        <td> {{-- Options --}}
                                            {{-- //TODO: Tooltips --}}
                                            <a href="" class="text-muted">
                                                <i class="fa fa-fw fa-pencil"></i>
                                            </a>

                                            @if ($article->status) {{-- Article is published --}}
                                            @else {{-- Article has a draft status --}}
                                            @endif
                                            
                                            <a href="" class="text-danger">
                                                <i class="fa fa-fw fa-close"></i>
                                            </a>
                                        </td> {{-- /Options --}}
                                    </tr>
                                @endforeach {{-- // End loop  --}}
                            @else {{-- No articles found --}}
                                <tr>
                                    <td colspan="7"><span class="text-muted">(Er zijn geen nieuwsberichten gevonden)</span></td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div> {{-- /.table-responsive --}}

                {{ $articles->render() }} {{-- Pagination view instance --}}
            </div> {{-- /.tab-pane --}}
        </div> {{-- /.tab-content --}}
    </div>
@endsection