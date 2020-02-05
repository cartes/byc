@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session()->has('message'))
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="alert alert-{{session('message')[0]}}" role="alert">
                        {{session('message')[1]}}
                    </div>
                </div>
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3>{{ __('Editar Usuario') }} {{ $user ->name }} {{$user->last_name}}</h3>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-10">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="">
                            @csrf
                            @method("PUT")
                            <div class="row form-group">
                                <div class="col-6">
                                    <label>Nonmbre: </label>
                                    <input class="form-control" type="text" name="name" value="{{ $user->name }}"/>
                                </div>
                                <div class="col-6">
                                    <label>Apellidos: </label>
                                    <input class="form-control" type="text" name="last_name"
                                           value="{{ $user->last_name }}"/>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-6">
                                    <label>Email: </label>
                                    <input class="form-control" type="text" name="email" value="{{ $user->email }}"/>
                                </div>
                                <div class="col-6">
                                    <label>Slug: </label>
                                    <input class="form-control" type="text" name="slug"
                                           value="{{ $user->slug }}"/>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __('Guardar los Datos') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4 row justify-content-center">
            <div class="col-10">
                <div class="card">
                    <div class="card-body">
                        <form method="post" action="">
                            <div class="row form-group">
                                <div class="col-6">
                                    <label>Dirección: </label>
                                    <input class="form-control" type="text" name="address" value="{{ $meta->address }}">
                                </div>
                                <div class="col-6">
                                    <label>Region: </label>
                                    <select class="form-control">
                                        <option value="">Seleccione una región</option>
                                        @foreach($region as $reg)
                                            <option value="{{ $reg->id }}" {{ $reg->id == $meta->region_id ? 'selected' : '' }}>{{ $reg->ordinal }} - {{ $reg->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">{{ __('Guardar los Datos') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection