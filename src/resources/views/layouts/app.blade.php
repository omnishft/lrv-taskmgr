<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Task Manager</title>
        @vite(['resources/css/app.css', 'resources/scss/app.scss', 'resources/js/app.js'])
    </head>
    <body class="bg-[#0d1117] text-[#c9d1d9]">


        <div>
            <h1>
                 @yield('title')
            </h1>
        </div>

        <div>
            @if(session()->has('success'))
                <div class="flash-message"> {{ session('success') }} </div>
            @endif
            @yield('content')
        </div>


    </body>
</html>
