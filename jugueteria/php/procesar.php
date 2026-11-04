<?php
// MODELO DE NEGOCIO: Juguetería (todas las variables son enteros, en gramos)
require __DIR__ . '/../../includes/plantilla.php';

$peso_payaso = 112;   // gramos por payaso
$peso_muneca = 104;   // gramos por muñeca (según el enunciado)

$Npayasos = leer_numero('npayasos', 0, 10000, true);
$Nmunecas = leer_numero('nmunecas', 0, 10000, true);

$paquetepayaso  = $Npayasos * $peso_payaso;
$paquetemunecas = $Nmunecas * $peso_muneca;
$pesototal      = $paquetepayaso + $paquetemunecas;

encabezado('Juguetería · Informe del paquete', 'tema-jugueteria', 'logo.svg');
?>
        <h2>Peso del paquete a enviar</h2>
        <div class="ilustracion mb-3">
            <img src="../img/payaso.svg" alt="Payaso"><img src="../img/muneca.svg" alt="Muñeca">
        </div>
        <table class="table table-bordered table-striped text-center">
            <thead class="table-dark"><tr><th>Producto</th><th>Cantidad</th><th>Peso unitario</th><th>Subtotal</th></tr></thead>
            <tbody>
                <tr><td>Payasos</td><td><?php echo $Npayasos; ?></td><td><?php echo $peso_payaso; ?> g</td><td><?php echo number_format($paquetepayaso); ?> g</td></tr>
                <tr><td>Muñecas</td><td><?php echo $Nmunecas; ?></td><td><?php echo $peso_muneca; ?> g</td><td><?php echo number_format($paquetemunecas); ?> g</td></tr>
            </tbody>
            <tfoot><tr class="table-warning"><th colspan="3">PESO TOTAL DEL PAQUETE</th>
                <th><?php echo number_format($pesototal); ?> g (<?php echo number_format($pesototal / 1000, 3); ?> kg)</th></tr></tfoot>
        </table>
<?php pie(); ?>
