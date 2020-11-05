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
            * Ejercicio 1 - Conexión a la base de datos con la cuenta usuario y tratamiento de errores (MySqli).
            */
        
        require_once '../config/confDBMySQLi.php';
        
        $miDB=new mysqli(); //Creo una conexión mysqli.
        
        $miDB ->connect(HOST, USER, PASSWORD, DBNAME, PORT); //Establezco la conexión a la base de datos utilizando las constantes creadas en el fichero de configuración confDBMySQLi.php.
        
        $error = $miDB -> connect_erno; //Creo una variable para controlar los posibles errores de conexión de la base de datos.
        
        if($error != null){ //Compruebo si existe algún error.
            echo "<p>No se ha podido establecer la conexión a la base de datos: $miDB->connect_erno</p>"; //Si existe muestro un mensaje del error.
            exit(); //Imprime un mensaje y termina el script actual.
        }else{
            echo "<h3><span style='color:green;'>"."Conexión establecida con éxito en MySQLi</span></h3>"; //Si no muestro un mensaje de color verde para saber que la conexión ha sido realizada con éxito.
        }
        
        $miDB -> close(); //Cierro la conexión a la base de datos.
            
        ?>
    </body>
</html>