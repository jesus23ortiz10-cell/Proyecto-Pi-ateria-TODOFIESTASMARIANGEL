<?php
echo <<<'HTML'
<!DOCTYPE html>
<html lang="es"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Todo Fiestas Mariangel</title><link rel="stylesheet" href="estilos.css"></head><body>
<div id="menu"></div>
<main>
<h2>Todo Fiestas Mariangel - Control de Inventario</h2>
<p>Salazar, Norte de Santander</p>
<div class="tarjetas" id="tarjetas"></div>
<h3>Productos con stock bajo</h3>
<table><thead><tr><th>Producto</th><th>Stock</th><th>Mínimo</th></tr></thead><tbody id="bajos"></tbody></table>
</main>
<script src="datos.js"></script>
<script>
menu('index.html');
const r=api('reportes','inicio');
let t='<div class="tarjeta"><b>'+r.productos+'</b>Productos</div><div class="tarjeta"><b>'+r.bajos.length+'</b>Stock bajo</div>';
if(r.valor!==undefined) t+='<div class="tarjeta"><b>'+dinero(r.valor)+'</b>Valor del inventario</div><div class="tarjeta"><b>'+r.ventas+'</b>Ventas realizadas</div>';
$('tarjetas').innerHTML=t;
$('bajos').innerHTML=r.bajos.map(x=>'<tr class="bajo"><td>'+esc(x.nombre)+'</td><td>'+x.stock+'</td><td>'+x.minimo+'</td></tr>').join('')||'<tr><td colspan="3">Todo en orden</td></tr>';
</script></body></html>
HTML;
?>