<?php

include_once 'conexion.php';

$objeto = new Conexion();
$conexion = $objeto->Conectar();

// Recepción de datos vía POST 
$nombre = $_POST['nombre'] ?? '';
$descripcion = $_POST['descripcion'] ?? '';
$codigo = $_POST['codigo'] ?? '';
$precio = $_POST['precio'] ?? '';
$stock = $_POST['stock'] ?? '';
$vencimiento = $_POST['vencimiento'] ?? '';
$laboratorio = $_POST['laboratorio'] ?? '';
$receta = $_POST['receta'] ?? '';
$id = $_POST['id'] ?? '';
$opcion = $_POST['opcion'] ?? '';

$data = [];

try {
    switch ($opcion) {
        case 1: // Alta (INSERT)
            $consulta = "INSERT INTO medicamentos (nombre, descripcion, codigo, precio, stock, vencimiento, laboratorio, receta)
                         VALUES (:nombre, :descripcion, :codigo, :precio, :stock, :vencimiento, :laboratorio, :receta)";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute([
                ':nombre' => $nombre,
                ':descripcion' => $descripcion,
                ':codigo' => $codigo,
                ':precio' => $precio,
                ':stock' => $stock,
                ':vencimiento' => $vencimiento,
                ':laboratorio' => $laboratorio,
                ':receta' => $receta
            ]);

            // Obtener último registro insertado
            $consulta = "SELECT id, nombre, descripcion, codigo, precio, stock, vencimiento, laboratorio, receta
                         FROM medicamentos ORDER BY id DESC LIMIT 1";
            $resultado= $conexion->prepare($consulta);
            $resultado->execute();
            $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
            break;

        case 2: // Modificación (UPDATE)
            $consulta = "UPDATE medicamentos 
                            SET nombre = :nombre, descripcion = :descripcion, codigo = :codigo, 
                                precio = :precio, stock = :stock, vencimiento = :vencimiento, 
                                laboratorio = :laboratorio, receta = :receta
                            WHERE id = :id";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute([
                ':nombre' => $nombre,
                ':descripcion' => $descripcion,
                ':codigo' => $codigo,
                ':precio' => $precio,
                ':stock' => $stock,
                ':vencimiento' => $vencimiento,
                ':laboratorio' => $laboratorio,
                ':receta' => $receta,
                ':id' => $id
            ]);
        
            
            $consulta = "SELECT id, nombre, descripcion, codigo, precio, stock, vencimiento, laboratorio, receta 
                            FROM medicamentos WHERE id = :id";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute([':id' => $id]);
            $data = $resultado->fetchAll(PDO::FETCH_ASSOC);
            
            break;            

        case 3: // Baja (DELETE)
            $consulta = "DELETE FROM medicamentos WHERE id = :id";
            $resultado = $conexion->prepare($consulta);
            $resultado->execute([':id' => $id]);
            $data = ['message' => 'Registro eliminado'];
            break;

        default:
            $data = ['error' => 'Opción no válida'];
            break;
    }
} catch (PDOException $e) {
    $data = ['error' => 'Error en la operación: ' . $e->getMessage()];
}

header('Content-Type: application/json');
echo json_encode($data, JSON_UNESCAPED_UNICODE);
$conexion = null;

?>
