<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <x-web.index :datos="$posts">
        <h1>Listado de POST con componente anonimo</h1>
        @slot('footer')
            <h1>Pie de pagina usando slot con nombre</h1>
        @endslot
    </x-web.index>
</body>
</html>