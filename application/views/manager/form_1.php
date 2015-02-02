<script src="<?php echo base_url(); ?>/public/admin/ckeditor/ckeditor.js"></script>

<div class="tabbable">
    <form id="fileupload" action="" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
        <?php if (!empty($error['permission'])): ?>
            <div class="alert alert-danger">
                <button data-dismiss="alert" class="close" type="button">
                    <i class="ace-icon fa fa-times"></i>
                </button>
                <?php echo $error['permission'] ?>
                <br>
            </div>
        <?php endif; ?>
        <?php if (!empty($success)): ?>
            <div class="alert alert-block alert-success">
                <button data-dismiss="alert" class="close" type="button">
                    <i class="ace-icon fa fa-times"></i>
                </button>

                <p>
                    <strong>
                        <i class="ace-icon fa fa-check"></i>
                        Well done!
                    </strong>
                    <?php echo $success; ?>
                </p>
            </div>
        <?php endif; ?>
        <ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
            <li class="active">
                <a data-toggle="tab" href="#tab-general">General</a>
            </li>

            <li class="">
                <a data-toggle="tab" href="#tab-images">Images</a>
            </li>


            <li>
                <a data-toggle="tab" href="#tab-info">More Information</a>
            </li>
        </ul>
        <?php if (!empty($success)): ?>
            <div class="alert alert-block alert-success">
                <button data-dismiss="alert" class="close" type="button">
                    <i class="ace-icon fa fa-times"></i>
                </button>

                <p>
                    <strong>
                        <i class="ace-icon fa fa-check"></i>
                        Well done!
                    </strong>
                    <?php echo $success; ?>
                </p>
            </div>
        <?php endif; ?>
        <?php if (!empty($error['permission'])): ?>
            <div class="alert alert-danger">
                <button data-dismiss="alert" class="close" type="button">
                    <i class="ace-icon fa fa-times"></i>
                </button>
                <?php echo $error['permission'] ?>
                <br>
            </div>
        <?php endif; ?>
        <div class="tab-content bottomBder">
            <div id="tab-general" class="tab-pane in active">
                <div class="inputcount">
                    <div class="inputfull">
                        <div class="inputTxt">Title <span>*</span></div>
                        <div class="inputTxtbox"><input type="text" value="<?php echo!empty($girl['title']) ? $girl['title'] : '' ?>" id="title" name="title"></div>
                    </div>
                    <div class="clb"></div>
                </div>

                <div class="inputcount">
                    <div class="inputLeft rightGap">
                        <div class="inputTxt">Name <span>*</span></div>
                        <div class="inputTxtbox"><input type="text" value="<?php echo!empty($girl['fullname']) ? $girl['fullname'] : '' ?>" id="fullname" name="fullname"></div>
                    </div>
                    <div class="inputLeft">
                        <div class="inputTxt">Phone</div>
                        <div class="inputTxtbox">
                            <input type="text" value="<?php echo!empty($girl['phone']) ? $girl['phone'] : '' ?>" id="phone" name="phone">
                        </div>
                    </div>
                    <div class="clb"></div>
                </div>

                <div class="inputcount">
                    <div class="inputLeft rightGap">
                        <div class="inputTxt">Birthday(mm/dd/yyyy)</div>
                        <div class="inputTxtbox"><input type="text" value="<?php echo!empty($girl['birthday']) ? $girl['birthday'] : '' ?>" id="birthday" name="birthday"></div>
                    </div>
                    <div class="inputLeft">
                        <div class="inputTxt">Facebook</div>
                        <div class="inputTxtbox">
                            <input type="text" value="<?php echo!empty($girl['facebook']) ? $girl['facebook'] : '' ?>" id="facebook" name="facebook">
                        </div>
                    </div>
                    <div class="clb"></div>
                </div>
                <div class="inputcount">
                    <div class="inputLeft rightGap">
                        <div class="inputTxt">Google plus</div>
                        <div class="inputTxtbox"><input type="text" value="<?php echo!empty($girl['google_plus']) ? $girl['google_plus'] : '' ?>" id="google_plus" name="google_plus"></div>
                    </div>
                    <div class="inputLeft">
                        <div class="inputTxt">Twitter</div>
                        <div class="inputTxtbox">
                            <input type="text" value="<?php echo!empty($girl['twitter']) ? $girl['twitter'] : '' ?>" id="twitter" name="twitter">
                        </div>
                    </div>
                    <div class="clb"></div>
                </div>
                <div class="inputcount">
                    <div class="inputLeft rightGap">
                        <div class="inputTxt">Pinterest</div>
                        <div class="inputTxtbox"><input type="text" value="<?php echo!empty($girl['pinterest']) ? $girl['pinterest'] : '' ?>" id="pinterest" name="pinterest"></div>
                    </div>
                    <div class="inputLeft">
                        <div class="inputTxt">Home page</div>
                        <div class="inputTxtbox">
                            <input type="text" value="<?php echo!empty($girl['home_page']) ? $girl['home_page'] : '' ?>" id="home_page" name="home_page">
                        </div>
                    </div>
                    <div class="clb"></div>
                </div>
                <div class="inputcount">
                    <div class="inputLeft rightGap">
                        <div class="inputTxt">Cost</div>
                        <div class="inputTxtbox">$<input type="text" value="<?php echo!empty($girl['cost']) ? $girl['cost'] : '' ?>" id="cost" name="cost"></div>
                    </div>
                    <div class="clb"></div>
                </div>
                <div class="inputcount">
                    <div class="inputLeft rightGap">
                        <div class="inputTxt">Tag input</div>
                        <div class="inputTxtbox"><input type="text" value="<?php echo!empty($girl['tags']) ? $girl['tags'] : '' ?>" id="tags" name="tags"></div>
                    </div>
                    <div class="clb"></div>
                </div>

                <div class="inputcount">
                    <div class="inputLeft rightGap">
                        <div class="inputTxt">Locations</div>
                        <div class="inputTxtbox">
                            <select multiple="" class="chosen-select form-control " name='locations[]' data-placeholder="Choose a State...">
                                <?php foreach ($locations as $location): ?>
                                    <option <?php echo!empty($girl['locations'][$location['id']]) ? 'selected' : '' ?> value="<?php echo $location['id'] ?>"><?php echo $location['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="clb"></div>
                </div>

                <div class="inputcount">
                    <div class="inputfull">
                        <div class="inputTxt">Map</div>
                        <div class="inputTxtbox"><input type="text" value="<?php echo!empty($girl['map']) ? $girl['map'] : '' ?>" id="map" name="map"></div>
                    </div>
                    <div class="clb"></div>
                </div>
                <div class="inputcount">
                    <div class="inputfull">
                        <div class="inputTxt">Details</div>
                        <div class="inputTxtbox"><textarea cols="100" id="content" name="content" rows="10"><?php echo!empty($girl['content']) ? $girl['content'] : '' ?></textarea></div>
                    </div>
                    <div class="clb"></div>
                </div>
                <script>
                    // Replace the <textarea id="editor1"> with an CKEditor instance.
                    CKEDITOR.replace('content', {
                        on: {
                            // Check for availability of corresponding plugins.
                            pluginsLoaded: function(evt) {
                                var doc = CKEDITOR.document, ed = evt.editor;
                                if (!ed.getCommand('bold'))
                                    doc.getById('exec-bold').hide();
                                if (!ed.getCommand('link'))
                                    doc.getById('exec-link').hide();
                            }
                        }
                    });
                </script>
                <div class="clb" ></div>
            </div>
            <div id="tab-images" class="tab-pane">
                <div class="form-group">
                    <div class="col-xs-12">
                        <label class="ace-file-input ace-file-multiple" style="display: block;">
                            <span class="ace-file-input ace-file-multiple">
                                <input type="file" multiple="" ><span data-title="Click to choose" class="ace-file-container"><span data-title="No File ..." class="ace-file-name"><i class=" ace-icon ace-icon fa fa-cloud-upload"></i></span></span><a href="#" class="remove"><i class=" ace-icon fa fa-times"></i></a></span>

                            <a class="remove" href="#"><i class=" ace-icon fa fa-times"></i></a>
                        </label>
                    </div>
                </div>

                <div class="row fileupload-buttonbar">

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
                <table role="presentation" class="table dataTable table-striped">
                    <thead>
                        <tr>
                            <th>Images</th>
                            <th>Images name</th>
                            <th>Default image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="files"></tbody>
                </table>
            </div>
            <div id="tab-info" class="tab-pane">
                <?php foreach ($options as $option): ?>
                    <div class="inputcount">
                        <div class="inputfull">
                            <div class="inputTxt"><?php echo $option['name'] ?></div>
                            <div class="inputTxtbox"><input type="text" value="<?php echo!empty($listValues[$option['id']]) ? $listValues[$option['id']] : '' ?>" id="option_<?php echo $option['id'] ?>" name="options[<?php echo $option['id'] ?>]"></div>
                        </div>
                        <div class="clb"></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="createLogin">
            <input type="submit" value="Update" class="btn btn-danger">
        </div>
    </form>
</div>

<script src="<?php echo base_url() ?>public/front/js/bootstrap.min.js"></script>


<script src="<?php echo base_url(); ?>/public/admin/js/jquery.maskedinput.min.js"></script>
<script src="<?php echo base_url(); ?>/public/admin/js/bootstrap-tag.min.js"></script>
<!-- ace scripts -->
<script src="<?php echo base_url(); ?>/public/admin/js/ace-elements.min.js"></script>
<script type="text/javascript">
    jQuery(function($) {

        $(function() {
            'use strict';

            // Initialize the jQuery File Upload widget:
            $('#fileupload').fileupload({
                url: '<?php echo site_url('ajax/imagesUpload/' . $id) ?>',
                autoUpload: true,
            });

            // Enable iframe cross-domain access via redirect option:
            $('#fileupload').fileupload(
                    'option',
                    'redirect',
                    window.location.href.replace(
                    /\/[^\/]*$/,
                    '/cors/result.html?%s'
                    )
                    );

            // Load existing files:
            $('#fileupload').addClass('fileupload-processing');
            $.ajax({
                // Uncomment the following to send cross-domain cookies:
                //xhrFields: {withCredentials: true},
                url: '<?php echo site_url('ajax/imagesUpload/' . $id) ?>',
                dataType: 'json',
                context: $('#fileupload')[0]
            }).always(function() {
                $(this).removeClass('fileupload-processing');
            }).done(function(result) {
                $(this).fileupload('option', 'done')
                        .call(this, $.Event('done'), {result: result});
            });

        });


        var tag_input = $('#tags');
        try {
            tag_input.tag(
                    {
                        placeholder: tag_input.attr('placeholder'),
                        //enable typeahead by specifying the source array
                        /**
                         source: ace.vars['US_STATES'], //defined in ace.js >> ace.enable_search_ahead
                         */
                        //or fetch data from database, fetch those that match "query"
                        source: function(query, process) {
                            $.ajax({url: '<?php echo site_url('ajax/tags') ?>'})
                                    .done(function(result_items) {
                                process($.parseJSON(result_items));
                            });
                        }

                    }
            )

            //programmatically add a new
            var $tag_obj = $('#tags').data('tag');
<?php foreach ($tags as $tag): ?>
                $tag_obj.add('<?php echo $tag['name'] ?>');
<?php endforeach; ?>
        }
        catch (e) {
            //display a textarea for old IE, because it doesn't support this plugin or another one I tried!
            tag_input.after('<textarea id="' + tag_input.attr('id') + '" name="' + tag_input.attr('name') + '" rows="3">' + tag_input.val() + '</textarea>').remove();
            //$('#tags').autosize({append: "\n"});
        }
    });
</script>



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
<!-- The template to display files available for download -->
<script id="template-download" type="text/x-tmpl">
    {% for (var i=0, file; file=o.files[i]; i++) { %}
    <tr class="template-download fade">
    <td>
    <span class="preview">

    {% if (file.no_upload) { %}
    <img src="{%=file.path%}">
    {% } else { %}
    {% if (file.thumbnailUrl) { %}
    <img src="{%=file.thumbnailUrl%}">
    {% } %}
    {% } %}
    </span>
    </td>
    <td>
    <p class="name">
    {% if (file.url) { %}
    {%=file.name%}
    {% if (!file.no_upload) { %}
    <input type=hidden name='images[]'  value='{%=file.name%}'>
    {% } %}
    {% } else { %}
    <span>{%=file.name%}</span>
    {% if (!file.no_upload) { %}
    <input type=hidden name='images[]'  value='{%=file.name%}'>
    {% } %}
    {% } %}
    </p>
    {% if (file.error) { %}
    <div><span class="label label-danger">Error</span> {%=file.error%}</div>
    {% } %}
    </td>
    <td>
    {% if (!file.error) { %}
    <input class="ace" type="radio" name="default_image" {%=file.checked%} value="{%=file.name%}">
    <span class="lbl"> Default image</span>
    {% } %}
    </td>
    <td>
    {% if (file.deleteUrl) { %}
    <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
    <i class="glyphicon glyphicon-trash"></i>
    <span>Delete</span>
    </button>
    {% } else { %}
    <button class="btn btn-warning cancel">
    <i class="glyphicon glyphicon-ban-circle"></i>
    <span>Cancel</span>
    </button>
    {% } %}
    </td>
    </tr>
    {% } %}
</script>