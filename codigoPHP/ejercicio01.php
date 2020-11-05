<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 01</title>
    </head>
    <body>
        <?php
        
            /* 
            * @author: Raúl Núñez Sebastián.
            * @since: 27-10-2020.
            * Ejercicio 1 - Conexión a la base de datos con la cuenta usuario y tratamiento de errores (PDO).
            */
            
           require_once '../config/confDBPDO.php';
           
           echo "<h3>Conexión correcta a la base de datos</h3>";
           
            try{
                $miDB = new PDO(DNS, USER, PASSWORD); //Establezco la conexión a la base de datos instanciado un objeto PDO.
                $miDB ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Cuando se produce un error lanza una excepción utilizando PDOException.
                
                $aAtributos=["AUTOCOMMIT", //Creo un array con los atributos de los que está compuesto PDO.
                            "CASE",
                            "CONNECTION_STATUS",
                            "ERRMODE",
                            "CLIENT_VERSION",
                            "ORACLE_NULLS",
                            "PERSISTENT",
                            "SERVER_INFO",
                            "SERVER_VERSION"];
                
                       foreach ($aAtributos as $valor){ //Recorro el array de los atributos del PDO.
                           echo "PDO::ATTR_$valor: "; //Muestro el nombre de los atributos.
                           echo $miDB->getAttribute(constant("PDO::ATTR_$valor"))."<br>"; //Muestro el valor que reciben los atributos mostrados en la línea anterior.
                       }
                       
                       echo "<p><span style='color:green;'>Conexión establecida con éxito</span></p>"; //Si no hay errores muestro un mensaje de que la conexión establecida ha sido un éxito.
      
            }catch (PDOException $miExcepcionPDO){ //Creo una excepción de errores.
                echo "<p style='color:red;'>Error ".$miExcepcionPDO->getMessage()."</p>"; //Muestro el mensaje de la excepción de errores.
                echo "<p style='color:red;'>Código de error ".$miExcepcionPDO->getCode()."</p>"; //Muestro el código del error.
            } finally {
                unset($miDB);
            }
            
            echo "<h3>Conexión errónea a la base de datos</h3>";
           
            try{
                $miDB = new PDO(DNS, USER, "paso"); //Establezco la conexión a la base de datos instanciado un objeto PDO.
                $miDB ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Cuando se produce un error lanza una excepción utilizando PDOException.
                
                $aAtributos=["AUTOCOMMIT", //Creo un array con los atributos de los que está compuesto PDO.
                            "CASE",
                            "CONNECTION_STATUS",
                            "ERRMODE",
                            "CLIENT_VERSION",
                            "ORACLE_NULLS",
                            "PERSISTENT",
                            "SERVER_INFO",
                            "SERVER_VERSION"];
                
                       foreach ($aAtributos as $valor){ //Recorro el array de los atributos del PDO.
                           echo "PDO::ATTR_$valor: "; //Muestro el nombre de los atributos.
                           echo $miDB->getAttribute(constant("PDO::ATTR_$valor"))."<br>"; //Muestro el valor que reciben los atributos mostrados en la línea anterior.
                       }
                       
                       echo "<p><span style='color:green;'>Conexión establecida con éxito</span></p>"; //Si no hay errores muestro un mensaje de que la conexión establecida ha sido un éxito.
      
            }catch (PDOException $miExcepcionPDO){ //Creo una excepción de errores.
                echo "<p style='color:red;'>Error: ".$miExcepcionPDO->getMessage()."</p>"; //Muestro el mensaje de la excepción de errores.
                echo "<p style='color:red;'>Código de error: ".$miExcepcionPDO->getCode()."</p>"; //Muestro el código del error.
            } finally {
                unset($miDB);
            }
        ?>
    </body>
</html>