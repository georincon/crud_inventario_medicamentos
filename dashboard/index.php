<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class="container">
    <div class="text-center">        
        <h3>Inventarios de Medicamentos</h3>
        <h1><span class="badge badge-danger">Super-Medicas</span></h1>
    </div>
     
<?php
include_once 'bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT id, nombre, descripcion, codigo, precio, stock, vencimiento, laboratorio, receta FROM medicamentos ORDER BY id DESC";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>


<div class="container">
        <div class="row">
            <div class="col-lg-12">            
            <button id="btnNuevo" type="button" class="btn btn-success" data-toggle="modal">Nuevo</button>    
            </div>    
        </div>    
    </div>    
    <br>  
<div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="tablaInventarios" class="table table-striped table-bordered table-condensed" style="width:100%; font-size: 14px;">
                        <thead class="text-center">
                            <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Codigo</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Vencimiento</th>
                            <th>Laboratorio</th>
                            <th>Receta</th>
                            <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                            foreach($data as $dat) {                                                        
                            ?>
                            <tr>
                                <td><?php echo $dat['id'] ?></td>
                                <td><?php echo $dat['nombre'] ?></td>
                                <td><?php echo $dat['descripcion'] ?></td>
                                <td><?php echo $dat['codigo'] ?></td>    
                                <td><?php echo $dat['precio'] ?></td>
                                <td><?php echo $dat['stock'] ?></td>
                                <td><?php echo $dat['vencimiento'] ?></td>    
                                <td><?php echo $dat['laboratorio'] ?></td>
                                <td><?php echo $dat['receta'] ?></td>
                                <td></td>
                            </tr>
                            <?php
                                }
                            ?>                                
                        </tbody>        
                       </table>                    
                    </div>
                </div>
        </div>  
    </div>    
      
<!--Modal para CRUD-->
<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="formInventario">    
            <div class="modal-body">
                <div class="form-group">
                    <label for="nombre" class="col-form-label">Nombre:</label>
                    <input type="text" class="form-control" id="nombre">
                </div>
                <div class="form-group">
                    <label for="descripcion" class="col-form-label">Descripcion:</label>
                    <input type="text" class="form-control" id="descripcion">
                </div>                
                <div class="form-group">
                    <label for="codigo" class="col-form-label">Codigo:</label>
                    <input type="number" class="form-control" id="codigo">
                </div>
                <div class="form-group">
                    <label for="precio" class="col-form-label">Precio:</label>
                    <input type="number" class="form-control" id="precio">
                </div>              
                <div class="form-group">
                    <label for="stock" class="col-form-label">Stock:</label>
                    <input type="number" class="form-control" id="stock">
                </div>
                <div class="form-group">
                    <label for="vencimiento" class="col-form-label">Fecha de vencimiento:</label>
                    <input type="date" class="form-control" id="vencimiento">
                </div>
                <div class="form-group">
                    <label for="laboratorio" class="col-form-label">Laboratorio:</label>
                    <input type="text" class="form-control" id="laboratorio">
                </div>
                <div class="form-group">
                    <label for="receta" class="col-form-label">¿Requiere receta?:</label>
                    <select class="form-control" id="receta">
                        <option value="1">Sí</option>
                        <option value="0">No</option>
                    </select>
                </div>         
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
            </div>
        </form>    
        </div>
    </div>
</div>  
      
    
    
</div>
<!--FIN del cont principal-->
<?php require_once "vistas/parte_inferior.php"?>