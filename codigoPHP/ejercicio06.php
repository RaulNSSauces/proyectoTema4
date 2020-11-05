<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 06</title>
    </head>
    <body>
        <?php
        
            /* 
            * @author: Raúl Núñez Sebastián.
            * @since: 3-11-2020.
            * Ejercicio 6 - Pagina web que cargue registros en la tabla Departamento desde un array departamentosnuevos utilizando una consulta preparada.
            */

            require_once '../config/confDBPDO.php';
            
            try{
                $miDB = new PDO(DNS, USER, PASSWORD); //Establezco la conexión a la base de datos instanciado un objeto PDO.
                $miDB ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Cuando se produce un error lanza una excepción utilizando PDOException.
                //Creo un array con los campos y los valores que quiero introducir en la tabla Departamento.
                $aDepartamentosNuevos = [":CodDepartamento1" => "QUI", ":DescDepartamento1" => "Departamento de química", ":VolumenNegocio1" => 4,
                                         ":CodDepartamento2" => "MAT", ":DescDepartamento2" => "Departamento de matemáticas", ":VolumenNegocio2" => 5,
                                         ":CodDepartamento3" => "LEN", ":DescDepartamento3" => "Departamento de lengua", ":VolumenNegocio3" => 6];
                //Hago una consulta preparada con un insert para que me añada los departamentos creados en el array anterior.
                $consulta = $miDB ->prepare("INSERT INTO Departamento (CodDepartamento, DescDepartamento, VolumenNegocio) VALUES (:CodDepartamento1, :DescDepartamento1, :VolumenNegocio1),(:CodDepartamento2, :DescDepartamento2, :VolumenNegocio2),(:CodDepartamento3, :DescDepartamento3, :VolumenNegocio3)");
                
                $consulta -> execute($aDepartamentosNuevos); //Ejecuta la consulta.

            echo("<p style='color:green;'>Registros cargados en la tabla Departamento con éxito</p>"); // Muestro un mensaje de que los registros han sido cargados correctamente en la tabla Departamento.
            
            }catch (PDOException $miExcepcionPDO){ //Creo una excepción de errores.
                echo "<p style='color:red;'>Error ".$miExcepcionPDO->getMessage()."</p>"; //Muestro el mensaje de la excepción de errores.
                echo "<p style='color:red;'>Código de error ".$miExcepcionPDO->getCode()."</p>"; //Muestro el código del error.
            } finally {
                unset($miDB); //Cierro la conexión a la base de datos.
            }
        ?>
    </body>
</html>

