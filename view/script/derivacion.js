var tabla;

//Función que se ejecuta al inicio
function init(){

	//Para validación
	$('#fechaderivacion').validacion(' abcdefghijklmnñopqrstuvwxyzáéíóú0123456789/-*,.°()$#');
	$('#remitentederivacion').validacion(' abcdefghijklmnñopqrstuvwxyzáéíóú');
	$('#destinatarioderivacion').validacion(' abcdefghijklmnñopqrstuvwxyz-0123456789');
    $('#idpersonal').select2();
	$('#tipoderivacion').select2();
	mostrarform(false);
	listar();

	$("#formulario").on("submit",function(e)
	{
		guardaryeditar(e);	
	});
	
	$.post("../ajax/user_personal.php?op=11", function(r){
	    $("#idpersonal").html(r);
		$('#idpersonal').trigger('change.select2');
	});
}

//Función limpiar
function limpiar()
{
	$("#fechaderivacion").val("");
	$("#remitentederivacion").val("");
	$("#destinatarioderivacion").val("");
	$("#idderivacion").val("");
	$('#idpersonal').trigger('change.select2');
	$("#tipoderivacion").trigger('change.select2');
	$.post("../ajax/user_personal.php?op=11", function(r){
	    $("#idpersonal").html(r);
		$('#idpersonal').trigger('change.select2');
	});
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
                        url: '../ajax/derivacion.php?op=0',
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
		url: "../ajax/derivacion.php?op=1",
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

function mostrar(idderivacion)
{
	$.post("../ajax/derivacion.php?op=4",{idderivacion : idderivacion}, function(data, status)
	{
		console.log(data);
		data = JSON.parse(data);		
		mostrarform(true);
        
		$("#fechaderivacion").val(data.fechaderivacion);
		$("#remitentederivacion").val(data.remitentederivacion);
		$("#destinatarioderivacion").val(data.destinatarioderivacion);
		$('#idpersonal').val(data.idpersonal);
		$("#idderivacion").val(data.idderivacion);
		$("#tipoderivacion").val(data.tipoderivacion);

		$.post("../ajax/user_personal.php?op=11", function(r){
			$("#idpersonal").html(r);			
            $('select[name=idpersonal]').val(data.idpersonal);
			$('#idpersonal').trigger('change.select2');
		});

 	});
}

//Función para desactivar registros
function desactivar(idderivacion)
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
			$.post("../ajax/derivacion.php?op=2", {idderivacion : idderivacion}, function(e){
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
function activar(idderivacion)
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
			$.post("../ajax/derivacion.php?op=3", {idderivacion : idderivacion}, function(e){
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