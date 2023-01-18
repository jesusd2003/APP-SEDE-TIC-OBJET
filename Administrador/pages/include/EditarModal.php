<div class="modal fade" id="edit_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="edit_<?php echo $row['id']; ?>" aria-hidden="true">
    <div class="modal-dialog"> 
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="edit_<?php echo $row['id']; ?>">Editar Rol</h4></center>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                <form method="POST" action="../php/actualizar_rol.php">
                    <div class="row form-group">
                        <input type="hidden" class="form-control" name="id" value="<?php echo $row['id'];?>">
                        <div class="col-sm-4">
                            <label class="control-label" style="position:relative; top:7px;">Rol:</label>
                        </div>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="Rol" value="<?php echo $row['descripcion']; ?>">
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