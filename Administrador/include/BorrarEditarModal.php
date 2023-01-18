<!-- Ventana Editar Registros CRUD -->
<div class="modal fade" id="edit_<?php echo $mostrar['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"> 
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Editar Empleado</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="EditarRegistro.php">
				<div class="row form-group">
					<input type="hidden" class="form-control" name="id" value="<?php echo $mostrar['id'];?>">
					<div class="col-sm-4">
						<label class="control-label" style="position:relative; top:7px;">Nombres:</label>
					</div>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="nombres" value="<?php echo $mostrar['nombres']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label" style="position:relative; top:7px;">Apellidos:</label>
					</div>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="apellidos" value="<?php echo $mostrar['apellidos']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label" style="position:relative; top:7px;">Nombre de Usuario:</label>
					</div>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="userName" value="<?php echo $mostrar['userName']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label" style="position:relative; top:7px;">Tipo de Documento:</label>
					</div>
					<div class="col-sm-8">
					<select class="form-select" name="Tdoc" required>
                                <option selected>Seleccione...</option>
                                <option value="CC">Cedula de ciudadanía</option>
                                <option value="TI">Tarjeta de identidad</option>
                                <option value="CE">Cedula de extranjeria</option>
                                <option value="PS">Pasaporte</option>
                    </select>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label" style="position:relative; top:7px;">Nro Documento:</label>
					</div>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="Doc" required value="<?php echo $mostrar['Doc']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label" style="position:relative; top:7px;">Telefono:</label>
					</div>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="telefono" value="<?php echo $mostrar['telefono']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label" style="position:relative; top:7px;">Genero:</label>
					</div>
					<div class="col-sm-8">
					<select class="form-select" name="gender" required>
                                <option selected disabled>Seleccione...</option>
                                <option value="hombre">Hombre</option>
                                <option value="mujer">Mujer</option>
                    </select>
					</div>
				</div>
            </div> 
			</div>
            <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="editar" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Actualizar Ahora</a>
			</form>
            </div>

        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete_<?php echo $mostrar['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
			<form action="BorrarRegistro.php">
				<div class="modal-header">
				<input type="hidden" class="form-control" name="id" value="<?php echo $mostrar['id'];?>">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<center><h4 class="modal-title" id="myModalLabel">Borrar Empleado</h4></center>
				</div>
				<div class="modal-body">	
					<p class="text-center">¿Esta seguro de Borrar el registro?</p>
					<h2 class="text-center"><?php echo $mostrar['nombres'].' '.$mostrar['apellidos']; ?></h2>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
					<!-- <button type="button"class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>Si</button> -->
					<a href="BorrarRegistro.php?id=<?php echo $id; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Si</a>
				</div>
			</form>

        </div>
    </div>
</div>