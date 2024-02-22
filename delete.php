<?php 
require 'function.php';

$idb = $_GET["id"];

if ( delete($idb) > 0 ){
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