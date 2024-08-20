<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <h1>Order Status Notification</h1>
        <div id="notification" style="display:none; background: #4CAF50; color: white; padding: 15px; margin-top: 15px;">
            Your order is complete!
        </div>

        <script>
        Echo.private('order.1')
            .listen('OrderStatus', (e) => {
                if (e.status == 'complete') {
                    document.getElementById('notification').style.display = 'block';
                }
            });
    </script>
    </body>
</html>
