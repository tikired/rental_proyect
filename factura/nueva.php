<?php

$mensaje = "";

if (isset($_POST['numero_factura'])) {
	//Se reciben datos nuevos para insertar
	$bd = new PDO('mysql:host=localhost;dbname=rentaldb', 'root', '');
	
	$sql = "INSERT INTO factura(NUMERO_FACTURA, EMPRESA, FECHA_EMISION, NUMERO_OC, NETO, IVA, TOTAL, FECHA_PAGO, ESTADO) 
	VALUES ('{$_POST['numero_factura']}', '{$_POST['empresa']}', '{$_POST['fecha_emision']}', '{$_POST['numero_oc']}', '{$_POST['neto']}','{$_POST['iva']}', '{$_POST['total']}', '{$_POST['fecha_pago']}', '{$_POST['estado']}')";
	
	$resultado = $bd->exec($sql);
	
	if ($resultado == 1)
		$mensaje = "Se insertó la nueva factura correctamente.";
	
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf8">
    <title>Agregar Factura</title>
</head>
<script type="text/javascript">
	function calcular() {
		var totalR = eval(parseInt(document.nuevo.valorNeto.value*19)/100);
		document.getElementById('iva').value = totalR;

		var totalFinal =  eval(parseInt(totalR) + parseInt(document.nuevo.valorNeto.value));
		document.getElementById('total').value = totalFinal;
	}

</script>
<!-- Cuerpo de la página -->
<body>  
    <main>
    <div>
		<h2>Ingresar Nueva Factura</h2>
		
		<p><?php echo $mensaje; ?></p>  
		<form name="nuevo" method="post" action="">
		<table>
			<tr>
				<td>Número Factura:</td>
				<td><input type="number" name="numero_factura" maxlength="500" required></td>
			</tr>
			<tr>
				<td>Empresa:</td>
				<td><input type="text" name="empresa" maxlength="500" required></td>
			</tr>
			<tr>
			<tr>
				<td>Fecha de Emisión:</td>
				<td><input type="date" name="fecha_emision" required></td>
			</tr>
			<tr>
				<td>Número Orden de Compra:</td>
				<td><input type="number" name="numero_oc" maxlength="500" required></td>
			</tr>
			<tr>
				<td>Valor Neto:</td>
				<td><input nombre="valorNeto" onkeyup="calcular()" id="valorNeto" type="number" name="neto" maxlength="500" required></td>
			</tr>
			<tr>
				<td>Iva:</td>
				<td><input id="iva"  type="number" name="iva" maxlength="500" required readonly></td>
			</tr>
			<tr>
				<td>Total:</td>
				<td><input id="total" type="number" name="total" maxlength="500" required readonly></td>
			</tr> 
			<tr>
				<td>Fecha de Pago:</td>
				<td><input type="date" name="fecha_pago" required></td>
			</tr>
			<tr>
				<td>Estado:</td>
				<td><input type="text" name="estado" maxlength="500" required></td>
			</tr> 
			<br />
			<tr>
				<td colspan="2">
					<input type="reset">
					<input type="submit">
					<button type="button" onclick="window.location.href='factura.php'">Volver</button>
				</td>
			</tr>
		</form>
    </main>
    </div>
</body>
</html>