<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/public/css/form.css">
    <title>Document</title>
</head>
<body>
    <script src="../src/public/js/agregar.js"></script>
    <button type="button" onclick="window.location.href='http://localhost'">Regresar</button>
<form id="formu" >
        <label for="id">ID</label>
        <input type="text" id="id" name="id">
        
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre">
        
        <label for="correo">Correo</label>
        <input type="text" id="correo" name="correo">
        
        <label for="matricula">Matrícula</label>
        <input type="text" id="matricula" name="matricula">
        
        <label for="contraseña">Contraseña</label>
        <input type="password" id="contraseña" name="contrasena">
        
        <label for="imagen">Imagen</label>
        <input type="text" id="imagen" name="imagen">
        
        <button id="agregar" type="button" onclick="accion('POST')">Agregar</button>
        <button id="modificar" type="button">Modificar</button>
        <button id="eliminar" type="button">Eliminar</button>
    </form>
</body>
</html>