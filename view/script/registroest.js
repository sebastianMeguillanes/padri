var tabla;

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
	/*$.post("../ajax/rol.php?op=5", function(r){
	    $("#rol").html(r);
		$('#rol').trigger('change.select2');
	});

	$("#imagenmuestra").hide();*/
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
	tabla=$('#tbllistado').DataTable(
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
                        url: '../ajax/registro.php?op=0',
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

			mensaje=datos.split(":");
			if(mensaje[0]=="1"){               
			swal.fire(
				'Mensaje de Confirmación',
				mensaje[1],
				'success'

				);           
	          mostrarform(false);
	          tabla.ajax.reload();
			}
			else{
				Swal.fire({
					type: 'error',
					title: 'Error',
					text: mensaje[1],
					footer: 'Verifique la información de Registro, en especial que la información no fué ingresada previamente a la Base de Datos.'
				});
			}
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
		$("#email").val(data.correoestudiante);
		$("#num_documento").val(data.identificacionestudiante);
		$("#telefono").val(data.telefonoestudiante);
		$('#tipoestudiante').val(data.idtipoestudiante);
		$('#carrera').val(data.idcarrera);
		$("#idusuario").val(data.idusuarioe);
		$("#login").val(data.nombreusuario);
		$("#password").val(data.contraseñausuario);

		/*$.post("../ajax/rol.php?op=5", function(r){
            $("#rol").html(r);
            $('select[name=rol]').val(data.idrol);
            $('#rol').trigger('change.select2');
        });*/

        $.post("../ajax/user.php?op=6",{clave : data.contraseñausuario}, function(r){
			$("#clave").val(r);
		});
 	});
}

//Función para desactivar registros
function desactivar(idusuario)
{
	swal.fire({
		title: 'Mensaje de Confirmación',
		text: "¿Desea desactivar el Registro?",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Desactivar'
	}).then((result) => {
		if (result.value) {
			$.post("../ajax/user.php?op=2", {idusuario : idusuario}, function(e){
				mensaje=e.split(":");
					if(mensaje[0]=="1"){  
						swal.fire(
							'Mensaje de Confirmación',
							mensaje[1],
							'success'
						);  
						tabla.ajax.reload();
					}	
					else{
						Swal.fire({
							type: 'error',
							title: 'Error',
							text: mensaje[1],
							footer: 'Verifique la información de Registro, en especial que la información no fué ingresada previamente a la Base de Datos.'
						});
					}			
        	});	
		}
	});   
}

//Función para activar registros
function activar(idusuario)
{
	swal.fire({
		title: 'Mensaje de Confirmación',
		text: "¿Desea activar el Registro?",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Activar'
	}).then((result) => {
		if (result.value) {
			$.post("../ajax/user.php?op=3", {idusuario : idusuario}, function(e){
                console.log(e);
				mensaje=e.split(":");
					if(mensaje[0]=="1"){  
						swal.fire(
							'Mensaje de Confirmación',
							mensaje[1],
							'success'
						);  
						tabla.ajax.reload();
					}	
					else{
						Swal.fire({
							type: 'error',
							title: 'Error',
							text: mensaje[1],
							footer: 'Verifique la información de Registro, en especial que la información no fué ingresada previamente a la Base de Datos.'
						});
					}			
        	});	
		}
	}); 
}

init();