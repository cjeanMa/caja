
$(document).ready(function(){
		//Para hacer la lista enlazada de de procedimientos y su clasificador
		$("#cprocedimiento").change(function(){
			$.ajax({
				url: 'boleta/listar_procedimientos/html',
				type: 'POST',
				data: $(this).serialize(),
				success: function(a){	
					$("#procedimiento").html(a);
				}
			});	
		});
		//Para jalar datos personales con el campo DNI, si es que existieran

		$('#dni').change(function(){
			$.ajax({
				url:'boleta/mostrar_datos_personales/html',
				type: 'POST',
				data: $(this).serialize(),
				success: function(a){
					$("#datos_personales").html(a);
				}
			})
		})

		//funcion para obtener datos de procedimiento

		$('#procedimiento').change(function(){
			$.ajax({
				url: 'boleta/datos_procedimiento/html',
				type: 'POST',
				data: $(this).serialize(),
				success: function(a){
					$('#precio').html(a);
				}
			})
		})

		//funcion para ingresar procedimientos

		$('#agregar_procedimiento').click(function(){
			var idboleta = $('#boleta').val();
			var dni= $('#dni').val();
			var nombres = $('#nombres').val();
			var a_paterno= $('#a_paterno').val();
			var a_materno= $('#a_materno').val();
			var procedimiento= $('#procedimiento').val();
			var cantidad= $('#cantidad').val();
			var descripcion= $('#descripcion').val();
			
			if (idboleta===""||dni===""||nombres===""||a_paterno===""||a_materno===""||procedimiento===""||cantidad<1) {
				alertify.error("INGRESE TODOS LOS CAMPOS CORRECTAMENTE");
			}
			else{
				var data = "idboleta="+idboleta+"&dni="+dni+"&nombres="+nombres+"&a_paterno="+a_paterno+"&a_materno="+
				a_materno+"&procedimiento="+procedimiento+"&cantidad="+cantidad+"&descripcion="+descripcion;
				$.ajax({
					url: 'boleta/insertar_boleta/html',
					type: 'POST',
					data: data,
					success: function(html){
						$('#tabla_detalles').html(html);
						$('#descripcion').val("Ninguna");
						$('#cantidad').val(1);
					}
				})
			}
			
		})

})