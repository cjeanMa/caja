$(document).ready(function(){
	
	datatables_procedimientos();


	//Funcion para agregar procedimientos
	$('#agregar_procedimiento').click(function(){
		let procedimiento = $('#procedimiento').val();
		let plazo = $('#plazo').val();
		let costo = $('#costo').val();
		let cprocedimiento = $('#cprocedimiento').val();
		if (procedimiento == "" || plazo == "" || costo == "" || cprocedimiento == "") {
			alertify.error("INSERTE VALORES CORRECTOS");
		}
		else{
			var data = 'procedimiento='+procedimiento+'&plazo='+plazo+'&costo='+costo+"&cprocedimiento="+cprocedimiento;
		//alert(data);
		$.ajax({
			url:'procedimientos/insertar_procedimiento/html',
			type: 'POST',
			data: data,
			success: function(a){
				$("#tabla_procedimientos").html(a);
				datatables_procedimientos();
				$('#procedimiento').val("");
				$('#plazo').val("");
				$('#costo').val("");
				$('#cprocedimiento').val("");
			}
		})
		}
		
	})
	
	// funcion para agregar una clase de procedimiento
		$('#agregar_cprocedimeinto').click(function(){

		})

	//funcion para actulizar datos de procedimiento
		$('#actualizar_procedimiento').click(function(){
			let idprocedimiento = $('#idprocedimiento_up').val();
			let procedimiento = $('#procedimiento_up').val();
			let plazo = $('#plazo_up').val();
			let costo = $('#costo_up').val();
			let cprocedimiento= $('#cprocedimiento_up').val();
			if (procedimiento == "" || plazo == "" || costo == "" || cprocedimiento == "") {
				alertify.error("INSERTE VALORES CORRECTOS");
			}
			else{
			 let data = "idprocedimiento="+idprocedimiento
						+"&procedimiento="+procedimiento
						+"&plazo="+plazo
						+"&costo="+costo
						+"&cprocedimiento="+cprocedimiento;

						$.ajax({
							url:'procedimientos/actualizar_procedimiento/html',
							type: 'POST',
							data: data,
							success: function(a){
								$("#tabla_procedimientos").html(a);
								datatables_procedimientos();
							}
						})

			}
		})
})

//mostrar data tables para procedimientos
		function datatables_procedimientos(){
		$('#procedimientos').DataTable({
		 language: {
            "lengthMenu": "Mostrar _MENU_ por pagina",
            "zeroRecords": "Ningun registro encontrado",
            "info": "Pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No se encontraron resultados",
            "infoFiltered": "(filtro  _MAX_ registro maximo)",
            "search":"Buscar:",
            "paginate":{"next":">>",
        				"previous":"<<"}
        },
        /*language: {
                "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
            },*/
		dom: 'Bfrtip',
        buttons: [
        		'pageLength',
                'copy',
                'csv',
                'pdf'
            ],
        lengthMenu: [
			[10, 20, 50],
			['10 registros', '20 registros', '50 registros', 'Show all']
			],
        scrollY: 250
		});}
	//funcion para convertir en Mayuscula lo que se teclea
		function mayus(e){
			e.value = e.value.toUpperCase();
		}

		//Funcion para cargar los datos de actualizacion de procedimientos en un modal

		function procedimientos_datos_up(data){
			p = data.split("||");
			$('#idprocedimiento_up').val(p[0]);
			$('#procedimiento_up').val(p[1]);
			$('#plazo_up').val(p[2]);
			$('#costo_up').val(p[3]);
			$('#cprocedimiento_up').val(p[4]);
		}