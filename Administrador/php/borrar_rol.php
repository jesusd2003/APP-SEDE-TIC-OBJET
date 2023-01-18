<?php
include('../../conexion/conexion.php');
$id = $_POST['id'];
echo $SQL = "DELETE FROM `roles` WHERE id='".$id."';";
$query = mysqli_query($conexion,$SQL);
if($query){
   echo "Rol borrado exitosamente";
}
?>