<?php
session_start();
include 'head.php';
require_once 'clases/conexion.php';
                
if(isset($_REQUEST['borrar']))
{
  $obj_conexion=new Conexion();
  $con=$obj_conexion->conectar();//ya tengo en esa variable la conexion

try  {

 //recojo los datos
  $incidencia =$_POST['num_incidencia'];


  //Borramos la BD
  $sql1 ="DELETE FROM incidencia WHERE  num_incidencia=?";
  $borrado =$con->prepare($sql1);
  $borrado->execute(array($incidencia));
  $filas_Afectadas=$borrado-> rowCount();
  if ($filas_Afectadas>0)
      echo '<script>alert("Insercion borrada con exito")</script>';
  else 
      echo '<script>alert("No se ha encontrado niguna insercion")</script>';

}catch (PDOException $e) {
  print "Fallo insercion" . $e->getMessage();
  
}


}

$num_indicencia = $_REQUEST['num_incidencia'];


//Numero de incidencias antes de borrar
  $contador_antes=count($_SESSION['incidencia']);

//Borro en el array
unset($_SESSION['incidencia'][$num_indicencia]);

//Numero de incidencias despues de borrar
$contador_despues=count($_SESSION['incidencia']);
if ($contador_antes==$contador_despues)
{
  echo '<script>alert("No se encuentra esa incidencia");</script>';
}

else
 {
  unset($_SESSION['incidencia'][$num_indicencia]);
  echo '<script>alert("La incidencia se borro correctamente");</script>';
 }



echo '<pre>';
var_dump($_SESSION['incidencia']);
echo '</pre>';

 print' 
            <strong>INTRODUCE EL IDENTIFICADOR DE LA INCIDENCIA A BORRAR<BR><BR></strong>
                                     
        <div   class="postcontent"><form action="" method="post">
            <table align="center" class="content-layout">
              
              
              <tr><td align="right"><strong>Num Incidencia :</strong></td><td>
              <div align="left">
                    <input type="text" name="num_incidencia"/>
              </div></td></tr>
              
              <tr ><td colspan="2"><div align="center"><strong>
            <input name="borrar" type="submit" id="borrar" value="Dar de Baja"/>
            </strong></div></td></tr>
        </table>
    </form>
        </div>';
 include 'pie.php';
}else
header("location: index.php")