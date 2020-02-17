<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-7">
                        <h2>{{ $post->name }}</h2>
                    </div>
                    <div class="col-5 border-left">
                        <h2 class="text-right">$ {{ number_format($post->price, 0, ',', '.') }}</h2>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div class="row " id="slider">
                    <div class="col-md-12">
                        @if($images)
                            <div class="carousel slide" id="postCarousel">
                                <div class="carousel-inner my-2">
                                    @php($i = 0)
                                    @foreach($images as $image)
                                        <div class="carousel-item{{ $i == 0 ? " active" : "" }}"
                                             data-slide-number="{{ $i }}">
                                            <img src="{{ $image->pathAttachment() }}" alt="{{ $post->name }}"/>
                                        </div>
                                        @php($i++)
                                    @endforeach
                                </div>
                                @if( count($images) > 1)
                                    <ul class="carousel-indicators list-inline mx-auto border px-2">
                                        @php($i = 0)
                                        @foreach($images as $image)
                                            <li class="list-inline-item{{ $i==0 ? ' active' : '' }}">
                                                <a id="carousel-selector-{{ $i }}"
                                                   {{ $i == 0 ? "class='selected'" : "" }} data-slide-to="{{ $i }}"
                                                   data-target="#postCarousel">
                                                    <img src="{{ $image->pathAttachment() }}"
                                                         alt="{{ $post->name }}"/>
                                                </a>
                                            </li>
                                            @php($i++)
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        @else
                            <p class="no-image">Sin Imagen</p>
                        @endif
                    </div>
                </div>
                {!! $post->description !!}
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h4>{{ ucfirst($seller->user->name) }} {{ ucfirst($seller->user->last_name) }}</h4>
                <small>Miembro desde {{ $seller->user->date_in }}</small>
                <hr/>
                <h6>{{ __("Teléfono: ") }} {{ $seller->user->phone }}</h6>
                <h6>{{ __("Email: ") }}
                    <a href="mailto:{{ $seller->user->email }}"> {{ $seller->user->email }}</a>
                </h6>
                <div class="row">
                    <div class="col-md-6 border-right my-2">
                        <p class="text-center my-0">
                            {{ $seller->posts_count }}
                        </p>
                        <p class="text-center my-0">
                            Avisos publicados
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>