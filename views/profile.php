<?php
  require_once "header.php";
  $id = openssl_decrypt(isset( $_GET['id'] ) ? $_GET['id'] : '',COD,KEY );
  require_once "../controller/profile_update.php";
  $cliente = get_client_by_id( $id );
?>
  <link href="CSS/profile.css" rel="stylesheet">
  <script src="JS/profile.js"></script>
      <!-- Update Pass-->  
          <div class="modal" tabindex="-1" role="dialog" id="upPass" style="top: 5%; z-index: 9999">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Cambiar contraseña</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="UpdatePass">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Contraseña actual</label>
                                    <input type="password" name="contrasena_O" class="form-control" id="inputPassword4" placeholder="Contraseña" value="">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Contraseña nueva</label>
                                    <input type="password" name="contrasena_N" class="form-control" id="inputPassword5" placeholder="Contraseña" value="">
                                </div>
                            </div>
                            <input style="margin: 0 5px;" type="submit" name="updatepass" class="btn btn-secondary" value="Cambiar">
                            <input style="margin: 10px 5px;" type="reset" class="btn btn-secondary" data-dismiss="modal" value="Cerrar" id="reset">
                        </form>
                    </div>
                    <div class="modal-footer"></div>
                </div>
            </div>
          </div>
    <!-- Hero Area Start-->
    <div class="slider-area ">
            <div class="single-slider slider-banner d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center">
                                <h2>Mi perfil</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <!-- Hero Area End-->
    <!--================PersonalInfo_part Area =================-->
    <section class="login_part section_padding">
      <div class="container">
          <div class="row align-items-center">
                <div class="popular-items" data-slug="panel1">
                  <form method="post" id="personalInfo" enctype="multipart/form-data">
                    
                    <div class="single-popular-items mb-50 justify-content-center">
                      <div class='popular-img'>
                        <div class='img-cap' id="upload">
                          <input type="hidden" name="photo" value="<?php echo $cliente['photo']; ?>" placeholder="" />
                          <input type="file" name="img" id="fileInput" class="inputfile" />
                          <label for="fileInput">Sube una foto</label>
                        </div>
                        <img class="avatar" src='uploads/<?php echo $cliente['photo'];?>' alt=''>
                      </div>
                    </div>
                  
                    <h2 class="text-center"><?php echo $cliente['nombre']?></h2>
                    <h4>Información personal <span id="editD" style="color: #333"><i class="fas fa-edit"></i></span></h4>
                    
                    <div class="col-md-12 form-group p_star">
                      <div class="large-12 columns">
                        <label>Nombre</label>
                      </div>
                      <div class="large-12 columns">
                        <input id="name" type="text" name="nombre" value="<?php echo $cliente['nombre'];?>" disabled />
                      </div>
                    </div>

                    <div class="col-md-12 form-group p_star">
                      <div class="large-12 columns">
                        <label>Dirección</label>
                      </div>
                      <div class="large-12 columns">
                        <textarea id="address" name="direccion" rows="2" type="text" value="" disabled><?php echo $cliente['direccion'];?></textarea>
                      </div>
                    </div>

                    <div class="col-md-12 form-group p_star">
                      <div class="large-4 columns">
                        <label>
                          <button id="save" type="submit" name="save" class="btn_3">GUARDAR</button>
                        </label>
                        <label>
                          <button type="submit" name="logout" class="btn_3">SALIR</button>
                        </label>
                        <label>
                          <button type="button" name="logout" class="btn_3" data-toggle="modal" data-target="#upPass">
                            CAMBIAR CONTRASEÑA
                          </button>
                        </label>
                      </div>
                    </div>

                  </form>
                </div>
          </div>
    </section>
  <?php require_once('footer.php'); ?>