<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 00</title>
    </head>
    <body>
        <?php
        
            /* 
            * @author: Raúl Núñez Sebastián.
            * @since: 27-10-2020.
            * Ejercicio 0 - Scripts de la Base de Datos.
            */
        
        echo"<h3>SCRIPT CREA</h3>";
            highlight_file ('../scriptDB/CreaDAW203DBDepartamentos.sql');
        echo"<h3>SCRIPT CARGA INICIAL</h3>";
            highlight_file ('../scriptDB/CargaInicialDAW203DBDepartamentos.sql');
        echo"<h3>SCRIPT BORRA</h3>";
            highlight_file ('../scriptDB/BorraDAW203DBDepartamentos.sql');
        ?>
    </body>
</html>

