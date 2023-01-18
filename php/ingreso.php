<?php
require('../conexion/conexion.php');
session_start();
$_SESSION['login'] = true;
$user = $_POST['username']; 
$pass = $_POST['password']; 
if(!$user=="" && !$pass==""){
    $SQL = "SELECT * FROM persona 
    WHERE documento=".$user.""; 
    $query = mysqli_query($conexion,$SQL);
    if(mysqli_num_rows($query)>0){
        while($row = mysqli_fetch_array($query)){
            $id = $row['id']; 
            $rol = $row['rol']; 
            $name = $row['nombre']; 
            $apellido = $row['apellido']; 
            $pass2 = $row['contraseña'];
        }
        

            if(password_verify($pass, $pass2)){
                // Codigo para entrar 
            
                $_SESSION['id_ingreso'] = $id;
                $_SESSION['nombre_ingreso'] = $name;
                $_SESSION['apellido_ingreso'] = $apellido;
                $_SESSION['rol_ingreso'] = $rol;

                switch ($rol) {
                    case 1:
                        header('location: ../Administrador/index.php');
                        break;
                    case 2:
                        header('location: ../CRUD-REGISTRO/dist/inicio.php'); 
                        break;
                    default:
                        echo "
                        <script>
                            alert('Error: no tiene rol asignado, comuniquese con el administrador!');
                            location.href='../index.php';
                        </script>    
                        ";
                        break;
                }
            }else{
                echo "
                    <script>
                        alert('Contraseña incorrecta, intente nuevamente!!');
                        location.href='../index.php';
                    </script>
                    ";
            }
    }else{
        echo "
        <script>
            alert('El usuario no existe en el sistema');
            location.href='../index.php';
        </script>";
    }
}else{
    echo "
    <script>
        alert('Error: Los campos están vacios, llene todos los campos para ingresar!!');
        location.href='../index.php';
    </script>"; 
}

?>