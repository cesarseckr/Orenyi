<?php session_start();
if(!$_SESSION['logged']==true){
	echo'<meta http-equiv="Refresh" content="0; url=paginas/login.php" />';
	echo '<style>  body{ visibility:hidden;} </style>';
	}

 ?>