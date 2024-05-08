<?php
$dir = dirname(__FILE__);
require_once $dir."\accion_conexion.php";

        function insertarDatosLogInicioSesion($email, $ip, $exitoso){
            $link = conectarse();

            $email = mysqli_real_escape_string($link, $email);
            $ip = mysqli_real_escape_string($link, $ip);
            $exitoso = $exitoso ? 1 : 0; 

            $fecha_actual = date("Y-m-d");
            $hora_actual = date("H:i:s");

            $insert_query = "INSERT INTO log_actividades (email, actividad, fecha, hora, ip, exitoso) VALUES ('$email', 'Inicio de sesion', '$fecha_actual', '$hora_actual', '$ip', $exitoso)";

            if(mysqli_query($link, $insert_query)){
                //echo "Datos insertados correctamente.";
            } else{
                //echo "Error al insertar datos: " . mysqli_error($link);
            }

            mysqli_close($link);

        }
      
        function obtenerDatosLog() {
            $link = conectarse();

            $sql = "SELECT id, email, actividad, fecha, hora, ip, exitoso FROM log_actividades";
            $result = $link->query($sql);

            $datos = array();

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $datos[] = $row;
                }
            }

            $link->close();

            return $datos;
        }


        function mostrarDatosLog($datos) {
            foreach ($datos as $dato) {
                echo "<tr>";
                echo "<td>" . $dato["id"] . "</td>";
                echo "<td>" . $dato["email"] . "</td>";
                echo "<td>" . $dato["actividad"] . "</td>";
                echo "<td>" . $dato["fecha"] . "</td>";
                echo "<td>" . $dato["hora"] . "</td>";
                echo "<td>" . $dato["ip"] . "</td>";
                echo "<td>" . ($dato["exitoso"] ? "Sí" : "No") . "</td>";
                echo "</tr>";
            }
        }
?>