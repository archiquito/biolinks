<!DOCTYPE html>
<html lang="{{config('app.locale')}}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/src/style.css" rel="stylesheet">
    @vite(['resources/css/app.css'])
    <title>{{config('app.name')}}</title>
</head>

<body>
    <h1 class="font-bold text-3xl text-red-500">TESTE TAILWINDCSS</h1>
    <div class="avatar avatar-placeholder">
        <div class="bg-neutral text-neutral-content w-24 rounded-full">
            <span class="text-3xl">D</span>
        </div>
    </div>
</body>

</html>