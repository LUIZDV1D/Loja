<?php

error_reporting(0);

unset($_SESSION['nomeu']);
unset($_SESSION['carrinho']);
unset($_SESSION['emailu']);

	echo "
		<script> 
			location.href = 'login.php';
		</script>";

?>