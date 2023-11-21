
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
                                        <h2><strong>Permisos</strong></h2>
                                    </div>                                        
                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Escritorio</a></li>
                                            <li class="breadcrumb-item active">Permisos</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->                          
                        <div class="body">
                            <div class="col-12">
                                <div class="card">
                                <div class="card-body" id="listadopermisos">
                                    <h4 class="card-title">Permisos del usuario</h4>
                                    <table id="tbllistado" class="table table-striped" style="width:100%">
                                        <thead>
                                        <tr>
                                            <th>Permisos existentes</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                        <tfoot>
                                        </tfoot>
                                    </table>
                                </div>       
                </div>
            </div>    
            </section>
<?php
    require 'footer.php';
?>  

<script type="text/javascript" src="script/permiso.js"></script>  