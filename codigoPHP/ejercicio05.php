<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 05</title>
    </head>
    <body>
        <?php
        
            /* 
            * @author: Raúl Núñez Sebastián.
            * @since: 3-11-2020.
            * Ejercicio 5 - Pagina web que añade tres registros a nuestra tabla Departamento utilizando tres instrucciones
                            insert y una transacción, de tal forma que se añadan los tres registros o no se añada ninguno.
            */

            require_once '../config/confDBPDO.php';
            
            try{
                $miDB = new PDO(DNS, USER, PASSWORD); //Establezco la conexión a la base de datos instanciado un objeto PDO.
                $miDB ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Cuando se produce un error lanza una excepción utilizando PDOException.
                
                $miDB ->beginTransaction(); //Deshabilito el modo autocommit.
                //Creo una variable y le añado la consulta.
                $resultadoSql1 = $miDB->exec('INSERT INTO Departamento (CodDepartamento,DescDepartamento,VolumenNegocio) VALUES("SOC","Departamento de Sociales",5)');
                $resultadoSql2 = $miDB->exec('INSERT INTO Departamento (CodDepartamento,DescDepartamento,VolumenNegocio) VALUES("FIS","Departamento de Física",6)');
                $resultadoSql3 = $miDB->exec('INSERT INTO Departamento (CodDepartamento,DescDepartamento,VolumenNegocio) VALUES("ING","Departamento de Inglés",7)');
                
                $miDB ->commit(); //Confirma los cambios y los consolida.

            echo("<p style='color:green;'>Registros insertados en la tabla Departamento con éxito</p>"); // Muestro el número de registros que tiene la tabla Departamento.
            
            }catch (PDOException $miExcepcionPDO){ //Creo una excepción de errores.
                echo "<p style='color:red;'>Error ".$miExcepcionPDO->getMessage()."</p>"; //Muestro el mensaje de la excepción de errores.
                echo "<p style='color:red;'>Código de error ".$miExcepcionPDO->getCode()."</p>"; //Muestro el código del error.
                $miDB ->rollBack(); //Deshace los cambios en caso de error.
            } finally {
                unset($miDB); //Cierro la conexión a la base de datos.
            }
        ?>
    </body>
</html>