<?php 
    require_once "header.php";
    $result = run_query_esp("productos","ORDER BY","id_producto","desc","LIMIT 2");
    $result2 = run_query("productos");
    $result3 = run_query_esp("productos","WHERE","precio <","800","");
    include "../controller/carrito.php";
?>
<link rel="stylesheet" href="CSS/shop.css">
<!-- Hero Area Start-->
<div class="slider-area ">
    <div class="single-slider slider-banner d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>Tienda</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero Area End-->
<!-- Latest Products Start -->
<section class="popular-items shop-gallery">
    <div class="container">
        <div class="row product-btn justify-content-between mb-40">
            <div class="properties__button">
                <!--Nav Button  -->
                <nav>                                                      
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Últimos productos</a>
                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Todo</a>
                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Ofertas</a>
                    </div>
                </nav>
                <!--End Nav Button  -->
            </div>
            <!-- Grid and List view -->
            <div class="grid-list-view">
            </div>
        </div>
        <!-- Nav Card -->
        <div class="tab-content" id="nav-tabContent">
            <!-- card one -->
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
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
                                    <p><?php echo $product['descripcion']; ?></p>
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
            <!-- Card two -->
            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="row">
                    <?php
                        while ($product = $result2->fetch_assoc()){
                    ?>
                            <div class='col-xl-4 col-lg-4 col-md-6 col-sm-6'>
                            <div class='single-popular-items mb-50 text-center'>
                            <form action="" method="post">
                                <div class='popular-img'>
                                    <img src='uploads/<?php echo $product['photo'];?>' alt=''>
                                    <div class='img-cap'>
                                        <button name="agregar" value="agregar" class="cart-button" style="width: 100%; padding: 20px 0; background-color: #f81f1f !important; border: none !important;" type="submit">
                                            Añadir al carrito
                                        </button>
                                    </div>
                                </div>
                                <div class='popular-caption'>
                                    <h3><?php echo $product['nombre']; ?></h3>
                                    <span><?php echo $product['precio']; ?> PEN</span>
                                    <p><?php echo $product['descripcion']; ?></p>
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
            <!-- Card three -->
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                <div class="row">
                    <?php
                        while ($product = $result3->fetch_assoc()){
                    ?>
                            <div class='col-xl-4 col-lg-4 col-md-6 col-sm-6'>
                            <div class='single-popular-items mb-50 text-center'>
                            <form action="" method="post">
                                <div class='popular-img'>
                                    <img src='uploads/<?php echo $product['photo'];?>' alt=''>
                                    <div class='img-cap'>
                                        <button name="agregar" value="agregar" class="cart-button" style="width: 100%; padding: 20px 0; background-color: #f81f1f !important; border: none !important;" type="submit">
                                            Añadir al carrito
                                        </button>
                                    </div>
                                </div>
                                <div class='popular-caption'>
                                    <h3><?php echo $product['nombre']; ?></h3>
                                    <span><?php echo $product['precio']; ?> PEN</span>
                                    <p><?php echo $product['descripcion']; ?></p>
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
        </div>
        <!-- End Nav Card -->
    </div>           
</section>
<!-- Latest Products End -->
<?php require_once "footer.php";?>