<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Perpustakaan</title>
</head>
<body style="font-family: sans-serif; max-width: 400px; margin: 50px auto; padding: 20px; border: 1px solid #ccc;">
    <h2>Login Sistem Perpustakaan</h2>

    @if ($errors->any())
        <div style="color: red; margin-bottom: 15px; padding: 10px; border: 1px solid red;">
            @foreach ($errors->all() as $error)
                <p style="margin: 0;">{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('login.submit') }}" method="POST">
        @csrf
        <div style="margin-bottom: 10px;">
            <label for="email">Email</label><br>
            <input type="email" name="email" id="email" value="{{ old('email') }}" required style="width: 100%;">
        </div>

        <div style="margin-bottom: 10px;">
            <label for="password">Password</label><br>
            <input type="password" name="password" id="password" required style="width: 100%;">
        </div>

        <button type="submit" style="width: 100%; padding: 10px; cursor: pointer;">Login</button>
    </form>
</body>
</html>
