<?php
session_start();
include 'head.php';
require_once 'clases/conexion.php';


if(isset($_REQUEST['enviar']))
 {
      $obj_conexion=new Conexion();
      $con=$obj_conexion->conectar();//ya tengo en esa variable la conexion

try{  
      //Recojo los datos
      $urgente=$_REQUEST['urgente'];
      $tipo=$_REQUEST['tipo'];
      $lugar=$_REQUEST['lugar'];
      $descripción=$_REQUEST['descripcion'];
      $_SERVER['REMOTE_ADDR'];
      $sql1 ="INSERT INTO Incidencia(urgente,tipo,,lugar,fecha_Actual,IP,descripción) VALUES (?,?,?,?,?,?)";
      $insercion =$con->prepare($sql1);
      //$insercion->execute(array($urgente,$tipo,,$lugar,$fecha_Actual,$IP, $descripción));
      echo '<script>alert("Insercion Correcta")</script>';
   }catch (PDOException $e) {
      print "Fallo insercion" . $e->getMessage();
      
  }  

      if(isset($_REQUEST['urgente'])){

            $urgente = "SI";
      }else{
            $urgente = "NO";
      }

      //Incidencia con fecha
      $fecha_Actual = date('d-m-Y H:i:s');
      //Dirección IP
      $IP = $_SERVER['REMOTE_ADDR'];
   

      //añadimos la incidencia
      $_SESSION['incidencia'][]=array ($_SESSION['Num_incremento'],$urgente,$tipo,$lugar,$descripción, $IP ,$fecha_Actual);
      // Incrementamos 
      $_SESSION['Num_incremento']++;

echo '<pre>';
var_dump($_SESSION['incidencia']);
echo '</pre>';


 


 print' 
        <h2 class="postheader">FORMULARIO ALTA INCIDENCIA</h2>
                                     
        <div   class="postcontent"><form action="" method="post">
            <table align="center" class="content-layout">
              <tr>
              <td align="right"><strong>Urgente? :</strong></td>
              <td>

              <input type="checkbox" name="urgente" value="urg"/</td></tr>
              <tr><td align="right"><strong>Tipo :</strong></td><td>
              <div align="left">
                    <select name="tipo">
                      <option value="Basuras">Basuras</option>
                      <option value="Aseo Urbano">Aseo Urbano</option>
                      <option value="Mobiliario Urbano">Mobiliario Urbano</option>
                      <option value="Vandalismo">Vandalismo</option>
                       <option value="Transporte">Transporte</option>
                      <option value="Señales y Semaforos">Señales y Semaforos</option>
                      <option value="Mobiliario Urbano">Otros</option>
                      
                    </select>
              </div></td></tr>
              
              <tr><td align="right"><strong>Lugar :</strong></td><td>
              <div align="left">
                    <input type="text" name="lugar" size=35"/>
              </div></td></tr>
              <tr><td align="right"><strong>Descripcion: </strong></td><td>
              <div align="left">
                    <textarea cols=50 rows=4 name="descripcion"></textarea>
              </div></td></tr>
              <tr ><td colspan="2"><div align="center"><strong>
            <input name="enviar" type="submit" id="enviar" value="Dar de alta"/>
            </strong></div></td></tr>
        </table>
    </form>
        </div>
<div id="imagen1">
        

        </div>        
';

 include 'pie.php';
}else
header("location: index.php");										