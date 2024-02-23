<?php 
require 'function.php';

$idp = $_GET["id_penerbit"];

if ( delete2($idp) > 0 ){
	echo "
		<script>
			alert('Data successfully deleted');
			document.location.href = 'admin.php';
		</script>
		";
	} else {
	echo "
		<script>
			alert('Data failed to delete');
			document.location.href = 'admin.php';
		</script>
	";
	}
?>