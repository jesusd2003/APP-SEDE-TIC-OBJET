<?php
session_start();
$docu = $_POST['documento'];  
include('../../../conexion/conexion.php');?>

<?php
/* echo "el documento es: ". $docu; */

$nombre = null;
$SQL6 = "SELECT *,roles.`descripcion` AS Roles FROM persona INNER JOIN roles ON persona.`rol`=roles.`id` WHERE `persona`.`documento`='$docu';";
$query6 = mysqli_query($conexion,$SQL6);
if($query6){
    if($row = mysqli_fetch_array($query6)){
       $nombre = $row['nombre'];
       $apellido = $row['apellido'];
       $id_rol= $row['rol'];
       $rol = $row['Roles'];
       $documento = $row['documento'];
    }
    if($nombre != "" && $apellido != "" && $id_rol != "" && $rol != "" && $documento != ""){
    ?>

    <form action="php/agregar.php" method="POST">                          
        <div class="caja">
            <div class="row">
                <div class="col-md-3">
                    <label for="nom">Nombre</label> <input type="text" id="nom" name="nom" placeholder="Escriba aqui" required class="form-control"  value="<?php echo $nombre?>" readonly>
                </div>
                <div class="col-md-3">
                    <label for="ape">Apellido</label> <input type="text" id="ape" name="ape" placeholder="Escriba aqui" required class="form-control" value="<?php echo $apellido?>" readonly>
                </div>
                <div class="col-md-3">
                    <label for="doc">Documento</label> <input type="text" id="doc" name="doc" placeholder="Escriba aqui" required class="form-control " value="<?php echo $documento?>" readonly>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label for="rol">Rol</label> 
                    <?php 
                    $SQL3 = "SELECT * FROM roles";
                    $query3= mysqli_query($conexion,$SQL3);?>
                    <select name="rol" id="rol" required class="form-control" readonly>
                        <option selected value="<?php echo $id_rol; ?>"><?php echo $rol; ?></option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="articulo">Articulo</label> <input type="text" id="articulo" name="articulo" placeholder="Escriba aqui" required class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="obs">Observaciones</label>
                    <textarea name="obs" id="obs" cols="28" rows="5" placeholder="Escriba aqui" required class="form-control"></textarea>
                </div>
                <div class="row">
                    <div class="col-md-9">
                        <input class="submit submit-hv" type="submit" value="Guardar" style="border-radius:10px;">
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php
}else{
?>
    <form action="php/agregar.php" method="POST">                          
        <div class="caja">
            <div class="row">
                <div class="col-md-3">
                    <label for="nom">Nombre</label> <input type="text" id="nom" name="nom" placeholder="Escriba aqui" required class="form-control" value="">
                </div>
                <div class="col-md-3">
                    <label for="ape">Apellido</label> <input type="text" id="ape" name="ape" placeholder="Escriba aqui" required class="form-control" value="">
                </div>
                <div class="col-md-3">
                    <label for="doc">Documento</label> <input type="text" id="doc" name="doc" placeholder="Escriba aqui" required class="form-control " value="">
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <label for="rol">Rol</label> 
                    <?php 
                    $SQL3 = "SELECT * FROM roles";
                    $query3= mysqli_query($conexion,$SQL3);?>
                    <select name="rol" id="rol" required class="form-control">
                    <option value="">Selecione una opcion...</option>
                    <?php while($row = mysqli_fetch_array($query3)){?>
                        <option value="<?php echo $row['id']; ?>"><?php  echo $row['descripcion']; ?></option>
                        <?php } ?>
                        </select>
                </div>
                <div class="col-md-3">
                    <label for="articulo">Articulo</label> <input type="text" id="articulo" name="articulo" placeholder="Escriba aqui" required class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="obs">Observaciones</label>
                    <textarea name="obs" id="obs" cols="28" rows="5" placeholder="Escriba aqui" required class="form-control"></textarea>
                </div>
                <div class="row">
                    <div class="col-md-9">
                        <input class="submit submit-hv" type="submit" value="Guardar" style="border-radius:10px;">
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php }}?>