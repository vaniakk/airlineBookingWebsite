<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flight</title>
    @vite('resources/css/app.css')
</head>
<body>
    
@include('includes.navbar')

<h1 class="text-center font-bold mt-10 text-4xl">Airline Booking System</h1>

<div class="container m-auto">
    @yield('content')
  </div>


@include('includes.footer')

    
</body>
</html>