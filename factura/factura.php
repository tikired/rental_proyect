<?php 

$bd = new PDO('mysql:host=localhost;dbname=rentaldb', 'root', '');

$sql = "SELECT * FROM factura";

$resultado = $bd->query($sql);

 ?>

<!DOCTYPE html>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/form-elements.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/hover.css">
	<title>Sistema de Registro de Facturas</title>
</head>
<body>
	<nav class="navbar-collapse">
      <a class="navbar-brand" href="#">Bienvenido</a>
    <ul class="nav navbar-nav">
      <li class="active"><a href="factura.php">Inicio</a></li>
      <li><a href="#">Entrega de Equipos</a></li>
      <li><a href="#">Retiro de Equipos</a></li>
      <li><a href="#"><div class="input-group">
  <span class="input-group-addon">Buscar</span>
  <input id="filtrar" type="text" class="form-control" placeholder="Ingresa el número de factura a buscar...">
</div>
    </ul>
    </nav>
	<div class="tabla">
    <main>
        <table class="table" border="1">
            <thead>
                <tr>
                    <th>Número Factura</th>
				    <th>Nombre Empresa</th> 
				    <th>Fecha Emisión</th>
				    <th>Número Orden de Compra</th>
				    <th>Valor Neto</th>
				    <th>Iva</th>
				    <th>Total</th>
				    <th>Fecha de Pago</th>
				    <th>Estado</th>
				    <th>Editar</th>
				    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody class="buscar">
				<?php
				foreach($resultado as $fila) {
				?>
                <tr>
                    <td><?php echo $fila['NUMERO_FACTURA']; ?></td>
				    <td><?php echo $fila['EMPRESA']; ?></td> 
				    <td><?php echo $fila['FECHA_EMISION']; ?></td>
				    <td><?php echo $fila['NUMERO_OC']; ?></td>
				    <td><?php echo $fila['NETO']; ?></td>
				    <td><?php echo $fila['IVA']; ?></td>
				    <td><?php echo $fila['TOTAL']; ?></td>
				    <td><?php echo $fila['FECHA_PAGO']; ?></td>
				    <td><?php echo $fila['ESTADO']; ?></td>
                    <td>
                        <a style="color: white;" class="btn btn-primary" href="modificar.php?id=<?php echo $fila['NUMERO_FACTURA']; ?>">Modificar</a>
                    </td>
                    <td>
						<a style="color: white;" class="btn btn-danger" href="eliminar.php?id=<?php echo $fila['NUMERO_FACTURA']; ?>" onclick="javascript:return confirmar();">Eliminar</a>
                    </td>
                </tr>
				<?php
				}
				?>
            </tbody>
        </table>
        <hr>
        	<div>
        		<button type="button" class="btn btn-primary hvr-float-shadow" onclick="window.location.href='nueva.php'">Agregar Factura</button>
        	</div>
        	<script type="text/javascript">
        		$(document).ready(function () {
 
            (function ($) {
 
                $('#filtrar').keyup(function () {
 
                    var rex = new RegExp($(this).val(), 'i');
                    $('.buscar tr').hide();
                    $('.buscar tr').filter(function () {
                        return rex.test($(this).text());
                    }).show();
 
                })
 
            }(jQuery));
 
        });
        	</script>

    </main>
    </div>
</body>
<!-- Footer -->
<footer class="page-footer font-small blue pt-4 mt-4">
    <div class="container-fluid text-center text-md-left">
      <div class="row">
        <div class="col-md-6 mt-md-0 mt-3">
          <h5 class="text-uppercase">Footer Content</h5>
          <p>Here you can use rows and columns here to organize your footer content.</p>
        </div>
        <hr class="clearfix w-100 d-md-none pb-3">

        <div class="col-md-3 mb-md-0 mb-3">

            <h5 class="text-uppercase">Links</h5>

            <ul class="list-unstyled">
              <li>
                <a href="#!">Link 1</a>
              </li>
              <li>
                <a href="#!">Link 2</a>
              </li>
              <li>
                <a href="#!">Link 3</a>
              </li>
              <li>
                <a href="#!">Link 4</a>
              </li>
            </ul>
          </div>
          <div class="col-md-3 mb-md-0 mb-3">
            <h5 class="text-uppercase">Links</h5>
            <ul class="list-unstyled">
              <li>
                <a href="https://www.delmonte.com/" target="_blank">Del Monte Fresh</a>
              </li>
              <li>
                <a href="http://www.imaco.cl/">Imaco LTDA</a>
              </li>
              <li>
                <a href="#!">Link 3</a>
              </li>
              <li>
                <a href="#!">Link 4</a>
              </li>
            </ul>
          </div>
      </div>
    </div>
    <div class="footer-copyright text-center py-3">© 2018 Copyright
    </div>
    <br>
  </footer>
</html>