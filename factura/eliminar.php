<?php
if (isset($_GET['id'])) {
	//Se envió un id para eliminar
	$bd = new PDO('mysql:host=localhost;dbname=rentaldb', 'root', '');
	
	$sql = "DELETE FROM factura WHERE NUMERO_FACTURA = " . $_GET['id'];
	
	$bd->exec($sql);
	
	header('Location: factura.php');
}
else {
	//No se envió id
	echo "Error!";
}

?>