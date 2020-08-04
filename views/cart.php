<?php 
  require_once "header.php";
  include "../controller/carrito.php";
  if(isset($_POST['comprar'])){
    comprar();
  }
  if(empty($_SESSION['USER'][0])){
    echo "<script>Swal.fire('Antes de comprar, debe iniciar sesión');</script>";
    echo "<script>window.location.replace('login.php');</script>";
  }
  $current_user=$_SESSION['USER'][0];
?>
<link href="CSS/cart.css" rel="stylesheet">
      <!-- Hero Area Start-->
      <div class="slider-area ">
          <div class="single-slider slider-banner d-flex align-items-center">
              <div class="container">
                  <div class="row">
                      <div class="col-xl-12">
                          <div class="hero-cap text-center">
                              <h2>Carrito</h2>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!--================Current Session =================-->
      <div class="alert alert-info text-center ">Carrito de <?php echo $current_user['nombre']?>
        <span class="badge badge-primary"><i class="fas fa-user" style="margin: 0 10px;"></i></span>
      </div>

      <!--================Cart Area =================-->
      <section class="cart_area section_padding">
        <div class="container">
            <div class="cart_inner">
              <div class="table-responsive">

                <?php if(!empty($_SESSION['CARRITO'])) {?>

                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Producto</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Total</th>
                        <th scope="col">Acción</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php $total=0; ?>
                      <?php foreach($_SESSION['CARRITO'] as $indice=>$producto){?>
                        
                        <tr>
                          <!-- Nombre -->
                          <td>
                            <div class="media-body">
                              <p><?php echo $producto['NOMBRE'];?></p>
                              <input name="id" type="hidden" value="<?php echo $producto['ID'];?>">
                            </div>
                          </td>

                          <!-- Precio -->
                          <td>
                            <h5><?php echo $producto['PRECIO'];?></h5>
                            <input name="precio" type="hidden" value="<?php echo $producto['PRECIO'];?>">
                          </td>

                          <!-- Cantidad -->
                          <td>
                            <div class="product_count">
                              <h5><?php echo $producto['CANTIDAD'];?></h5>
                              <input name="cant" class="input-number" type="hidden" value="<?php echo $producto['CANTIDAD'];?>">
                            </div>
                          </td>

                          <!-- Total -->
                          <td>
                            <h5 id="total"><?php echo ($producto['PRECIO']*$producto['CANTIDAD']);?></h5>
                            <input name="total_n" class="input-number" type="hidden" value="">
                          </td>

                          <!-- Acción -->
                          <td>
                            <form method="post">
                              <input type="hidden" name="id" value="<?php echo openssl_encrypt($producto['ID'],COD,KEY);?>">
                              <button name="btn_action" value="eliminar" class="btn_1 btn-danger" type="submit" style="padding: 17px 20px">Eliminar</button>
                            </form>
                          </td>

                          <?php $total=$total+($producto['PRECIO']*$producto['CANTIDAD']); ?>
                        </tr>

                      <?php } ?>

                        <tr>
                          <td></td>
                          <td></td>
                          <td></td>
                          <td>
                            <h5>Total</h5>
                          </td>
                          <td>
                            <h5 id="total_f"><?php echo $total ?></h5>
                          </td>
                        </tr>

                    </tbody>
                  </table>
                  <div class="checkout_btn_inner float-right">
                    <form method="post">
                      <a class="btn_1" href="shop.php">Seguir buscando</a>
                      <button class="btn_1 checkout_btn_1" type="submit" name="comprar">Realizar compra</button>
                    </form>
                  </div>

                <?php } else { ?>

                  <div class="alert alert-success text-center">No hay productos en el carrito</div>
                  <a class="btn_1" href="shop.php">Buscar productos ahora</a>

                <?php } ?>

              </div>
            </div>
        </div>
      </section>
      <!--================End Cart Area =================-->
<?php require_once "footer.php";?>