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
        @include('partials.post.create')
    </div>
@endsection

@push("footer")
    <script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $('#price').on('keyup', function () {
                if ($(this).val() !== NaN) {
                    var n = parseInt($(this).val().replace(/\D/g, ''), 10);
                    $(this).val(n.toLocaleString());
                }
            })
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

        tinymce.init({
            selector: '#description',
            branding: false,
            menubar: false,
            plugins: "lists",
            toolbar: "bold | italic  bullist"
        })
    </script>


@endpush