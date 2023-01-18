<?php
include('../../conexion/conexion.php');
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$Doc = $_POST['Doc'];
$mail = $_POST['e-mail'];
$roles = $_POST['rol'];
$pass = password_hash($Doc,PASSWORD_DEFAULT);

if (!$nombres == "" && !$apellidos == "" && !$mail =="" && !$Doc == "" && !$roles==""){
    if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {     
        $SQL = "INSERT INTO `persona`(`documento`,`nombre`,`apellido`,`correo`,`contraseña`,`rol`) VALUES ('$Doc','$nombres','$apellidos','$mail','$pass','$roles');";
        $query = mysqli_query($conexion,$SQL);
        if($query){
            echo"
                <script>
                    alert('Ingresado con exito!');
                    location.href='../CRUD.php';
                </script>
            ";
        }else{
            echo"
                <script>
                    alert('no se a podido registrar la persona, intente nuevamente!');
                    location.href='../CRUD.php';
                </script>
            ";
        }
    }else{
       echo"
            <script>
                alert('el mail está mal escrito, digitelo bien!');
                location.href='../CRUD.php';
            </script>
       "; 
    }
}else{
    echo "
        <script>
            alert('Completa los campos!!');
            location.href='../CRUD.php';
        </script>
    ";
}

?>