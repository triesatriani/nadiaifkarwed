<?php
/**
 * @author      Rootpixel
 * @copyright   (C) 2018 - Rootpixel. All rights reserved.
 * @link        https://rootpixel.net
 */
// THE CORE SCRIPT START HERE
require __DIR__.'/vendor/autoload.php';
if (getenv('APP_ENV') == 'production') {
    error_reporting(0);
    @ini_set('display_errors', 0);
}else{
    error_reporting(1);
    @ini_set('display_errors', 1);
}
//load the environment variablea
$dotenv = new Dotenv\Dotenv(__DIR__);
$dotenv->load();

//Initialize csrf_token
session_start();
if (empty($_SESSION['token'])) {
    $_SESSION['token'] = bin2hex(random_bytes(32));
}
$csrf_token = $_SESSION['token'];

//generate captcha
$digit1 = mt_rand(1,20);
$digit2 = mt_rand(1,20);
$operator = mt_rand(0,2);
switch ($operator) {
    case 0:
    $math = "$digit1 - $digit2";
    $_SESSION['answer'] = $digit1 - $digit2;
    break;
    case 1:
    $math = "$digit1 x $digit2";
    $_SESSION['answer'] = $digit1 * $digit2;
    break;
    default:
    $math = "$digit1 + $digit2";
    $_SESSION['answer'] = $digit1 + $digit2;
    break;
}
?>
<!DOCTYPE html>
<!--
Levidio Lorem Ipsum
http://rootpixel.co.id/levidio/
Template name: Wedding 1
Order at: http://rootpixel.co.id/levidio/
Author: Rootpixel
Website: http://www.rootpixel.net/
Contact: support@rootpixel.net
Social: http://facebook.com/rootpixel
Version : v1.0
-->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ifkar & Nadia - Wedding Invitation</title>

    <!-- Load google recaptcha script v2 checkbox -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32" />
    <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16" />

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" type="text/css" href="assets/css/recaptcha.css">

    <style type="text/css">
    .label-alert{
        margin-top: 5px;
        font-size: 12px!important;
        text-transform: none!important;
        color: #f85959;
        font-weight: 400!important;
    }
    .required{
        border: 1px solid #f85959!important;
    }
</style>

</head>

<body class="boxed">
    <!-- Message Modal -->
    <?php
    if (isset($_SESSION['flash_popup'])) {
        ?>
        <div class="modal fade" id="subscribed-modal" tabindex="-1" role="dialog" aria-labelledby="subscribed-modalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-<?= $_SESSION['flash_popup']['type']?>"><?= $_SESSION['flash_popup']['message_title']?></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                    <?= $_SESSION['flash_popup']['message_content']?>
                </div>
            </div>
        </div>
    </div>  
    <?php           
}
?>
<!-- End: Message Modal -->

<div id="gallery-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gallery-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <img id="galery-preview" src="" alt="">
            <div class="close" data-dismiss="modal">x</div>
        </div>
    </div>
</div>

<!-- Navbar -->
<div class="menu">
    <div class="container">
        <div class="row mb-0">
            <div class="col-md-5 col-sm-5 col-5 text-right my-auto">
                <p class="mb-0 logo bold italic float-left">IFKAR & NADIA <br> WEDDING</p>
            </div>
            <div class="col-md-7 col-sm-7 col-7 text-right my-auto">
                <div class="share bold italic text-uppercase">
                    share
                    <span class="separator"></span>
                    <span class="share-social">
                        <a href="https://www.facebook.com/sharer.php?u=YOUR_WEBSITE_URL" target="_blank">
                            <img src="assets/img/icons/facebook.png" alt="">
                        </a>
                        <a href="https://twitter.com/share?url=YOUR_WEBSITE_URL&amp;text=SOME_TEXT&amp;hashtags=HASHTAGS" target="_blank">
                            <img src="assets/img/icons/twitter.png" alt="">
                        </a>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End: Navbar -->

<!-- Header -->
<header>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="header--content">
                    <h6 class="text-uppercase bold italic spacing--2">The wedding of</h6>
                    <img class="header--img" src="assets/img/header-img.png" alt="">
                    <h6 class="header--date text-uppercase bold italic spacing--1">28 MEI 2022</h6>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- End: Header -->

<!-- Bride & Groom -->
<section id="bride-groom">
    <div class="container">
        <img class="header--flower" src="assets/img/header-flower.png" alt="">
        <div class="divider"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-6 text-center">
                        <div class="photo groom">
                            <img src="assets/img/groom.png" alt="">
                        </div>
                        <div class="row">
                            <div class="col-lg-8 offset-lg-2">
                                <div class="title">
                                    <h3 class="mb-0 color--midnight font--2">Ifkar Immamulhaq</h3>
                    
                                </div>
                                <p class="italic mb-4">Putera Bapak Jumhana (ALM) dan Ibu Lilis Supriati.</p>
                                <a href="https://instagram.com" target="_blank">
                                    <img class="social" src="assets/img/instagram.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="center--line"></div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-6 text-center">
                        <div class="photo bride">
                            <img src="assets/img/bride.png" alt="">
                        </div>
                        <div class="row">
                            <div class="col-lg-8 offset-lg-2">
                                <div class="title">
                                    <h3 class="mb-0 color--midnight font--2">Nadia Sumaya Hardani</h3>
                                    
                                </div>
                                <p class="italic mb-4">Puteri Bapak Acep Dadang Hamdani dan Ibu Sri Haryani</p>
                                <a href="https://instagram.com" target="_blank">
                                    <img class="social" src="assets/img/instagram.png" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End: Bride & Groom -->

<!-- Date -->
<section id="date">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8 offset-lg-2 my-auto">
                <div class="video">
                    <iframe src="https://www.youtube.com/embed/RG1llY1kxYg" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="date--wrapper">
                    <div class="date--content text-center">
                        <div class="dot"></div>
                        <div class="title">
                            <h1 class="font--3 color--orange">Sabtu</h1>
                            <p class="bold italic text-uppercase color--orange wedding--date">28 MEI 2022</p>
                        </div>
                        <h5 class="italic">Tiada yang dapat kami ungkapkan selain rasa terima kasih dari hati yang tulus apabila Anda berkenan hadir untuk memberikan do’a restu kepada kami.</h5>
                    </div>
                    <div class="hr--line"></div>
                    <div class="row">
                        <div class="col-md-7 col-sm-7 col-7">
                            <div class="date--content content--sm text-center">
                                <img src="assets/img/location.svg" alt="" class="date--img">
                                <p class="bold italic">Villa Nenek (Seberang SMPN 46) <br class="xs--none">Jl. Sukaluyu Bandung, Jawa Barat</p>
                            </div>
                            <div class="vr--line"></div>
                        </div>
                        <div class="col-md-5 col-sm-5 col-5">
                            <div class="date--content content--sm text-center">
                                <img src="assets/img/time.svg" alt="" class="date--img">
                                <p class="bold italic">
                      Akad Nikah 09:00 - 10:00 <br />
                      Resepsi 11:00 - 14:00
                    </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End: Date -->

<!-- Gallery & RSVP -->
<section id="gallery-rsvp">
    <div class="container">
        <div class="divider"></div>

        <!-- Gallery -->
        <div id="gallery">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="picture">
                                <div class="thumb">
                                    <img src="assets/img/gallery/pic-1.jpg" alt="">
                                </div>
                                <div class="overlay">
                                    <div class="caption">
                                       <!-- <h4 class="text-uppercase bold italic">Mar, 29</h4>
                                        <p class="bold italic">Lorem ipsum dolor sit.</p> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="picture">
                                <div class="thumb">
                                    <img src="assets/img/gallery/pic-2.jpg" alt="">
                                </div>
                                <div class="overlay">
                                    <div class="caption">
                                       <!-- <h4 class="text-uppercase bold italic">Apr, 31</h4>
                                        <p class="bold italic">Adipiscing elit sed.</p> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="picture">
                                <div class="thumb">
                                    <img src="assets/img/gallery/pic-3.jpg" alt="">
                                </div>
                                <div class="overlay">
                                    <div class="caption">
                                    <!-- <h4 class="text-uppercase bold italic">Aug, 12</h4>
                                        <p class="bold italic">Eiusmod tempor incididunt</p> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 col-lg-6">
                            <div class="picture">
                                <div class="thumb">
                                    <img src="assets/img/gallery/pic-4.jpg" alt="">
                                </div>
                                <div class="overlay">
                                    <div class="caption">
                                       <!-- <h4 class="text-uppercase bold italic">Sep, 03</h4>
                                        <p class="bold italic">Eiusmod tempor incididunt</p> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End: Gallery -->

        <div class="divider--lg"></div>

        <!-- RSVP -->
        <div id="rsvp">
            <div class="title--lg text-center">
                <h1 class="font--3 color--midnight">Are you attending?</h1>
                <h4 class="bold italic color--midnight">RSVP HERE</h4>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="rsvp--form">
                        <form action="<?= getenv('FORM_URL') ?>" method="POST" autocomplete="off">
                            <input type="hidden" name="csrf_token" value="<?= $csrf_token ?>">
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input id="name" name="name" type="text" class="form-control <?= (isset($_SESSION['flash_name'])) ? 'required' : '' ?>" placeholder="Your name..." value="<?= (isset($_SESSION['flash_old_name'])) ? $_SESSION['flash_old_name'] : '' ?>" required maxlength="50">
                                        <?php
                                        if (isset($_SESSION['flash_name'])) {
                                            ?>
                                            <label class="label-alert"><?=$_SESSION['flash_name']?></label>
                                            <?php
                                            unset($_SESSION['flash_name']);
                                        }
                                        ?>
                                        <?php unset($_SESSION['flash_old_name']);?>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <div class="form-group">
                                        <input id="email" name="email" type="email" class="form-control <?= (isset($_SESSION['flash_email'])) ? 'required' : '' ?>" placeholder="Email address..." value="<?= (isset($_SESSION['flash_old_email'])) ? $_SESSION['flash_old_email'] : '' ?>" required>
                                        <?php
                                        if (isset($_SESSION['flash_email'])) {
                                            ?>
                                            <label class="label-alert"><?=$_SESSION['flash_email']?></label>
                                            <?php
                                            unset($_SESSION['flash_email']);
                                        }
                                        ?>
                                        <?php unset($_SESSION['flash_old_email']);?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-2 col-sm-3 col-4">
                                    <div class="form-group">
                                        <?php if (getenv('CAPTCHA') == 'manual') {
                                            ?>
                                            <label>&nbsp;</label>
                                        <?php }?>
                                        <input id="guest" name="guest" type="number" class="form-control <?= (isset($_SESSION['flash_guest'])) ? 'required' : '' ?>" placeholder="Guest" value="<?= (isset($_SESSION['flash_old_guest']) || !is_null($_SESSION['flash_old_guest'])) ? $_SESSION['flash_old_guest'] : '' ?>" min="1" required>
                                        <?php
                                        if (isset($_SESSION['flash_guest'])) {
                                            ?>
                                            <label class="label-alert"><?=$_SESSION['flash_guest']?></label>
                                            <?php
                                            unset($_SESSION['flash_guest']);
                                        }
                                        ?>
                                        <?php unset($_SESSION['flash_old_email']);?>
                                    </div>
                                </div>
                                <div class="col-md-5 col-sm-5 col-8">
                                    <div class="form-group">
                                        <?php if (getenv('CAPTCHA') == 'manual') {
                                            ?>
                                            <label>&nbsp;</label>
                                        <?php }?>
                                        <input id="phone" name="phone" type="text" class="form-control <?= (isset($_SESSION['flash_phone'])) ? 'required' : '' ?>" placeholder="Your phone..." value="<?= (isset($_SESSION['flash_old_phone'])) ? $_SESSION['flash_old_phone'] : '' ?>" required>
                                        <?php
                                        if (isset($_SESSION['flash_phone'])) {
                                            ?>
                                            <label class="label-alert"><?=$_SESSION['flash_phone']?></label>
                                            <?php
                                            unset($_SESSION['flash_phone']);
                                        }
                                        ?>
                                        <?php unset($_SESSION['flash_old_phone']);?>
                                    </div>
                                </div>
                                <div class="col-md-5 col-sm-4">
                                    <div class="form-group">
                                        <?php
                                        if (getenv('CAPTCHA') == 'recaptcha') {
                                            ?>
                                            <div class="g-recaptcha" data-theme="light" data-sitekey="<?= getenv('RECAPTCHA_SITEKEY') ?>" data-callback="recaptchaCallback"></div>
                                            <?php
                                        }else{
                                            ?>
                                            <label for="answer">What's <span class="color--tosca"><?= $math ?></span></label>
                                            <input id="answer" class="form-control <?= (isset($_SESSION['flash_answer'])) ? 'required' : '' ?>" type="text" name="answer" required placeholder="Solve the question..">
                                            <?php
                                            if (isset($_SESSION['flash_answer'])) {
                                                ?>
                                                <label class="label-alert"><?=$_SESSION['flash_answer']?></label>
                                                <?php
                                                unset($_SESSION['flash_answer']);
                                            }
                                            ?>
                                            <?php        
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <button type="submit" id="btn-submit" class="btn btn-block btn--rsvp" <?= (getenv('CAPTCHA') == 'recaptcha') ? 'disabled' : '' ?>>I am Attending</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End: RSVP -->

        <!-- Maps -->
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div id="maps">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.79471810319!2d107.72280231477274!3d-6.915129995003472!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x50148196d1b2ab61!2zNsKwNTQnNTQuNSJTIDEwN8KwNDMnMzAuMCJF!5e0!3m2!1sen!2sid!4v1652712994682!5m2!1sen!2sid
                    width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
        <!-- End: Maps -->

    </div>
</section>
<!-- End: Gallery & RSVP -->

<!-- Footer -->
<footer>
    <div class="container text-center">
        <h3 class="font--2 color--medwhite footer--bride">Ifkar & Nadia</h3>
        <p class="bold italic text-uppercase color--medwhite">28 Mei 2022</p>
    </div>
</footer>
<!-- End: Footer -->
</body>

<!-- Scripts -->
<script type="text/javascript" src="assets/js/jquery-3.1.0.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.bundle.js"></script>
<script type="text/javascript" src="assets/js/levidio.js"></script>
<script type="text/javascript">
     $('document').ready(function(){
        <?php
        if (isset($_SESSION['flash_popup'])) {
            ?>
            $('#subscribed-modal').modal('show')
            <?php
            unset($_SESSION['flash_popup']);
        }
        ?>
            });

    function recaptchaCallback() {
        $('#btn-submit').removeAttr('disabled');
    };
</script>
</html>