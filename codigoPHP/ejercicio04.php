<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 3</title>
    </head>
    <body>
        <?php
        
            /* 
            * @author: Raúl Núñez Sebastián.
            * @since: 28-10-2020.
            * Ejercicio 04 - Formulario de búsqueda de departamentos por descripción (por una parte del campo DescDepartamento, 
                             si el usuario no pone nada deben aparecer todos los departamentos).
            */
        
            require_once '../core/201008libreriaValidacion.php';
            require_once '../config/confDBPDO.php';

            $aErrores = ["DescDepartamento" => null];
            
            define ('OBLIGATORIO',1); //Creo una constante $OBLIGATORIO y le asigno un 1.
            
            $entradaOk = true; //Creo una variable booleana y la inicializo a true.
            
            $aRespuesta = ["DescDepartamento" => null]; //Creo un array de comprobación y lo inicializo a null.
            
            if(isset ($_REQUEST['enviar'])){ //Compruebo que el usuario le ha dado al botón enviar.
                
                 $aErrores["DescDepartamento"] = validacionFormularios::comprobarAlfaNumerico($_REQUEST ["DescDepartamento"],255,0,0); //Compruebo que el campo DescDepartamento que introduce el usuario es válido.
                 
                 foreach ($aErrores as $clave => $valor){ //Recorro con un foreach el array de errores que está compuesto por la clave y el valor (null).
                       if($valor!=null){ //Compruebo que el campo del formulario está rellenado.
                           $entradaOk=false; 
                       }
                   }
            }else{
                $entradaOk=false;
            }
            if($entradaOk){ //Si los campos son correctos los almaceno y se los muestro al usuario.
                
                $aRespuesta["DescDepartamento"] = $_REQUEST["DescDepartamento"];

                try{
                    $miDB = new PDO(DNS, USER, PASSWORD); //Establezco la conexión a la base de datos instanciado un objeto PDO.
                    $miDB ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Cuando se produce un error lanza una excepción utilizando PDOException.

                    $consulta = $miDB->prepare("select * from Departamento where DescDepartamento like '%{$aRespuesta['DescDepartamento']}%'"); //Creo una variable y le añado una consulta preparada que devuelve un objeto de la clase PDOStatement.
                    
                    $consulta->execute(); //Ejecuta la consulta.
                    
                    if($consulta->rowCount()>0){ //Compruebo que existen los departamentos que busca el usuario y muestro un mensaje de que la búsqueda ha sido realizada con éxito.
                        echo "<p style='color:green;'>Búsqueda realizada con éxito</p>";
                    
                        ?>
                            <table>
                                <tr>
                                    <td><b>CodDepartamento</b></td>
                                    <td><b>DescDepartamento</b></td>
                                    <td><b>VolumenNegocio</b></td>
                                </tr>

                        <?php
                            $oRegistro=$consulta->fetchObject(); //Creo una variable $oRegistro y hago una lectura anticipada que lo que hace es sacar el primer registro avanzando el puntero a la siguiente posición.
                            while($oRegistro){ 
                        ?>
                                <tr>
                                    <td><?php echo $oRegistro->CodDepartamento;//Muestra el contenido del campo CodDepartamento?></td>
                                    <td><?php echo $oRegistro->DescDepartamento;//Muestra el contenido del campo DescDepartamento?></td>
                                    <td><?php echo $oRegistro->VolumenNegocio;//Muestra el contenido del campo VolumenNegocio?></td>
                                </tr>
                        <?php
                            $oRegistro=$consulta->fetchObject(); //Vuelvo a sacar el primer registro avanzando el puntero a la siguiente posición una vez recorridos los campos anteriores.
                            } 
                        ?>
                            </table>
                        <?php
                    
                    }else{
                        echo"<p style='color:red;'>No existe ningún departamento creado</p>"; //Muestro un mensaje si no hay ningún departamento creado.
                    }
                
                }catch (PDOException $miExcepcionPDO){ //Creo una excepción de errores.
                    echo "Error ".$miExcepcionPDO->getMessage(); //Muestro el mensaje de la excepción de errores.
                    echo "Código de error ".$miExcepcionPDO->getCode(); //Muestro el código del error.
                } finally {
                    unset($miDB); //Cierro la conexión a la base de datos.
                }
            }else{
                
        ?>
            <form name="formulario1" action="<?php echo $_SERVER['PHP_SELF'];//Muestro la información del formulario en la misma página que se está ejecutando en el fichero actual.?>" method="post">
            <fieldset>
                <legend><b>BUSCA UN DEPARTAMENTO POR DESCRIPCIÓN</b></legend>
                    <div>
                        <b><label for="DescDepartamento">Descripción del departamento: </label></b>
                        <input type="text" name="DescDepartamento" placeholder="Ej: inf" value="<?php 
                                if($aErrores["DescDepartamento"] == null && isset($_REQUEST["DescDepartamento"])){ //Compruebo  que los campos del array de errores están vacíos y el usuario le ha dado al botón de enviar.
                                    echo $_REQUEST["DescDepartamento"]; //Devuelve el campo que ha escrito previamente el usuario.
                                }
                                ?>">
                        <span style="color:red">
                            <?php
                                if ($aErrores["DescDepartamento"] != null) { //Compruebo que el array de errores no está vacío.
                                    echo $aErrores["DescDepartamento"]; //Si hay errores, devuelve el campo vacío y muestra una advertencia de los errores y como tiene que estar escrito ese campo.
                                }
                            ?>
                        </span>
                    </div>
                <br>
                    <button type="submit" name="enviar">Enviar</button>
            </fieldset>
        </form>
        <?php
            }
        ?>
    </body>
</html>

