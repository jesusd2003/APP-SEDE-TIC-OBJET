<?php 
include('../../conexion/conexion.php');
$id = $_POST['id'];
$rol = $_POST['Rol'];

$SQL = "UPDATE `roles` SET `descripcion`='$rol' WHERE id='$id'";
$query = mysqli_query($conexion,$SQL);
if ($query) {
    echo
    "
        <script>
            alert('Rol actualizado con exito');
            location.href='../pages/añadirRoles.php';
        </script>
    ";
}
?>