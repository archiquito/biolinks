<div>
    <h1>Dashboard</h1>

            {{ session('success') }}

    <p>{{ auth()->user()->name }}</p>
    <a href="{{ route('logout') }}">Logout</a>
</div>
