<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 02</title>
    </head>
    <body>
        <?php
        
            /* 
            * @author: Raúl Núñez Sebastián.
            * @since: 04-11-2020.
            * Ejercicio 2 - Mostrar el contenido de la tabla Departamento y el número de registros.
            */

            require_once '../config/confDBPDO.php';
            
            try{
                $miDB=new PDO(DNS, USER, PASSWORD); //Establezco la conexión a la base de datos instanciado un objeto PDO.
                $miDB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Cuando se produce un error lanza una excepción utilizando PDOException.
                
                $consulta=$miDB->prepare("SELECT * FROM Departamento"); //Creo una variable y le añado una consulta preparada que devuelve un objeto de la clase PDOStatement.
                
                $consulta->execute(); //Ejecuta la consulta.
        ?>
            <table>
                <tr>
                    <td><b>CodDepartamento</b></td>
                    <td><b>DescDepartamento</b></td>
                    <td><b>VolumenNegocio</b></td>
                </tr>
        <?php
            $oRegistro=$consulta->fetchObject(); //Creo una variable $oRegistro que lo que hace es sacar el primer registro avanzando el puntero a la siguiente posición.
            while($oRegistro){
        ?>
                <tr>
                    <td><?php echo $oRegistro->CodDepartamento; //Muestra el contenido del campo CodDepartamento?></td>
                    <td><?php echo $oRegistro->DescDepartamento;//Muestra el contenido del campo DescDepartamento?></td>
                    <td><?php echo $oRegistro->VolumenNegocio;//Muestra el contenido del campo VolumenNegocio?></td>
                </tr>
        <?php
                $oRegistro=$consulta->fetchObject(); //Lectura anticipada
            } 
        ?>
            </table>
        <?php
            $registros=$consulta->rowCount(); //Creo una variable $registros y le añado que me realize la operación de contarme cuantos registros tiene mi tabla Departamento con el objeto rowCount();
            echo("<p>Hay <b>". $registros."</b> registros</p>"); //Muestro el número de registros que tiene la tabla Departamento.
            }catch (PDOException $miExcepcionPDO){ //Creo una excepción de errores.
                echo "Error ".$miExcepcionPDO->getMessage(); //Muestro el mensaje de la excepción de errores.
                echo "Código de error ".$miExcepcionPDO->getCode(); //Muestro el código del error.
            } finally {
                unset($miDB); //Cierro la conexión a la base de datos.
            }
        ?>
    </body>
</html>