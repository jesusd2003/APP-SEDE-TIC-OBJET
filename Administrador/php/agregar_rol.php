<?php 
/* se incluye la conexión */
include('../../conexion/conexion.php');
/* se obtiene el elemento por le metodo post */
$rol = $_POST['agg_rol'];

/* de aquí en adelante van las instruciones sql */
$SQL = "INSERT INTO `roles`(`descripcion`) VALUES ('".$rol."')";
$query = mysqli_query($conexion,$SQL);

echo "Agregado con exito"
?>