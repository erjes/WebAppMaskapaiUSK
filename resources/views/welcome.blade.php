<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <!-- Styles -->
    <style>
        body {
            font-family: 'Figtree', sans-serif;
            font-size: 1rem;
            line-height: 1.5;
            background-color: #fff;
            color: #1a202c;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .btn:hover {
            background-color: #b91c1c;
        }
    </style>
</head>
<body>
    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tickets Online</title>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <!-- Styles -->
        <style>
            body {
                font-family: 'Figtree', sans-serif;
                font-size: 1rem;
                line-height: 1.5;
                background-color: #fff;
                color: #1a202c;
            }

            .container {
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 2rem;
                font-weight: 600;
                margin-bottom: 1rem;
            }

            .btn {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                padding: 0.5rem 1rem;
                background-color: #00122c;
                border: 1px solid transparent;
                border-radius: 0.375rem;
                font-size: 0.75rem;
                font-weight: 600;
                text-transform: uppercase;
                color: #fff;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }

            .btn:hover {
                background-color: #4f4f4f;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <h1 class="title">Welcome</h1>
                <h2 class="title">Buy Tickets Online</h2>
                @if (Route::has('login'))
                    <div class="mt-8">
                        @auth
                            <button class="btn" onclick="location.href='{{ route('dashboard')}}'">
                                Search Tickets
                            </button>
                        @else
                            <button class="btn" onclick="location.href='{{ route('login')}}'">
                                Login
                            </button>
                            @if (Route::has('register'))
                                <button class="btn" onclick="location.href='{{ route('register')}}'">
                                    Register
                                </button>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </body>
    </html>

</body>
</html>
