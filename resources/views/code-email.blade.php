<!DOCTYPE html>
<html>
<head>
    <title>Ubameny</title>
</head>
<body>
    <p>Abra este enlace para acceder a su código: <a href="{{ Storage::disk('spaces')->url($code) }}">{{ Storage::disk('spaces')->url($code) }}</a></p>
    <b><p>No comparte este enlace o código con nadie!!!</p></b>
</body>
</html>
