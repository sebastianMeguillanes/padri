
<?php
    ob_start();
    

    require 'header.php';
?>
<!-- Main Content -->
<div class="container">
</div>
<section class="content">
    <div class="card">
        <div class="body">
            <div id="demo2" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ul class="carousel-indicators">
                    <li data-target="#demo2" data-slide-to="0" class="active"></li>
                    <li data-target="#demo2" data-slide-to="1" class=""></li>
                    <li data-target="#demo2" data-slide-to="2" class=""></li>
                </ul>
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="../public/images/anuncio2.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="carousel-item">
                        <img src="../public/images/anuncio3.png" class="img-fluid" alt="">
                    </div>
                    <div class="carousel-item">
                        <img src="../public/images/anuncio4.jfif" class="img-fluid" alt="">
                    </div>
                </div>
                <!-- Controls -->
                <!-- Left and right controls -->
                <a class="carousel-control-prev" href="#demo2" data-slide="prev"><span class="carousel-control-prev-icon"></span></a>
                <a class="carousel-control-next" href="#demo2" data-slide="next"><span class="carousel-control-next-icon"></span></a>
            </div>
        </div>
    </div>
</section>

<?php
    ob_end_flush();

    require 'footer.php';
?>  
