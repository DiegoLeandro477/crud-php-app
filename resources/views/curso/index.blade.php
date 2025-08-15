<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cursos</title>
</head>
<body>
    <h1>Cursos de Programação</h1>
    <ul>
        @foreach ($cursos as $curso)
            <li>{{ $curso }} </li>
        @endforeach
    </ul>
</body>
</html>