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
    </div>

    <div class="container-fluid px-5">
        <div class="row">
            <div class="col-md-12">
                <h3>{{ __('Categorías') }}</h3>
            </div>
        </div>
        <div class="card mt-3 p-2">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <h4>{{ __('Añadir una nueva') }}</h4>
                        <form method="post" action="{{ route('category.store') }}">
                            @csrf
                            <div class="row form-group">
                                <div class="col-8">
                                    <label>{{ __('Nombre') }}</label>
                                    <input class="form-control" type="text" name="name"/>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-8">
                                    <label>{{ __('Categoría superior') }}</label>
                                    <select class="form-control" name="parent_id">
                                        <option value="">Ninguna</option>
                                        @foreach($categories as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-8">
                                    <label>{{ __('Descripción') }}</label>
                                    <textarea class="form-control" type="text" name="description"></textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-8">
                                    <button class="btn btn-primary" type="submit">{{ __('Crear categoría') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-8">
                        <form method="post" action="{{ route("category.destroy") }}">
                            @csrf
                            @method('DELETE')
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <td id="touch"></td>
                                    <td id="name">{{ __('Nombre') }}</td>
                                    <td id="name">{{ __('Descripción') }}</td>
                                    <td id="name">{{ __('Slug') }}</td>
                                    <td id="name">{{ __('Cantidad') }}</td>
                                    <td id="name">{{ __('id') }}</td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $cat)
                                    <tr>
                                        <td>
                                            <input type="checkbox" id="sel-{{ $cat->id }}" name="id[]"
                                                   value="{{ $cat->id }}">
                                        </td>
                                        <td class="column-primary">
                                            <strong>{{ $cat->name }}</strong>
                                        </td>
                                        <td class="column-primary">
                                            {{ $cat->description ?? '---' }}
                                        </td>
                                        <td class="column-primary">
                                            {{ $cat->slug ?? '---' }}
                                        </td>
                                        <td class="column-primary text-right">
                                            {{ $cat->posts_count }}
                                        </td>
                                        <td class="column-primary text-right">
                                            {{ $cat->id }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-primary">Elminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection