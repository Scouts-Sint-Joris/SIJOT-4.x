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
                                            @elseif ($user->isBanned())
                                                <span class="label label-danger">
                                                    <i class="fa fa-fw fa-lock"></i> Geblokkeerd</i>
                                                </span>
                                            @else {{-- User is offline --}}
                                                <span class="label label-danger">Offline</span>
                                            @endif
                                        </td>
                                        <td>{{ $user->name }}</td>
                                        <td><a href="mailto:{{ $user->email}}">{{ $user->email }}</a></td>
                                        <td>{{ $user->updated_at->format('d-m-Y') }}</td>
                                        <td>{{ $user->created_at->format('d-m-Y H:i') }}</td>

                                        <td> {{-- Options --}}
                                            @if ($user->isBanned() && $currentUser->can('create-ban', $user))
                                                <a href="#revokeBan" data-toggle="modal" data-username="{{ $user->name }}" data-user="{{ $user->id }}" class="text-success">
                                                    <i data-toggle="tooltip" data-placement="bottom" title="Blokkering opheffen" class="fa fa-fw fa-lock"></i>
                                                </a>
                                            @elseif ($user->isNotBanned() && $currentUser->can('revoke-ban', $user))
                                                <a href="#blockUser" data-toggle="modal" data-username="{{ $user->name}}" data-user="{{ $user->id }}" class="text-danger">
                                                    <i data-toggle="tooltip" data-placement="bottom" title="Blokkeer" class="fa fa-fw fa-lock"></i>
                                                </a>
                                            @endif

                                            <a href="#deleteUser" data-toggle="modal" data-username="{{ $user->name }}" data-user="{{ $user->id }}" class="text-danger">
                                                <i data-toggle="tooltip" data-placement="bottom" title="Verwijder" class="fa fa-fw fa-close"></i>
                                            </a>
                                        </td> {{-- /END options --}}
                                    </tr>
                                @endforeach {{-- /END loop --}}
                            @else {{-- No users found in the system --}}
                                <tr>
                                    <td><span class="text-muted">(Er zijn geen gebruikers gevonden)</span></td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div> {{-- /.table-responsive --}}

                {{ $users->render() }} {{-- Pagination view instance --}}
            </div> {{-- /.tab-pane --}}
        </div> {{-- /.tab-content --}}
    </div>

    @include('backend.users.modals.confirm-delete')
    @include('backend.users.modals.confirm-block')
@endsection

@push('scripts')
    <script src="{{ asset('js/user-management.js')}}"></script>
@endpush