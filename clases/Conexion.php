<?php
class Conexion{
    private $server;
    private $user;
    private $password;
    private $database;
    private $port; 

    private $conexion;

    function __construct(){
        $listadatos= $this->datosConexion();
        foreach($listadatos as $key => $value){
            $this->server= $value['server'];
            $this->user= $value['user'];
            $this->password= $value['password'];
            $this->database= $value['database'];
            $this->port= $value['port']; 
        }
        $this->conexion= mysqli_connect($this->server.":". $this->port,$this->user, $this->password, $this->database);
        if(!$this->conexion){
            echo "algo va mal en la conexion";
            die();
        }
    }

    private function datosConexion(){
        $direccion = dirname(__FILE__);
        $jsondata = file_get_contents($direccion."/"."config");
        return json_decode($jsondata, true);
    }

}


?>