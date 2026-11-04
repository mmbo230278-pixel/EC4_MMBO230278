<?php
// plantilla.php: cabecera y pie comunes para los informes de salida
function encabezado($titulo, $tema, $logo) { ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $titulo; ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/estilos.css">
</head>
<body class="<?php echo $tema; ?>">
    <header class="encabezado no-imprimir">
        <img src="../img/<?php echo $logo; ?>" alt="Logo">
        <h1><?php echo $titulo; ?></h1>
    </header>
    <main class="contenedor"><div class="tarjeta">
<?php }

function pie($volver = '../index.html') { ?>
        <div class="text-center mt-4 no-imprimir">
            <button class="btn btn-principal btn-lg" onclick="window.print()">Imprimir (Ctrl + P)</button>
            <a class="btn btn-outline-dark btn-lg" href="<?php echo $volver; ?>">Nueva operación</a>
        </div>
    </div></main>
</body>
</html>
<?php }

// Lee un número del formulario (POST) y lo valida en el servidor
function leer_numero($campo, $min, $max, $entero = false) {
    $v = trim($_POST[$campo] ?? '');
    $patron = $entero ? '/^[0-9]+$/' : '/^[0-9]+(\.[0-9]{1,2})?$/';
    if (!preg_match($patron, $v) || $v < $min || $v > $max) { error_datos(); }
    return $entero ? (int)$v : (float)$v;
}
function leer_nombre() {
    $v = trim($_POST['nombre'] ?? '');
    if (!preg_match('/^[\p{L} ]{3,60}$/u', $v)) { error_datos(); }
    return htmlspecialchars($v, ENT_QUOTES, 'UTF-8');
}
function error_datos() {
    http_response_code(400);
    exit('<div style="font-family:sans-serif;padding:2rem"><h2>Datos no válidos</h2><p>Revisa el formulario e inténtalo de nuevo.</p><a href="javascript:history.back()">&larr; Volver</a></div>');
}
function dinero($n) { return '$' . number_format($n, 2); }
