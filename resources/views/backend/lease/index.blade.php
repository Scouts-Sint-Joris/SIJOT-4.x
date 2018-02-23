@extends('layouts.backend')

@section('title')
    <h1>Verhuringen <small>Beheerspaneel</small></h1>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><i class="fa fa-fw fa-dashboard"></i> <a href="{{ route('home') }}">Home</a></li>
        <li>Verhuringen</li>
    </ol>
@endsection

@section('content')
    <div class="nav-tabs-custom">
        @include('backend.lease.partials.navigation')

        <div class="tab-content">
            <div class="tab-pane active">
                <div class="table-responsive">
                    <table class="table table-condensed table-hover table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Status:</th>
                                <th>Groep:</th>
                                <th>Contact nr:</th>
                                <th>Periode:</th>
                                <th colspan="2">Aangevraagd op:</th> {{-- Colspan="2" is needed for the functions --}}
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($leases) > 0)  {{-- There are leases found--}}
                                @foreach ($leases as $lease) {{-- Loop through leases --}}
                                    <tr>
                                        <td><strong>#{{ $lease->id }}</strong></td>

                                        <td> {{-- Status indicator --}}
                                            @if ($lease->is_confirmed) {{-- Lease is confirmed --}}
                                                <span class="label label-success">Bevestigd</span>
                                            @else {{-- Lease is not confirmed --}}
                                                <span class="label label-warning">Optie</span>
                                            @endif
                                        </td> {{-- /Status indicator --}}

                                        <td>{{ $lease->persoon }}</td>
                                        <td>{{ $lease->tel_nr }}</td>
                                        <td>Van {{ $lease->start_datum }} tot {{ $lease->eind_datum }}</td>
                                        <td>{{ $lease->created_at->format('d/m/Y H:i') }}u</td>

                                        <td> {{-- Options --}}
                                            {{-- TODO: Implement tooltips --}}
                                            <a href="" class="text-muted">
                                                <i class="fa fa-fw fa-pencil"></i>
                                            </a>

                                            @if ($status->is_confirmed) {{-- The lease is confirmed --}}
                                                <a href="" class="text-orange">
                                                    <i class="fa fa-fw fa-undo"></i>
                                                </a>
                                            @else  {{-- The lease is a draft --}}
                                                <a href="" class="text-green">
                                                    <i class="fa fa-fw fa-check"></i>
                                                </a>
                                            @endif

                                            <a href="" class="text-red">
                                                <i class="fa fa-fw fa-danger"></i>
                                            </a>
                                        </td> {{-- /Options --}}
                                    </tr>
                                @endforeach {{-- /END loop --}}
                            @else {{-- No Leases found --}}
                                <td colspan="7">
                                    <span class="text-muted">(Er zijn geen verhuringen gevonden.)</span>
                                </td>
                            @endif
                        </tbody>
                    </table>
                </div> {{-- /.table-responsive --}}

                {{ $leases->render() }} {{-- Pagination view instance --}}
            </div> {{-- /.tab-pane --}}
        </div> {{-- /.tab-content --}}
    </div>
@endsection