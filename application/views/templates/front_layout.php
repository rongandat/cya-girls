<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <title>Japanshemaleescort</title>
        <!-- Bootstrap Core CSS -->
        <link href="<?php echo base_url() ?>public/front/css/bootstrap.css" rel="stylesheet">
        <!-- Plugins CSS -->
        <link href="<?php echo base_url() ?>public/front/css/ui.totop.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>public/front/css/prettyPhoto.css" rel="stylesheet">
        <!-- REVOLUTION BANNER CSS SETTINGS -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/front/css/settings.css" media="screen" />
        <!-- Font Awesome  -->    
        <link href="<?php echo base_url() ?>public/front/css/font-awesome.min.css" rel="stylesheet">
        <!-- Custom Stylesheet For This Template -->
        <link href="<?php echo base_url() ?>public/front/css/stylesheet.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>public/front/css/skins.css" rel="stylesheet">
        <!-- Google Fonts -->    
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic|Montserrat:400,700' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA--E5qbTljwwsFv4KFErXHprtsB4_iO9k&sensor=false"></script>
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
        <script src="<?php echo base_url() ?>public/front/js/html5shiv.min.js"></script>
        <script src="<?php echo base_url() ?>public/front/js/respond.min.js"></script>
        <![endif]-->

        <!-- /#utter-wrapper -->
        <!-- Bootstrap JS & Others JavaScript Plugins
            ================================================== -->
        <!-- Placed At The End Of The Document So Page Loads Faster -->
        <script src="<?php echo base_url() ?>public/front/js/jquery-2.0.3.min.js"></script>
        <script src="<?php echo base_url() ?>public/front/js/jquery-migrate-1.2.1.min.js"></script>
        <script src="<?php echo base_url() ?>public/front/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url() ?>public/front/js/jquery.themepunch.revolution.min.js"></script>
        <script src="<?php echo base_url() ?>public/front/js/jquery.carouFredSel-6.2.1.js"></script>
        <script src="<?php echo base_url() ?>public/front/js/jquery.prettyPhoto.js"></script>
        <script src="<?php echo base_url() ?>public/front/js/jflickrfeed.min.js"></script>
        <script src="<?php echo base_url() ?>public/front/js/easing.js"></script>
        <script src="<?php echo base_url() ?>public/front/js/jquery.ui.totop.min.js"></script>
        <script src="<?php echo base_url() ?>public/front/js/jquery.isotope.min.js"></script>
        <script src="<?php echo base_url() ?>public/front/js/jquery.fitvids.js"></script>
        <script src="<?php echo base_url() ?>public/front/js/script.js"></script>
    </head>
    <body>
        <div id="utter-wrapper" class="color-skin-1">
            <header id="header" class="header" data-spy="affix" data-offset-top="10">
                <nav class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="<?php echo site_url() ?>">Se<span>xy</span></a>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse navbar-ex1-collapse">
                            <ul class="nav navbar-nav">
                                <li class=" <?php echo($controller == 'welcome') ? 'active' : '' ?>">
                                    <a href="<?php echo site_url() ?>" class="-toggle" data-toggle="">Home</a>
                                </li>
                                <li class=" <?php echo($controller == 'webcamps') ? 'active' : '' ?>">
                                    <a href="<?php echo site_url('webcamps') ?>" class="-toggle" data-toggle="">Webcamps</a>
                                </li>
                                <li class=" <?php echo($controller == 'links') ? 'active' : '' ?>">
                                    <a href="<?php echo site_url('links') ?>" class="-toggle" data-toggle="">Links</a>
                                </li>
                                <li class=" <?php echo($controller == 'contact') ? 'active' : '' ?>">
                                    <a href="<?php echo site_url('contact') ?>" class="-toggle" data-toggle="">Contact</a>
                                </li>
                                <?php if (empty($auth)): ?>
                                    <li class="<?php echo($controller == 'session') ? 'active' : '' ?>">
                                        <a href="<?php echo site_url('session/login') ?>" class="-toggle" data-toggle="">Login</a>
                                    </li>
                                <?php else: ?>
                                    <li class="dropdown">
                                        <a data-toggle="dropdown" class="dropdown-toggle <?php echo($controller == 'session') ? 'active' : '' ?>" href="#"><?php echo $auth['firstname'] . ' ' . $auth['lastname'] ?></a>
                                        <ul class="dropdown-menu">
                                            <a href="<?php echo site_url('session/logout') ?>" class="-toggle" data-toggle="">Logout</a>
                                        </ul>
                                    </li>
                                <?php endif; ?>
                            </ul>
                            <!-- /.nav -->
                        </div>
                        <!-- /.navbar-collapse -->
                    </div>
                    <!-- /.container -->
                </nav>
                <!-- /.navbar -->
            </header>
            <!-- /#header -->
            <div id="portfolio" class="main-wrapper">
                <section id="page-title-wrapper" class="page-title-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-9">
                                <h4><?php echo $header_title ?></h4>
                            </div>

                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container -->
                </section>
                <section id="portfolio-3" class="pad-25">
                    <div class="container">
                        <?php echo $body; ?>
                        <?php if (empty($no_sidebar)): ?>
                            <?php echo $this->load->view("templates/front_sidebar"); ?>    
                        <?php endif; ?>
                    </div>
                </section>
                <!-- /.container -->
                <!-- /#portfolio-4 -->
            </div>
            <!-- /.main-wrapper -->
            <footer id="footer-1" class="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 footer-info-wrapper">
                            <span><?php echo $configs['footer_text']; ?></span>                        
                        </div>
                        <!-- /.footer-info-wrapper -->
                        <div class="col-xs-12 col-sm-6 footer-links-wrapper">
                            <ul class="list-inline flr">
                                <?php foreach ($informations as $information): ?>
                                    <li><a href="<?php echo site_url('page/' . $information['id'] . '-' . convertTitle($information['title'])) ?>"><?php echo $information['title'] ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container -->
            </footer>
        </div>


    </body>
</html>