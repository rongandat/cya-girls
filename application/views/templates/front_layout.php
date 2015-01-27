<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Language" content="en-us">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="keywords" content="<?php echo $configs['page_title']; ?>">
        <meta name="description" content="<?php echo $configs['page_keyword']; ?>">
        <title><?php echo $configs['page_description']; ?></title>
        <link href="<?php echo base_url() ?>public/front/css/style.css" rel="stylesheet">
        <!-- Font Awesome  -->    
        <link href="<?php echo base_url() ?>public/front/css/font-awesome.min.css" rel="stylesheet">
        
        <script src="<?php echo base_url() ?>public/front/js/jquery-2.0.3.min.js"></script>
        <script src="<?php echo base_url() ?>public/front/ad.gallery/jquery.ad-gallery.min.js"></script>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA--E5qbTljwwsFv4KFErXHprtsB4_iO9k&sensor=false"></script>
        <link href="<?php echo base_url() ?>public/front/ad.gallery/jquery.ad-gallery.css" rel="stylesheet">
    </head>
    <body>
        <div id="header">
            <div class="top-header">
                <div class="login-area">
                    <ul class="lg-rg">
                        <li>
                            <a href="<?php echo site_url('session/login') ?>">Log in</a>
                        </li>
                        <li>
                            |
                        </li>
                        <li>
                            <a href="<?php echo site_url('session/register') ?>">Register</a>
                        </li>
                    </ul>

                </div>
                <div class="search">
                    <form class="form" action="<?php echo site_url('search'); ?>" method="get">
                        <input type="text" name="search" value="" placeholder="Enter a keyword...">
                        <input type="submit" value="Go">
                    </form>
                    <div class="images-escost">
                        <img src="<?php echo base_url() ?>public/front/img/escort_post_free.png"/>
                    </div>
                </div>
                <div class="clb"></div>
            </div><!-- /.top-header -->
            <div class="nav-header">
                <ul class="list-inline">
                    <li class="schema"><a href="<?php echo site_url() ?>" class="active">SHEMALE ESCORT</a></li>
                    <li class="advertise"><a href="<?php echo site_url() ?>">ADVERTISE</a></li>
                    <li class="webcams"><a href="<?php echo site_url('webcams') ?>">WEB CAMS</a></li>
                    <li class="links"><a href="<?php echo site_url('links') ?>">LINKS</a></li>
                    <li class="contact"><a href="<?php echo site_url('contact') ?>">CONTACT</a></li>
                    <li class="recuit"><a href="<?php echo site_url('recruit') ?>">RECRUIT (求人)</a></li>
                </ul>
            </div><!-- /.nav -->
        </div><!-- /#header -->
        <div id="container">
            <div class="content">
                <?php echo $body; ?>

            </div><!-- /.content -->
            <?php if (empty($no_sidebar)): ?>
                <?php echo $this->load->view("templates/front_sidebar"); ?>    
            <?php endif; ?>

            <div class="clb"></div>
        </div><!-- /#container -->
        <div id="footer1">
            <div class="title">
                POPULAR SEARCH
            </div>
            <?php if (!empty($tab_tags)): ?>
                <div class="tags">
                    <?php foreach ($tab_tags as $tag): ?>
                        <?php $class = ($tag['count'] >= 6) ? 'biggest' : (($tag['count'] <= 6 && $tag['count'] >= 2 ) ? 'big' : '') ?>
                    <a href="<?php echo site_url('girls/tag/' . $tag['id'] . '-' . convertTitle($tag['name'])) ?>" class="<?php echo $class; ?>"><?php echo $tag['name'] ?></a>
                    <?php endforeach; ?>
                    <div class="clb"></div>
                </div>
            <?php endif; ?>
        </div><!-- /#footer -->
        <div id="footer2">
            <ul class="page">
                <li><a href="<?php echo site_url('manager') ?>">My Account</a></li>
                <li><a href="<?php echo site_url('contact') ?>">Contact</a></li>
                <li><a href="#">Messages</a></li>
                <?php foreach ($informations as $information): ?>
                    <li><a href="<?php echo site_url('page/' . $information['id'] . '-' . convertTitle($information['title'])) ?>"><?php echo $information['title'] ?></a></li>
                <?php endforeach; ?>
                <li><a href="<?php echo site_url('links') ?>">Links</a></li>
                <li><a href="#">Advertise</a></li>
                <li><a href="<?php echo site_url('webcams') ?>">Webcams</a></li>
                <li><a href="<?php echo site_url('recruit') ?>">Recruit (求人)</a></li>
            </ul>
            <div class="text-footer">
                The site contains sexually explicit material. Enter ONLY if you are over 18 or <a href="#">leave the site</a>
            </div>
            <div class="text-footer">
                <?php echo $configs['footer_text']; ?>
            </div>
        </div><!-- /#footer -->
    </body>
</html>
