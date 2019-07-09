@if (Auth::user()->is_favorite($micropost->id))
    {!! Form::open(['route' => ['favorites.unfavorite', $micropost->id], 'method' => 'delete']) !!}
        {!! Form::submit('Unfavorite', ['class' => 'btn btn-secondary btn-sm']) !!}
    {!! Form::close() !!}
@else
    {!! Form::open(['route' => ['favorites.favorite', $micropost->id]]) !!}
        {!! Form::submit('Favorite', ['class' => 'btn btn-light btn-sm']) !!}
    {!! Form::close() !!}    
@endif

@if (Auth::id() === $micropost->user_id)
    {!! Form::open(['route' => ['microposts.destroy', $micropost->id], 'method' => 'delete']) !!}
        {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
    {!! Form::close() !!}
@endif