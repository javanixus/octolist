
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Octolist</title>
        <!-- Fonts -->
        <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
        <!-- Styles -->
        <style>      
        </style>
    </head>
    <body>
    <div id="app">
    </div>
        <script src="{{asset('js/app.js')}}"></script>
    </body>
</html>
