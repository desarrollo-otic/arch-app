<!-- Agregar Nuevo -->
<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#3399ff;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title" style="color:white;" id="myModalLabel"><b> Nuevo Registro </b></h3>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="pages/agregar.php">
			    <br>
				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label modal-label">Nombre y Apellido:</label>
					</div>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="nom_ape" placeholder="Ingresar el nombre y apellido..." required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-4">
						<label class="control-label modal-label">Cédula:</label>
					</div>
					<div class="col-sm-8">
						<input type="number" min="0" max="99999999" pattern="[1-9]{8}" class="form-control" id="cedula" name="cedula" placeholder="Ingresar el número de cédula..." required>
					</div>	
				</div>
				
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
                <button type="submit" name="add" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</a>
			</form>
            </div>

        </div>
    </div>
</div>