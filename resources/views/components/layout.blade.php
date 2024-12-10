<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PEOPLES_BLOG</title>
    @vite(['resources/js/app.js', 'resources/css/app.css', ])
</head>
<body class="bg-slate-300 dark:bg-gray-900">

 <x-navbar></x-navbar>
<section class="max-w-6xl mx-auto">
    {{  $slot  }} 
</section>
   
</body>
</html>