<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/js/app.js', 'resources/sass/app.scss'])
    <title>@yield('title', 'World skills')</title>
</head>

<body>
    @include('layouts.nav')
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item"><a class="nav-link" href="{{ route('events.index') }}">Manage Events</a>
                        </li>
                    </ul>
                    @foreach ($events as $event)
                        <h6
                            class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                            <span>{{ $event->name }}</span>
                        </h6>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('events.show', $event) }}">Overview</a>
                            </li>
                        </ul>
                    @endforeach

                </div>
            </nav>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <x-alert name="error" alertColor="danger" />
                <x-alert name="success" alertColor="success" />

                @yield('content')
            </main>
        </div>
    </div>
</body>

</html>
