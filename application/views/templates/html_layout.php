<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Dashboard - Ace Admin</title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>/public/admin/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>/public/admin/css/font-awesome.min.css" />
                <link rel="stylesheet" href="<?php echo base_url(); ?>/public/admin/css/jquery-ui.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>/public/admin/css/datepicker.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>/public/admin/css/ui.jqgrid.min.css" />
                
		<link rel="stylesheet" href="<?php echo base_url(); ?>/public/admin/css/chosen.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>/public/admin/css/bootstrap-timepicker.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>/public/admin/css/daterangepicker.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>/public/admin/css/bootstrap-datetimepicker.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>/public/admin/css/colorpicker.min.css" />

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:400,300" />

		<!-- ace styles -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>/public/admin/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="<?php echo base_url(); ?>/public/admin/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="<?php echo base_url(); ?>/public/admin/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="<?php echo base_url(); ?>/public/admin/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="<?php echo base_url(); ?>/public/admin/js/html5shiv.min.js"></script>
		<script src="<?php echo base_url(); ?>/public/admin/js/respond.min.js"></script>
		<![endif]-->
                
                <!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="<?php echo base_url(); ?>/public/admin/js/jquery.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<![endif]-->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='<?php echo base_url(); ?>/public/admin/js/jquery.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='<?php echo base_url(); ?>/public/admin/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url(); ?>/public/admin/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="<?php echo base_url(); ?>/public/admin/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="<?php echo base_url(); ?>/public/admin/js/excanvas.min.js"></script>
		<![endif]-->
		<script src="<?php echo base_url(); ?>/public/admin/js/jquery-ui.custom.min.js"></script>
		<script src="<?php echo base_url(); ?>/public/admin/js/jquery.ui.touch-punch.min.js"></script>
		<script src="<?php echo base_url(); ?>/public/admin/js/chosen.jquery.min.js"></script>
		<script src="<?php echo base_url(); ?>/public/admin/js/jquery.easypiechart.min.js"></script>
		<script src="<?php echo base_url(); ?>/public/admin/js/jquery.sparkline.min.js"></script>
		<script src="<?php echo base_url(); ?>/public/admin/js/jquery.flot.min.js"></script>
		<script src="<?php echo base_url(); ?>/public/admin/js/jquery.flot.pie.min.js"></script>
		<script src="<?php echo base_url(); ?>/public/admin/js/jquery.flot.resize.min.js"></script>
                
                <!-- page specific plugin scripts -->
		<script src="<?php echo base_url(); ?>/public/admin/js/bootstrap-datepicker.min.js"></script>
		<script src="<?php echo base_url(); ?>/public/admin/js/jquery.jqGrid.min.js"></script>
		<script src="<?php echo base_url(); ?>/public/admin/js/grid.locale-en.js"></script>
                
		<script src="<?php echo base_url(); ?>/public/admin/js/fuelux.spinner.min.js"></script>
		<script src="<?php echo base_url(); ?>/public/admin/js/moment.min.js"></script>
		<script src="<?php echo base_url(); ?>/public/admin/js/daterangepicker.min.js"></script>
		<script src="<?php echo base_url(); ?>/public/admin/js/bootstrap-datetimepicker.min.js"></script>
		<script src="<?php echo base_url(); ?>/public/admin/js/bootstrap-timepicker.min.js"></script>
		<script src="<?php echo base_url(); ?>/public/admin/js/bootstrap-colorpicker.min.js"></script>
		<script src="<?php echo base_url(); ?>/public/admin/js/jquery.knob.min.js"></script>
		<script src="<?php echo base_url(); ?>/public/admin/js/jquery.autosize.min.js"></script>
		<script src="<?php echo base_url(); ?>/public/admin/js/jquery.inputlimiter.1.3.1.min.js"></script>
		<script src="<?php echo base_url(); ?>/public/admin/js/jquery.maskedinput.min.js"></script>
		<script src="<?php echo base_url(); ?>/public/admin/js/bootstrap-tag.min.js"></script>
                

		<!-- ace scripts -->
		<script src="<?php echo base_url(); ?>/public/admin/js/ace-elements.min.js"></script>
		<script src="<?php echo base_url(); ?>/public/admin/js/ace.min.js"></script>
	</head>

	<body class="no-skin">
                
                <?php echo $this->load->view("templates/html_header"); ?>
		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>
                        <?php echo $this->load->view("templates/html_leflt_column"); ?>    
			

			<div class="main-content">
				<div class="main-content-inner">
                                    <?php echo $body ?>
				</div>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">Ace</span>
							Application &copy; 2013-2014
						</span>

						&nbsp; &nbsp;
						<span class="action-buttons">
							<a href="#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
							</a>
						</span>
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->
	</body>
</html>
