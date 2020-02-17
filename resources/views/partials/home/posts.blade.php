<div class="row justify-content-center py-2 mb-2">
    <div class="col-md-8">
        @forelse($posts as $post)
            <div class="card my-1">
                <div class="card-body">
                    <div class="row">
                        <div class="col-meta col-md-3 border-right align-self-center">
                            @foreach($post->images as $image)
                                <div class="thumb">
                                    <a href="{{ route("post.show", ["slug" => $post->slug]) }}">
                                        <img src="{{ $image->path }}" class="thumb-item" alt="{{ $post->name }}">
                                    </a>
                                </div>
                                @break
                            @endforeach
                        </div>
                        <div class="col-md-9">
                            <small>Publicado {{ $post->date }}</small>
                            <h5>
                                <a href="{{ route("post.show", ['slug' => $post->slug]) }}">{{ $post->name }}</a>
                            </h5>
                            <p class="my-0"><strong>$ @convert( $post->price )</strong></p>
                            <div class="row border-top mt-5">
                                <div class="col-8">
                                    <i class="fas fa-map-marker-alt"></i> {{ $post->commune->name ?? '' }}
                                    @isset($post->region->name)
                                        | Region {{ $post->region->name ?? '' }}
                                    @endisset
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="card">
                <div class="card-body">
                    <strong>No hay avisos publicados</strong>
                </div>
            </div>
        @endforelse
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <h5>Buscar</h5>
                    </div>
                </div>
                <form class="search form" method="post" action="{{ route("home.search") }}">
                    @csrf
                    <div class="row form-group">
                        <div class="col-12">
                            <input class="form-control" type="search" placeholder="Ingrese su busqueda" name="search"/>
                        </div>
                    </div>
                    <div class="row form-group justify-content-center">
                        <div class="col-11">
                            <button type="submit" class="form-control btn btn-primary">Buscar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        {{ $posts->links() }}
    </div>
</div>
