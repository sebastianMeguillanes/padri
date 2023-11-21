
<?php
    require 'header.php';
?>
<!-- Main Content -->
<section class="content">
<div class="container-fluid" id="miniaresult">
                <div class="page-content">
                    <div class="container-fluid">
                        <!-- start page title -->
                        <div class="row ">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <div class="header">
                                        <h2><strong>Registro</strong> Registro de Estudiantes</h2>
                                                                
                                         </div>
                                        
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Escritorio</a></li>
                                            <li class="breadcrumb-item active">Clientes</li>
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
                                            <th>Registrador</th>
                                            <th>Registrado</th>
                                            <th>Tipo registro</th>
                                            <th>Fecha</th>
                                            <th>Hora</th>
                                            
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
                                        <input type="text" class="form-control" placeholder="Nombre Personal" name="nombre" id="nombre">
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
                                    <div class="form-group form-float">
                                        <input type="text" class="form-control" placeholder="Direccion" name="direccion" id="direccion" >
                                    </div>
                                    <div class="body">
                                        <div class="row clearfix">
                                            <div class="col-sm-6">
                                                <select class="form-control show-tick" name="rol" id="rol">
                                                    <option value="">-- ROL --</option>
                                                    <option value="1">DECANO</option>
                                                    <option value="2">DIRECTOR DE CARRERA</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <select class="form-control show-tick" name="departamento" id="departamento">
                                                    <option value="">-- DEPARTAMENTO --</option>
                                                    <option value="1">INGENIERIA y CIENCIAS EXACTAS</option>
                                    
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
<script type="text/javascript" src="script/registroper.js"></script>   
