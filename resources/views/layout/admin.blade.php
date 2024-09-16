<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('/asset/css/select-multiple.css') }}">
    <link rel="stylesheet" href="{{ asset('/asset/css/dataTables.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/asset/css/main.css') }}">

    <title>Helendo</title>

</head>

<body>

    @include('admin.component.navbar')

    <div class="content d-flex">

        <div class="box_sidebar d-lg-block d-none h-100 bg-dark">
            @include('admin.component.sidebar')
        </div>

        <div class="p-3 box_content">
            @yield('root')
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ asset('/asset/js/dataTables.min.js') }}"></script>
    <script src="{{ asset('/asset/js/select-multiple.js') }}"></script>
    <script src="{{ asset('/asset/js/app.js') }}"></script>

</body>

</html>
