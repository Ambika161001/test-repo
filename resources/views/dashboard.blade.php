<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/laravel-echo/dist/echo.iife.js"></script>

  
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <h1>Dashboard</h1>
        <p>Number of Users: {{ $userCount }}</p>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <script>
            var tenantId = @json($tenantId);
            Echo.private(`tenant.${tenantId}`)
            .listen('UserData', (e) => {
                console.log(e.order);
            });
        </script>
    </body>
</html>
