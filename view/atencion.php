<?php
    require 'header.php';
?>
<!-- Main Content -->
<section class="content">
<div class="container-fluid" id="miniaresult">
                <div class="page-content">
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <div class="header">
                                        <h2><strong>Añadir</strong> nueva atención</h2>
                                                                
                                        <button class="btn btn-raised btn-primary btn-round waves-effect" id="btnagregar" onclick="mostrarform(true)"><i class="bx bx-add-to-queue"></i>Agregar</button></h4>
                                    </div>
                                        
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Escritorio</a></li>
                                            <li class="breadcrumb-item active">Añadir</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->                        
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                <div class="card-body" id="listadoregistros">
                                    <h4 class="card-title">Listado de Atenciones</h4>
                                    <table id="tbllistado" class="table table-striped" style="width:100%">
                                        <thead>
                                        <tr>
                                        <th>Opciones</th>
                                        <th>Fecha de atención</th> 
                                        <th>Estudiante</th>         
                                        <th>Tipo de atención</th>                                                                         
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        <tfoot>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="card-body" id="formularioregistros">
                                <form name="formulario" id="formulario" method="POST">
                                    <div class="form-group form-float">
                                        <input type="hidden" name="idatencion" id="idatencion">
                                        <div class="mb-3">
                                        <label for="example-text-input" class="form-label">Nombre del Estudiante</label>
                                        <select id="idestudiante" name="idestudiante" class="form-control" data-live-search="true" required>
                                        </select>
                                    </div>
                                    <div class="form-group form-float">
                                        <input type="text" class="form-control" placeholder="Tipo de atención" name="accion_atencion" id="accion_atencion">
                                    </div>
                                    <div class="form-group">
                                        <input type="date" id="fecha_atencion" name="fecha_atencion"
                                         value="2023-05-3" min="20-01-01" max="2048-12-31"></input>
                                    </div>                               
                                </form>
                                <button class="btn btn-raised btn-primary btn-round waves-effect" type="submit" onclick="guardaryeditar()" id="btnGuardar">Guardar</button>
                                <button class="btn btn-raised btn-primary btn-round waves-effect" type="submit"  onclick="cancelarform()">Cancelar</button>
                                    
                            </div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->   
                    </div>         
                </div>
            </div> 
</section>
<?php
    require 'footer.php';
?>  
<style>
    .custom-font-size {
  font-size: 17px;
}
</style>
<script type="text/javascript" src="script/atencion.js"></script>   
