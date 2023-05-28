<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="<?= base_url('assets/frontend'); ?>/images/favicon.png" type="">

    <title><?= $settings['companyName'] ?></title>

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend'); ?>/css/bootstrap.css" />

    <!--owl slider stylesheet -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <!-- nice select  -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css"
        integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ=="
        crossorigin="anonymous" />
    <!-- font awesome style -->
    <link href="<?= base_url('assets/frontend'); ?>/css/font-awesome.min.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="<?= base_url('assets/frontend'); ?>/css/style.css" rel="stylesheet" />
    <link href="<?= base_url('assets/frontend'); ?>/css/style.sccs" rel="stylesheet" />
    <!-- responsive style -->
    <link href="<?= base_url('assets/frontend'); ?>/css/responsive.css" rel="stylesheet" />

</head>

<body class="sub_page">

<div class="hero_area">
    <div class="bg-box">
      <img src="<?= base_url('assets/frontend'); ?>/images/hero-bg.jpg" alt="">
    </div>
    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="">
            <span>
            <?= $settings['companyName'] ?>
            </span>
          </a>

         <!-- üst taraf kategori ekleme <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class=""> </span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
           <ul class="navbar-nav  mx-auto " style="color: white">
                
                <li class="active" data-filter="*">All</li>
                <?php foreach ($category as $item) { ?>
                <li data-filter=".<?php echo $item['id']; ?>"><?php echo $item['name']; ?></li>
                <?php } ?>

            </ul>
            </ul>
            --> 

          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->
  </div>



    <!-- food section -->
    <section class="food_section layout_padding" style="padding:40px">
        <div class="container">
            <div class="heading_container heading_center">
                <div class="logo">
             
                <a href="<?= $settings['facebookUrl'] ?>"><img style="max-width:7%;height: auto;"
                            src="<?= base_url('img/settings/iconsFacebook.png'); ?>" alt="resim" srcset=""></a>
                    <a href="<?= $settings['twitterUrl'] ?>"><img style="max-width:7%;height: auto;"
                            src="<?= base_url('img/settings/iconsTwitter.png'); ?>" alt="resim" srcset=""></a>
                    <a href="<?= $settings['instagramUrl'] ?>"><img style="max-width:7%;height: auto;"
                            src="<?= base_url('img/settings/iconsInstagram.png'); ?>" alt="resim" srcset=""></a>
                    <br>
                    
                    <img style="max-width:50%;height: auto;" src="
                    <?php if (isset($settings['logo_url'])) {
                      echo base_url('img/settings/'.$settings['logo_url']);
                      
                    }  ?>" alt="logo_resim" srcset="">
                </div>
                <br>
                <?php if ($_GET) : ?>
                <?php $table_no = $_GET["id"]; ?>               
                <a href="<?= base_url('call/' . $table_no) ?>"><button type="submit"
                        style="background-color:#FF5733; color:white;" type="button" class="btn btn"><b>GARSON
                            ÇAĞIR</b></button></a>
                
                <?php endif; ?>
                              
                <?php if (session()->get('info')) : ?>
                    <br> 
                <div class="alert alert-info" style="text-align:center;" role="alert">
                    <?php echo session()->getFlashdata('info'); ?>
                </div>
                <?php endif; ?>

                <?php if (session()->get('danger')) : ?>
                <div class="alert alert-danger" style="text-align:center;" role="alert">
                    <?php echo session()->getFlashdata('danger'); ?>
                </div>
                <?php endif; ?>

            </div>

            <ul class="filters_menu">
                <li class="active" data-filter="*">Tüm ürünler</li>
                <?php foreach ($category as $item) { ?>
                <li data-filter=".<?php echo $item['id']; ?>"><?php echo $item['name']; ?></li>
                <?php } ?>

            </ul>

            <div class="filters-content">
                <div class="row grid">
                    <?php foreach ($products as $item) { ?>
                    <div class="col-sm-6 col-lg-4 all <?php echo $item['categories_id']; ?>">
                        <div class="box">
                            <div>
                                <div class="img-box">
                                    <img src="<?= base_url('img/product/' . $item['img']); ?>" alt="">
                                </div>
                                <div class="detail-box">
                                    <h5 style="color:orange">
                                        <?php echo $item['name']; ?>
                                    </h5>
                                    <p>
                                        <?php echo $item['info']; ?>
                                    </p>
                                    <div class="options">
                                        <h5 style="color:orange; text-align:center;">
                                            <?php echo "₺" . $item['price']; ?>
                                        </h5>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <?php } ?>
                </div>
            </div>
    </section>

    <!-- end food section -->

    <!-- footer section -->
    <footer class="footer_section">
        <div class="container">
            <div class="row">
                <div class="col-md-4 footer-col">
                    <div class="footer_contact">
                        <h4>
                            İletişim Bilgileri
                        </h4>
                        <div class="contact_link_box">
                            <a href="">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <span>
                                <?= $settings['location'] ?>
                                </span>
                            </a>
                            <a href="">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <span>
                                    <?php echo $settings['phone'] ?>
                                </span>
                            </a>
                            <a href="">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <span>
                                <?php echo $settings['mail'] ?>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 footer-col">
                    <div class="footer_detail">
                        <a href="" class="footer-logo">
                            Hakkımızda
                        </a>
                        <p>
                        <?= $settings['hakkimizda'] ?>
                        </p>

                    </div>
                </div>
                <div class="col-md-4 footer-col">
                    <h4>
                        Çalışma Saatleri
                    </h4>
                    <p>
                        Hafta İçi
                    </p>
                    <p>
                    <?= $settings['haftaIci'] ?>
                    </p>
                    <p>
                        Hafta Sonu
                    </p>
                    <p>
                    <?= $settings['haftaSonu'] ?>
                    </p>
                </div>
            </div>
            <div class="footer-info">
                <p>
                    <a href="https://html.design/">
                        &copy; <span id="displayYear"></span> Distributed By DoganBilisim</a>
                </p>
            </div>
        </div>
    </footer>
    <!-- footer section -->

    <!-- jQery -->
    <script src="<?= base_url('assets/frontend'); ?>/js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <!-- bootstrap js -->
    <script src="<?= base_url('assets/frontend'); ?>/js/bootstrap.js"></script>
    <!-- owl slider -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
    </script>
    <!-- isotope js -->
    <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
    <!-- nice select -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
    <!-- custom js -->
    <script src="<?= base_url('assets/frontend'); ?>/js/custom.js"></script>
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
    </script>
    <!-- End Google Map -->

</body>

</html>