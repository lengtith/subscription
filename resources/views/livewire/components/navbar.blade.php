<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand">SBI Subscription</a>
        <ul class="nav nav-pills justify-content-end">
            @if (Session::get('loginId'))
            <li class="nav-item">
                <button class="btn btn-danger" wire:click="logout">Logout</button>
            </li>
            @else
            <li class="nav-item">
                <a class="nav-link {{ Request::is('login') ? 'active':'' }}" href="/login">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('register') ? 'active':'' }}" href="/register">Register</a>
            </li>
            @endif
        </ul>
    </div>
</nav>