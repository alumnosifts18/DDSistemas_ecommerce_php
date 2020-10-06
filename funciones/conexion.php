<?php

$localServer = $_SERVER['HTTP_HOST'];

const SERVER    = 'localhost';
const USUARIO   = 'root';
const CLAVE     = '';
const BASE      = 'catalogo';
	
const XAMPPSERVER    = 'localhost';
const XAMPPUSUARIO   = 'root';
const XAMPPCLAVE     = '';
const XAMPPBASE      = 'catalogo';


if ($localServer == 'localhost')
{
	function conectar()
	{
		$link = mysqli_connect(
			XAMPPSERVER,
			XAMPPUSUARIO,
			XAMPPCLAVE,
			XAMPPBASE
		);
		return $link;
	}
}
else
{
	function conectar()
	{
		$link = mysqli_connect(
			SERVER,
			USUARIO,
			CLAVE,
			BASE
		);
		return $link;
	}
}