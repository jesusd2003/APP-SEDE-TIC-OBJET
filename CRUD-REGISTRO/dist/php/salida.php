<?php 
include('../../../conexion/conexion.php');
$id_articulo = $_POST['id_articulos'];
session_start();
include('datetime.php');
$SQL = "UPDATE articulo SET datos_salida='".$hora."' WHERE id='".$id_articulo."';";
$query = mysqli_query($conexion,$SQL);
if ($query) {
    echo "Hora de salida Actualizada!";
}


?>