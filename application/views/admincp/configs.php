<div class="page-header">
    <h1>
        Configs
    </h1>
</div><!-- /.page-header -->
<div class="tabbable">
    <form action="" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
        <ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
            <li class="active">
                <a data-toggle="tab" href="#tab-general">General</a>
            </li>
            <li>
                <a data-toggle="tab" href="#tab-ftp">FTP</a>
            </li>
        </ul>

        <div class="tab-content">
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
            <div id="tab-general" class="tab-pane in active">
                <?php foreach ($tab_general as $tab) { ?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="lastname"> <?php echo $tab['label'] ?> </label>
                        <?php $func = 'form_' . $tab['type'] ?>
                        <div class="col-sm-9">
                            <?php $func = 'form_' . $tab['type'] ?>
                            <?php if ($tab['type'] == 'radio' || $tab['type'] == 'checkbox') { ?>
                                <?php foreach ($tab['value'] as $input) { ?>
                                    <?php echo $func($input) ?>
                                    <?php echo form_label($input['label']) ?>
                                <?php } ?>
                            <?php } elseif ($tab['type'] == 'dropdown') { ?>
                                <?php foreach ($tab['value'] as $input) { ?>
                                    <?php echo form_dropdown($input['name'], $input['options'], $input['selected'], $input['extra']) ?>
                                <?php } ?>
                            <?php } else { ?>
                                <?php echo $func($tab['value']) ?>
                            <?php } ?>
                        </div>

                    </div>
                    <div class="space-4"></div>

                <?php } ?>
                <div class="clearfix" style="z-index: 670;"></div>
            </div>


            <div id="tab-ftp" class="tab-pane">
                <?php foreach ($tab_ftp as $tab) { ?>
                    <div class="form-group">
                        <label class="col-sm-3 control-label no-padding-right" for="lastname"> <?php echo $tab['label'] ?> </label>
                        <?php $func = 'form_' . $tab['type'] ?>
                        <div class="col-sm-9">
                            <?php $func = 'form_' . $tab['type'] ?>
                            <?php if ($tab['type'] == 'radio' || $tab['type'] == 'checkbox') { ?>
                                <?php foreach ($tab['value'] as $input) { ?>
                                    <?php echo $func($input) ?>
                                    <?php echo form_label($input['label']) ?>
                                <?php } ?>
                            <?php } elseif ($tab['type'] == 'dropdown') { ?>
                                <?php foreach ($tab['value'] as $input) { ?>
                                    <?php echo form_dropdown($input['name'], $input['options'], $input['selected'], $input['extra']) ?>
                                <?php } ?>
                            <?php } else { ?>
                                <?php echo $func($tab['value']) ?>
                            <?php } ?>
                        </div>

                    </div>
                    <div class="space-4"></div>

                <?php } ?>
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