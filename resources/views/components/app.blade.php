<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Agranalytics</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <x-toast :openDurationInS="0.2" :exhibitionDurationAfterOpenedInS="3" :closeDurationIsInS="0.2"/>
    {{ $slot }}
</body>
</html>
