<ul class="nav nav-tabs">
    <li class="{{ isActive('admin/gebruikers') }}">
        <a href="{{ route('gebruikers.index') }}">
            <i class="fa fa-list"></i> Overzicht
        </a>
    </li>

    <li class="{{ isActive('admin/gebruikers/create') }}">
        <a href="{{ route('gebruikers.create') }}">
            <i class="fa fa-user-plus"></i> Gebruiker toevoegen
        </a>
    </li>
</ul>