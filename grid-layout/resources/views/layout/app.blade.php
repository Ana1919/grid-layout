<!doctype html>
<html lang="pt">

<head>
    <meta name="viewport">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>App Name - @yield('title')</title>

    <style>
        html {
            margin: 10vh;
            padding: 0;
            scroll-behavior: smooth;
        }
        body {
            background: #174333;
            background: -webkit-linear-gradient(left top, #fff, #cfdcb1);
            background: -moz-linear-gradient(bottom right, #fff, #cfdcb1);
            background: linear-gradient(to bottom right, #fff, #cfdcb1);
            background-attachment: fixed;
            color: #fff;
            font-family: 'Raleway', Helvetica, Arial, sans-serif;
            font-size: 13px;
            font-weight: 300;
            line-height: 140%;
            margin: 0;
            height: 100%;
            text-align: center;
            width: 100%;
        }

    </style>
    @yield('css_after')
</head>

<body>

<div>
    @yield('content')
</div>

</body>

</html>
