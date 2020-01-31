<div class="row justify-content-center py-2 mb-2">
    <div class="col-md-8">
        @forelse($posts as $post)
            <div class="card my-1">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <small>{{ $post->date }}</small>
                            <h5>
                                <a href="{{ route("post.show", ['cat' => $post->category->name, 'slug' => $post->slug]) }}">{{ $post->name }}</a>
                            </h5>
                            <p class="my-0"><strong>$ @convert( $post->price )</strong></p>
                        </div>
                        <div class="col-meta col-md-4 align-self-center">
                            <div class="my-auto">
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
                <h3>Widget</h3>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        {{ $posts->links() }}
    </div>
</div>
