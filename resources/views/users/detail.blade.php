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
                        <form method="post" action="{{ route('user.store', $user->slug) }}">
                            @csrf
                            @method("PUT")
                            <div class="row form-group">
                                <div class="col-6">
                                    <label>Nonmbre: </label>
                                    <input class="form-control{{ $errors->has('name') ? " is-invalid" : "" }}"
                                           type="text" name="name" value="{{ $user->name }}"/>
                                    @if( $errors->has("name") )
                                        <span class="invalid-feedback">{{ $errors->first("name") }}</span>
                                    @endif
                                </div>
                                <div class="col-6">
                                    <label>Apellidos: </label>
                                    <input class="form-control{{ $errors->has('last_name') ? " is-invalid" : "" }}"
                                           type="text" name="last_name"
                                           value="{{ $user->last_name }}"/>
                                    @if( $errors->has("last_name") )
                                        <span class="invalid-feedback">{{ $errors->first("last_name") }}</span>
                                    @endif
                                </div>

                            </div>
                            <div class="row form-group">
                                <div class="col-6">
                                    <label>Email: </label>
                                    <input class="form-control{{ $errors->has('email') ? " is-invalid" : "" }}"
                                           type="text" name="email" value="{{ $user->email }}"/>
                                    @if( $errors->has("email") )
                                        <span class="invalid-feedback">{{ $errors->first("email") }}</span>
                                    @endif
                                </div>
                                <div class="col-6">
                                    <label>Teléfono: </label>
                                    <input class="form-control{{ $errors->has('phone') ? " is-invalid" : "" }}"
                                           type="text" name="phone" value="{{ $user->phone }}"/>
                                    @if( $errors->has("phone") )
                                        <span class="invalid-feedback">{{ $errors->first("phone") }}</span>
                                    @endif
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
                        <form method="post" action="{{ route("user.meta", $user->slug) }}">
                            @csrf
                            <div class="row form-group">
                                <div class="col-6">
                                    <label>Dirección: </label>
                                    <input class="form-control" type="text" name="address"
                                           value="{{ $meta->address ?? '' }}">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-6">
                                    <label>Region: </label>
                                    <select id="regionSelect" name="region_id" class="form-control">
                                        <option value="">Seleccione una región</option>
                                        @foreach($region as $reg)
                                            <option value="{{ $reg->id }}" {{ isset($meta->region_id) && $reg->id == $meta->region_id ? 'selected' : '' }}>{{ $reg->ordinal }}
                                                - {{ $reg->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label>Comuna: </label>
                                    <select id="communeSelect" name="commune_id"
                                            class="form-control"{{ $commune ? '' : ' disabled' }}>
                                        <option value="">Seleccione una comuna</option>
                                        @if($meta->commune_id)
                                            @foreach($commune as $com)
                                                <option value="{{ $com->id }}"{{ $meta->commune_id == $com->id ? " selected" : "" }}>{{ $com->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-md-4">
                                    <label>Genero: </label>
                                    <select name="gender" class="form-control">
                                        <option>Selecione una opción</option>
                                        <option value="1"{{ $meta->gender == '1' ? " selected" : "" }}>Femenino</option>
                                        <option value="2"{{ $meta->gender == '2' ? " selected" : "" }}>Masculino
                                        </option>
                                        <option value="3"{{ $meta->gender == '3' ? " selected" : "" }}>Otro</option>
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

@push("scripts")
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#regionSelect').change(function () {
                var id = $(this).val();
                $('#communeSelect').removeAttr('disabled');
                $("#communeSelect option").remove();
                $.ajax({
                    url: '{{ route('loadCommunes') }}',
                    type: "post",
                    data: {
                        "_token": '{{ csrf_token() }}',
                        "id": id
                    },
                    dataType: 'json',
                    success: function (response) {
                        $.each(response, function (k, v) {
                            $('#communeSelect').append($('<option>', {value: k, text: v}));
                        })
                    },
                    error: function (error) {
                        console.log(error);
                    }
                })
            })
        });
    </script>
@endpush