@php
$uri_segment = request()->segment(1);
$uri_segment2 = request()->segment(2);

@endphp
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">GIC Web</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item {{ $uri_segment === null ? 'active':'' }}">
                <a class="nav-link" href="{{ url('/') }}">Home</a>
            </li>
            <li class="nav-item {{ $uri_segment === 'contacts' ? 'active':'' }}">
                <a class="nav-link" href="{{ url('/contacts') }}">Contacts</a>
            </li>
            <li class="nav-item {{ $uri_segment2 === 'user-activity' ? 'active':'' }}">
                <a class="nav-link" href="{{ url('/admin/user-activity') }}">User Activity</a>
            </li>
            <li class="nav-item {{ $uri_segment === '~artisan' ? 'active':'' }}">
                <a class="nav-link" href="{{ url('/~artisan') }}">Artisan Command</a>
            </li>
            <li class="nav-item {{ $uri_segment === 'login' ? 'active':'' }}">
                <a class="nav-link" href="{{ url('/login') }}">Login</a>
            </li>
            <li class="nav-item {{ $uri_segment === 'register' ? 'active':'' }}">
                <a class="nav-link" href="{{ url('/register') }}">Register</a>
            </li>
        </ul>
    </div>
</nav>
