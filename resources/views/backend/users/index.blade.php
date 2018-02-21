@extends('layouts.backend')

@section('title')
    <h1>Gebruikers (logins) <small>Beheerspaneel</small></h1>
@endsection

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><i class="fa fa-fw fa-dashboard"></i> <a href="{{ route('home')}}">Home</a></li>
        <li>Gebruikersbeheer</li>
    </ol>
@endsection

@section('content')
    <div class="nav-tabs-custom">
        @include('backend.users.partials.navigation')
        
        <div class="tab-content">
            <div class="tab-pane active">
                <div class="table-responsive">
                    <table class="table table-condensed table-hover table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Status:</th>
                                <th>Naam:</th>
                                <th>Email:</th>
                                <th>Laatst gewijzigd:</th>
                                <th colspan="2">Aangemaakt op:</th> {{-- Colspan="2" needed because the functions. --}}
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($users) > 0) {{-- There are users found in the system --}}
                                @foreach ($users as $user) {{-- Loop through the users --}}
                                    <tr>
                                        <td><strong>#U{{ $user->id }}</strong></td>
                                        <td> 
                                            @if ($user->isOnline())
                                                <span class="label label-success">Online</span>
                                            @else {{-- User is offline --}}
                                                <span class="label label-danger">Offline</span>
                                            @endif
                                        </td>
                                        <td>{{ $user->name }}</td>
                                        <td><a href="mailto:{{ $user->email}}">{{ $user->email }}</a></td>
                                        <td>{{ $user->updated_at->format('d-m-Y') }}</td>
                                        <td>{{ $user->created_at->format('d-m-Y H:i') }}</td>

                                        <td> {{-- Options --}}
                                            <a href="" class="text-danger">
                                                <i class="fa fa-fw fa-lock"></i>
                                            </a>
                                            <a href="" class="text-danger">
                                                <i class="fa fa-fw fa-close"></i>
                                            </a>
                                        </td> {{-- /END options --}}
                                    </tr>
                                @endforeach {{-- /END loop --}}
                            @else {{-- No users found in the system --}}
                            @endif
                        </tbody>
                    </table>
                </div> {{-- /.table-responsive --}}

                {{ $users->render() }} {{-- Pagination view instance --}}
            </div> {{-- /.tab-pane --}}
        </div> {{-- /.tab-content --}}
    </div>
@endsection