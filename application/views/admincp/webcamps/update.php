<div class="page-header">
    <h1>
        Webcamps
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
            <div class="form-group <?php echo!empty($error['name']) ? ' has-error' : '' ?>">
                <label class="col-sm-3 control-label no-padding-right" for="name"> Name </label>
                <div class="col-sm-9">
                    <input type="text" id="name" name="name" placeholder="Name" value="<?php echo!empty($webcamp['name']) ? $webcamp['name'] : '' ?>" class="col-xs-10 col-sm-5" />
                </div>
                <?php if (!empty($error['name'])): ?>
                    <label class="col-sm-3 control-label no-padding-right" for="">  </label>
                    <div class="help-block col-xs-12 col-sm-reset inline"> <?php echo $error['name'] ?> </div>
                <?php endif; ?>
            </div>
            <div class="space-4"></div>
            <div class="form-group <?php echo!empty($error['link']) ? ' has-error' : '' ?>">
                <label class="col-sm-3 control-label no-padding-right" for="link"> Link </label>
                <div class="col-sm-9">
                    <input type="text" id="link" name="link" placeholder="Link" value="<?php echo!empty($webcamp['link']) ? $webcamp['link'] : '' ?>" class="col-xs-10 col-sm-5" />
                </div>
                <?php if (!empty($error['link'])): ?>
                    <label class="col-sm-3 control-label no-padding-right" for="">  </label>
                    <div class="help-block col-xs-12 col-sm-reset inline"> <?php echo $error['link'] ?> </div>
                <?php endif; ?>
            </div>
            <div class="space-4"></div>
            <div class="form-group <?php echo!empty($error['embeded']) ? ' has-error' : '' ?>">
                <label class="col-sm-3 control-label no-padding-right" for="embeded"> Or Embeded </label>
                <div class="col-sm-9">
                    <textarea id="embeded" name="embeded" class="col-xs-10 col-sm-5"><?php echo!empty($webcamp['embeded']) ? $webcamp['embeded'] : '' ?></textarea>
                </div>
                <?php if (!empty($error['embeded'])): ?>
                    <label class="col-sm-3 control-label no-padding-right" for="">  </label>
                    <div class="help-block col-xs-12 col-sm-reset inline"> <?php echo $error['embeded'] ?> </div>
                <?php endif; ?>
            </div>
            <div class="space-4"></div>

            <div class="form-group <?php echo!empty($error['status']) ? ' has-error' : '' ?>">
                <label class="col-sm-3 control-label no-padding-right" for="status"> Status </label>
                <div class="col-sm-9">
                    <input name="status" <?php echo (!isset($webcamp['status']) || $webcamp['status'] == 1 ) ? 'checked' : '' ?> class="ace ace-switch" type="checkbox" />
                    <span class="lbl"></span>
                </div>
                <?php if (!empty($error['status'])): ?>
                    <label class="col-sm-3 control-label no-padding-right" for="">  </label>
                    <div class="help-block col-xs-12 col-sm-reset inline"> <?php echo $error['status'] ?> </div>
                <?php endif; ?>
            </div>
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
