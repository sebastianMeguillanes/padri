<?php

require 'header.php';

?> 
<section class="content" >  
    <div class="container-fluid" id="miniaresult">
        <!-- -->
        <div class="block-header">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-12">
                    <h2>Form Validation</h2>
                    <ul class="breadcrumb padding-0">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Forms</a></li>
                        <li class="breadcrumb-item active">Form Validation</li>
                    </ul>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-12">
                    <div class="input-group m-b-0">                
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-addon">
                            <i class="zmdi zmdi-search"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        
        <div id="example">
            
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row">
                    
                    <div class="header">
                        <h2><strong>Estudiante</strong> Creacion de Usuario</h2>
                        <button class="btn btn-raised btn-primary btn-round waves-effect" type="submit" id="btnagregar" onclick="mostrarform(true)" >AGREGAR</button>                        
                    </div>
                    
                    <div class="card">

                    
                        <div class="body">
                            <div class="card-body" id="listadoregistros">
                                <h4 class="card-title">Listado de Registros</h4>
                                <table id="tablalistado" class="table table-striped" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Opciones</th>
                                            <th>Nombre Completo</th>
                                            <th>Carnet de Identidad</th>
                                            <th>Email</th>
                                                <th>Login</th>
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
                                        <input type="hidden" name="idusuario" id="idusuario">
                                        <input type="text" class="form-control" placeholder="Nombre Estudiante" name="nombre" id="nombre">
                                    </div>
                                    <div class="form-group form-float">
                                        <input type="email" class="form-control" placeholder="Email" name="email" id="email">
                                    </div>
                                    <div class="form-group form-float">
                                        <input type="text" class="form-control" placeholder="Documento de Identidad" name="num_documento" id="num_documento" >
                                    </div>
                                    <div class="form-group form-float">
                                        <input type="number" class="form-control" placeholder="Telefono - Celular" name="telefono" id="telefono" >
                                    </div>
                                    <div class="body">
                                        <div class="row clearfix">
                                            <div class="col-sm-6">
                                                <select class="form-control show-tick" name="tipoestudiante" id="tipoestudiante">
                                                    <option value="">-- Tipo de Estudiante --</option>
                                                    <option value="1">PREGRADO</option>
                                                    <option value="2">POSTGRADO</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <select class="form-control show-tick" name="carrera" id="carrera">
                                                    <option value="">-- Carrera --</option>
                                                    <option value="1">INGENIERIA DE SISTEMAS</option>
                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    
                                    <div class="form-group">                                    
                                            <input type="text" class="form-control" placeholder="Username" name="login" id="login" >
                                        </div>
                                    <div class="form-group form-float">
                                        <input type="password" class="form-control" placeholder="Password" name="clave" id="clave">
                                    </div>
                                    
                                    
                                </form>
                                <button class="btn btn-raised btn-primary btn-round waves-effect" type="submit" onclick="guardaryeditar()" id="btnGuardar">Guardar</button>
                                
                                    <button class="btn btn-raised btn-primary btn-round waves-effect" type="submit"  onclick="cancelarform()">Cancelar</button>
                                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         #END# Basic Validation 

    </div>
</section>

<script type="text/javascript" src="script/usuario.js"></script>
<?php
require 'footer.php';
?>
     
 