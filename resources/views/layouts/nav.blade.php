<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="events/index.html">Event Platform</a>
    <span class="navbar-organizer w-100">{{ config('app.name') }}</span>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <form action="{{ route('auth.logout') }}" method="POST">
                @csrf
                <button class="nav-link">Logout</button>
            </form>
        </li>
    </ul>
</nav>
