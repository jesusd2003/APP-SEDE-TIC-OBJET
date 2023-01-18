<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form method="POST" action="include/nuevoRegistro.php">
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Nombres:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="nombres">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Apellidos:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="apellidos">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Documento:</label>
					</div>
					<div class="col-sm-10">
						<input type="Documento" class="form-control" name="Doc">
					</div>
				</div>
        <div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">E-mail:</label>
					</div>
					<div class="col-sm-10">
						<input type="mail" class="form-control" name="e-mail">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label" style="position:relative; top:7px;">Rol:</label>
					</div>
					<div class="col-sm-10">
					<!-- <label class="form-label">Rol</label> -->
                            <?php 
                                $SQL = "SELECT * FROM roles";
                                $query = mysqli_query($conexion, $SQL);
                            ?>
                            <select name="rol" id="rol" class="form-select" require>
                                <option value="">Selecione..</option>
                            <?php
                                while($mostrar = mysqli_fetch_array($query)){
                                    echo "<option value=".$mostrar['id'].">".$mostrar['descripcion']." </option>";
                                }
                            ?>
                            </select>
					</div>
				</div>
			</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          <button type="submit" name="agregar" class="btn btn-primary">Guardar Registro</button>
		  </form>
            
        
          <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
      </div>
    </div>
  </div>