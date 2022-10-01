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

  <title> Feane </title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend'); ?>/css/bootstrap.css" />

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <!-- nice select  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
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
      <img src="<?= base_url('assets/frontend/images/hero-bg.jpg'); ?>" alt="">
    </div>
    <!-- header section strats -->



    
    <!-- end header section -->
  </div>

  <!-- food section -->

  <section class="food_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <div class="logo" >      
        <img style="max-width:100%;height: auto;" src="<?= base_url('assets/frontend/images/logo1.png'); ?>" alt="logo_resim" srcset="">
        </div>
        <h2>
         Lezzet Lokantası
        </h2>
        <br>
     <?php $table_no=$_GET["id"]; ?>
       <a href="<?= base_url('call/'.$table_no) ?>"><button type="submit" style="background-color:#FF5733; color:white;" type="button" class="btn btn"><b>GARSON ÇAĞIR</b></button></a> 
       <br>
       <?php if(session()->get('info')) : ?>             
              <div class="alert alert-info" style="text-align:center;" role="alert">
                 <?php echo session()->getFlashdata('info'); ?>
              </div>
              <?php endif; ?>
              
               <?php if(session()->get('danger')) : ?>             
              <div class="alert alert-danger" style="text-align:center;" role="alert">
                 <?php echo session()->getFlashdata('danger'); ?>
              </div>
              <?php endif; ?>
      
      </div>

      <ul class="filters_menu">
        <li class="active" data-filter="*">All</li>
        <?php foreach($category as $item) { ?>               
          <li data-filter=".<?php echo $item['id']; ?>"><?php echo $item['name']; ?></li>               
            <?php } ?>
        
      </ul>

      <div class="filters-content">
        <div class="row grid">
        <?php foreach($products as $item) { ?>    
          <div class="col-sm-6 col-lg-4 all <?php echo $item['categories_id']; ?>">
            <div class="box">
              <div>
                <div class="img-box">
                  <img src="<?= base_url('img/product/'.$item['img']); ?>" alt="">
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
                    <?php echo "₺".$item['price']; ?>
                    </h5>
              
                  </div>
                </div>
              </div>
            </div>
            
          </div>
          <?php } ?>
        </div>
 


          


      <div class="btn-box">
        <a href="">
          View More
        </a>
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
              Contact Us
            </h4>
            <div class="contact_link_box">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>
                  Location
                </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  Call +01 1234567890
                </span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                  demo@gmail.com
                </span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4 footer-col">
          <div class="footer_detail">
            <a href="" class="footer-logo">
              Feane
            </a>
            <p>
              Necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with
            </p>
            <div class="footer_social">
              <a href="">
                <i class="fa fa-facebook" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-twitter" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-linkedin" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-instagram" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-pinterest" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4 footer-col">
          <h4>
            Opening Hours
          </h4>
          <p>
            Everyday
          </p>
          <p>
            10.00 Am -10.00 Pm
          </p>
        </div>
      </div>
      <div class="footer-info">
        <p>
          &copy; <span id="displayYear"></span> All Rights Reserved By
          <a href="https://html.design/">Free Html Templates</a><br><br>
          &copy; <span id="displayYear"></span> Distributed By
          <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
        </p>
      </div>
    </div>
  </footer>
  <!-- footer section -->

  <!-- jQery -->
  <script src="<?= base_url('assets/frontend'); ?>/js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
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