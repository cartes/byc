@extends('layouts.app')

@section('content')
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
        @include("partials.post.detail")
    </div>

@endsection

@push('footer')
    <script>
        jQuery(document).ready(function ($) {
            $("#postCarousel").carousel({
                interval: 5000,
            })
        })
    </script>
@endpush