@extends("layouts.app")

@section("content")
    <div class="container">
        @if(session()->has('message'))
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="alert alert-{{session('message')[0]}}" role="alert">
                        {{session('message')[1]}}
                    </div>
                </div>
            </div>
        @endif
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3>{{ __("Crear Aviso") }}</h3>
                <div class="card">
                    <div class="card-body">
                        <form method="post">
                            <div class="row form-group">
                                <div class="col-12">
                                    <label>Categoría</label>
                                    <select class="form-control" name="category_id">
                                        <option>{{ __('Seleccione una categoría') }}</option>
                                        @foreach($categories as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-12">
                                    <label>Título</label>
                                    <input type="text" class="form-control" name="name" value=""/>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-6">
                                    <label>Precio</label>
                                    <input type="text" class="form-control" name="price" value=""/>
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push("footer")
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
                        console.log(response);
                        $.each(response, function(k, v){
                            $('#communeSelect').append($('<option>', {value:k, text:v}));
                        })
                    },
                    error: function (error) {
                        console.log(error);
                    }
                })
            })
        })
    </script>
@endpush