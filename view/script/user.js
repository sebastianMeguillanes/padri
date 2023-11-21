var tabla;
// obtener los datos de la tabla
/*function listar2(){
const container = document.querySelector('#example');

const hot = new Handsontable(container, {
  data: [
    ['', 'Tesla', 'Volvo', 'Toyota', 'Ford'],
    ['2019', 10, 11, 12, 13],
    ['2020', 20, 11, 14, 13],
    ['2021', 30, 15, 12, 13]
  ],
  rowHeaders: true,
  colHeaders: true,
  height: 'auto',
  licenseKey: 'non-commercial-and-evaluation' // for non-commercial use only
});
}*/
//Función que se ejecuta al inicio
function init(){

	//Para validación
	$('#nombre').validacion(' abcdefghijklmnñopqrstuvwxyzáéíóú');
	$('#email').validacion(' abcdefghijklmnñopqrstuvwxyzáéíóú');
	$('#num_documento').validacion(' abcdefghijklmnñopqrstuvwxyz-0123456789');
	$('#telefono').validacion(' abcdefghijklmnñopqrstuvwxyzáéíóú,.#º0123456789');
    $('#tipoestudiante').select2();
	$('#carrera').select2();
	$('#login').validacion(' abcdefghijklmnñopqrstuvwxyzáéíóú0123456789/-*,.°()$#');
    $('#clave').validacion(' abcdefghijklmnñopqrstuvwxyzáéíóú0123456789/-*,.°()$#');

	mostrarform(false);
	listar();
	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	});

}

//Función limpiar
function limpiar()
{
	$("#nombre").val("");
	$("#email").val("");
	$("#num_documento").val("");
	$("#telefono").val("");
	$("#idusuario").val("");
	$('#tipoestudiante').trigger('change.select2');
	$('#carrera').trigger('change.select2');
	$("#login").val("");
	$("#clave").val("");
}

//Función mostrar formulario
function mostrarform(flag)
{
	limpiar();
	if (flag)
	{
		$("#listadoregistros").hide();
		$("#formularioregistros").show();
		$("#btnGuardar").prop("disabled",false);
		$("#btnagregar").hide();
	}
	else
	{
		$("#listadoregistros").show();
		$("#formularioregistros").hide();
		$("#btnagregar").show();
	}
}

//Función cancelarform
function cancelarform()
{
	limpiar();
	mostrarform(false);
}

//Función Listar
function listar()
{
	tabla=$('#tablalistado').DataTable(
        {
            "lengthMenu": [ 10, 25, 50, 75, 100 ],//mostramos el menú de registros a revisar
            "Processing": true,//Activamos el procesamiento del datatables
            "ServerSide": true,//Paginación y filtrado realizados por el servidor
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            },
            dom: 'Bfrtip',//Definimos los elementos del control de tabla
            buttons: [		          
                        'copyHtml5',
                        'excelHtml5',
                        'csvHtml5',
                        'pdf'
                    ],
            "ajax":
                    {
                        url: '../ajax/user.php?op=0',
                        type : "get",
                        dataType : "json",						
                        error: function(e){
                            console.log(e.responseText);	
                        }
                    },
            "Destroy": true,
            "iDisplayLength": 10,//Paginación
            "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
        });
}
//Función para guardar o editar

function guardaryeditar()
{
	//e.preventDefault(); //No se activará la acción predeterminada del evento
	$("#btnGuardar").prop("disabled",true);
	var formData = new FormData($("#formulario")[0]);

	$.ajax({
		url: "../ajax/user.php?op=1",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(datos)
	    {   

			
	    }

	});
	limpiar();
}

function mostrar(idusuario)
{
	$.post("../ajax/user.php?op=4",{idusuario : idusuario}, function(data, status)
	{
		console.log(data);
		data = JSON.parse(data);		
		mostrarform(true);
        
		$("#nombre").val(data.nombreestudiante);
		$("#email").val(data.personatipo_documento);
		$("#num_documento").val(data.personanum_documento);
		$("#telefono").val(data.personadireccion);
		$('#tipoestudiante').trigger('change.select2');
		$('#carrera').trigger('change.select2');
		$("#idusuario").val(data.idusuario);
		$("#login").val(data.nombreusuarioe);

		$.post("../ajax/rol.php?op=5", function(r){
            $("#rol").html(r);
            $('select[name=rol]').val(data.idrol);
            $('#rol').trigger('change.select2');
        });

        $.post("../ajax/user.php?op=6",{clave : data.usuarioclave}, function(r){
			$("#clave").val(r);
		});
 	});
}

init();