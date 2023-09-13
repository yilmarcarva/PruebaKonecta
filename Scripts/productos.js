
    $(document).ready(function() {
        $('#spnombreProducto').hide();
        $('#spreferenciaProducto').hide();
        $('#spprecioProducto').hide();
        $('#spcategoriaProducto').hide();
        $('#spstockProducto').hide();

        $('#miFormulario').submit(function(event) {
            var response=validarGuardar();
            if(response!=false){
                event.preventDefault();
            }
        });
    });

function guardarProducto(){
    
    var response=validarGuardar();

    if(response==false){
        var _conexion=$("#conexion").val();
        var _nombreProducto=$("#nombreProducto").val();
        var _referenciaProducto=$("#referenciaProducto").val();
        var _precioProducto=$("#precioProducto").val();
        var _pesoProducto=$("#pesoProducto").val();
        var _categoriaProducto=$("#categoriaProducto").val();
        var _stockProducto=$("#stockProducto").val();

        jq.ajax({
            type: 'POST',
            url: 'Data/productos.php', // Ruta a funciones.php
            data: {
                action: 'guardarProducto', // Acción a realizar en funciones.php
                conexion: _conexion,
                nombreP: _nombreProducto,
                referenciaP: _referenciaProducto,
                precioP: _precioProducto,
                pesoP: _pesoProducto,
                categoriaP: _categoriaProducto,
                stockP: _stockProducto,
            },
            success: function(response) {
                // Procesa la respuesta del servidor, si es necesario
                alert('Producto registrado exitosamente');
                // Cierra la ventana modal (si estás utilizando Bootstrap)
                $('#miModal').modal('hide');
            }
        });
    }
};

function validarGuardar(){
    var response=false;

    const _nombreProductoInput=$("#nombreProducto");
    const _referenciaProductoInput=$("#referenciaProducto");
    const _precioProductoInput=$("#precioProducto");
    const _pesoProductoInput=$("#pesoProducto");
    const _categoriaProductoSelect=$("#categoriaProducto");
    const _stockProductoInput=$("#stockProducto");

    const _nombreProducto=_nombreProductoInput.val();
    const _referenciaProducto=_referenciaProductoInput.val();
    const _precioProducto=_precioProductoInput.val();
    const _pesoProducto=_pesoProductoInput.val();
    const _categoriaProducto=_categoriaProductoSelect.val();
    const _stockProducto=_stockProductoInput.val();

    if (_nombreProducto=='' || _nombreProducto.lenght==0) {
        response=true;
         _nombreProductoInput.css("border-color", "red");
        $('#spnombreProducto').show();
        $('#spnombreProducto').text('Debe ingresar el nombre del producto.');
        $('#spnombreProducto').css('color', 'red');
    }else{
        $('#spnombreProducto').hide();
        _nombreProductoInput.css("border-color", "#ced4da");
    }

    if (_referenciaProducto=='' || _referenciaProducto.lenght==0) {
        response=true;
        _referenciaProductoInput.css("border-color", "red");
        $('#spreferenciaProducto').show();
        $('#spreferenciaProducto').text('Debe ingresar la referencia del producto.');
        $('#spreferenciaProducto').css('color', 'red');
    }else{
        $('#spreferenciaProducto').hide();
        _referenciaProductoInput.css("border-color", "#ced4da");
    }

    if (_precioProducto=='' || _precioProducto.lenght==0) {
        response=true;
        _precioProductoInput.css("border-color", "red");
        $('#spprecioProducto').show();
        $('#spprecioProducto').text('Debe ingresar el precio y debe ser mayor a 0.');
        $('#spprecioProducto').css('color', 'red');
    }else{
        $('#spprecioProducto').hide();
        _precioProductoInput.css("border-color", "#ced4da");
    }

    if (_pesoProducto=='' || _pesoProducto.lenght==0) {
        response=true;
        _pesoProductoInput.css("border-color", "red");
        $('#sppesoProducto').show();
        $('#sppesoProducto').text('Debe ingresar el peso en KG y debe ser mayor a 0.');
        $('#sppesoProducto').css('color', 'red');
    }else{
        $('#sppesoProducto').hide();
        _pesoProductoInput.css("border-color", "#ced4da");
    }
    if (_categoriaProducto==null) {
        response=true;
        _categoriaProductoSelect.css("border-color", "red");
        $('#spcategoriaProducto').show();
        $('#spcategoriaProducto').text('Debe seleccionar una categoría.');
        $('#spcategoriaProducto').css('color', 'red');
    }else{
        if (_categoriaProducto=='' || _categoriaProducto.lenght==0) {
            response=true;
            _categoriaProductoSelect.css("border-color", "red");
            $('#spcategoriaProducto').show();
            $('#spcategoriaProducto').text('Debe seleccionar una categoría.');
            $('#spcategoriaProducto').css('color', 'red');
        }else{
            $('#spcategoriaProducto').hide();
            _categoriaProductoSelect.css("border-color", "#ced4da");
        }
    }
    
    if (_stockProducto=='' || _stockProducto.lenght==0) {
        response=true;
        _stockProductoInput.css("border-color", "red");
        $('#spstockProducto').show();
        $('#spstockProducto').text('Debe ingresar la cantidad y debe ser mayor a 0.');
        $('#spstockProducto').css('color', 'red');
    }else{
        $('#spstockProducto').hide();
        _stockProductoInput.css("border-color", "#ced4da");
    }
    return response;
}

function confirmarEliminacion(idProducto){
    if (window.confirm("¿Estás seguro de que deseas eliminar este producto?")) {
        // Si el usuario confirma la eliminación, redirige a delete.php
        window.location.href = "EliminarProducto.php?id=" + idProducto;
    }
};

function calcularTotal(){
    const _cantidadVentaInput=$("#cantidadVenta");

    const cantidad=_cantidadVentaInput.val();
    var precio=$("#precioProducto").val();
    var stock=$("#stockProducto").val();

    if(cantidad>stock){
        _cantidadVentaInput.css("border-color", "red");
        $('#spcantidadVenta').show();
        $('#spcantidadVenta').text('La cantidad a vender no puede ser mayor al stock disponible.');
        $('#spcantidadVenta').css('color', 'red');
        $("#btnSubmit").prop("disabled", true);
    }else{
        $('#spcantidadVenta').hide();
        _cantidadVentaInput.css("border-color", "#ced4da");
        var total = cantidad * precio;
        $("#btnSubmit").prop("disabled", false);
        $("#totalVenta").val(total.toFixed(2));
    }



}

