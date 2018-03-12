<div class="card @isset($user) @if($user->id == $chusqer->user_id) mine @endif @endisset">
    <div class="card-divider">
        <p>Añadido por <a href="/{{ $chusqer->user->slug }}">{{ $chusqer->user->name }}</a>
            <a href="{{ url('/') }}/chusqers/{{ $chusqer['id'] }}">Leer más</a>

        @if(Auth::user() != null)
        @if(Auth::user()->isliked(Auth::user() , $chusqer))
            <form action="{{ Route('chusqers.dislike', $chusqer) }}" method="POST" id="chusqer-like-buttons">
                {{ csrf_field() }}
                <button type="submit" class="alert button">Pues no ya gusta</button>
            </form>

        @else
            <form action="{{ Route('chusqers.like', $chusqer) }}" method="POST" id="chusqer-like-buttons">
                {{ csrf_field() }}
                <button type="submit" class="info button">Me gusta</button>
            </form>
        @endif
            @else
            <form action="{{ Route('chusqers.like', $chusqer) }}" method="POST" id="chusqer-like-buttons">
                {{ csrf_field() }}
                <button type="submit" class="info button">Me gusta</button>
            </form>
@endif


        @if(count($chusqer->users) > 0)
            <p> {{count($chusqer->users)}}</p>
            @endif



        </p>
    </div>
    <p class="chusqer-content">
        <img src="{{ $chusqer->image }}" alt="">{{ $chusqer->content }}
    </p>
    <p class="chusqer-hashtags text-right">
        @foreach($chusqer->hashtags as $hashtag)
            <a href="/hashtag/{{ $hashtag->slug }}"><span class="label label-primary">{{ $hashtag->slug }}</span></a>
        @endforeach
    </p>
    @if(Auth::user() && Auth::user()->amI())
    <div class="card-section">
        @can('update', $chusqer)
            <a href="{{ Route('chusqers.edit', $chusqer) }}" class="button warning">Editar</a>
        @endcan
        @can('delete', $chusqer)
        <form action="{{ Route('chusqers.delete', $chusqer->id) }}" method="POST" id="chusqer-actions-buttons">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <button type="submit" class="button alert">Borra</button>

        </form>
        @endcan
    </div>
    @endif
</div>