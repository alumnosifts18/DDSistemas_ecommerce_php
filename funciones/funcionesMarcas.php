<?php  

	##########################
	##### CRUD DE MARCAS #####

	function listarMarcas() 
	{
		$link = conectar();
		$sql = "SELECT idMarca, mkNombre
				FROM marcas ORDER BY mkNombre";

		$listadoMarcas = mysqli_query($link, $sql);
		return $listadoMarcas;
	}

	function agregarMarca() 
	{
		$mkNombre = $_POST['mkNombre'];

		$link = conectar();
		$sql = "INSERT INTO marcas (mkNombre) VALUES ('".$mkNombre."')";
		$resultado = mysqli_query($link, $sql);
		return $resultado;
	}


	function verMarcaPorID()
	{
		$idMarca	= $_GET['idMarca'];
		$link = conectar();
		$sql = "SELECT idMarca, mkNombre
				FROM marcas
				WHERE idMarca = ".$idMarca;

		$resultado = mysqli_query($link, $sql)
					or die(mysqli_error($link)); // Control de errores. Le paso la conexión como parámetro
		$detalle = mysqli_fetch_array($resultado);
		return $detalle;
	}


	function modificarMarca()
	{
		$idMarca 			= $_POST['idMarca'];
		$mkNombre 			= $_POST['mkNombre'];

		$link = conectar();
		$sql = "UPDATE marcas
		SET mkNombre = '".$mkNombre."'
		WHERE 
			idMarca = ". $idMarca;

		$resultado = mysqli_query($link, $sql)
					or die(mysqli_error($link)); // Control de errores. Le paso la conexión como parámetro
		return $resultado;
	}


	function eliminarMarca() 
	{
		$idMarca = $_POST['idMarca'];
		$link = conectar();

		$sql = "DELETE FROM marcas WHERE idMarca = ". $idMarca;

		$resultado = mysqli_query($link, $sql)
					or die(mysqli_error($link)); // Control de errores. Le paso la conexión como parámetro
		return $resultado;
	}


	// Chequear si hay productos relacionados a esta marca
	function checkProductos1() {
		$idMarca = $_GET['idMarca'];
		$link = conectar();

		$sql = "SELECT 1 from productos
		WHERE idMarca = " . $idMarca; // Consulta para ver si hay algo o no.

		$resultado = mysqli_query($link, $sql)
			or die(mysqli_error($link)); // Control de errores. Le paso la conexión como parámetro
		$chequeo = mysqli_num_rows($resultado); // Como el mysqli_query devuelve un objeto, debo saber las filas que trae
		return $chequeo;
	}
