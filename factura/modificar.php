<?php

$bd = new PDO('mysql:host=localhost;dbname=rentaldb', 'root', '');

$mensaje = "";

if (isset($_POST['numero_factura'])) {
	//Se reciben datos nuevos para insertar
	
	$sql = "UPDATE factura SET NUMERO_FACTURA = '{$_POST['numero_factura']}', EMPRESA = '{$_POST['empresa']}', FECHA_EMISION = '{$_POST['fecha_emision']}', NUMERO_OC = '{$_POST['numero_oc']}', NETO = '{$_POST['neto']}', IVA = '{$_POST['iva']}', TOTAL = '{$_POST['total']}', FECHA_PAGO = '{$_POST['fecha_pago']}', ESTADO = '{$_POST['estado']}' WHERE NUMERO_FACTURA = {$_POST['id']}";
	
	$resultado = $bd->exec($sql);
	
	if ($resultado == 1)
		$mensaje = "Se modificó la factura correctamente.";
	
}



if (isset($_GET['id'])) {
	//Se envió id para modificar
	$sql = "SELECT * FROM factura WHERE NUMERO_FACTURA = ".$_GET['id'];
	
	$resultado = $bd->query($sql);
	$factura = $resultado->fetch();
	
}
else {
	//No se envió id
	die("Error!");
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf8">
    <title>Modificar Facturas</title>
</head>

<!-- Cuerpo de la página -->
<body>
    <main>
    <div class="container">
		<h2>Modificar Facturas</h2>
		
		<p><?php echo $mensaje; ?></p>
		
		<form name="modificar" method="post" action="">
		<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
		<table>
			<tr>
				<td>Número Factura:</td>
				<td><input type="number" name="numero_factura" maxlength="500" value="<?php echo $factura['NUMERO_FACTURA']; ?>" required></td>
			</tr>
			<tr>
				<td>Nombre Empresa:</td>
				<td><input type="text" name="empresa" maxlength="500" value="<?php echo $factura['EMPRESA']; ?>" required></td>
			</tr>
			<tr>
				<td>Fecha Emision:</td>
				<td><input type="date" name="fecha_emision" value="<?php echo $factura['FECHA_EMISION']; ?>"></td>
			</tr>
			<tr>
				<td>Número Orden de Compra:</td>
				<td><input type="number" name="numero_oc" maxlength="500" value="<?php echo $factura['NUMERO_OC']; ?>" required></td>
			</tr>
			<tr>
				<td>Valor Neto:</td>
				<td><input type="number" name="neto" maxlength="500" value="<?php echo $factura['NETO']; ?>" required></td>
			</tr>
			<tr>
				<td>Iva:</td>
				<td><input type="number" name="iva" maxlength="500" value="<?php echo $factura['IVA']; ?>" required></td>
			</tr>
			<tr>
				<td>Valor Total:</td>
				<td><input type="number" name="total" maxlength="500" value="<?php echo $factura['TOTAL']; ?>" required></td>
			</tr>
			<tr>
				<td>Fecha Pago:</td>
				<td><input type="date" name="fecha_pago" value="<?php echo $factura['FECHA_PAGO']; ?>"></td>
			</tr>
			<tr>
				<td>Estado:</td>
				<td><input type="text" name="estado" maxlength="500" value="<?php echo $factura['ESTADO']; ?>" required></td>
			</tr>
			<tr>
				<td colspan="2">
					<input type="reset">
					<input type="submit">
					<button type="button" class="btn btn-primary btn-block" onclick="window.location.href='factura.php'">Volver</button>
				</td>
			</tr>
		</table>
		</form>
    </main>
    </div>
</body>
</html>