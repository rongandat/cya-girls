<!DOCTYPE HTML>
<!--
/*
 * jQuery File Upload Plugin Demo 9.1.0
 * https://github.com/blueimp/jQuery-File-Upload
 *
 * Copyright 2010, Sebastian Tschan
 * https://blueimp.net
 *
 * Licensed under the MIT license:
 * http://www.opensource.org/licenses/MIT
 */
-->
<html lang="en">
    <head>
        <!-- Force latest IE rendering engine or ChromeFrame if installed -->
        <!--[if IE]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <![endif]-->
        <meta charset="utf-8">
        <title>jQuery File Upload Demo</title>
        <meta name="description" content="File Upload widget with multiple file selection, drag&amp;drop support, progress bars, validation and preview images, audio and video for jQuery. Supports cross-domain, chunked and resumable file uploads and client-side image resizing. Works with any server-side platform (PHP, Python, Ruby on Rails, Java, Node.js, Go etc.) that supports standard HTML form file uploads.">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
            window.jQuery || document.write("<script src='<?php echo base_url(); ?>/public/admin/js/jquery.min.js'>" + "<" + "/script>");
        </script>

        <!-- <![endif]-->

        <!--[if IE]>
<script type="text/javascript">
window.jQuery || document.write("<script src='<?php echo base_url(); ?>/public/admin/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
        <script type="text/javascript">
            if ('ontouchstart' in document.documentElement)
                document.write("<script src='<?php echo base_url(); ?>/public/admin/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
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
        <script src="<?php echo base_url(); ?>/public/admin/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>/public/admin/js/jquery.dataTables.bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>/public/admin/js/dataTables.tableTools.min.js"></script>
        <script src="<?php echo base_url(); ?>/public/admin/js/dataTables.colVis.min.js"></script>
        <script src="<?php echo base_url(); ?>/public/admin/js/jquery-ui.min.js"></script>
        <script src="<?php echo base_url(); ?>/public/admin/ckeditor/ckeditor.js"></script>

        <!-- ace scripts -->
        <script src="<?php echo base_url(); ?>/public/admin/js/ace-elements.min.js"></script>
        <script src="<?php echo base_url(); ?>/public/admin/js/ace.min.js"></script>

        <link rel="stylesheet" href="//blueimp.github.io/Gallery/css/blueimp-gallery.min.css">

        <link rel="stylesheet" href="<?php echo base_url() . 'public/admin/jqupload/' ?>css/jquery.fileupload.css">
        <link rel="stylesheet" href="<?php echo base_url() . 'public/admin/jqupload/' ?>css/jquery.fileupload-ui.css">
        <!-- CSS adjustments for browsers with JavaScript disabled -->
        <noscript><link rel="stylesheet" href="<?php echo base_url() . 'public/admin/jqupload/' ?>css/jquery.fileupload-noscript.css"></noscript>
        <noscript><link rel="stylesheet" href="<?php echo base_url() . 'public/admin/jqupload/' ?>css/jquery.fileupload-ui-noscript.css"></noscript>

        <!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
        <script src="<?php echo base_url() . 'public/admin/jqupload/' ?>js/vendor/jquery.ui.widget.js"></script>
        <!-- The Templates plugin is included to render the upload/download listings -->
        <script src="<?php echo base_url() . 'public/admin/jqupload/' ?>js/tmpl.min.js"></script>
        <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
        <script src="<?php echo base_url() . 'public/admin/jqupload/' ?>js/load-image.all.min.js"></script>
        <!-- The Canvas to Blob plugin is included for image resizing functionality -->
        <script src="<?php echo base_url() . 'public/admin/jqupload/' ?>js/canvas-to-blob.min.js"></script>
        <!-- Bootstrap JS is not required, but included for the responsive demo navigation -->
        <!-- blueimp Gallery script -->
        <script src="<?php echo base_url() . 'public/admin/jqupload/' ?>js/jquery.blueimp-gallery.min.js"></script>
        <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
        <script src="<?php echo base_url() . 'public/admin/jqupload/' ?>js/jquery.iframe-transport.js"></script>
        <!-- The basic File Upload plugin -->
        <script src="<?php echo base_url() . 'public/admin/jqupload/' ?>js/jquery.fileupload.js"></script>
        <!-- The File Upload processing plugin -->
        <script src="<?php echo base_url() . 'public/admin/jqupload/' ?>js/jquery.fileupload-process.js"></script>
        <!-- The File Upload image preview & resize plugin -->
        <script src="<?php echo base_url() . 'public/admin/jqupload/' ?>js/jquery.fileupload-image.js"></script>
        <!-- The File Upload audio preview plugin -->
        <script src="<?php echo base_url() . 'public/admin/jqupload/' ?>js/jquery.fileupload-audio.js"></script>
        <!-- The File Upload video preview plugin -->
        <script src="<?php echo base_url() . 'public/admin/jqupload/' ?>js/jquery.fileupload-video.js"></script>
        <!-- The File Upload validation plugin -->
        <script src="<?php echo base_url() . 'public/admin/jqupload/' ?>js/jquery.fileupload-validate.js"></script>
        <!-- The File Upload user interface plugin -->
        <script src="<?php echo base_url() . 'public/admin/jqupload/' ?>js/jquery.fileupload-ui.js"></script>
        <!-- The main application script -->
        <script src="<?php echo base_url() . 'public/admin/jqupload/' ?>js/main.js"></script>
    </head>
    <body>
        <div class="navbar navbar-default navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-fixed-top .navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="https://github.com/blueimp/jQuery-File-Upload">jQuery File Upload</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="https://github.com/blueimp/jQuery-File-Upload/tags">Download</a></li>
                        <li><a href="https://github.com/blueimp/jQuery-File-Upload">Source Code</a></li>
                        <li><a href="https://github.com/blueimp/jQuery-File-Upload/wiki">Documentation</a></li>
                        <li><a href="https://blueimp.net">&copy; Sebastian Tschan</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container">
            <h1>jQuery File Upload Demo</h1>
            <h2 class="lead">Basic Plus UI version</h2>
            <ul class="nav nav-tabs">
                <li><a href="basic.html">Basic</a></li>
                <li><a href="basic-plus.html">Basic Plus</a></li>
                <li class="active"><a href="index.html">Basic Plus UI</a></li>
                <li><a href="angularjs.html">AngularJS</a></li>
                <li><a href="jquery-ui.html">jQuery UI</a></li>
            </ul>
            <br>
            <blockquote>
                <p>File Upload widget with multiple file selection, drag&amp;drop support, progress bars, validation and preview images, audio and video for jQuery.<br>
                    Supports cross-domain, chunked and resumable file uploads and client-side image resizing.<br>
                    Works with any server-side platform (PHP, Python, Ruby on Rails, Java, Node.js, Go etc.) that supports standard HTML form file uploads.</p>
            </blockquote>
            <br>
            <!-- The file upload form used as target for the file upload widget -->
            <form id="fileupload" action="//jquery-file-upload.appspot.com/" method="POST" enctype="multipart/form-data">
                <!-- Redirect browsers with JavaScript disabled to the origin page -->
                <noscript><input type="hidden" name="redirect" value="https://blueimp.github.io/jQuery-File-Upload/"></noscript>
                <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                <div class="row fileupload-buttonbar">
                    <div class="col-lg-7">
                        <!-- The fileinput-button span is used to style the file input field as button -->
                        <span class="btn btn-success fileinput-button">
                            <i class="glyphicon glyphicon-plus"></i>
                            <span>Add files...</span>
                            <input type="file" name="files[]" multiple>
                        </span>
                        <button type="submit" class="btn btn-primary start">
                            <i class="glyphicon glyphicon-upload"></i>
                            <span>Start upload</span>
                        </button>
                        <button type="reset" class="btn btn-warning cancel">
                            <i class="glyphicon glyphicon-ban-circle"></i>
                            <span>Cancel upload</span>
                        </button>
                        <button type="button" class="btn btn-danger delete">
                            <i class="glyphicon glyphicon-trash"></i>
                            <span>Delete</span>
                        </button>
                        <input type="checkbox" class="toggle">
                        <!-- The global file processing state -->
                        <span class="fileupload-process"></span>
                    </div>
                    <!-- The global progress state -->
                    <div class="col-lg-5 fileupload-progress fade">
                        <!-- The global progress bar -->
                        <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                        </div>
                        <!-- The extended global progress state -->
                        <div class="progress-extended">&nbsp;</div>
                    </div>
                </div>
                <!-- The table listing the files available for upload/download -->
                <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
            </form>
            <br>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Demo Notes</h3>
                </div>
                <div class="panel-body">
                    <ul>
                        <li>The maximum file size for uploads in this demo is <strong>5 MB</strong> (default file size is unlimited).</li>
                        <li>Only image files (<strong>JPG, GIF, PNG</strong>) are allowed in this demo (by default there is no file type restriction).</li>
                        <li>Uploaded files will be deleted automatically after <strong>5 minutes</strong> (demo setting).</li>
                        <li>You can <strong>drag &amp; drop</strong> files from your desktop on this webpage (see <a href="https://github.com/blueimp/jQuery-File-Upload/wiki/Browser-support">Browser support</a>).</li>
                        <li>Please refer to the <a href="https://github.com/blueimp/jQuery-File-Upload">project website</a> and <a href="https://github.com/blueimp/jQuery-File-Upload/wiki">documentation</a> for more information.</li>
                        <li>Built with the <a href="http://getbootstrap.com/">Bootstrap</a> CSS framework and Icons from <a href="http://glyphicons.com/">Glyphicons</a>.</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- The blueimp Gallery widget -->
        <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
            <div class="slides"></div>
            <h3 class="title"></h3>
            <a class="prev">‹</a>
            <a class="next">›</a>
            <a class="close">×</a>
            <a class="play-pause"></a>
            <ol class="indicator"></ol>
        </div>
        <!-- The template to display files available for upload -->
        <script id="template-upload" type="text/x-tmpl">
            {% for (var i=0, file; file=o.files[i]; i++) { %}
            <tr class="template-upload fade">
            <td>
            <span class="preview"></span>
            </td>
            <td>
            <p class="name">{%=file.name%}</p>
            <strong class="error text-danger"></strong>
            </td>
            <td>
            <p class="size">Processing...</p>
            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
            </td>
            <td>
            {% if (!i && !o.options.autoUpload) { %}
            <button class="btn btn-primary start" disabled>
            <i class="glyphicon glyphicon-upload"></i>
            <span>Start</span>
            </button>
            {% } %}
            {% if (!i) { %}
            <button class="btn btn-warning cancel">
            <i class="glyphicon glyphicon-ban-circle"></i>
            <span>Cancel</span>
            </button>
            {% } %}
            </td>
            </tr>
            {% } %}
        </script>
        
    </body> 
</html>
