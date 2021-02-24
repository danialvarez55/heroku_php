<?php
include 'head.php';
//Si he pulsado el botón calcular
if(isset($_REQUEST['btn_calcular']))
{
    $constante = $_REQUEST['cmb_ritmo'];
    $peso = $_REQUEST['txt_peso'];
    $tiempo = $_REQUEST['txt_tiempo'];
    $conversor_tiempo = $_REQUEST['rb_medida'];
    $calorias_mayores = 0;
    
    if($conversor_tiempo == 60)
    {
        $tiempo = $tiempo / $conversor_tiempo;
    }
    else
    {
        $tiempo *= 1;
    }
    $resultado_final = $constante * $peso * ($tiempo) + $calorias_mayores;


    //if(isset($_REQUEST['chk_cuesta']))
    //{
       // $calorias_mayores = $tiempo * 2;
   // }
   // else
    //{
       // $calorias_mayores = 0;
   // }
   // $resultado_final = $constante * $peso * ($tiempo) + $calorias_mayores;
}
echo'  

   
     <div class="postcontent">
      <h2>Calculadora de calorías quemadas en bicicleta   </h2>
              <form action="SolucionEjercicio.php" method="post">              
                    <p>
                    <form>
                        <table align="center" border="2">

                            <tr>
                                <td align="right">Ritmo:</td>  
                                <td colspan=2>
                                    <select id="cmb_ritmo" name="cmb_ritmo">
                                    <option value="4">Bicicleta < 16 km/h  </option>
                                    <option value="6">Bicicleta 16-19 km/h </option>
                                    <option value="8">Bicicleta 19-22 km/h </option>
                                    <option value="10">Bicicleta 22-25km/h </option>
                                    <option value="12">Bicicleta 25-32 km/h </option>
                                    <option value="16">Bicicleta > 32 km/h </option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td align="right">Tu Peso :</td>
                                <td>
                                    <input type="text"   name="txt_peso" size="7" /> Kg
                                </td>
                            </tr>
                            <tr>
                                <td align="right">Tiempo de Actividad :</td>
                                <td>
                                    <input type="text"  name="txt_tiempo" size="7" />
                                    <input type="radio"  name="rb_medida"  checked="checked" value="60"/>Minutos	
                                    <input type="radio"  name="rb_medida"  value="1"/>Horas
                                    </td>
                             </tr>  
                             <tr>
                             <td>¿Pedaleas cuesta arriba? </td>
                                <td> <input type="checkbox" name="chk_cuesta" size="7" value="2" />
                             120 calorias a mayores a la hora (2 calorias al minuto)</td>
                             </tr>
                            
                            <tr>
                                <td colspan="2">
                                    <div align="center"><strong>
                                           
                                            <input name="btn_calcular" type="submit" id="btn_calcular" value="Calcular"/>
                                        </strong>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </form>
                    <br>
                    <fieldset>
                        <legend>Cantidad de calorias quemadas</legend>	
                        Has quemado <input type="text" id="txt_calorias" name="txt_calorias" size="10" value="'.$resultado_final.'"/> calorias

                    </fieldset>



                </div>


                <div style="clear: both;"></div>
            </div>
        </div>
       
';

include 'pie.php';

$sin_cuesta = $ritmo * $peso * $conversion;

    if (isset($_REQUEST['cuesta'])) {
        echo 'Calorias quemadas : ',$sin_cuesta + ($conversion * $_REQUEST['cuesta']);
    } else {
        echo 'Calorias quemadas : ',$sin_cuesta;
    }