<div class="page-header">
    <h1>
        Update
    </h1>
</div><!-- /.page-header -->


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
        <?php if (!empty($error)): ?>
            <div class="alert alert-danger">
                <button data-dismiss="alert" class="close" type="button">
                    <i class="ace-icon fa fa-times"></i>
                </button>
                <?php echo $error ?>
                <br>
            </div>
        <?php endif; ?>
        <div class="tab-content">
            <div id="tab-general" class="tab-pane in active">
                <div class="form-group <?php echo!empty($error['title']) ? ' has-error' : '' ?>">
                    <label class="col-sm-3 control-label no-padding-right" for="title"> Title </label>
                    <div class="col-sm-9">
                        <input type="text" id="title" name="title" placeholder="title" value="<?php echo!empty($girl['title']) ? $girl['title'] : '' ?>" class="col-xs-10 col-sm-5" />
                    </div>
                    <?php if (!empty($error['title'])): ?>
                        <label class="col-sm-3 control-label no-padding-right" for="">  </label>
                        <div class="help-block col-xs-12 col-sm-reset inline"> <?php echo $error['title'] ?> </div>
                    <?php endif; ?>
                </div>
                <div class="space-4"></div>

                <div class="form-group <?php echo!empty($error['fullname']) ? ' has-error' : '' ?>">
                    <label class="col-sm-3 control-label no-padding-right" for="fullname"> Fullname </label>
                    <div class="col-sm-9">
                        <input type="text" id="fullname" name="fullname" placeholder="fullname" value="<?php echo!empty($girl['fullname']) ? $girl['fullname'] : '' ?>" class="col-xs-10 col-sm-5" />
                    </div>
                    <?php if (!empty($error['fullname'])): ?>
                        <label class="col-sm-3 control-label no-padding-right" for="">  </label>
                        <div class="help-block col-xs-12 col-sm-reset inline"> <?php echo $error['fullname'] ?> </div>
                    <?php endif; ?>
                </div>
                <div class="space-4"></div>

                <div class="form-group <?php echo!empty($error['phone']) ? ' has-error' : '' ?>">
                    <label class="col-sm-3 control-label no-padding-right" for="phone"> Phone </label>
                    <div class="col-sm-9">
                        <input type="text" id="phone" name="phone" placeholder="phone" value="<?php echo!empty($girl['phone']) ? $girl['phone'] : '' ?>" class="col-xs-10 col-sm-5" />
                    </div>
                    <?php if (!empty($error['phone'])): ?>
                        <label class="col-sm-3 control-label no-padding-right" for="">  </label>
                        <div class="help-block col-xs-12 col-sm-reset inline"> <?php echo $error['phone'] ?> </div>
                    <?php endif; ?>
                </div>
                <div class="space-4"></div>

                <div class="form-group <?php echo!empty($error['birthday']) ? ' has-error' : '' ?>">
                    <label class="col-sm-3 control-label no-padding-right" for="birthday"> Birthday </label>
                    <div class="col-sm-9">
                        <input type="text" id="form-field-mask-1" name="birthday" placeholder="birthday" value="<?php echo!empty($girl['birthday']) ? $girl['birthday'] : '' ?>" class="col-xs-10 col-sm-5  input-mask-date" />
                        <span class="help-inline col-xs-12 col-sm-7">
                            <span class="middle"> Date <small class="text-success">mm/dd/yyyy</small> </span>
                        </span>
                    </div>
                    <?php if (!empty($error['birthday'])): ?>
                        <label class="col-sm-3 control-label no-padding-right" for="">  </label>
                        <div class="help-block col-xs-12 col-sm-reset inline"> <?php echo $error['birthday'] ?> </div>
                    <?php endif; ?>
                </div>
                <div class="space-4"></div>


                <div class="form-group <?php echo!empty($error['cost']) ? ' has-error' : '' ?>">
                    <label class="col-sm-3 control-label no-padding-right" for="cost"> Cost </label>

                    <div class="input-group col-sm-9" style="padding-left:12px;">
                        <span class="input-group-addon">
                            $
                        </span>
                        <input name="cost" value="<?php echo (!empty($girl['cost'])) ? $girl['cost'] : 0.00 ?>" class="input-sm" type="text" />
                        <span class="lbl"></span>
                    </div>
                    <?php if (!empty($error['status'])): ?>
                        <label class="col-sm-3 control-label no-padding-right" for="">  </label>
                        <div class="help-block col-xs-12 col-sm-reset inline"> <?php echo $error['status'] ?> </div>
                    <?php endif; ?>
                </div>

                <div class="form-group <?php echo!empty($error['status']) ? ' has-error' : '' ?>">
                    <label class="col-sm-3 control-label no-padding-right" for="status"> Status </label>
                    <div class="col-sm-9">
                        <input name="status" <?php echo (!isset($girl['status']) || $girl['status'] == 1 ) ? 'checked' : '' ?> class="ace ace-switch" type="checkbox" />
                        <span class="lbl"></span>
                    </div>
                    <?php if (!empty($error['status'])): ?>
                        <label class="col-sm-3 control-label no-padding-right" for="">  </label>
                        <div class="help-block col-xs-12 col-sm-reset inline"> <?php echo $error['status'] ?> </div>
                    <?php endif; ?>
                </div>
                <div class="space-4"></div>

                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="tags">Tag input</label>

                    <div class="col-sm-9">
                        <div class="inline">
                            <input type="text" name="tags" id="tags" value="" placeholder="Enter tags ..." />
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="locations">Locations</label>

                    <div class="col-xs-10 col-sm-3">
                        <div>
                            <select multiple="" class="chosen-select form-control " name='locations[]' data-placeholder="Choose a State...">
                                <?php foreach ($locations as $location): ?>
                                <option <?php echo!empty($listGirlLocations[$location['id']])?'selected':'' ?> value="<?php echo $location['id'] ?>"><?php echo $location['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group <?php echo!empty($error['map']) ? ' has-error' : '' ?>">
                    <label class="col-sm-3 control-label no-padding-right" for="map"> Address </label>
                    <div class="col-sm-9">
                        <input type="text" id="map" name="map" placeholder="address" value="<?php echo!empty($girl['map']) ? $girl['map'] : '' ?>" class="form-control" />
                    </div>
                    <?php if (!empty($error['map'])): ?>
                        <label class="col-sm-3 control-label no-padding-right" for="">  </label>
                        <div class="help-block col-xs-12 col-sm-reset inline"> <?php echo $error['map'] ?> </div>
                    <?php endif; ?>
                </div>
                <div class="form-group <?php echo!empty($error['content']) ? ' has-error' : '' ?>">
                    <label class="col-sm-3 control-label no-padding-right" for="content"> Details </label>
                    <div class="col-sm-9">
                        <textarea cols="100" id="content" name="content" rows="10"><?php echo!empty($girl['content']) ? $girl['content'] : '' ?></textarea>

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
                    </div>
                    <?php if (!empty($error['map'])): ?>
                        <label class="col-sm-3 control-label no-padding-right" for="">  </label>
                        <div class="help-block col-xs-12 col-sm-reset inline"> <?php echo $error['map'] ?> </div>
                    <?php endif; ?>
                </div>
                <div class="space-4"></div>
                <div class="clearfix" style="z-index: 670;"></div>
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
                <table role="presentation" class="table table-striped">
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
                    <div class="form-group ">
                        <label class="col-sm-3 control-label no-padding-right" for="option_<?php echo $option['id'] ?>"> <?php echo $option['name'] ?> </label>
                        <div class="col-sm-9">
                            <input type="text" id="option_<?php echo $option['id'] ?>" name="options[<?php echo $option['id'] ?>]" placeholder="<?php echo $option['name'] ?>" value="<?php echo!empty($listValues[$option['id']]) ? $listValues[$option['id']] : '' ?>" class="col-xs-10 col-sm-5" />
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="clearfix form-actions">
            <div class="col-md-offset-3 col-md-9">
                <button class="btn btn-info" type="submit">
                    <i class="ace-icon fa fa-check bigger-110"></i>
                    Submit
                </button>

                &nbsp; &nbsp; &nbsp;
                <button class="btn" type="reset">
                    <i class="ace-icon fa fa-undo bigger-110"></i>
                    Reset
                </button>
            </div>
        </div>
    </form>
</div>


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
    .done(function(result_items){
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