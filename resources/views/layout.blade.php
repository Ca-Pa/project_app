<!DOCTYPE html>
<html>
<head>
    <title>Class Projects</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if ($message = Session::get('failure'))
        <div class="alert alert-danger">
            <p>{{ $message }}</p>
        </div>
    @endif

    @yield('content')
</div>


</body>
</html>