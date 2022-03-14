<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>bitApp</title>
    <link rel="stylesheet" href="assets/ownjs/normalize.css">
    <link rel="stylesheet" href="assets/ownjs/gestStyles.css">
</head>

<body class="antialiased">
    <div
        class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0  setBackground">
        <div class="setOverlay"></div>

        @if (Route::has('login'))
            
        <div class=" welcome_sms">Welcome to bitApp</div><br/>
            <div class=" fixed py-4" style="z-index: 100;">
  
                <div class="startButton">
                    @auth
                        <a onclick="location.href='/dashboard'" class="startButton_text">Go to the Dashboard</a>
                    @else
                        <a onclick="location.href='/login'" class="startButton_text">Get Start</a>
                        {{-- @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif --}}
                    @endauth
                </div>
            
            </div>
        @endif

        <!-- data here -->
    </div>
</body>

</html>
