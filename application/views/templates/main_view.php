<html>
    <head>
        <!-- Title here -->
        <title>:: Restaurant ::</title>
        <link href="<?php echo base_url(); ?>public/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>public/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>public/css/form.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>public/css/flexslider.css"/>
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>public/css/jquery.fancybox.css"/>
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url(); ?>public/css/front.css"/>        
        <link type="text/css" media="screen" href="<?php echo base_url(); ?>public/css/style.css" rel="stylesheet">       
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,400,800,700,300" />
        <script>
            var base_url = '<?php echo site_url(); ?>';
        </script>
    </head>

    <body>
        <?php echo $this->load->view("front/header"); ?>
        <div class="main-content">
            <?php echo $this->load->view($content); ?>
        </div>
        <?php echo $this->load->view("front/footer"); ?>
        <script src="<?php echo base_url(); ?>public/js/jquery.js"></script>
        <script src="<?php echo base_url(); ?>public/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>public/js/respond.min.js"></script>
        <script src="<?php echo base_url(); ?>public/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>public/js/jquery.dataTables.bootstrap.js"></script>

    </body>	
</html>
