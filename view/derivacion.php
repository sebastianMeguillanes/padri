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
                            <h2><strong>Añadir</strong> nueva derivación</h2>                                                                
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
                <div class="body">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body" id="listadoregistros">
                                <h4 class="card-title">Listado de Registros</h4>
                                <table id="tbllistado" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Opciones</th>
                                            <th>Fecha</th>
                                            <th>Remitente</th>
                                            <th>Destinatario</th>
                                            <th>Personal</th>
                                            <th>Tipo</th>
                                            <th>Estado</th>
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
                                        <input type="hidden" name="idderivacion" id="idderivacion">
                                        <!--<input type="text" class="form-control" placeholder="Fecha" name="fechaderivacion" id="fechaderivacion">-->
                                    </div>
                                    <div class="form-group">
                                        <input type="date" id="fechaderivacion" name="fechaderivacion" value="2023-05-3" min="20-01-01" max="2048-12-31"></input>
                                    </div>
                                    <div class="form-group form-float">
                                        <input type="remitentederivacion" class="form-control" placeholder="Remitente" name="remitentederivacion" id="remitentederivacion">
                                    </div>
                                    <div class="form-group form-float">
                                        <input type="text" class="form-control" placeholder="Destinatario" name="destinatarioderivacion" id="destinatarioderivacion" >
                                    </div>

                                    <div class="body">                                        
                                        <div class="row clearfix">
                                            <label for="example-text-input" class="col-sm-2 col-form-label">Personal</label>
                                            <div class="col-sm-6">                                                
                                                <select class="form-control show-tick" id="idpersonal" name="idpersonal" data-live-search="true" required>
                                                </select>
                                            </div>                                        
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="row mb-3">                                                
                                        </div> 
                                    </div>
                                                                                            
                                    <div class="body">                                        
                                        <div class="row clearfix">
                                             <div class="col-sm-6">                                                
                                                <select class="form-control show-tick" name="tipoderivacion" id="tipoderivacion">
                                                    <option value="">Tipo Derivacion</option>
                                                    <option value="Analizar">Analizar</option>
                                                    <option value="Archivar">Archivar</option>
                                                    <option value="Informar">Informar</option>
                                                    <option value="Aprobado"> Aprobado</option>
                                                    <option value="Reunirse con:">Reunirse con:</option>
                                                    <option value="Recepccionar">Recepccionar</option>
                                                    <option value=" Dar curso"> Dar curso</option>
                                                    <option value="Remitir Antecedentes">Remitir Antecedentes</option>
                                                    <option value="Tomar nota">Tomar nota</option>
                                                    <option value="Opinar">Opinar</option>
                                                </select>
                                            </div>                                        
                                        </div>
                                    </div> 

                                </form>
                                <button class="btn btn-raised btn-primary btn-round waves-effect" type="submit" onclick="guardaryeditar()" id="btnGuardar">Guardar</button>
                                <button class="btn btn-raised btn-primary btn-round waves-effect" type="submit" onclick="cancelarform()">Cancelar</button>
                            </div>
                        </div> <!-- end card -->
                    </div>
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
<script type="text/javascript" src="script/derivacion.js"></script>   