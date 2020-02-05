@extends('layouts.app')

@section('content')
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

    <div class="container px-5">
        <div class="row">
            <div class="col-md-12">
                <h3>{{ __('Usuarios') }}</h3>
            </div>
        </div>
        <div class="card mt-3 p-2">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped w-100">
                            @foreach($users as $usr)
                                <tr>
                                    <td>
                                        <input type="checkbox" id="sel-{{ $usr->id }}" name="id[]"
                                               value="{{ $usr->id }}">
                                    </td>

                                    <td>
                                        <a href="{{ route("user.edit", $usr->slug) }}">
                                        {{ $usr->name }} {{$usr->last_name}}
                                        </a>
                                    </td>
                                    <td>{{ $usr->email }}</td>
                                    <td>{{ $usr->meta->address }}</td>
                                    <td>{{ $usr->meta->commune->name }}</td>
                                    <td>{{ $usr->meta->region->name }}</td>
                                    <td>{{ \Illuminate\Support\Carbon::parse($usr->created_at)->format('d/m/Y') }}</td>
                                </tr>
                            @endforeach
                        </table>
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
@endsection