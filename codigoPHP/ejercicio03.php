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
            * @since: 04-11-2020.
            * Ejercicio 03 - Formulario para añadir un departamento a la tabla Departamento con validación de entrada y control de errores.
            */
        
            require_once '../core/201008libreriaValidacion.php';
            require_once '../config/confDBPDO.php';

            $aErrores = ["CodDepartamento" => null, //Creo un array de errores y lo inicializo a null con los campos de la tabla Departamentos.
                         "DescDepartamento" => null,
                         "VolumenNegocio" => null];
            
            define ('OBLIGATORIO',1); //Creo una constante $OBLIGATORIO y le asigno un 1.
            define ('MAX_FLOAT', 3.402823466E+38); //Creo una constante del máximo permitido en un campo float.
            define ('MIN_FLOAT', -3.402823466E+38); //Creo una constante del mínimo permitido en un campo float.
            
            $entradaOk = true; //Creo una variable booleana y la inicializo a true.
            
            $aRespuesta = ["CodDepartamento" => null, //Creo un array de comprobación y lo inicializo a null con los campos de la tabla Departamentos.
                           "DescDepartamento" => null,
                           "VolumenNegocio" => null];
            
            if(isset ($_REQUEST['enviar'])){ //Compruebo que el usuario le ha dado al botón enviar.
                
                 $aErrores["CodDepartamento"] = validacionFormularios::comprobarAlfaNumerico($_REQUEST ["CodDepartamento"],3,3, OBLIGATORIO); //Compruebo que el campo CodDepartamento que introduce el usuario es válido.
                 $aErrores["DescDepartamento"] = validacionFormularios::comprobarAlfaNumerico($_REQUEST ["DescDepartamento"],255,1, OBLIGATORIO); //Compruebo que el campo DescDepartamento que introduce el usuario es válido.
                 $aErrores["VolumenNegocio"] = validacionFormularios::comprobarFloat($_REQUEST["VolumenNegocio"], MAX_FLOAT, MIN_FLOAT, OBLIGATORIO); //Compruebo que el campo VolumenNegocio que introduce el usuario es válido.
                 
                $miDB = new PDO(DNS,USER,PASSWORD); //Creo una conexión a la base de datos instanciando un objeto de la clase PDO.
                $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Cuando se produce un error lanza una excepción utilizando PDOException.
                //Creo una variable heredoc e introduzco el query que voy a realizar.
                $sql = <<<EOD
                        SELECT CodDepartamento from Departamento where CodDepartamento="{$_REQUEST['CodDepartamento']}";
EOD;
                $consulta = $miDB->query($sql);
                if($consulta->rowCount()>0){ //Compruebo que el campo que introduce el usuario existe o no, si ya existe muestro un mensaje de error diciendo que ese departamento ya existe.
                    $aErrores['CodDepartamento'] = "Ese código de departamento ya existe";
                }
                unset($miDB); //Ciero la conexión a la base de datos
                 
                foreach ($aErrores as $clave => $valor){ //Recorro con un foreach el array de errores que está compuesto por la clave y el valor (null).
                       if($valor!=null){ //Compruebo que el campo del departamento está rellenado.
                           $entradaOk=false; 
                       }
                   }
            }else{
                $entradaOk=false;
            }
            if($entradaOk){ //Si los campos son correctos los almaceno y se los muestro al usuario.
                
                $aRespuesta["CodDepartamento"] = $_REQUEST["CodDepartamento"];
                $aRespuesta["DescDepartamento"] = $_REQUEST["DescDepartamento"];
                $aRespuesta["VolumenNegocio"] = $_REQUEST["VolumenNegocio"];
                
                try{
                    $miDB = new PDO(DNS, USER, PASSWORD); //Establezco la conexión a la base de datos instanciado un objeto PDO.
                    $miDB ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Cuando se produce un error lanza una excepción utilizando PDOException.

                    $aAñadirDepartamento = [":CodDepartamento" => $aRespuesta["CodDepartamento"], ":DescDepartamento" => $aRespuesta["DescDepartamento"], ":VolumenNegocio" => $aRespuesta["VolumenNegocio"]];
                    
                    $consulta=$miDB->prepare("INSERT INTO Departamento (CodDepartamento, DescDepartamento, VolumenNegocio) VALUES (:CodDepartamento, :DescDepartamento, :VolumenNegocio)");
                    
                    $consulta->execute($aAñadirDepartamento);
                    
                    echo "<p>Campo introducido en la tabla Departamento con éxito.</p>";
                
                }catch (PDOException $miExcepcionPDO){ //Creo una excepción de errores.
                    echo "<p style='color:red;'>Error ".$miExcepcionPDO->getMessage()."</p>"; //Muestro el mensaje de la excepción de errores.
                    echo "<p style='color:red;'>Código de error ".$miExcepcionPDO->getCode()."</p>"; //Muestro el código del error.
                } finally {
                    unset($miDB); //Cierro la conexión a la base de datos.
                }
            }else{  
        ?>
            <form name="formulario1" action="<?php echo $_SERVER['PHP_SELF'];//Muestro la información del formulario en la misma página que se está ejecutando en el fichero actual.?>" method="post">
            <fieldset>
                <legend><b>AÑADE UN DEPARTAMENTO A LA TABLA DEPARTAMENTO</b></legend>
                    <div>
                        <b><label for="CodDepartamento">Código de departamento: </label></b>
                        <input type="text" name="CodDepartamento" placeholder="Ej: INF" value="<?php 
                                if($aErrores["CodDepartamento"] == null && isset($_REQUEST["CodDepartamento"])){ //Compruebo  que los campos del array de errores están vacíos y el usuario le ha dado al botón de enviar.
                                    echo $_REQUEST["CodDepartamento"]; //Devuelve el campo que ha escrito previamente el usuario.
                                }
                                ?>">
                        <span style="color:red">
                            <?php
                                if ($aErrores["CodDepartamento"] != null) { //Compruebo que el array de errores no está vacío.
                                    echo $aErrores["CodDepartamento"]; //Si hay errores, devuelve el campo vacío y muestra una advertencia de los errores y como tiene que estar escrito ese campo.
                                }
                            ?>
                        </span>
                    </div>
                <br>
                    <div>
                        <b><label for="DescDepartamento">Descripción del departamento: </label></b>
                        <input type="text" name="DescDepartamento" placeholder="Ej: Departamento de música" value="<?php 
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
                    <div>
                        <b><label for="VolumenNegocio">Introduce un volumen de negocio: </label></b>
                        <input type="text" name="VolumenNegocio" placeholder="Ej: 2.5" value="<?php 
                                if($aErrores["VolumenNegocio"] == null && isset($_REQUEST["VolumenNegocio"])){ //Compruebo  que los campos del array de errores están vacíos y el usuario le ha dado al botón de enviar.
                                    echo $_REQUEST["VolumenNegocio"]; //Devuelve el campo que ha escrito previamente el usuario.
                                }
                                ?>">
                        <span style="color:red">
                            <?php
                                if ($aErrores["VolumenNegocio"] != null) { //Compruebo que el array de errores no está vacío.
                                    echo $aErrores["VolumenNegocio"]; //Si hay errores, devuelve el campo vacío y muestra una advertencia de los errores y como tiene que estar escrito ese campo.
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