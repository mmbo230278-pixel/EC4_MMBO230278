<?php
// MODELO DE NEGOCIO: Six Flags Morelos
require __DIR__ . '/../../includes/plantilla.php';

define('PRECIO_NORMAL', 2673);
// membresía => [nombre, % de descuento]
$membresias = ['ninguna'=>['Sin membresía',0], 'plata'=>['Plata',25], 'oro'=>['Oro',50], 'platino'=>['Platino',65]];

$nombre  = leer_nombre();
$boletos = leer_numero('boletos', 1, 100, true);
$clave   = $_POST['membresia'] ?? '';
if (!isset($membresias[$clave])) { error_datos(); }

list($tipo, $porcentaje) = $membresias[$clave];
$subtotal  = $boletos * PRECIO_NORMAL;
$descuento = $subtotal * ($porcentaje / 100);
$total     = $subtotal - $descuento;
$folio     = 'SF-' . date('ymd') . '-' . rand(1000, 9999);

encabezado('Six Flags Morelos · Ticket', 'tema-sixflags', 'logo.svg');
?>
        <div class="ticket">
            <div class="ticket-cab"><img src="../img/logo.svg" alt="Six Flags Morelos"><h3>TICKET DE COBRO</h3></div>
            <div class="ticket-cuerpo">
                <p class="mb-1"><b>Folio:</b> <?php echo $folio; ?> &nbsp; <b>Fecha:</b> <?php echo date('d/m/Y H:i'); ?></p>
                <p><b>Visitante:</b> <?php echo $nombre; ?></p>
                <table class="table table-sm">
                    <tr><td>Boletos</td><td class="text-end"><?php echo $boletos; ?> × <?php echo dinero(PRECIO_NORMAL); ?></td></tr>
                    <tr><td>Subtotal</td><td class="text-end"><?php echo dinero($subtotal); ?></td></tr>
                    <tr><td>Membresía: <b><?php echo $tipo; ?></b></td><td class="text-end">− <?php echo $porcentaje; ?>% (<?php echo dinero($descuento); ?>)</td></tr>
                </table>
            </div>
            <div class="ticket-total">TOTAL: <?php echo dinero($total); ?></div>
            <div class="ticket-pie">Presenta este ticket en el acceso al parque acuático. ¡Disfruta tu visita!</div>
        </div>
<?php pie(); ?>
