$(document).ready(function(){
    tablaInventarios = $("#tablaInventarios").DataTable({
       "columnDefs":[{
        "targets": -1,
        "data":null,
        "defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btnEditar'>Editar</button><button class='btn btn-danger btnBorrar'>Borrar</button></div></div>"  
       }],
        
    "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast":"Último",
                "sNext":"Siguiente",
                "sPrevious": "Anterior"
             },
             "sProcessing":"Procesando...",
        }
    });
    
$("#btnNuevo").click(function(){
    $("#formInventario").trigger("reset");
    $(".modal-header").css("background-color", "#1cc88a");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Nuevo Medicamento");            
    $("#modalCRUD").modal("show");        
    id=null;
    opcion = 1; //alta
});    
    
var fila; //capturar la fila para editar o borrar el registro
    
//botón EDITAR    
$(document).on("click", ".btnEditar", function(){
    fila = $(this).closest("tr");
    id = parseInt(fila.find('td:eq(0)').text());
    nombre = fila.find('td:eq(1)').text();
    descripcion = fila.find('td:eq(2)').text();
    codigo = parseInt(fila.find('td:eq(3)').text());
    precio = parseFloat(fila.find('td:eq(4)').text());
    stock = parseInt(fila.find('td:eq(5)').text());
    vencimiento= new Date(fila.find('td:eq(6)').text());
    laboratorio = fila.find('td:eq(7)').text();
    receta = fila.find('td:eq(8)').text();
    
    $("#nombre").val(nombre);
    $("#descripcion").val(descripcion);
    $("#codigo").val(codigo);
    $("#precio").val(precio);
    $("#stock").val(stock);
    $("#vencimiento").val(vencimiento.toISOString().split("T")[0]);
    $("#laboratorio").val(laboratorio);
    $("#receta").val(receta);

    opcion = 2; //editar
    
    $(".modal-header").css("background-color", "#4e73df");
    $(".modal-header").css("color", "white");
    $(".modal-title").text("Editar Medicamento");            
    $("#modalCRUD").modal("show");  
    
});

//botón BORRAR
$(document).on("click", ".btnBorrar", function(){    
    fila = $(this);
    id = parseInt($(this).closest("tr").find('td:eq(0)').text());

    opcion = 3 //borrar

    var respuesta = confirm("¿Está seguro de eliminar el registro: "+id+"?");
    if(respuesta){
        $.ajax({
            url: "bd/crud.php",
            type: "POST",
            dataType: "json",
            data: {opcion:opcion, id:id},
            success: function(){
                tablaInventarios.row(fila.parents('tr')).remove().draw();
            },
            error: function () {
                alert("Error al borrar el registro. Intente nuevamente.");
            }
        });
    }   
});
    
$("#formInventario").submit(function(e){
    e.preventDefault();    
    nombre = $.trim($("#nombre").val());
    descripcion = $.trim($("#descripcion").val()),
    codigo = $.trim($("#codigo").val()),
    precio = $.trim($("#precio").val()),
    stock = $.trim($("#stock").val()),
    vencimiento = $.trim($("#vencimiento").val()),
    laboratorio = $.trim($("#laboratorio").val()),
    receta = $.trim($("#receta").val()),
    
    $.ajax({
        url: "bd/crud.php",
        type: "POST",
        dataType: "json",
        data: {id:id, nombre:nombre, descripcion:descripcion, codigo:codigo, precio:precio, stock:stock, vencimiento:vencimiento, laboratorio:laboratorio, receta:receta, opcion:opcion},
        success: function(data){  
            console.log(data);
            id = data[0].id;            
            nombre = data[0].nombre;
            descripcion = data[0].descripcion;
            codigo = data[0].codigo;
            precio = data[0].precio;
            stock = data[0].stock;
            vencimiento = data[0].vencimiento;
            laboratorio = data[0].laboratorio;
            receta = data[0].receta;
            if(opcion == 1){tablaInventarios.row.add([id,nombre,descripcion,codigo,precio,stock,vencimiento,laboratorio,receta]).draw();}
            else{tablaInventarios.row(fila).data([id,nombre,descripcion,codigo,precio,stock,vencimiento,laboratorio,receta]).draw();}            
        }        
    });
    $("#modalCRUD").modal("hide");    
    
});    
    
});