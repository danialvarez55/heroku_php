<?php
require_once 'clases/Conexion.php';
session_start();

if (isset($_REQUEST['login']))//si has pulsado el boton login
{
    try{
    $obj_conexion=new Conexion();
    $con=$obj_conexion->conectar();//ya tengo en esa variable la conexion
    $usuario=$_REQUEST['usuario'];
    $pass=sha1($_REQUEST['pass']);
    $sql="select * from usuarios_login where usuario=? and pass=?";
      $listado=$con->prepare($sql);
      $listado->execute(array($usuario,$pass));
      //$filas es un array asociativo con los registros de la consulta
      $filas=$listado->fetchAll();
      if (count($filas)>0)
      {
         $_SESSION['logueado']=true;
         header("Location: inicio.php");
      }
    }catch (PDOException $e) {
        echo "Fallo en el acceso a la BD" . $e->getMessage();
        
    }  

}
echo'<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="css/login.css" rel="stylesheet" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<div class="login">
<h1>Login</h1>
<form method="post">
    <input type="text" name="usuario" placeholder="Username" required="required" />
    <input type="password" name="pass" placeholder="Password" required="required" />
    <button type="submit" name="login" class="btn btn-primary btn-block btn-large">Log in.</button>
</form>
</div>
</body>
</html>';