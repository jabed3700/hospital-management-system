<?php
include_once("db/config.php");
$sql='select name,dept_name,doctor_image,designation,contact,d.id from doctors d,department de where d.dept_id=de.id';
$doctors=mysqli_query($con,$sql);

$sql1="SELECT dept_name,count(dept_id) as total from doctors d RIGHT join department de on d.dept_id=de.id group by dept_id";
$departments=mysqli_query($con,$sql1);
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Welcome to Hub hospital</title>
        <!-- css -->

        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="chat/style2.css">
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="plugins/cubeportfolio/css/cubeportfolio.css">
        <link href="css/nivo-lightbox.css" rel="stylesheet" />
        <link href="css/nivo-lightbox-theme/default/default.css" rel="stylesheet" type="text/css" />
        <link href="css/owl.carousel.css" rel="stylesheet" media="screen" />
        <link href="css/owl.theme.css" rel="stylesheet" media="screen" />
        <link href="css/animate.css" rel="stylesheet" />
        <link href="css/style.css" rel="stylesheet">
        <link id="bodybg" href="bodybg/bg1.css" rel="stylesheet" type="text/css" />
        <link id="t-colors" href="color/default.css" rel="stylesheet">
        <style>
            .cbox-hidden {
                display: none;
            }
            
            .admin-hidden {
                display: none;
            }
        </style>
    </head>

    <body id="page-top" data-spy="scroll" data-target=".navbar-custom">
        <div id="wrapper">
            <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
                <div class="top-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6 col-md-6">
                                <p class="bold text-left">Monday - Saturday, 8am to 10pm </p>
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <p class="bold text-right">Call us now +008 1917605548</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container navigation">
                    <div class="navbar-header page-scroll">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
           </button>
                        <a class="navbar-brand" href="index.html" style='font-weight:bold;font-size:30px; margin-top:15px;'>HUB</a>
                    </div>
                    <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="#intro">Home</a></li>
                            <li><a href="#service">Service</a></li>
                            <li><a href="#doctor">Doctors</a></li>
                            <li><a href="#facilities">Facilities</a></li>
                            <li><a href="#contact">Contact</a></li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">LogIn</a>
                                <ul class="dropdown-menu">
                                    <li><a href="login/login.php?type=admin">Admin logIn</a></li>
                                    <li><a href="login/login.php?type=doctors">Doctor logIn</a></li>
                                    <li><a href="login/login.php?type=nurse">Nurse LogIn</a></li>
                                    <li><a href="login/login.php?type=pharmacist">Pharmacist LogIn</a></li>
                                </ul>
                            </li>
                            <li><a href="#loginModal1" data-toggle="modal" id='payment'>Payment</a></li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- start intro -->
            <section id="intro" class="intro">
                <div class="intro-content">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="wow fadeInDown" data-wow-offset="0" data-wow-delay="0.1s">
                                    <h2 class="h-ultra">Hub medical group</h2>
                                </div>
                                <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.1s">
                                    <h4 class="h-light">Provide best quality healthcare for you</h4>
                                </div>
                                <div class="well well-trans">
                                    <div class="wow fadeInRight" data-wow-delay="0.1s">

                                        <ul class="lead-list">
                                            <li><span class="fa fa-check fa-2x icon-success"></span> <span class="list"><strong>Affordable monthly premium packages</strong><br />Lorem ipsum dolor sit amet, in verterem persecuti vix, sit te meis</span></li>
                                            <li><span class="fa fa-check fa-2x icon-success"></span> <span class="list"><strong>Choose your favourite doctor</strong><br />Lorem ipsum dolor sit amet, in verterem persecuti vix, sit te meis</span></li>
                                            <li><span class="fa fa-check fa-2x icon-success"></span> <span class="list"><strong>Only use friendly environment</strong><br />Lorem ipsum dolor sit amet, in verterem persecuti vix, sit te meis</span></li>
                                        </ul>
                                        <p class="text-right wow bounceIn" data-wow-delay="0.4s">
                                            <a href="#" class="btn btn-skin btn-lg">Learn more <i class="fa fa-angle-right"></i></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
                                    <img src="img/dummy/doc11.png" class="img-responsive" alt="" style='margin-left:100px;margin-top:-40px;' />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end intro -->

            <!-- start boxes -->
            <section id="boxes" class="home-section paddingtop-80">

                <div class="container">
                    <div class="row">
                        <div class="col-sm-3 col-md-3">
                            <div class="wow fadeInUp" data-wow-delay="0.2s">
                                <div class="box text-center">

                                    <i class="fa fa-check fa-3x circled bg-skin"></i>
                                    <h4 class="h-bold">Make an appoinment</h4>
                                    <p>
                                        Lorem ipsum dolor sit amet, nec te mollis utroque honestatis, ut utamur molestiae vix, graecis eligendi ne.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 col-md-3">
                            <div class="wow fadeInUp" data-wow-delay="0.2s">
                                <div class="box text-center">

                                    <i class="fa fa-list-alt fa-3x circled bg-skin"></i>
                                    <h4 class="h-bold">Choose your package</h4>
                                    <p>
                                        Lorem ipsum dolor sit amet, nec te mollis utroque honestatis, ut utamur molestiae vix, graecis eligendi ne.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 col-md-3">
                            <div class="wow fadeInUp" data-wow-delay="0.2s">
                                <div class="box text-center">
                                    <i class="fa fa-user-md fa-3x circled bg-skin"></i>
                                    <h4 class="h-bold">Help by specialist</h4>
                                    <p>
                                        Lorem ipsum dolor sit amet, nec te mollis utroque honestatis, ut utamur molestiae vix, graecis eligendi ne.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 col-md-3">
                            <div class="wow fadeInUp" data-wow-delay="0.2s">
                                <div class="box text-center">

                                    <i class="fa fa-hospital-o fa-3x circled bg-skin"></i>
                                    <h4 class="h-bold">Get diagnostic report</h4>
                                    <p>
                                        Lorem ipsum dolor sit amet, nec te mollis utroque honestatis, ut utamur molestiae vix, graecis eligendi ne.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end boxes -->

            <!-- start boxes -->
            <section id="callaction" class="home-section paddingtop-40">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="callaction bg-gray">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="wow fadeInUp" data-wow-delay="0.1s">
                                            <div class="cta-text">
                                                <h3>In an emergency? Need help now?</h3>
                                                <p>Lorem ipsum dolor sit amet consectetur adipiscing elit uisque interdum ante eget faucibus. </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="wow lightSpeedIn" data-wow-delay="0.1s">
                                            <div class="cta-btn">
                                                <a href="#" class="btn btn-skin btn-lg">Book an appoinment</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end boxes -->

            <!--start service-->
            <section id="service" class="section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-4">
                            <h2 class="ser-title">Our Service</h2>
                            <hr class="botm-line">
                            <p style="font-size:20px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris cillum.</p>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="service-info">
                                <div class="icon">
                                    <i class="fa fa-stethoscope"></i>
                                </div>
                                <div class="icon-info">
                                    <h4>24 Hour Support</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                </div>
                            </div>
                            <div class="service-info">
                                <div class="icon">
                                    <i class="fa fa-ambulance"></i>
                                </div>
                                <div class="icon-info">
                                    <h4>Emergency Services</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="service-info">
                                <div class="icon">
                                    <i class="fa fa-user-md"></i>
                                </div>
                                <div class="icon-info">
                                    <h4>Medical Counseling</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                </div>
                            </div>
                            <div class="service-info">
                                <div class="icon">
                                    <i class="fa fa-medkit"></i>
                                </div>
                                <div class="icon-info">
                                    <h4>Premium Healthcare</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end service-->

            <!-- start team -->
            <section id="doctor" class="home-section bg-gray paddingbot-60">
                <div class="container marginbot-50">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="wow fadeInDown" data-wow-delay="0.1s">
                                <div class="section-heading text-center">
                                    <h2 class="h-bold">Doctors</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, quisquam!</p>
                                </div>
                            </div>
                            <div class="divider-short"></div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">

                            <div id="filters-container" class="cbp-l-filters-alignLeft">
                                <div data-filter="*" class="cbp-filter-item-active cbp-filter-item">All (
                                    <div class="cbp-filter-counter"></div>)</div>
                                <?php
                while($department=mysqli_fetch_array($departments)){
                  ?>
                                    <div data-filter=".<?=$department[" dept_name "]?>" class="cbp-filter-item">
                                        <?=$department["dept_name"]?> (
                                            <?=$department["total"]?>)</div>
                                    <?php
                }
                  ?>


                            </div>

                            <div id="grid-container" class="cbp-l-grid-team">
                                <ul>
                                    <?php
                while($doctor=mysqli_fetch_array($doctors)){
                  ?>
                                        <li class="cbp-item <?=$doctor[" dept_name "]?>">
                                            <a href="#" class="cbp-caption cbp-singlePage">
                                                <div class="cbp-caption-defaultWrap">
                                                    <img src="admin/avater/<?=$doctor[" doctor_image "]?>" alt="" width="100%">
                                                </div>
                                                <div class="cbp-caption-activeWrap">
                                                    <div class="cbp-l-caption-alignCenter">
                                                        <div class="cbp-l-caption-body">
                                                            <div class="cbp-l-caption-text">VIEW PROFILE</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="cbp-singlePage cbp-l-grid-team-name">
                                                <?=$doctor["name"]?>
                                            </a>
                                            <div class="cbp-l-grid-team-position">
                                                <?=$doctor["dept_name"]?>
                                            </div>
                                            <button class="btn btn-warning btn-block btn-outline-warning" onclick="startChat(<?=$doctor['id']?>)">
                    Live Chat
                  </button>

                                        </li>



                                        <?php
                }
              
              ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
            <!-- end team -->

            <!-- start works -->
            <section id="facilities" class="home-section paddingbot-60">
                <div class="container marginbot-50">
                    <div class="row">
                        <div class="col-lg-8 col-lg-offset-2">
                            <div class="wow fadeInDown" data-wow-delay="0.1s">
                                <div class="section-heading text-center">
                                    <h2 class="h-bold">Our facilities</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                </div>
                            </div>
                            <div class="divider-short"></div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="wow bounceInUp" data-wow-delay="0.2s">
                                <div id="owl-works" class="owl-carousel">
                                    <div class="item">
                                        <a href="img/photo/1.jpg" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/1@2x.jpg"><img src="img/photo/1.jpg" class="img-responsive" alt="img"></a>
                                    </div>
                                    <div class="item">
                                        <a href="img/photo/2.jpg" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/2@2x.jpg"><img src="img/photo/2.jpg" class="img-responsive " alt="img"></a>
                                    </div>
                                    <div class="item">
                                        <a href="img/photo/3.jpg" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/3@2x.jpg"><img src="img/photo/3.jpg" class="img-responsive " alt="img"></a>
                                    </div>
                                    <div class="item">
                                        <a href="img/photo/4.jpg" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/4@2x.jpg"><img src="img/photo/4.jpg" class="img-responsive " alt="img"></a>
                                    </div>
                                    <div class="item">
                                        <a href="img/photo/5.jpg" title="This is an image title" data-lightbox-gallery="gallery1" data-lightbox-hidpi="img/works/5@2x.jpg"><img src="img/photo/5.jpg" class="img-responsive " alt="img"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- end works -->


            <!-- Start testimonial -->
            <section id="testimonial" class="home-section paddingbot-60 parallax" data-stellar-background-ratio="0.5">

                <div class="carousel-reviews broun-block">
                    <div class="container">
                        <div class="row">
                            <div id="carousel-reviews" class="carousel slide" data-ride="carousel">

                                <div class="carousel-inner">
                                    <div class="item active">
                                        <div class="col-md-4 col-sm-6">
                                            <div class="block-text rel zmin">
                                                <a title="" href="#">Emergency Contraception</a>
                                                <div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star"></span>
                                                    <span data-value="3" class="glyphicon glyphicon-star"></span><span data-value="4" class="glyphicon glyphicon-star-empty"></span><span data-value="5" class="glyphicon glyphicon-star-empty"></span> </span>
                                                </div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque illum nam, consequatur architecto iste aliquam aperiam! Tenetur, ipsam iure...</p>
                                                <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                                            </div>
                                            <div class="person-text rel text-light">
                                                <img src="img/testimonials/t1.jpg" alt="" class="person img-circle" />
                                                <a title="" href="#">Shakib al hasan</a>
                                                <span>Motijheel, Dhaka</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6 hidden-xs">
                                            <div class="block-text rel zmin">
                                                <a title="" href="#">Orthopedic Surgery</a>
                                                <div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star-empty"></span>
                                                    <span data-value="3" class="glyphicon glyphicon-star-empty"></span><span data-value="4" class="glyphicon glyphicon-star-empty"></span><span data-value="5" class="glyphicon glyphicon-star-empty"></span>                                                    </span>
                                                </div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque illum nam, consequatur architecto iste aliquam aperiam! Tenetur, ipsam iure...</p>
                                                <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                                            </div>
                                            <div class="person-text rel text-light">
                                                <img src="img/testimonials/t2.jpg" alt="" class="person img-circle" />
                                                <a title="" href="#">Tamim iqbal</a>
                                                <span>Mirpur, Dhaka</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6 hidden-sm hidden-xs">
                                            <div class="block-text rel zmin">
                                                <a title="" href="#">Medical consultation</a>
                                                <div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star"></span>
                                                    <span data-value="3" class="glyphicon glyphicon-star"></span><span data-value="4" class="glyphicon glyphicon-star"></span><span data-value="5" class="glyphicon glyphicon-star"></span> </span>
                                                </div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque illum nam, consequatur architecto iste aliquam aperiam! Tenetur, ipsam iure...</p>
                                                <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                                            </div>
                                            <div class="person-text rel text-light">
                                                <img src="img/testimonials/t3.jpg" alt="" class="person img-circle" />
                                                <a title="" href="#">Sojib khan</a>
                                                <span>Uttara, Dhaka</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="item">
                                        <div class="col-md-4 col-sm-6">
                                            <div class="block-text rel zmin">
                                                <a title="" href="#">Birth control pills</a>
                                                <div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star"></span>
                                                    <span data-value="3" class="glyphicon glyphicon-star"></span><span data-value="4" class="glyphicon glyphicon-star-empty"></span><span data-value="5" class="glyphicon glyphicon-star-empty"></span> </span>
                                                </div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque illum nam, consequatur architecto iste aliquam aperiam! Tenetur, ipsam iure...</p>
                                                <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                                            </div>
                                            <div class="person-text rel text-light">
                                                <img src="img/testimonials/t4.jpg" alt="" class="person img-circle" />
                                                <a title="" href="#">Jahangir</a>
                                                <span>Shahjahanpur, Dhaka</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6 hidden-xs">
                                            <div class="block-text rel zmin">
                                                <a title="" href="#">Radiology</a>
                                                <div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star-empty"></span>
                                                    <span data-value="3" class="glyphicon glyphicon-star-empty"></span><span data-value="4" class="glyphicon glyphicon-star-empty"></span><span data-value="5" class="glyphicon glyphicon-star-empty"></span>                                                    </span>
                                                </div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque illum nam, consequatur architecto iste aliquam aperiam! Tenetur, ipsam iure...</p>
                                                <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                                            </div>
                                            <div class="person-text rel text-light">
                                                <img src="img/testimonials/t5.jpg" alt="" class="person img-circle" />
                                                <a title="" href="#">Sabbir khan</a>
                                                <span>Malibagh, Dhaka</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-sm-6 hidden-sm hidden-xs">
                                            <div class="block-text rel zmin">
                                                <a title="" href="#">Cervical Lesions</a>
                                                <div class="mark">My rating: <span class="rating-input"><span data-value="0" class="glyphicon glyphicon-star"></span><span data-value="1" class="glyphicon glyphicon-star"></span><span data-value="2" class="glyphicon glyphicon-star"></span>
                                                    <span data-value="3" class="glyphicon glyphicon-star"></span><span data-value="4" class="glyphicon glyphicon-star"></span><span data-value="5" class="glyphicon glyphicon-star"></span> </span>
                                                </div>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque illum nam, consequatur architecto iste aliquam aperiam! Tenetur, ipsam iure...</p>
                                                <ins class="ab zmin sprite sprite-i-triangle block"></ins>
                                            </div>
                                            <div class="person-text rel text-light">
                                                <img src="img/testimonials/t6.jpg" alt="" class="person img-circle" />
                                                <a title="" href="#">Zahir khan</a>
                                                <span>Motijheel, dhaka</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <a class="left carousel-control" href="#carousel-reviews" role="button" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                </a>
                                <a class="right carousel-control" href="#carousel-reviews" role="button" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- testimonial end -->
            <?php
      include_once("db/query.php");
    ?>

                <!--contact form start-->
                <section id="contact" class="section-padding" style='background-color:#fff;'>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="ser-title">Contact us</h2>
                                <hr class="botm-line">
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <h3>Contact Info</h3>
                                <div class="space"></div>
                                <p><i class="fa fa-map-marker fa-fw pull-left fa-2x"></i>47/2 Arambagh Street<br> Motijheel, Dhaka-1000</p>
                                <div class="space"></div>
                                <p><i class="fa fa-envelope-o fa-fw pull-left fa-2x"></i>info@hub.com</p>
                                <div class="space"></div>
                                <p><i class="fa fa-phone fa-fw pull-left fa-2x"></i>+880 19176305548</p>
                            </div>
                            <div class="col-md-8 col-sm-8 marb20">
                                <div class="contact-info">
                                    <h3 class="cnt-ttl">Having Any Query! Or Book an appointment</h3>
                                    <div class="space"></div>
                                    <div id="sendmessage">Your message has been sent. Thank you!</div>
                                    <div id="errormessage"></div>
                                    <form method="POST" action="addpatient_core.php" role="form" class="contactForm">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label for="exampleInputname">Name</label>
                                                <input type="text" name="name" class="form-control" id="exampleInputname" placeholder="Enter Name">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputdetname">Department</label>
                                                <select name="department" id="dept" class="form-control">
                    <?php
                    printOptions('department','id','dept_name');
                    ?>
                  </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputdetname">Refer Doctor</label>
                                                <select name="doctor" id="doct" class="form-control">
                      <option>Choose Department First</option>
                  </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleInputfees">Contact</label>
                                                <input type="text" name="contact" class="form-control" id="exampleInputfees" placeholder="Contact">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputfees">Guardian Contact</label>
                                                <input type="text" name="gcontact" class="form-control" id="exampleInputfees" placeholder="Guardian Contact">
                                            </div>
                                            <div class="form-group">
                                                <label for="exampleInputfees">Details</label>
                                                <textarea class="form-control" name="details" id="" cols="30" rows="10">Write details your Problems.</textarea>
                                            </div>


                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary" name="btn_sub">Submit</button>
                                            </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                </section>
                <!--contact form end-->

                <div style=" position: relative;">
                    <?php

      include_once("chat/chat.php");
      include_once("admin-chat/chat.php");
  
   ?>
                </div>
                <!--start script-->
                <script>
                    document.querySelector("#dept").onchange = function() {
                        let dept = document.querySelector("#dept").value;
                        var xhttp = new XMLHttpRequest();
                        xhttp.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                                document.getElementById("doct").innerHTML = this.responseText;
                            }

                        };
                        xhttp.open("GET", "admin/loadDoctorByDepartment.php?id=" + dept, true);
                        xhttp.send();
                    }
                </script>
                <button class="btn btn-primary" style="position: fixed;bottom:0;right:0;z-index:555;margin-right:40px" onclick="startAdminChat();">Live chat</button>

                <!-- footer start-->
                <footer>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6 col-md-4">
                                <div class="wow fadeInDown" data-wow-delay="0.1s">
                                    <div class="widget">
                                        <h5>About Hub Medical</h5>
                                        <p>
                                            Lorem ipsum dolor sit amet, ne nam purto nihil impetus, an facilisi accommodare sea
                                        </p>
                                    </div>
                                </div>
                                <div class="wow fadeInDown" data-wow-delay="0.1s">
                                    <div class="widget">
                                        <h5>Information</h5>
                                        <ul>
                                            <li><a href="#">Home</a></li>
                                            <li><a href="#">Laboratory</a></li>
                                            <li><a href="#">Medical treatment</a></li>
                                            <li><a href="#">Terms & conditions</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="wow fadeInDown" data-wow-delay="0.1s">
                                    <div class="widget">
                                        <h5>Hub medical center</h5>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet consequuntur, adipisci ipsam.
                                        </p>
                                        <ul>
                                            <li>
                                                <span class="fa-stack fa-lg">
					<i class="fa fa-circle fa-stack-2x"></i>
					<i class="fa fa-calendar-o fa-stack-1x fa-inverse"></i>
					</span> Monday - Saturday, 8am to 10pm
                                            </li>
                                            <li>
                                                <span class="fa-stack fa-lg">
						<i class="fa fa-circle fa-stack-2x"></i>
						<i class="fa fa-phone fa-stack-1x fa-inverse"></i>
					</span> +880 191765042
                                            </li>
                                            <li>
                                                <span class="fa-stack fa-lg">
					  <i class="fa fa-circle fa-stack-2x"></i>
					  <i class="fa fa-envelope-o fa-stack-1x fa-inverse"></i>
					</span> hello@hub.com
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <div class="wow fadeInDown" data-wow-delay="0.1s">
                                    <div class="widget">
                                        <h5>Our location</h5>
                                        <p>Arambag Motijheel Dhaka-1000</p>

                                    </div>
                                </div>
                                <div class="wow fadeInDown" data-wow-delay="0.1s">
                                    <div class="widget">
                                        <h5>Follow us</h5>
                                        <ul class="company-social">
                                            <li class="social-facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                                            <li class="social-twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                                            <li class="social-google"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                            <li class="social-vimeo"><a href="#"><i class="fa fa-vimeo-square"></i></a></li>
                                            <li class="social-dribble"><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sub-footer">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="wow fadeInLeft" data-wow-delay="0.1s">
                                        <div class="text-left">
                                            <p>&copy;Copyright - Hub Theme. All rights reserved.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-md-6 col-lg-6">
                                    <div class="wow fadeInRight" data-wow-delay="0.1s">
                                        <div class="text-right">
                                            <div class="credits">
                                                Designed by <a href="#">Anamika</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>

                </div>
                <a href="#" class="scrollup" style="margin-bottom: 33px;margin-right:-20px;z-index:1111"><i class="fa fa-angle-up active"></i></a>

                <!--Payment start-->

                <?php

if(isset($_REQUEST['step-1'])){
$contact=$_POST['phone'];

   $sql4="SELECT * FROM patient WHERE contact=$contact";
   $query=mysqli_query($con,$sql4);
   $row=mysqli_num_rows($query);
   if($row==0){
       echo"<script>alert('No data Found!!!')</script>";
   }else{

       $medicines = $con->query("select * from medicine_sell_info ms ,medicine_sell_line ml,patient p,medicine m where ms.patient_id=p.id and ms.id=ml.sell_id and ml.medicine_id=m.id and p.id=(select id from patient WHERE contact=$contact)");
$tests = $con->query("SELECT * FROM test_reports tr,tests t where tr.tests_id=t.id and tr.patient_id=(select id from patient WHERE contact=$contact)");
$beds = $con->query("SELECT release_date,admit_date,bed_no,datediff(release_date,admit_date)+1 as day,rent from bed_allotment ba,bed b where b.id=ba.bed_id and ba.patient_id=(select id from patient WHERE contact=$contact)");
$doctors = $con->query("select * from patient p,doctors d,department de where p.refer_doctor=d.id and de.id=d.dept_id AND p.id=(select id from patient WHERE contact=$contact)");


while($info=mysqli_fetch_array($query)){
   $name=$info['patient_name'];
   $contact=$info['contact'];
}
$medicinetotal=0;
while ($medicine = mysqli_fetch_array($medicines)) {
   $medicinetotal = $medicine["price"] * $medicine["quantity"];
 }
 $testtotal=0;
while ($test = mysqli_fetch_array($tests)) {
   $testtotal = $test["test_price"];
 }
 $bedtotal=0;
 while ($bed = mysqli_fetch_array($beds)) {
   $bedtotal = $bed["day"] * $bed["rent"];
 }
 $docfee=0;
 while ($doctor = mysqli_fetch_array($doctors)) {   
   $docfee=$doctor["fees"];
   $docname=$doctor['name'];
   $depname=$doctor["dept_name"];

 } 

 
 ?>

                    <!--modal2-->
                    <div class="modal" id="loginModal2">

                        <div class="modal-dialog modal-sm-4">
                            <div class="modal-content" style='width:550px'>
                                <div class="modal-header">
                                    <div class="input-gou">
                                        <h5 class="modal-title">Payment Process</h5>
                                        <button class="close" data-dismiss="modal" style='margin-top: -30px;
         font-size: 30px;'>&times;</button>
                                    </div>
                                </div>
                                <div class="modal-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>

                                                <th>Patient Name</th>
                                                <th>Patient Contact</th>
                                                <th>Total Bill</th>
                                                <th>Payment</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php echo $name;?>
                                                </td>
                                                <td>
                                                    <?php echo $contact;?>
                                                </td>
                                                <td>
                                                    <?php echo $bedtotal+$testtotal+$medicinetotal+$docfee?>
                                                </td>
                                                <td><a href='#loginModal3' data-toggle='modal' class='btn btn-primary' id='pay'>Paybill</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>

                    </div>
                    <!--end-->






                    <script>
                        localStorage.setItem('check', '<?php echo $contact;?>')
                        localStorage.setItem("modal4", `<ul class='list-unstyled list-group ml-3'>
                    <li >Patient Name: <?php echo $name?></li>
                    <li >Doctor Name: <?php echo $docname?></li>
                    <li >Department: <?php echo $depname?></li>
                    <li >Doctor Fee: <?php echo $docfee?></li>
                    <li>Medicine Bill:<?php echo $medicinetotal?></li>
                    <li>Test Bill:<?php echo $testtotal?></li>
                    <li>Seat Bill:<?php echo $bedtotal?></li>
                    <hr>
                    <li>Total:<?php echo $bedtotal+$testtotal+$medicinetotal+$docfee?></li>
                  </ul>`);
                        $(document).ready(function() {
                           
                            $("#loginModal2").modal("show");

                            $("#pay").click(function() {
                                $("#loginModal2").modal("hide");
                            });

                        });
                    </script>

                    <?php }



   }?>

                    <!--Payment end-->

                    <!--modal start1-->

                    <div class="modal" id="loginModal1">

                        <div class="modal-dialog modal-sm-4">
                            <div class="modal-content" style='width:550px'>
                                <div class="modal-header">
                                    <div class="input-gou">
                                        <h5 class="modal-title">Payment Process</h5>
                                        <button class="close" data-dismiss="modal" style='margin-top: -30px;
          font-size: 30px;'>&times;</button>
                                    </div>
                                </div>
                                <div class="modal-body">
                                    <form method='POST' action=''>
                                        <div class="form-group">
                                            <label for="conatct">Patient Contact</label>
                                            <input id='conatct' name='phone' class="form-control" type="text" placeholder="Enter Patient Contact">
                                        </div>

                                        <div class="modal-footer">

                                            <button type='submit' class="btn btn-warning" name='step-1'>Submit</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!--modal end-->
                    <!--modal start-->


                    <div class="modal" id="loginModal3">

                        <div class="modal-dialog modal-sm-4">
                            <div class="modal-content" style='width:550px'>
                                <div class="modal-header">
                                    <div class="input-gou">
                                        <h5 class="modal-title">Payment Process</h5>
                                        <button class="close" data-dismiss="modal" style='margin-top: -30px;
          font-size: 30px;'>&times;</button>
                                    </div>
                                </div>
                                <div class="modal-body">
                                    <form method='POST' action='payment.php'>
                                        <div class="form-group">
                                            <label for="userename">Method</label>
                                            <select name="method" style='margin-left:12px;padding:5px'>
                          <option value="">choose</option>
                          <option value="Bkash">Bkash</option>
                          <option value="Rocket">Rocket</option>
                          <option value="Mkash">Mkash</option>
                          <option value="Ukash">Ukash</option>
                      </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="userename">Patient Name</label>
                                            <input id="userename" name='name' class="form-control" type="text" placeholder="Enter Patient Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="conatct">Patient Contact</label>
                                            <input id='conatct' name='phone' class="form-control" type="text" placeholder="Enter Patient Contact">
                                        </div>
                                        <div class="form-group">
                                            <label for="conatct">Total Bill</label>
                                            <input id='conatct' name='bill' class="form-control" type="text" placeholder="Enter Total Bill">
                                        </div>
                                        <div class="form-group">
                                            <label for="conatct">Transaction Id</label>
                                            <input id='conatct' name='trx_id' class="form-control" type="text" placeholder="Enter Transaction Id">
                                        </div>
                                        <div class="modal-footer">

                                            <button class="btn btn-warning" type='submit' name='step-3'>Submit</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>


                    <!--modal end-->

                    <!--modal start4-->
                    <?php 
if(isset($_REQUEST['step3'])){ 
    $contact=$_GET["phone"];
    $sql6="select * from print_check  where contact=$contact and paid=1";
    $query11=mysqli_query($con,$sql6);
    $numrows=mysqli_num_rows($query11);
   
    
    ?>

                    <div class="modal" id="loginModal4">

                        <div class="modal-dialog modal-sm-4">
                            <div class="modal-content" style='width:550px'>
                                <div class="modal-header">
                                    <div class="input-gou">
                                        <h5 class="modal-title">Payment Process</h5>
                                        <button class="close" data-dismiss="modal" style='margin-top: -30px;
          font-size: 30px;'>&times;</button>
                                    </div>
                                </div>
                                <div id="m4" class="modal-body">

                                </div>
                                <div class="modal-footer">
                                    <button onclick="PrintElem()" class="btn btn-success">
                                        Print
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script>
                        <?php
                        
                        if($numrows==1){
                            ?>
                        document.getElementById("m4").innerHTML = localStorage.getItem("modal4");

                        <?php }else{
                            ?>
                            document.getElementById("m4").innerHTML = "Your payment has been pending";
                            <?php
                        }
                        ?>


                        function PrintElem() {
                            var mywindow = window.open('', 'PRINT', 'height=400,width=600');

                            mywindow.document.write(`<html><head>
                            
                            <title>' + document.title + '</title>
                            <style>
                            li{
                                font-size:30px;
                            }
                            </style>
                            
                            `);
                            mywindow.document.write('</head><body >');
                            mywindow.document.write('<h1>Patient Bill</h1>');
                            mywindow.document.write(document.getElementById("m4").innerHTML);
                            mywindow.document.write('</body></html>');

                            mywindow.document.close(); // necessary for IE >= 10
                            mywindow.focus(); // necessary for IE >= 10*/

                            mywindow.print();
                            mywindow.close();

                            return true;
                        }
                        $(document).ready(function() {
                            $("#loginModal4").modal("show");

                        });
                    </script>
                    <?php }
?>

                    <!-- Core JavaScript Files -->
                    <script src="js/jquery.min.js"></script>
                    <script src="js/bootstrap.min.js"></script>
                    <script src="js/jquery.easing.min.js"></script>
                    <script src="js/wow.min.js"></script>
                    <script src="js/jquery.scrollTo.js"></script>
                    <script src="js/jquery.appear.js"></script>
                    <script src="js/stellar.js"></script>
                    <script src="plugins/cubeportfolio/js/jquery.cubeportfolio.min.js"></script>
                    <script src="js/owl.carousel.min.js"></script>
                    <script src="js/nivo-lightbox.min.js"></script>
                    <script src="js/custom.js"></script>
                    <script>
                        startChat = (id) => {
                            document.getElementById("chat_window_2").style.display = "none";
                            document.getElementById("chat_window_1").style.display = "block";
                            if (!localStorage.getItem("chatEmail") || localStorage.getItem("chatEmail") == 'null') {
                                localStorage.setItem("chatEmail", window.prompt("Please Enter your Email"));
                            }
                            if (localStorage.getItem("chatEmail") && localStorage.getItem("chatEmail") != 'null') {
                                $("#chat_window_1").removeClass("cbox-hidden");
                            }
                            localStorage.setItem("reciever", id);
                            var xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = function() {
                                if (this.readyState == 4 && this.status == 200) {
                                    document.getElementById("msg-body").innerHTML = this.responseText;
                                    document.getElementById("msg-body").scrollTop = 13000;
                                }
                            };
                            xhttp.open("GET", "getmessage.php?sender=" + localStorage.getItem("chatEmail") + "&reciever=" + id, true);
                            xhttp.send();
                            if (window.msgInterval) {
                                clearInterval(msgInterval);
                            }
                            window.msgInterval = window.setInterval(function() {
                                var xhttp = new XMLHttpRequest();
                                xhttp.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        document.getElementById("msg-body").innerHTML = this.responseText;

                                    }
                                };
                                xhttp.open("GET", "getmessage.php?sender=" + localStorage.getItem("chatEmail") + "&reciever=" + id, true);
                                xhttp.send();
                            }, 5000);
                        }
                        startAdminChat = (id) => {
                            document.getElementById("chat_window_2").style.display = "block";
                            document.getElementById("chat_window_1").style.display = "none";

                            if (!localStorage.getItem("chatEmail") || localStorage.getItem("chatEmail") == 'null') {
                                localStorage.setItem("chatEmail", window.prompt("Please Enter your Email"));
                            }
                            if (localStorage.getItem("chatEmail") && localStorage.getItem("chatEmail") != 'null') {
                                $("#chat_window_1").removeClass("cbox-hidden");
                            }

                            var xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = function() {
                                if (this.readyState == 4 && this.status == 200) {
                                    document.getElementById("admin-msg-body").innerHTML = this.responseText;
                                    document.getElementById("admin-msg-body").scrollTop = 13000;
                                }
                            };
                            xhttp.open("GET", "getadminmessage.php?sender=" + localStorage.getItem("chatEmail"), true);
                            xhttp.send();
                            if (window.msgInterval) {
                                clearInterval(msgInterval);
                            }
                            window.msgInterval = window.setInterval(function() {
                                var xhttp = new XMLHttpRequest();
                                xhttp.onreadystatechange = function() {
                                    if (this.readyState == 4 && this.status == 200) {
                                        document.getElementById("admin-msg-body").innerHTML = this.responseText;

                                    }
                                };
                                xhttp.open("GET", "getadminmessage.php?sender=" + localStorage.getItem("chatEmail"), true);
                                xhttp.send();
                            }, 5000);
                        }

                        send = () => {
                            let sender = localStorage.getItem("chatEmail");
                            let reciever = localStorage.getItem("reciever");
                            let message = document.getElementById("msg").value;
                            document.getElementById("msg").value = "";
                            var xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = function() {
                                if (this.readyState == 4 && this.status == 200) {
                                    startChat(reciever);
                                }
                            };
                            xhttp.open("GET", "sendmessage.php?sender=" + sender + "&reciever=" + reciever + "&message=" + message, true);
                            xhttp.send();


                        }

                        sendAdmin = () => {
                            let sender = localStorage.getItem("chatEmail");
                            let reciever = "admin";
                            let message = document.getElementById("adminmsg").value;
                            let file = document.getElementById("fl").files[0];

                            var formData = new FormData();
                            formData.append('sender', sender);
                            formData.append('message', message);
                            if (file) {
                                formData.append('file', file);
                            } else {
                                formData.append('file', "");
                            }
                            document.getElementById("adminmsg").value = "";
                            document.getElementById("fl").value = ""
                            var xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = function() {
                                if (this.readyState == 4 && this.status == 200) {
                                    startAdminChat(reciever);
                                }
                            };
                            xhttp.open("POST", "sendadminmessage.php", true);
                            xhttp.send(formData);

                        }


                        $(document).on('click', '.panel-heading span.icon_minim', function(e) {
                            var $this = $(this);
                            if (!$this.hasClass('panel-collapsed')) {
                                $this.parents('.panel').find('.panel-body').slideUp();
                                $this.addClass('panel-collapsed');
                                $this.removeClass('glyphicon-minus').addClass('glyphicon-plus');
                            } else {
                                $this.parents('.panel').find('.panel-body').slideDown();
                                $this.removeClass('panel-collapsed');
                                $this.removeClass('glyphicon-plus').addClass('glyphicon-minus');
                            }
                        });
                        $(document).on('focus', '.panel-footer input.chat_input', function(e) {
                            var $this = $(this);
                            if ($('#minim_chat_window').hasClass('panel-collapsed')) {
                                $this.parents('.panel').find('.panel-body').slideDown();
                                $('#minim_chat_window').removeClass('panel-collapsed');
                                $('#minim_chat_window').removeClass('glyphicon-plus').addClass('glyphicon-minus');
                            }
                        });
                        $(document).on('click', '#new_chat', function(e) {
                            var size = $(".chat-window:last-child").css("margin-left");
                            size_total = parseInt(size) + 400;
                            alert(size_total);
                            var clone = $("#chat_window_1").clone().appendTo(".container");
                            clone.css("margin-left", size_total);
                        });
                        $(document).on('click', '.icon_close', function(e) {
                            //$(this).parent().parent().parent().parent().remove();
                            $("#chat_window_1").addClass("cbox-hidden");
                        });
                    </script>
                    <script>
                        window.addEventListener('scroll', function() {
                            const box = document.querySelector('.admin-hidden')

                            const scrooled = window.scrollY
                            if (scrooled >= 14000) {
                                box.style.display = "block"
                                startAdminChat();
                                document.getElementById("chat_window_1").style.display = "none";
                            }



                        })
                    </script>

    </body>

    </html>