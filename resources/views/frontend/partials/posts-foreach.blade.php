<li class="media mb-3">
    <a href="">
        <img class="mr-3 rounded" src="http://via.placeholder.com/100x100" alt="Generic placeholder image">
    </a>

    <div class="media-body">
        <h5 class="mt-0 mb-1 title-news">{{ ucfirst($post->titel) }}</h5>

        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at,
        tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

        <hr class="mt-1 mb-0">
        <small>Door {{ $post->author->name }} | Geplaatst op: {{ $post->created_at->format('d/m/Y') }}</small>
    </div>
</li>