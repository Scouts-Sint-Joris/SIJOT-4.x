<ul class="nav nav-tabs">
    <li class="{{ isActive('admin/nieuws') }}">
        <a href="{{ route('nieuws.index') }}">
            <i class="fa fa-list"></i> Overzicht
        </a>
    </li>

    <li class="{{ isActive('admin/nieuws/create') }}">
        <a href="{{ route('nieuws.create') }}">
            <i class="fa fa-plus"></i> Bericht toevoegen
        </a>
    </li>
</ul>