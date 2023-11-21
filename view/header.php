<?php
session_start();
?>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
<title>Sistema de Control de Documentos</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/handsontable/dist/handsontable.full.min.css" />
<link rel="stylesheet" href="../public/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../public/plugins/morrisjs/morris.css" />
<link rel="stylesheet" href="../public/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css"/>
<!-- Custom Css -->
<link rel="stylesheet" href="../public/css/main.css">
<link rel="stylesheet" href="../public/css/color_skins.css">
<!-- Bootstrap Select Css -->
<link href="../public/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

        <link href="../public/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>

        <!-- DataTables -->
        <link href="../public/libs/datatables/dataTables.min.css" rel="stylesheet" type="text/css" />
        <!-- preloader css -->
        <link rel="stylesheet" href="../public/css/preloader.min.css"
            type="text/css" />
        <!-- Sweet Alert-->
        <link href="../public/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
        
        <!-- Icons Css -->
        <link href="../public/css/icons.min.css" rel="stylesheet" type="text/css"
            />
        <!-- App Css-->
        <link href="../public/css/app.min.css" id="app-style" rel="stylesheet"
            type="text/css" />


        <link href="../public/css/main.css" rel="stylesheet"
    type="text/css" />
        <style type="text/css">
            .mayusculas{
                text-transform:uppercase;
            }	
            textarea {
                resize: none;
            }
        </style>
<body class="theme-black">
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img src="../public/images/logo.png" width="48" height="48" alt="Alpino"></div>
        <p>Por favor espere...</p>        
    </div>
</div>
<div class="overlay_menu">
    <button class="btn btn-primary btn-icon btn-icon-mini btn-round"><i class="zmdi zmdi-close"></i></button>
    <div class="container">        
        <div class="row clearfix">
            <div class="card">
            </div>
            <div class="card links">
                <div class="body">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <h6>Autentificacion</h6>
                            <ul class="list-unstyled">
                                <li><a href="user_estudiante.php">Estudiante</a></li>
                                <li><a href="user_personal.php">Personal</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <h6>Registro</h6>
                            <ul class="list-unstyled">
                                <li><a href="registro_userest.php">Estudiante</a></li>
                                <li><a href="registro_personal.php">Personal</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-12">
                            <h6>Añadir</h6>
                            <ul class="list-unstyled">                            
                                <li><a href="departamento.php">Departamento</a></li>
                                <li><a href="carrera.php">Carrera</a></li>
                                <li><a href="derivacion.php">Derivación</a></li>
                                <li><a href="hoja_ruta.php">Hoja de ruta</a></li>
                                <li><a href="atencion.php">Atención</a></li>
                                <li><a href="servicio.php">Servicio</a></li>
                            </ul>
                        </div>                        
                    </div>
                </div>
            </div>            
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12">
                <div class="social">                 
                    <p>Coded by Grupo 5<br> Designed by <a href="http://thememakker.com/" target="_blank">thememakker.com</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="overlay"></div><!-- Overlay For Sidebars -->

<!-- Left Sidebar -->
<aside id="minileftbar" class="minileftbar">
    <ul class="menu_list">
        <li>
            <a href="javascript:void(0);" class="bars"></a>
            <a class="navbar-brand" href="nose.php"><img src="../public/images/logo.png" alt="Alpino"></a>
        </li>
        <li><a href="javascript:void(0);" class="btn_overlay hidden-sm-down"><i class="zmdi zmdi-search"></i></a></li>        
        <li><a href="javascript:void(0);" class="menu-sm"><i class="zmdi zmdi-swap"></i></a></li>        
        <li class="menuapp-btn"><a href="javascript:void(0);"><i class="zmdi zmdi-apps"></i></a></li>
        
        <li class="task badgebit">
            <a href="javascript:void(0);">
                <i class="zmdi zmdi-flag"></i>
                <div class="notify">
                    <span class="heartbit"></span>
                    <span class="point"></span>
                </div>
            </a>
        </li>
        <li class="power">
            <a href="javascript:void(0);" class="js-right-sidebar"><i class="zmdi zmdi-settings zmdi-hc-spin"></i></a>            
            <a href="../ajax/user.php?op=8" class="mega-menu"><i class="zmdi zmdi-power"></i></a>
        </li>
    </ul>    
</aside>

<aside class="right_menu">
    <div class="menu-app">
        <div class="slim_scroll">
            <div class="card">
                <div class="header">
                    <h2><strong>App</strong> Menu</h2>
                </div>
                <div class="body">
                    <ul class="list-unstyled menu">
                        <li><a href="nose.php"><i class="zmdi zmdi-calendar-note"></i><span>DASHBOARD</span></a></li>
                        <li><a href="registro_userest.php"><i class="zmdi zmdi-file-text"></i><span>REGISTROS</span></a></li>
                        <li><a href="user_estudiante.php"><i class="zmdi zmdi-arrows"></i><span>AUTENTIFICACIÓN</span></a></li>
                        <li><a href="departamento.php"><i class="zmdi zmdi-view-column"></i><span>AÑADIR</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="notif-menu">
        <div class="slim_scroll">
            <div class="card">
                <div class="header">
                    <h2><strong>Messages</strong></h2>
                </div>
                <div class="body">
                    <ul class="messages list-unstyled">
                        <li>
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object rounded-circle" src="../public/images/xs/avatar1.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Alexander <small class="time">35min ago</small></span>
                                        <p class="message">New tasks needs to be done</p>                                        
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object rounded-circle" src="../public/images/xs/avatar2.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Grayson <small class="time">1hr ago</small></span>
                                        <p class="message">New tasks needs to be done</p>                                        
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object rounded-circle" src="../public/images/xs/avatar3.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Sophia <small class="time">31min ago</small></span>
                                        <p class="message">New tasks needs to be done</p>                                        
                                    </div>
                                </div>
                            </a>
                        </li>        
                    </ul>  
                </div>
            </div>
            <div class="card">
                <div class="header">
                    <h2><strong>Notifications</strong></h2>
                </div>
                <div class="body">
                    <ul class="notification list-unstyled">
                        <li>
                            <i class="zmdi zmdi-balance-wallet text-success"></i>
                            <strong>+$30 New sale</strong>
                            <p><a href="javascript:void(0)">Admin Template</a></p>
                            <small class="text-muted">7 min ago</small>
                        </li>
                        <li>
                            <i class="zmdi zmdi-edit text-info"></i>
                            <strong>You Edited file</strong>
                            <p><a href="javascript:void(0)">Docs.doc</a></p>
                            <small class="text-muted">15 min ago</small>
                        </li>
                        <li>
                            <i class="zmdi zmdi-delete text-danger"></i>
                            <strong>Project removed</strong>
                            <p><a href="javascript:void(0)">AdminX BS4</a></p>
                            <small class="text-muted">1 hours ago</small>
                        </li>
                        <li>
                            <i class="zmdi zmdi-account text-success"></i>
                            <strong>New user</strong>
                            <p><a href="javascript:void(0)">UI Designer</a></p>
                            <small class="text-muted">1 hours ago</small>
                        </li>
                        <li>
                            <i class="zmdi zmdi-flag text-warning"></i>
                            <strong>Alpino v1.0.0 is available</strong>
                            <p><a href="javascript:void(0)">Update now</a></p>
                            <small class="text-muted">5 hours ago</small>
                        </li>
                    </ul>  
                </div>
            </div>
        </div>
    </div>
    <div class="task-menu">
        <div class="slim_scroll">
            <div class="card tasks">
                <div class="header">
                    <h2><strong>Project</strong> Status</h2>
                </div>
                <div class="body m-b-10">
                    <a href="javascript:void(0);">
                        <span class="text-muted">SISTEMA DE CONTROL DE DOCUMENTOS <span class="float-right">100%</span></span>
                        <div class="progress">
                            <div class="progress-bar l-turquoise" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                        </div>
                        <ul class="list-unstyled team-info">
                            <li class="m-r-15"><small class="text-muted">Team</small></li>
                            <li><img src="../public/images/xs/avatar2.jpg" alt="Avatar"></li>
                            <li><img src="../public/images/xs/avatar3.jpg" alt="Avatar"></li>
                            <li><img src="../public/images/xs/avatar4.jpg" alt="Avatar"></li>
                            <li><img src="../public/images/xs/avatar5.jpg" alt="Avatar"></li>
                        </ul>
                    </a>
                </div>  
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div id="rightsidebar" class="right-sidebar">
        <ul class="nav nav-tabs">
            <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#setting">Setting</a></li>        
            <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#activity">Activity</a></li>
        </ul>
        <div class="tab-content slim_scroll">
            <div class="tab-pane slideRight active" id="setting">
                <div class="card">
                    <div class="header">
                        <h2><strong>Colors</strong> Skins</h2>
                    </div>
                    <div class="body">
                        <ul class="choose-skin list-unstyled m-b-0">
                            <li data-theme="black" class="active">
                                <div class="black"></div>
                            </li>
                            <li data-theme="purple">
                                <div class="purple"></div>
                            </li>                   
                            <li data-theme="blue">
                                <div class="blue"></div>
                            </li>
                            <li data-theme="cyan">
                                <div class="cyan"></div>                    
                            </li>
                            <li data-theme="green">
                                <div class="green"></div>
                            </li>
                            <li data-theme="orange">
                                <div class="orange"></div>
                            </li>
                            <li data-theme="blush">
                                <div class="blush"></div>                    
                            </li>
                        </ul>
                    </div>
                </div>                
                <div class="card">
                    <div class="header">
                        <h2><strong>General</strong> Settings</h2>
                    </div>
                    <div class="body">
                        <ul class="setting-list list-unstyled m-b-0">
                            <li>
                                <div class="checkbox">
                                    <input id="checkbox1" type="checkbox">
                                    <label for="checkbox1">Report Panel Usage</label>
                                </div>
                            </li>
                            <li>
                                <div class="checkbox">
                                    <input id="checkbox2" type="checkbox" checked="">
                                    <label for="checkbox2">Email Redirect</label>
                                </div>
                            </li>
                            <li>
                                <div class="checkbox">
                                    <input id="checkbox3" type="checkbox">
                                    <label for="checkbox3">Notifications</label>
                                </div>                        
                            </li>
                            <li>
                                <div class="checkbox">
                                    <input id="checkbox4" type="checkbox">
                                    <label for="checkbox4">Auto Updates</label>
                                </div>
                            </li>
                            <li>
                                <div class="checkbox">
                                    <input id="checkbox5" type="checkbox" checked="">
                                    <label for="checkbox5">Offline</label>
                                </div>
                            </li>
                            <li>
                                <div class="checkbox m-b-0">
                                    <input id="checkbox6" type="checkbox">
                                    <label for="checkbox6">Location Permission</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card">
                    <div class="header">
                        <h2><strong>Left</strong> Menu</h2>
                    </div>
                    <div class="body theme-light-dark">
                        <button class="t-dark btn btn-primary btn-round btn-block">Dark</button>
                    </div>
                </div>               
            </div>
            <div class="tab-pane slideLeft" id="activity">
                <div class="card activities">
                    <div class="header">
                        <h2><strong>Recent</strong> Activity Feed</h2>
                    </div>
                    <div class="body">
                        <div class="streamline b-accent">
                            <div class="sl-item">
                                <div class="sl-content">
                                    <div class="text-muted">Just now</div>
                                    <p>Finished task <a href="" class="text-info">#features 4</a>.</p>
                                </div>
                            </div>
                            <div class="sl-item b-info">
                                <div class="sl-content">
                                    <div class="text-muted">10:30</div>
                                    <p><a href="">@Jessi</a> retwit your post</p>
                                </div>
                            </div>
                            <div class="sl-item b-primary">
                                <div class="sl-content">
                                    <div class="text-muted">12:30</div>
                                    <p>Call to customer <a href="" class="text-info">Jacob</a> and discuss the detail.</p>
                                </div>
                            </div>
                            <div class="sl-item b-warning">
                                <div class="sl-content">
                                    <div class="text-muted">1 days ago</div>
                                    <p><a href="" class="text-info">Jessi</a> commented your post.</p>
                                </div>
                            </div>
                            <div class="sl-item b-primary">
                                <div class="sl-content">
                                    <div class="text-muted">2 days ago</div>
                                    <p>Call to customer <a href="" class="text-info">Jacob</a> and discuss the detail.</p>
                                </div>
                            </div>
                            <div class="sl-item b-primary">
                                <div class="sl-content">
                                    <div class="text-muted">3 days ago</div>
                                    <p>Call to customer <a href="" class="text-info">Jacob</a> and discuss the detail.</p>
                                </div>
                            </div>
                            <div class="sl-item b-warning">
                                <div class="sl-content">
                                    <div class="text-muted">4 Week ago</div>
                                    <p><a href="" class="text-info">Jessi</a> commented your post.</p>
                                </div>
                            </div>
                            <div class="sl-item b-warning">
                                <div class="sl-content">
                                    <div class="text-muted">5 days ago</div>
                                    <p><a href="" class="text-info">Jessi</a> commented your post.</p>
                                </div>
                            </div>
                            <div class="sl-item b-primary">
                                <div class="sl-content">
                                    <div class="text-muted">5 Week ago</div>
                                    <p>Call to customer <a href="" class="text-info">Jacob</a> and discuss the detail.</p>
                                </div>
                            </div>
                            <div class="sl-item b-primary">
                                <div class="sl-content">
                                    <div class="text-muted">3 Week ago</div>
                                    <p>Call to customer <a href="" class="text-info">Jacob</a> and discuss the detail.</p>
                                </div>
                            </div>
                            <div class="sl-item b-warning">
                                <div class="sl-content">
                                    <div class="text-muted">1 Month ago</div>
                                    <p><a href="" class="text-info">Jessi</a> commented your post.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div id="leftsidebar" class="sidebar">
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info m-b-20">
                    <div class="image">
                        <a href="nose.php"><img src="../public/images/logo.png" alt="User"></a>
                    </div>
                    <div class="detail">
                        <h6>UNIVERSIDAD CATÓLICA BOLIVIANA</h6>                           
                    </div>
                </div>
            </li>

            
            <li class="active open">
                <a href="nose.php"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a>
            </li>

            <?php
            if ($_SESSION['añadir'] == 1) {
                echo '<li class="header">ADMIN</li>
                        <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                <i class="zmdi zmdi-apps"></i><span>Autentificacion</span>
                                <span class="badge badge-success float-right">6</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="user_estudiante.php">Estudiante</a></li>
                                <li><a href="user_personal.php">Personal</a></li>
                                <li class="active"><a href="departamento.php">Departamento</a></li>
                                <li><a href="carrera.php">Carrera</a></li>
                                <li><a href="rol.php">Rol</a></li>
                                <li><a href="permiso.php">Permiso</a></li>
                            </ul>
                        </li>';
            }
            ?>     
             <?php
            if ($_SESSION['registros'] == 1) {
                echo '<li>
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="zmdi zmdi-apps"></i><span>Registros</span>
                    <span class="badge badge-success float-right">3</span>
                </a>
                <ul class="ml-menu">
                    <li><a href="registro_userest.php">Estudiante</a></li>
                    
                    <li><a href="registro_hojaruta.php">Hoja de Ruta</a></li>
                    <li><a href="registro_servicios.php">Servicios</a></li>
                    
                </ul>
            </li>';
            }
            ?>

            <?php
            if ($_SESSION['formularios'] == 1) {
                echo '<li class="header">FORMULARIOS Y TABLAS</li>
                <li class="active open">
                <a href="javascript:void(0);" class="menu-toggle">
                    <i class="zmdi zmdi-assignment"></i><span>AÑADIR</span>
                    <span class="badge badge-warning float-right">4</span>
                </a>
                <ul class="ml-menu">
                    <li><a href="derivacion.php">Derivación</a></li>
                    <li><a href="hoja_ruta.php">Hoja de ruta</a></li>
                    <li class="active"><a href="atencion.php">Atención</a></li>
                    <li class="active"><a href="servicios.php">Servicio</a></li>
                </ul>
            </li>';
            }
            ?>
            
            
           
        </ul>
    </div>
</div>

</aside>