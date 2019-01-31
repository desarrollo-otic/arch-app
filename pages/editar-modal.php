<!-- Editar -->
<div class="modal fade" id="edit_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#3399ff;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title" style="color:white;" id="myModalLabel"> <b> Editar Registro </b></h3>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="pages/editar.php">
                <br>
				<input type="hidden" class="form-control" name="id" value="<?php echo $row['id']; ?>">
				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label modal-label">Nombre y Apellido:</label>
					</div>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="nom_ape" value="<?php echo $row['nom_ape']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label modal-label">Cédula:</label>
					</div>
					<div class="col-sm-8">
						<input type="number" min="0" max="99999999" pattern="[1-9]{8}" class="form-control" id="cedula" name="cedula" value="<?php echo $row['cedula']; ?>">
					</div>
				</div>
				
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                <button type="submit" name="edit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Actualizar</a>
			</form>
            </div>

        </div>
    </div>
</div>

<!-- Borrar -->
<div class="modal fade" id="delete_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#3399ff;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title" style="color:white;" id="myModalLabel"> <b> Eliminar Registro </b></h3>
            </div>
            <div class="modal-body">	
            	<br><h4 class="text-center">¿Está seguro de eliminar este registro?</h4><br>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                <a href="pages/eliminar.php?id=<?php echo $row['id']; ?>" class="btn btn-success"><span class="glyphicon glyphicon-trash"></span> Aceptar</a>
            </div>

        </div>
    </div>
</div>