
<div class="card">
    <div class="list-group list-group-flush">
        <a href="{{ route('verhuur.index') }}" class="list-group-item {{ isActive('verhuur') }}">
            <span class="fa fa-fw fa-info-circle" aria-hidden="true"></span> Informatie
        </a>

        <a href="" class="list-group-item">
            <i class="fa fa-fw fa-map-marker-alt"></i> Bereikbaarheid
        </a>

        <a href="" class="list-group-item">
            <i class="fa fa-fw fa-calendar-alt"></i> Verhuur kalender
        </a>

        <a href="{{ route('verhuur.create') }}" class="list-group-item {{ isActive('verhuur/aanvragen') }}">
            <i class="fa fa-fw fa-plus"></i> Verhuur aanvragen
        </a>

        <a href="" class="list-group-item">
            <i class="fa fa-fw fa-envelope"></i> Contact
        </a>
    <div>
</div>
