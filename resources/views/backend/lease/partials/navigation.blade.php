<ul class="nav nav-tabs">
    <li class="{{ isActive('admin/lease') }}">
        <a href="{{ route('lease.index') }}">
            <i class="fa fa-list"></i> Overzicht
        </a>
    </li>

    <li class="{{ isActive('admin/create') }}">
        <a href="{{ route('lease.create') }}">
            <i class="fa fa-plus"></i> Verhuring toevoegen
        </a>
    </li>

    <li class="pull-right">
        <a href="#" class="text-muted">
            <i class="fa fa-fw fa-cloud-download"></i> Download
        </a>
    </li>
</ul>