<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>
    <h1>Login</h1>
    
    @if($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" value="{{ old('email') }}" required>
        </div>
        
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" required>
        </div>
        
        <div>
            <button type="submit">Login</button>
        </div>
    </form>

    <p>Don't have an account? <a href="{{ route('register') }}">Register here</a>.</p>
</body>
</html>
