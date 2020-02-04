<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3>{{ __('Editar Categoría') }} {{ $cat->name }}</h3>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{ route("category.update", $cat->slug) }}">
                        @csrf
                        @method("PUT")
                        <div class="row form-group">
                            <div class="col-12">
                                <label>Nombre:</label>
                                <input class="form-control" type="text" name="name" value="{{ $cat->name }}">
                            </div>
                            <div class="col-12">
                                <label>Slug:</label>
                                <input class="form-control" type="text" name="slug" value="{{ $cat->slug }}">
                            </div>
                            <div class="col-12">
                                <label>Descripción:</label>
                                <textarea class="form-control" name="description">{{ $cat->description }}</textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('Guardar datos') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
