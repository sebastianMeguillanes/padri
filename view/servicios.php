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
                                        <h2><strong>Añadir</strong> nuevo servicio</h2>                                                                
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
                                    <h4 class="card-title">Listado de Servicios</h4>
                                    <table id="tbllistado" class="table table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Opciones</th>
                                                <th>Tipo de servicio</th>
                                                <th>Nombre de usuario</th>                                                
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
                                            <h4 class="card-title">Registro de Datos</h4>                                            
                                            <div class="row mb-3">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Nombre del servicio</label>
                                                <div class="col-sm-10">
                                                    <input type="hidden" name="idservicio" id="idservicio">
                                                    <input class="form-control mayusculas" type="text" placeholder="Nombre" maxlength="100" id="nombre" name="nombre" required>
                                                </div>
                                            </div>     
                                            <div class="row mb-3">
                                                <label for="example-text-input" class="col-sm-2 col-form-label">Usuarios</label>
                                                <div class="col-sm-10">
                                                    <select id="usuario" name="usuario[]" class="form-control" tabindex="-1" multiple style="display: none; width: 100%" required></select>
                                                </div>
                                            </div>                        
                                            <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <button class="btn btn-raised btn-primary btn-round waves-effect" type="submit" id="btnGuardar"><i class="bx bx-save"></i> Guardar</button>
                                                <button class="btn btn-raised btn-primary btn-round waves-effect" onclick="cancelarform()" type="button"><i class="fa fa-arrow-circle-left"></i> Cancelar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->            
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
<script type="text/javascript" src="script/servicios.js"></script>  