<<<<<<< HEAD
<?php

error_reporting(0);

session_start();

unset($_SESSION['nomeu']);
unset($_SESSION['carrinho']);
unset($_SESSION['emailu']);

	echo "
		<script> 
			location.href = 'login.php';
		</script>";

=======
<?php

error_reporting(0);

session_start();

unset($_SESSION['nomeu']);
unset($_SESSION['carrinho']);
unset($_SESSION['emailu']);

	echo "
		<script> 
			location.href = 'login.php';
			alert('Redirecionando');
		</script>";

>>>>>>> caf4b85e80ef9a56e4ae2ccd57c92c1df7f5b407
?>