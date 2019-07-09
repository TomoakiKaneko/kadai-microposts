<ul class="list-unstyled">
    @foreach ($microposts as $micropost)
        <li class="media mb-3">
            <img class="mr-2 rounded" src="{{Gravatar::src($micropost->user->emai, 50) }}" alt="">
            <div class="media-body">
                <div>
                    {!! link_to_route('users.show', $micropost->user->name, ['id' => $micropost->user->id]) !!}
                </div>
                <div>
                    <p class="mb-0">{!! nl2br($micropost->content) !!}</p>
                </div>
                <div class="btn-group">
                    @include('microposts.micropost_button', ['micropost' => $micropost])
                </div>
            </div>
        </li>
    @endforeach
</ul>
{{ $microposts->render('pagination::bootstrap-4') }}