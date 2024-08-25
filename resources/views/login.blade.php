<!DOCTYPE html>
<html>
<head>
    <title>Tenant Login</title>
</head>
<body>
    <form action="{{ url('login') }}" method="POST">
        @csrf
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <button type="submit">Login</button>
        </div>
    </form>
</body>
</html>
