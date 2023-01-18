<?php 
include('../../conexion/conexion.php');
$fecha = $_POST['fecha'];
$SQL = "SELECT articulo.`usuario` as vigilante, articulo.`id` as ID, articulo.`id_persona`as id_persona,persona.`nombre`as nombre,persona.`apellido` as apellido,
persona.`documento`as documento,persona.`rol`as rol,`articulo`.`articulo`as articulo,articulo.`fecha`as fecha, articulo.`datos_entrada`as datos_entrada,
articulo.`datos_salida`as datos_salida,articulo.`observaciones`as observaciones , roles.descripcion AS Roles 
FROM articulo 
INNER JOIN persona ON articulo.id_persona=persona.id 
INNER JOIN roles ON persona.rol=roles.id
WHERE fecha='$fecha'";
$query = mysqli_query($conexion,$SQL);
if(mysqli_num_rows($query)>0){?>
    <table class="tabla" id="example">
        <div class="container-fluid" style="padding:0;margin:0;"> 
                <div class="row form-group">
        </div>
        <thead> 
            <th>Vigilante</th> 
            <th>Nombres</th> 
            <th>Apellido</th>
            <th>Documento</th>
            <th>Rol</th>
            <th>Articulo</th>
            <th>Observación</th>
            <th>Fecha</th>
            <th>Datos-Entrada</th>
            <th>Datos-Salida</th>
        </thead>
        <tbody><?php
        while($row = mysqli_fetch_array($query)){ ?>
        <tr>
            <td><?php echo $row['vigilante'];?></td>
            <td><?php echo $row['nombre'];?></td>
            <td><?php echo $row['apellido']; ?></td>
            <td><?php echo $row['documento'];?></td>
            <td><?php echo $row['Roles'];?></td>
            <td><?php echo $row['articulo'];?></td>
            <td><?php echo $row['observaciones'];?></td>
            <td><?php echo $row['fecha'];?></td>
            <td><?php echo $row['datos_entrada'];?></td>
            <td><?php echo $row['datos_salida'];?></td>                           
        </tr>
        <?php }?>
        </tbody>
    </table>
<?php }else{?>
    <table class="tabla" id="example">
        <div class="container-fluid" style="padding:0;margin:0;"> 
                <div class="row form-group">
        </div>
        <thead> 
            <th>Vigilante</th> 
            <th>Nombre</th> 
            <th>Apellido</th>
            <th>Documento</th>
            <th>Rol</th>
            <th>Articulo</th>
            <th>Observación</th>
            <th>Fecha</th>
            <th>Datos-Entrada</th>
            <th>Datos-Salida</th>
        </thead>
        <tbody><?php
        while($row = mysqli_fetch_array($query)){ ?>
        <tr>
            <td><?php echo $row['vigilante'];?></td>
            <td><?php echo $row['nombre'];?></td>
            <td><?php echo $row['apellido']; ?></td>
            <td><?php echo $row['documento'];?></td>
            <td><?php echo $row['Roles'];?></td>
            <td><?php echo $row['articulo'];?></td>
            <td><?php echo $row['observaciones'];?></td>
            <td><?php echo $row['fecha'];?></td>
            <td><?php echo $row['datos_entrada'];?></td>
            <td><?php echo $row['datos_salida'];?></td>                           
        </tr>
        <?php }?>
        </tbody>
    </table>
<?php }?>
<script>
    // Initialize the DataTable
    $(document).ready(function () {
        $('#example').DataTable({
            
            // Enable the searching
            // of the DataTable
            //searching: true
            "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });
    });
</script>
<script>
    initSalida();
    function initSalida() {
        $(".enviar").click(function(e) {
            e.preventDefault();
            var id = $(this).attr("id-articulo");
            var boton = $(this)[0];
            boton.blur();

            if (confirm("¿Esta seguro que desea darle salida a la persona?")) {
                $.ajax({
                    type: "POST",
                    url: "php/salida.php",
                    data: 'id_articulos='+id,
                    success: function(data){
                        alert(data, 1);
                        window.location.reload();
                    }
                });
            }          
        });
    }
</script>