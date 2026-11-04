<?php
// MODELO DE NEGOCIO: frutería
require __DIR__ . '/../../includes/plantilla.php';

$kilos  = leer_numero('kilos', 0.01, 1000);
$precio = leer_numero('precio', 1, 1000);

if ($kilos <= 2)       { $porcentaje = 0;  }
elseif ($kilos <= 5)   { $porcentaje = 10; }
elseif ($kilos <= 10)  { $porcentaje = 15; }
else                   { $porcentaje = 20; }

$subtotal  = $kilos * $precio;
$descuento = $subtotal * ($porcentaje / 100);
$total     = $subtotal - $descuento;

encabezado('Frutería · Ticket de compra', 'tema-fruteria', 'logo.svg');
?>
        <div class="ticket">
            <div class="ticket-cab"><img src="../img/logo.svg" alt="Logo"><h3>TICKET DE COMPRA</h3></div>
            <div class="ticket-cuerpo">
                <p><b>Fecha:</b> <?php echo date('d/m/Y H:i'); ?></p>
                <table class="table table-sm">
                    <tr><td>Manzanas</td><td class="text-end"><?php echo $kilos; ?> kg × <?php echo dinero($precio); ?></td></tr>
                    <tr><td>Subtotal</td><td class="text-end"><?php echo dinero($subtotal); ?></td></tr>
                    <tr><td>Descuento (<?php echo $porcentaje; ?>%)</td><td class="text-end">− <?php echo dinero($descuento); ?></td></tr>
                </table>
            </div>
            <div class="ticket-total">A PAGAR: <?php echo dinero($total); ?></div>
            <div class="ticket-pie">¡Gracias por su compra!</div>
        </div>
<?php pie(); ?>
