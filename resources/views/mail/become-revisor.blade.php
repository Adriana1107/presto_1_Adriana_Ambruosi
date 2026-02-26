<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>presto</title>
</head>
<body>

<div>
    <h2>Ecco i dati dell'utente che vuole gestire il sito</h2>
    <p>Nome: {{ $user->name }}</p>
    <p>Email: {{ $user->email }}</p>
    <p>conferma revisore:</p>
    <a href="{{ route('make.revisor', compact('user')) }}">Conferma</a>
</div>
    
</body>
</html>