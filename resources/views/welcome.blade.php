@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card component-border">
            <img class="card-img-top rounded-top img-front" src="{{ asset('images/front.jpg') }}" alt="Card image cap">

            <div class="card-img-overlay">
                <h3 class="card-title justify-content-center align-self-center text-white">
                    Scouts en Gidsen Sint-Joris, Turnhout
                </h3>
            </div>

            <div class="card-body">
                <div class="row"> {{-- new grid needed for the activities and news --}}
                    <div class="col-md-9"> {{-- News --}}
                        <ul class="list-unstyled">
                            @foreach ($posts as $post) {{-- Loop through the posts --}}
                                @include('frontend.partials.posts-foreach', $post) {{-- Post partial --}}
                            @endforeach {{-- END loop --}}
                        </ul>
                    </div> {{-- END news --}}

                    <div class="col-md-3"> {{-- Sidenav --}}
                        <div class="fb-page" data-href="https://www.facebook.com/sintjoristurnhout" data-width="340" data-hide-cover="false" data-show-facepile="true"></div>
                    </div> {{-- END Sidenav --}}
                </div> {{-- END grid --}}
            </div>
        </div>
    </div>
@endsection