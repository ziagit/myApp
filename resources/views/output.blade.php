<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>laravel</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('prism/prism.css') }}" rel="stylesheet">
    <script src="{{ asset('prism/prism.js') }}"></script>

</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1">
                <h1>Your Input</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1">
                <a href="{{ route('home') }}">Back</a>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1">
                {!! $content !!}
            </div>
        </div>
    </div>


    
</body>
</html>