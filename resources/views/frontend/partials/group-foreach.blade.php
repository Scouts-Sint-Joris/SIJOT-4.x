<li class="media mb-3">
    <a href="{{ route('takken.show', ['slug' => $group->slug]) }}">
        <svg width="100" height="100" class="kapoenen mr-3 rounded">
            <image href="{{ asset($group->image_path) }}" height="100" width="100"/>
        </svg>
    </a>
    <div class="media-body">
        <h5 class="mt-0 mb-1 title-news">{{ ucfirst($group->titel) }} <small>{{ $group->sub_titel }}</small></h5>
        {{ strip_tags(ucfirst($group->beschrijving))}}
    </div>
</li>