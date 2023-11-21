<?php
require 'header.php'
?>	<title>Ejemplo de DataTable con Bundle</title>
	<!-- Incluye los archivos necesarios para DataTables y el Bundle -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>
	<script src="../public/bundles/libscripts.bundle.js"></script>
	<script src="../public/bundles/vendorscripts.bundle.js"></script>
	<!-- Inicializa DataTables y los plugins del Bundle -->
	<script>
		$(document).ready(function() {
			$('#miTabla').DataTable({
				"paging": true,
				"searching": true,
				"ordering": true,
				"info": true
			});
			// Inicializa el plugin Lib Scripts Plugin
			$.AdminBSB.activateAll();
			// Inicializa el plugin Waves Scripts Plugin
			Waves.attach('.btn');
			Waves.init();   
		});
	</script>
</head>
<body>
	<table id="miTabla" class="display">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Email</th>
				<th>Edad</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>1</td>
				<td>John</td>
				<td>Doe</td>
				<td>john.doe@example.com</td>
				<td>30</td>
			</tr>
			<tr>
				<td>2</td>
				<td>Jane</td>
				<td>Doe</td>
				<td>jane.doe@example.com</td>
				<td>25</td>
			</tr>
			<tr>
				<td>3</td>
				<td>Bob</td>
				<td>Smith</td>
				<td>bob.smith@example.com</td>
				<td>40</td>
			</tr>
		</tbody>
	</table>
</body>
<?php
require 'footer.php'
?>
