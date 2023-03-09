<?php
//Conexion a la Base de Datos
$servidor= "localhost";
$baseDeDatos= "GESTOR_WEB";
$usuario="root";
$contraseña="";
try{
    $conexion= new PDO("mysql:host=$servidor;dbname=$baseDeDatos",$usuario,$contraseña);
}catch(Exception $ex){
    echo $ex->getMessage();
}
?>