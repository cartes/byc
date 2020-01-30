<header>
    <nav class="navbar navbar-expand-md navbar-light navbar-byc">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name') }}
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navBarContent"
                    aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle Navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navBarContent">
                <ul class="navbar-nav ml-auto">

                    @include('partials.navigation.' . \App\User::navigation())

                </ul>
            </div>
        </div>
    </nav>
</header>