<?php

session_start();
include 'head.php';
require_once 'clases/conexion.php';
if (isset($_REQUEST['listar'])) 
{
  $obj_conexion=new Conexion();
  $con=$obj_conexion->conectar();//ya tengo en esa variable la conexion

try{
$tipo=$_REQUEST['tipo'];
$sql ="SELECT * FROM indicencias WHERE id_tipo=?";
$listado =$con->prepare($sql);
$listado->execute(array($tipo));
$filas=$listado -> fetchAll();// $filas es un array asociativo

echo '<table>
  <tr
    <th>Urgente</th>
    <th>Tipo</th>
    <th>Lugar</th>
    <th>Descripcion</th>
  </tr>';

//$valor es otro array
foreach ($fila as $clave => $valor)
{

  echo '<tr>';
  echo '<td>' . $valor[1] . '</td>';
  echo '<td>' . $valor[2] . '</td>';
  echo '<td>' . $valor[4] . '</td>';
  echo '<td>' . $valor[6] . '</td>';
  echo '</tr>';


}

echo '</table>';

echo '<pre>';
var_dump($filas);
echo '</pre>';
}catch (PDOException $e) {
  print "Fallo en el listado" . $e->getMessage();
  
}


  $tipo = $_REQUEST['tipo'];
  echo '<table>
  <tr>
    <th>ID</th>
    <th>Urgente</th>
    <th>Fecha</th>
    <th>Lugar</th>
    <th>IP</th>
  </tr>';

  foreach ($_SESSION['incidencia'] as $clave => $valor) {
    if ($valor[2] == $tipo) {
      echo '<tr>';
      echo '<td>' . $valor[0] . '</td>';
      echo '<td>' . $valor[1] . '</td>';
      echo '<td>' . $valor[3] . '</td>';
      echo '<td>' . $valor[4] . '</td>';
      echo '<td>' . $valor[5] . '</td>';
      echo '</tr>';
    }
  }
  echo '</table>';



}



else{




$sql ="SELECT * FROM tipo_indicencia ";
$listado =$con->prepare($sql);
$listado->execute();
$filas=$listado -> fetchAll();// $filas es un array asociativo


 print' 
         <strong>SELECCIONA EL TIPO DE INCIDENCIA A LISTAR<BR><BR></strong>
                                     
        <div   class="postcontent"><form action="" method="post">
            <table align="center" class="content-layout">
              										  </td></tr>
              <tr>
                <td align="right"><strong>Tipo :</strong></td><td>
                 <div align="left">
                    <select name="tipo">;
                    foreach ($fila as $clave => $valor)
                    {
                      echo '<option value="">' .$valor[0].'" .>  '</option>';
                    }
                    echo '</select>
                </div>
               </td>
              </tr>
              <tr >
              <td colspan="2"><div align="center"><strong>
                <input name="listar" type="submit" id="listar" value="Listar"/>
                </strong>
                </div>
              </td>
            </tr>
              
        </table>
    </form>
        </div>';



         
 include 'pie.php';

}