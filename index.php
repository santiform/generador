<?php
// Incluir el archivo que contiene las funciones
require 'generador.php';

// Inicializar variables
$contraseña = '';
$hash = '';

// Verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener la contraseña ingresada por el usuario
    $contraseña = $_POST['contraseña'] ?? '';

    // Generar el hash bcrypt de la contraseña
    $hash = generarHashBcrypt($contraseña);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador de Hash Bcrypt</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        .container {
            margin-top: 5px;
            width: 37%;
        }
        .card {
            background-color: #F2F2F2;
            border-radius: 15px;
            border: 2px solid #4D4D4D;
        }
        .card-header {
            background-color: #3E3E3E;
            color: #fff;
            border-bottom: none;
            border-radius: 12px 12px 0 0!important;
        }
        .btn-generar {
            background-color: #28a745;
            border-color: #28a745;
            color: #f4f4f4;
        }
        .btn-generar:hover {
            background-color: #218838;
            border-color: #218838;
            color: #f4f4f4;
        }
        .formulario {
            width: 70%;
            margin: 0 auto;
            align-items: center;
            margin-block: 1rem;
        }
        .subtitulo {
            font-weight: 400;
            font-size: 20px;
        }
        img {
            display: block; /* Convertir la imagen en un bloque para aplicar márgenes */
            margin: 0 auto; /* Centrar horizontalmente la imagen */
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header text-center">
                <h2>Generador de contraseña Bcrypt</h2>
                <h3 class="subtitulo">para PHP o frameworks de PHP</h3>
            </div>
            <div class="card-body">
                <img src="https://servidor.net.ar/imgServer/uploads/image_664d9542b9111_1716360514.png" width="180px">
                <div class="formulario">
                    <form action="index.php" method="post">
                        <div class="form-group">
                            <label for="contraseña">Ingresá una contraseña:</label>
                            <input type="password" class="form-control" id="contraseña" name="contraseña" required>
                        </div>
                        <button type="submit" class="btn btn-generar btn-block"><i class="fas fa-key"></i> Generar contraseña</button>
                    </form>
                </div>

                <?php if ($contraseña && $hash): ?>
                <div class="mt-4">
                    <div class="alert alert-success" role="alert">
                        <strong>Contraseña:</strong> <?php echo htmlspecialchars($contraseña, ENT_QUOTES, 'UTF-8'); ?>
                    </div>
                    <div class="alert alert-info" role="alert">
                        <strong>Resultado (bcrypt):</strong> <?php echo htmlspecialchars($hash, ENT_QUOTES, 'UTF-8'); ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</body>
</html>
