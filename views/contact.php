
<?php 
    require_once "header.php";
    require_once "../controller/contact_process.php";

    $user_email="";
    
    if(!empty($_SESSION['USER'][0])){
        $current_user=$_SESSION['USER'][0];
        $user_email=$current_user['correo'];
    }
?>
<script src="JS/form.js" type="text/javascript"></script>
<link href="CSS/contact.css" rel="stylesheet">
<!--? Hero Area Start-->
<div class="slider-area ">
    <div class="single-slider slider-banner d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>Contáctanos</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--? Hero Area End-->
<section class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="contact-title">Hablemos</h2>
            </div>
            <div class="col-lg-8 mb-5">
                <form class="form-contact contact_form" id="contactForm" novalidate="novalidate" method="post">
                    <h1 id="message">Envíanos tus dudas</h1><small id="smallMessage"> </small>
                    <div class="field">
                        <textarea class="form-control w-100" name="text" id="text" 
                        cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" 
                        placeholder=" Enter Message" autocomplete="off"></textarea>
                    </div>
                    <div class="field">
                        <input class="form-control valid" name="name" id="name" 
                        type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" 
                        placeholder="Enter your name" autocomplete="off">
                    </div>
                    <div class="field">
                        <input class="form-control valid" name="email" id="email" 
                        type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" 
                        placeholder="Email" value=<?php echo $user_email; ?>>
                    </div>
                    <div class="field">
                        <input class="form-control" name="subject" id="subject" 
                        type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'" 
                        placeholder="Enter Subject" autocomplete="off">
                    </div>
                    <button type="submit" id="submit" value="Send an Email" name="contact">ENVIAR</button>
                </form>
            </div>
            <div class="col-lg-3 offset-lg-1">
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="fas fa-home"></i></span>
                    <div class="media-body">
                        <h3>Arequipa, Perú.</h3>
                        <p>Tacna y Arica 160</p>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="fas fa-mobile-alt"></i></span>
                    <div class="media-body">
                        <h3>+51 992 502 574</h3>
                        <p>Lun a Vie  de 9am a 6pm</p>
                    </div>
                </div>
                <div class="media contact-info">
                    <span class="contact-info__icon"><i class="far fa-paper-plane"></i></span>
                    <div class="media-body">
                        <h3>consultas@pearl.com</h3>
                        <p>Envíanos tu consulta!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require_once "footer.php";?>