<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/js/app.js', 'resources/css/app.css'])
    <title>PEOPLES_BLOG</title>
</head>
<body class="bg-slate-100 dark:bg-slate-800">
    <x-navbar></x-navbar>
    <section class="mt-20">
        {{$slot}}
    </section>
</body>
</html>