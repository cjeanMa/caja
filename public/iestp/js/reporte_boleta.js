$(document).ready(function(){

	//Para buscar por nuemero de boleta
	$('#buscar_boleta').click(function(){
		var idboleta = $('#idboleta').val();
		if (idboleta===""||idboleta<1){
			alertify.error("Ingresa un Numero de Boleta Correcto");
			$('#idboleta').focus();
		}
		else{
			var data = "idboleta="+idboleta;
			$.ajax({
				url: '../boleta/reporte_boleta/html',
				type: 'POST',
				data: data,
				success: function(a){
					$('#tabla_reporte').html(a);
				}
			})
		}
	})
	//para la funcion de mostrar reporte mediante fechas
	$('#ver_boletas').click(function(){
		var f_inicio = $("#f_inicio").val() + " 00:00:00";
		var f_fin = $("#f_fin").val() + " 23:59:59";
		if (f_inicio === "" || f_fin === "") {
			alertify.error("Ingrese Fechas Correctas");
		}
		else{
			var data = "f_inicio="+f_inicio+"&f_fin="+f_fin;
			$.ajax({
				url:'../boleta/ver_boletas/html',
				type: 'POST',
				data: data,
				success: function(a){
					$('#tabla_reporte').html(a);
					datatables_boletas();
				}
			})
		}
	})

	//Para imprimir el registro de boletas almacenadas
	$('#imprimir_reporte').click(function(){
		var f_inicio = $("#f_inicio").val() + " 00:00:00";
		var f_fin = $("#f_fin").val() + " 23:59:59";
		if (f_inicio === "" || f_fin === "") {
			alertify.error("Ingrese Fechas Correctas");
		}
		else{
			var data = "f_inicio="+f_inicio+"&f_fin="+f_fin;
			$.ajax({
				url:'../boleta/ver_boletas/html',
				type: 'POST',
				data: data,
				success: function(a){
					windows.open('../boleta/');
				}
			})
		}

	})

	//Para realizar un
	$('#ver_informe').click(function(){
		var f_inicio = $("#f_inicio").val() + " 00:00:00";
		var f_fin = $("#f_fin").val() + " 23:59:59";
		if (f_inicio === "" || f_fin === "") {
			alertify.error("Ingrese Fechas Correctas");
		}
		else{
			var data = "f_inicio="+f_inicio+"&f_fin="+f_fin;
			$.ajax({
				url:'../boleta/ver_informe/html',
				type: 'POST',
				data: data,
				success: function(a){
					$('#tabla_reporte').html(a);
				}
			})
		}
	})
})

//Funcion datatables para las boletas
	function datatables_boletas(){
		$('#datatables_boletas').DataTable({
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
		});
	}