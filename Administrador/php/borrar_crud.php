<?php
include('../../conexion/conexion.php');
$id = $_POST['id'];
echo $SQL = "DELETE FROM `persona` WHERE id='".$id."';";
$query = mysqli_query($conexion,$SQL);
if($query){
   echo "Persona borrada exitosamente";
}
?>