<form id="postForm"
      method="post"
      action="{{ isset(auth()->user()->id) ? route("post.store") : route("post.storeUser") }}"
      enctype="multipart/form-data">
    @csrf
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3>{{ __("Crear Aviso") }}</h3>
            <div class="card">
                <div class="card-body">
                    <div class="row form-group">
                        <div class="col-5">
                            <label>Categoría</label>
                            <select class="form-control{{ $errors->has('category_id') ? " is-invalid" : "" }}"
                                    name="category_id">
                                <option value="">{{ __('Seleccione una categoría') }}</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                            @if( $errors->has('category_id') )
                                <span class="invalid-feedback">{{ $errors->first("category_id") }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-12">
                            <label>Título</label>
                            <input type="text"
                                   class="form-control{{ $errors->has("name") ? " is-invalid" : "" }}"
                                   name="name" value=""/>
                            @if( $errors->has("name") )
                                <span class="invalid-feedback">{{ $errors->first("name") }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-10">
                            <label>Descripción</label>
                            <textarea rows="7" id="description"
                                      class="form-control{{ $errors->has("description") ? " is-invalid" : "" }}"
                                      name="description">{{ old("description") }}</textarea>
                            @if( $errors->has("description"))
                                <span class="invalid-feedback">{{ $errors->first("description") }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-6">
                            <label>Precio</label>
                            <input id="price" type="text" class="form-control" name="price" value=""/>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-6">
                            <label>Región</label>
                            <select id="regionSelect" class="form-control" name="region_id">
                                <option value="">Seleccione una Región</option>
                                @foreach($region as $reg)
                                    <option value="{{ $reg->id }}">{{ $reg->ordinal }}
                                        -- {{ $reg->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6">
                            <label>Comuna</label>
                            <select id="communeSelect" class="form-control" name="commune_id" disabled>
                                <option value="">Seleccione una Comuna</option>
                            </select>

                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-6">
                            <label>Suba Imagenes</label>
                            <input class="form-control{{ $errors->has("file.*") || $errors->has("file") ? " is-invalid" : "" }}"
                                   type="file" name="file[]" multiple/>
                            @if( $errors->has("file.*") || $errors->has("file") )
                                <span class="invalid-feedback">{{ $errors->first("file.*") ? $errors->first("file.*") : $errors->first("file") }}</span>
                            @endif
                        </div>
                    </div>
                    @isset(auth()->user()->id)
                        <button type="submit" class="btn btn-primary">{{ __("Publique su aviso") }}</button>
                    @endisset
                </div>
            </div>
        </div>

        @isset(auth()->user()->id)
            <div class="col-md-8 mt-4">
                <div class="card">
                    <div class="card-header">
                        <h3>Tu información</h3>
                    </div>
                    <div class="card-body">
                        <p>Nombre: {{ $user->name }} {{ $user->last_name }}</p>
                        <p>Email: {{ $user->email }}</p>
                        <p>Teléfono: {{ $user->phone }}</p>
                    </div>
                </div>
            </div>
        @else
            <div class="col-md-8 my-4">
                <h3>Ingresa tus datos</h3>

                <div class="card">
                    <div class="card-body">
                        <div class="form-group row">

                            <div class="col-md-6">
                                <label for="name">{{ __('Name') }}</label>
                                <input id="name" type="text"
                                       class="form-control @error('name') is-invalid @enderror" name="name"
                                       value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label for="name">{{ __('Surname') }}</label>

                                <input id="last_name" type="text"
                                       class="form-control @error('last_name') is-invalid @enderror"
                                       name="last_name"
                                       value="{{ old('last_name') }}" required autocomplete="name" autofocus>

                                @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                        <div class="form-group row">

                            <div class="col-md-12">
                                <label for="email">{{ __('E-Mail Address') }}</label>
                                <input id="email" type="email"
                                       class="form-control @error('email') is-invalid @enderror" name="email"
                                       value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="col-md-6">
                                <label for="password">{{ __('Password') }}</label>
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                <input id="password-confirm" type="password" class="form-control"
                                       name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <label>{{ __("Teléfono") }}</label>
                                <input class="form-control{{ $errors->has("phone") ? " is-invalid" : "" }}"
                                       name="phone"
                                       type="text"
                                       required/>
                                @error("phone")
                                <span class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-4">Guardar Datos</button>
            </div>
        @endisset
    </div>
</form>
