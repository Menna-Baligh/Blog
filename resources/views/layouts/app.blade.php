<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title')</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        @yield('css')
    </head>
    <body>
            @yield('content')
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            @if (session('welcome'))
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Welcome',
                        text: '{{ session('welcome') }}',
                        showConfirmButton: true,
                        confirmButtonText: 'OK',
                        showCloseButton: true,
                        timer: 5000,
                        timerProgressBar: true,
                        position: 'center',
                    });
                </script>
                
            @endif
    </body>
</html>