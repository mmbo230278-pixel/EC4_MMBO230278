<?php
// MODELO DE NEGOCIO: salario semanal
require __DIR__ . '/../../includes/plantilla.php';

$pago_hora  = 16;
$pago_extra = 20;
$limite     = 40;

$nombre = leer_nombre();
$horas  = leer_numero('horas', 1, 100);

if ($horas <= $limite) {
    $horas_normales = $horas;
    $horas_extra    = 0;
} else {
    $horas_normales = $limite;
    $horas_extra    = $horas - $limite;
}
$pago_normal = $horas_normales * $pago_hora;
$pago_extras = $horas_extra * $pago_extra;
$salario     = $pago_normal + $pago_extras;

encabezado('Recibo de pago', 'tema-obrero', 'logo.svg');
?>
        <div class="ticket">
            <div class="ticket-cab"><img src="../img/logo.svg" alt="Logo"><h3>RECIBO DE PAGO SEMANAL</h3></div>
            <div class="ticket-cuerpo">
                <p class="mb-1"><b>Fecha:</b> <?php echo date('d/m/Y'); ?></p>
                <p><b>Trabajador:</b> <?php echo $nombre; ?></p>
                <table class="table table-sm">
                    <tr><td>Horas normales</td><td class="text-end"><?php echo $horas_normales; ?> h × <?php echo dinero($pago_hora); ?> = <?php echo dinero($pago_normal); ?></td></tr>
                    <tr><td>Horas extra</td><td class="text-end"><?php echo $horas_extra; ?> h × <?php echo dinero($pago_extra); ?> = <?php echo dinero($pago_extras); ?></td></tr>
                    <tr><td>Total de horas</td><td class="text-end"><?php echo $horas; ?> h</td></tr>
                </table>
            </div>
            <div class="ticket-total">SALARIO SEMANAL: <?php echo dinero($salario); ?></div>
            <div class="ticket-pie">Para imprimir este recibo presiona Ctrl + P</div>
        </div>
<?php pie(); ?>
