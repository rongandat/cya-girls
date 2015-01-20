<div class="page-header">
    <h1>
        Page
    </h1>
</div><!-- /.page-header -->

<div class="row">
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->
        <form action="" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
            <?php if (!empty($error['permission'])): ?>
                <div class="alert alert-danger">
                    <button data-dismiss="alert" class="close" type="button">
                        <i class="ace-icon fa fa-times"></i>
                    </button>
                    <?php echo $error['permission'] ?>
                    <br>
                </div>
            <?php endif; ?>
            <div class="form-group <?php echo!empty($error['title']) ? ' has-error' : '' ?>">
                <label class="col-sm-3 control-label no-padding-right" for="name"> Title </label>
                <div class="col-sm-9">
                    <input type="text" id="title" name="title" placeholder="title" value="<?php echo!empty($information['title']) ? $information['title'] : '' ?>" class="col-xs-10 col-sm-5" />
                </div>
                <?php if (!empty($error['title'])): ?>
                    <label class="col-sm-3 control-label no-padding-right" for="">  </label>
                    <div class="help-block col-xs-12 col-sm-reset inline"> <?php echo $error['title'] ?> </div>
                <?php endif; ?>
            </div>
            <div class="space-4"></div>
            <div class="form-group <?php echo!empty($error['order']) ? ' has-error' : '' ?>">
                <label class="col-sm-3 control-label no-padding-right" for="order"> Order </label>
                <div class="col-sm-9">
                    <input type="text" id="order" name="order" placeholder="order" value="<?php echo!empty($information['order']) ? $information['order'] : '' ?>" class="col-xs-10 col-sm-5" />
                </div>
                <?php if (!empty($error['order'])): ?>
                    <label class="col-sm-3 control-label no-padding-right" for="">  </label>
                    <div class="help-block col-xs-12 col-sm-reset inline"> <?php echo $error['order'] ?> </div>
                <?php endif; ?>
            </div>
            <div class="space-4"></div>
            <div class="form-group <?php echo!empty($error['description']) ? ' has-error' : '' ?>">
                <label class="col-sm-3 control-label no-padding-right" for="description"> Description </label>
                <div class="col-sm-9">
                    <textarea cols="100" id="description" name="description" rows="10"><?php echo!empty($information['description']) ? $information['description'] : '' ?></textarea>

                        <script>
                            // Replace the <textarea id="editor1"> with an CKEditor instance.
                            CKEDITOR.replace('description', {
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
                <?php if (!empty($error['description'])): ?>
                    <label class="col-sm-3 control-label no-padding-right" for="">  </label>
                    <div class="help-block col-xs-12 col-sm-reset inline"> <?php echo $error['description'] ?> </div>
                <?php endif; ?>
            </div>
            <div class="space-4"></div>
            
            <div class="form-group <?php echo!empty($error['footer_display']) ? ' has-error' : '' ?>">
                    <label class="col-sm-3 control-label no-padding-right" for="footer_display"> Footer display </label>
                    <div class="col-sm-9">
                        <input name="footer_display" <?php echo (!isset($information['footer_display']) || $information['footer_display'] == 1 ) ? 'checked' : '' ?> class="ace ace-switch" type="checkbox" />
                        <span class="lbl"></span>
                    </div>
                    <?php if (!empty($error['footer_display'])): ?>
                        <label class="col-sm-3 control-label no-padding-right" for="">  </label>
                        <div class="help-block col-xs-12 col-sm-reset inline"> <?php echo $error['footer_display'] ?> </div>
                    <?php endif; ?>
                </div>
                <div class="space-4"></div>
            <div class="clearfix form-actions">
                <div class="col-md-offset-3 col-md-9">
                    <button class="btn btn-info" type="submit">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Submit
                    </button>
                </div>
            </div>

            <div class="hr hr-24"></div>
        </form>

        <div class="hr hr-18 dotted hr-double"></div>


    </div><!-- /.col -->
</div><!-- /.row -->
