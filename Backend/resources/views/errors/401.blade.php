<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>401 Unauthorized</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>
    <div class="unauthorized-page">
        <h1>401 - Unauthorized</h1>
        <p>You do not have permission to view this page.</p>
        <a href="{{route('login') }}">Go to Login</a>
    </div>
</body>
</html>
