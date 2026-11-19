<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
</head>
<body>
    <header>
        <h1>Library System</h1>
        <nav style="display: flex; justify-content: space-between; align-items: center;">
            <div>
                <a href="{{ route('dashboard') }}">Dashboard</a> |
                <a href="{{ route('categories.index') }}">Categories</a> |
                <a href="{{ route('books.index') }}">Books</a> |
                <a href="{{ route('members.index') }}">Members</a> |
                <a href="{{ route('borrowings.index') }}">Borrowings</a>
                @can('manage-users')
                    | <a href="{{ route('users.index') }}">Kelola Pengguna</a>
                @endcan
            </div>

            @auth
                <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                    @csrf
                    <button type="submit" style="background-color: #ff4c4c; color: white; border: none; padding: 5px 10px; cursor: pointer;">Logout</button>
                </form>
            @endauth
        </nav>
        <hr>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <hr>
        <p>Library System</p>
    </footer>
</body>
</html>
