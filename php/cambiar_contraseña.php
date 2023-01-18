<?php
include('../conexion/conexion.php');
session_start();
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];
$pass3 = $_POST['pass3'];
$id = $_SESSION['id_ingreso'];
$sql = "SELECT * FROM persona WHERE id = $id";
$query = mysqli_query($conexion,$sql);
if($row = mysqli_fetch_array($query)){
    $contra = $row['contraseña'];
}
if(mysqli_num_rows($query)>0){
    if(password_verify($pass1,$contra)){
        if(!$pass1 == "" && !$pass2 == "" && !$pass3 == ""){
            if($pass2===$pass3){
                $password = password_hash($pass2, PASSWORD_DEFAULT);
                $SQL2 = "UPDATE `persona` SET `contraseña`='$password' WHERE id = '$id';";
                $query2 = mysqli_query($conexion,$SQL2);
                if($query2){
                    echo"
                        <script>
                            alert('contraseña cambiada correctamente!');
                            location.href = '../index.php';
                        </script>
                    ";
                }
            }else{
                $mensaje = "Verifique que su contraseña";
                header('location: ../configuracion/cambiar_contraseña.php');
            }
        }else{
            $mensaje = "Alerta: Rellene todos los campos";
            header('location: ../configuracion/cambiar_contraseña.php');
        }
    }else{
        $mensaje = "Error: su contraseña actual está errada";
        header('location: ../configuracion/cambiar_contraseña.php');
    }
}
$_SESSION['msj'] = $mensaje;

?>