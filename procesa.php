<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesar</title>
</head>
<body>
    <?php
        // Recogemos datos de los formularios
        $Nombre = $_POST["Nombre"];
        $Nombrepan = $_POST["Nombrepan"];
        $Cantidad = $_POST["Cantidad"];
        $Cantidadpan = $_POST["Cantidadpan"];
        $tipopan = $_POST["seleccionar"];

        // Conexión a la base de datos
        $servername = 'localhost';
        $username = 'usuario';
        $password = 'usuario';
        $database = 'panaderia';

        $conn = new mysqli($servername, $username, $password, $database);

        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        } else {
            echo "Conexión Exitosa<br>";
        }

        // Insertar datos de clientes
        if (!empty($Nombre)) {
            $insertarcliente = "INSERT INTO clientes (nombre) VALUES ('$Nombre')";
            if ($conn->query($insertarcliente) === TRUE) {
                echo "Inserción de datos exitosa para clientes<br>";
            } else {
                echo "Error al insertar datos para clientes: " . $conn->error . "<br>";
            }
        }

        // Insertar datos de pan
        if (!empty($Nombrepan) && !empty($Cantidad)) {
            $insertarpan = "INSERT INTO pan (nombre, cantidad) VALUES ('$Nombrepan', '$Cantidad')";
            if ($conn->query($insertarpan) === TRUE) {
                echo "Inserción de datos exitosa para pan<br>";
            } else {
                echo "Error al insertar datos para pan: " . $conn->error . "<br>";
            }
        }

        // Insertar datos de pedidos
        if (!empty($tipopan) && !empty($Cantidadpan)) {
            $insertarpedido = "INSERT INTO pedidos (tipopan, cantidad) VALUES ('$tipopan', '$Cantidadpan')";
            if ($conn->query($insertarpedido) === TRUE) {
                echo "Inserción de datos exitosa para pedidos<br>";
            } else {
                echo "Error al insertar datos para pedidos: " . $conn->error . "<br>";
            }
        }

        // Cerrar conexión
        $conn->close();
    ?>
</body>
</html>
