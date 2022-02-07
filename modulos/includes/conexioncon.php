<?php 
 error_reporting(E_ALL ^ E_NOTICE);
	$con = new mysqli("127.0.0.1", "root", "123456", "orenyi_base_v1");
if ($con->connect_errno)
{
    echo "Fallo al conectar a MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
    exit();
}
@mysqli_query($con, "SET NAMES 'utf8'");
?>
