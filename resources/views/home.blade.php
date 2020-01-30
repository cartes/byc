@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session()->has('message'))
            <div class="row justify-content-center">
                <div class="col-md-11">
                    <div class="alert alert-{{session('message')[0]}}" role="alert">
                        {{session('message')[1]}}
                    </div>
                </div>
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-8">
                @forelse($posts as $post)
                    <div class="card my-1">
                        <div class="card-body">
                            <small>{{ $post->date }}</small>
                            <h5><a href="{{ route("post.show", ['cat' => $post->category->name, 'slug' => $post->slug]) }}">{{ $post->name }}</a></h5>
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
    </div>
    <div class="row justify-content-center">
        {{ $posts->links() }}
    </div>
@endsection
