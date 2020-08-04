<?php 
    require_once "header.php";
    $result = run_query("productos");
    include "../controller/carrito.php";
    //echo $mensaje;
?>
<!--? slider Area Start -->
<link rel="stylesheet" href="CSS/home.css">
<div class="slider-area ">
    <div class="slider-active">
        <!-- Single Slider -->
        <div class="single-slider slider-height d-flex align-items-center slide-img">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                        <div class="hero__caption">
                            <h1 data-animation="fadeInLeft" data-delay=".4s" data-duration="2000ms">El poder puede estar en tus manos</h1>
                            <p data-animation="fadeInLeft" data-delay=".7s" data-duration="2000ms">Obtén la potencia que necesitas para tu trabajo o tu diversión.</p>
                            <!-- Hero-btn -->
                            <div class="hero__btn" data-animation="fadeInLeft" data-delay=".8s" data-duration="2000ms">
                                <a href="shop.php" class="btn hero-btn">Tienda</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-5 col-md-6 col-sm-6 d-none d-sm-block">
                        <div class="hero__img" data-animation="bounceIn" data-delay=".4s">
                            <img src="IMG/landing-headline (1).png" alt="" class=" heartbeat">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Single Slider -->
        <div class="single-slider slider-height d-flex align-items-center slide-img">
            <div class="container">
                <div class="row justify-content-between align-items-center">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                        <div class="hero__caption">
                            <h1 data-animation="fadeInLeft" data-delay=".4s" data-duration="2000ms">Haz tu vida más fácil y sofisticada</h1>
                            <p data-animation="fadeInLeft" data-delay=".7s" data-duration="2000ms">Encuentra los mejores y más útiles gadgets del mercado.</p>
                            <!-- Hero-btn -->
                            <div class="hero__btn" data-animation="fadeInLeft" data-delay=".8s" data-duration="2000ms">
                                <a href="shop.php" class="btn hero-btn">Tienda</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-5 col-md-6 col-sm-6 d-none d-sm-block">
                        <div class="hero__img" data-animation="bounceIn" data-delay=".4s">
                            <img src="IMG/Micrófono---Trust-GXT-258-Fyru-USB-4-in-1-Streaming--USB--4-patrones-de-grabación--Negro.png" alt="" class=" heartbeat">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- slider Area End-->
<!--? Gallery Area Start -->
<div class="gallery-area">
    <div class="container-fluid p-0 fix">
        <div class="row">
            <div class="col-xl-6 col-lg-4 col-md-6 col-sm-6">
                <div class="single-gallery mb-30">
                    <div class="gallery-img big-img" style="background-image: url(IMG/11-553-027-Z01.jpg); background-position: center;"></div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
                <div class="single-gallery mb-30">
                    <div class="gallery-img big-img" style="background-image: url(IMG/gadgets.jpg);"></div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-12">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-6 col-sm-6">
                        <div class="single-gallery mb-30">
                            <div class="gallery-img small-img" style="background-image: url(IMG/6296111_rd.jpg);"></div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12  col-md-6 col-sm-6">
                        <div class="single-gallery mb-30">
                            <div class="gallery-img small-img" style="background-image: url(IMG/maxresdefault.jpg);  background-position: center;"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Gallery Area End -->
<!--? Popular Items Start -->
<div class="popular-items section-padding30">
    <div class="container">
        <!-- Section tittle -->
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-10">
                <div class="section-tittle mb-70 text-center">
                    <h2>Populares</h2>
                    <p>Encuentra aquí los productos que están marcando tendencias.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="row">
                <?php
                    while ($product = $result->fetch_assoc()){
                ?>
                        <div class='col-xl-4 col-lg-4 col-md-6 col-sm-6'>
                            <div class='single-popular-items mb-50 text-center'>
                            <form action="" method="post">
                                <div class='popular-img'>
                                    <img src='uploads/<?php echo $product['photo'];?>' alt=''>
                                    <div class='img-cap'>
                                        <button name="btn_action" value="agregar" class="cart-button" style="width: 100%; padding: 20px 0; background-color: #f81f1f !important; border: none !important;" type="submit">
                                            Añadir al carrito
                                        </button>
                                    </div>
                                </div>
                                <div class='popular-caption'>
                                    <h3><?php echo $product['nombre']; ?></h3>
                                    <span><?php echo $product['precio']; ?> PEN</span>
                                </div>
                                <input type="hidden" name="id" value="<?php echo openssl_encrypt($product['id_producto'],COD,KEY);?>">
                                <input type="hidden" name="name" value="<?php echo openssl_encrypt($product['nombre'],COD,KEY);?>">
                                <input type="hidden" name="precio" value="<?php echo openssl_encrypt($product['precio'],COD,KEY);?>">
                                <input type="hidden" name="cantidad" value="<?php echo openssl_encrypt(1,COD,KEY);?>">
                            </form>
                            </div>
                        </div>
                <?php
                    }
                ?>
            </div>
        </div>
        <!-- Button -->
        <div class="row justify-content-center">
            <div class="room-btn pt-70">
                <a href="shop.php" class="btn view-btn1">Ver todos</a>
            </div>
        </div>
    </div>
</div>
<!-- Popular Items End -->
<?php require_once "footer.php";?>
