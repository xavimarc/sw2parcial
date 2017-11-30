<?php

class conexion{
    private $servidor;
    private $usuario;
    private $contraseña;
    private $basedatos;
    public  $conexion;

    public function __construct(){
        $this->servidor   = "us-cdbr-iron-east-05.cleardb.net";
	$this->usuario	  = "b28997ab5fdfb1";
	$this->contraseña = "9e18243a";
	$this->basedatos  = "heroku_b97c06a746f54b7?reconnect=true";
    }

    function conectar(){
        $this->conexion = new mysqli($this->servidor, $this->usuario, $this->contraseña, $this->basedatos);
    }

    function cerrar(){
        $this->conexion->close();
    }
}
