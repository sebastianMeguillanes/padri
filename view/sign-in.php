<!doctype html>
<html class="no-js " lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

<title>SISTEMA DE CONTROL DE DOCUMENTOS</title>
<!-- Favicon-->
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="../public/plugins/bootstrap/css/bootstrap.min.css">
<!-- Sweet Alert-->
<link href="../public/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
        
<!-- Custom Css -->
<link rel="stylesheet" href="../public/css/main.css">    
<link rel="stylesheet" href="../public/css/color_skins.css">
</head>
<body class="theme-black">
<div class="authentication">
    <div class="container">
        <div class="col-md-12 content-center">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="company_detail">
                        <h4 class="logo"><img src="../public/images/logo.png" alt=""> UCB</h4>
                        <h3>SISTEMA <strong>DE CONTROL</strong> DE DOCUMENTOS</h3>
                        <div class="footer">                            
                            <hr>
                        </div>
                    </div>                    
                </div>
                <div class="col-lg-5 col-md-12 offset-lg-1">
                    <div class="card-plain">
                        <div class="header">
                            <h5>Log in</h5>
                        </div>
                        <form class="form" id="frmAcceso">
                            <div class="input-group">
                                <input type="text" class="form-control"  id="logina" name="logina" placeholder="User Name">
                                <span class="input-group-addon"><i class="zmdi zmdi-account-circle"></i></span>
                            </div>
                            <div class="input-group">
                                <input type="password"  id="clavea" name="clavea" placeholder="Password" class="form-control" />
                                <span class="input-group-addon"><i class="zmdi zmdi-lock"></i></span>
                            </div>   
                            <br>
                            <button class="btn btn-primary btn-round btn-block" type="submit">SIGN IN</button>                         
                        </form>
                        <div class="footer">
                         
                            <a href="sign-up.html" class="btn btn-primary btn-simple btn-round btn-block">SIGN UP</a>
                        </div>
                        <a href="#" class="link">Forgot Password?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Jquery Core Js -->
<script src="../public/bundles/libscripts.bundle.js"></script>
<script src="../public/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<!-- Sweet Alerts js -->
<script src="../public/libs/sweetalert2/sweetalert2.min.js"></script>
<script type="text/javascript" src="script/login.js"></script>

</body>
</html>