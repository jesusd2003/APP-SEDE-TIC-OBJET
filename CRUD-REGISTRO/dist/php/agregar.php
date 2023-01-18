<?php
include('../../../conexion/conexion.php');
include('datetime.php');
session_start();
$nombreCompleto = $_SESSION['nombre_ingreso']." ".$_SESSION['apellido_ingreso'];
$nombre = $_POST['nom'];
$apellido= $_POST['ape'];
$Doc = $_POST['doc'];
$articulo = $_POST['articulo'];
$observaciones = $_POST['obs'];
$rol = $_POST['rol'];

$SQL="SELECT * FROM persona WHERE documento='$Doc'";
$query=mysqli_query($conexion,$SQL);
if(mysqli_num_rows($query)>0){
    if($rs = mysqli_fetch_array($query)){
        $id = $rs['id'];
    }
    $SQL2 = "INSERT INTO `articulo` (`usuario`,`id_persona`, `articulo`, `fecha`, `datos_entrada`, `datos_salida`, `observaciones`) VALUES ('$nombreCompleto',$id, '$articulo', '$fecha','$hora' , NULL, '$observaciones') ";
    $query2 = mysqli_query($conexion,$SQL2);
    if ($query2){
        echo"
            <script>
                alert('el articulo fue ingresado con exito');
                location.href='../DASHBOARD.php';
            </script>
        ";
    }else{
        echo"
            <script>
                alert('el articulo no pudo guardarse intente de nuevo!');
                //location.href='../DASHBOARD.php';
            </script>
        ";
    }
}else{
    $SQL3 = "INSERT INTO `persona` (`documento`, `nombre`, `apellido`, `rol`) VALUES ('$Doc', '$nombre', '$apellido', '$rol');";
    $query3 = mysqli_query($conexion,$SQL3);
    if($query3){
        $SQL4 = "SELECT * FROM persona WHERE documento ='$Doc'";
        $query4 = mysqli_query($conexion,$SQL4);
        if(mysqli_num_rows($query4)>0){
            if($row = mysqli_fetch_array($query4)){
                $id_p = $row['id'];
            }
            $SQL5 = "INSERT INTO `articulo` (`usuario`,`id_persona`, `articulo`, `fecha`, `datos_entrada`, `datos_salida`, `observaciones`) VALUES ('$nombreCompleto','$id_p', '$articulo', '$fecha', '$hora', NULL, '$observaciones');";
            $query5 = mysqli_query($conexion,$SQL5);
            if ($query5) {
                echo "
                    <script>
                        alert('el articulo fue ingresado con exito');
                        location.href='../DASHBOARD.php';
                    </script>
                    ";
            }else{
                echo "
                <script>
                    alert('Error: el articulo no se pudo registrar, intente de nuevo!');
                    //location.href='../DASHBOARD.php';
                </script>
                ";
            }
        }
        
    }else{
        echo"
            <script>
                alert('no pudo registrar a la persona que no estaba guardada!');
                location.href='../DASHBOARD.php';
            </script>
        ";
    }
}
?>