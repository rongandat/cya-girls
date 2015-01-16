<div class="page-header">
    <h1>
        Links
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
                    <input type="text" id="name" name="name" placeholder="Name" value="<?php echo!empty($link['name']) ? $link['name'] : '' ?>" class="col-xs-10 col-sm-5" />
                </div>
                <?php if (!empty($error['name'])): ?>
                    <label class="col-sm-3 control-label no-padding-right" for="">  </label>
                    <div class="help-block col-xs-12 col-sm-reset inline"> <?php echo $error['name'] ?> </div>
                <?php endif; ?>
            </div>
            <div class="space-4"></div>
            <div class="form-group <?php echo!empty($error['url']) ? ' has-error' : '' ?>">
                <label class="col-sm-3 control-label no-padding-right" for="url"> URL </label>
                <div class="col-sm-9">
                    <input type="text" id="url" name="url" placeholder="url" value="<?php echo!empty($link['url']) ? $link['url'] : '' ?>" class="col-xs-10 col-sm-5" />
                </div>
                <?php if (!empty($error['url'])): ?>
                    <label class="col-sm-3 control-label no-padding-right" for="">  </label>
                    <div class="help-block col-xs-12 col-sm-reset inline"> <?php echo $error['url'] ?> </div>
                <?php endif; ?>
            </div>
            <div class="space-4"></div>
            <div class="form-group  <?php echo!empty($error['image']) ? ' has-error' : '' ?>">
                <label class="col-sm-3 control-label no-padding-right" for="image"> Image </label>
                <div class="col-xs-10 col-sm-3">
                    <input type="file" class="" name="image" id="id-input-file-2" />
                </div>
                <div class="clearfix"></div>
                <?php if (!empty($error['image'])): ?>
                    <label class="col-sm-3 control-label no-padding-right" for="">  </label>
                    <div class="help-block col-xs-12 col-sm-reset inline"> <?php echo $error['image'] ?> </div>
                <?php endif; ?>
            </div>
            <div class="space-4"></div>
            <?php if(!empty($link['image'])): ?>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="image">  </label>
                <div class="col-xs-10 col-sm-3">
                    <span class="profile-picture">
                        <?php $image = !empty($link['image']) ? $link['image'] : ''; ?>
                        <img src="<?php echo base_url() . 'public/images/links/' . $link['image'] ?>" alt="" class="editable img-responsive editable-click editable-empty" id="image"></img>
                    </span>
                </div>

            </div>
            <div class="space-4"></div>
            <?php endif; ?>
            <div class="form-group  <?php echo!empty($error['image']) ? ' has-error' : '' ?>">
                <label class="col-sm-3 control-label no-padding-right" for="image_link"> Or image link</label>
                <div class="col-sm-9">
                    <input type="text" id="image_link" name="image_link" placeholder="image link" value="<?php echo!empty($link['image_link']) ? $link['image_link'] : '' ?>" class="col-xs-10 col-sm-5" />
                </div>
                <div class="clearfix"></div>
                <?php if (!empty($error['image_link'])): ?>
                    <label class="col-sm-3 control-label no-padding-right" for="">  </label>
                    <div class="help-block col-xs-12 col-sm-reset inline"> <?php echo $error['image_link'] ?> </div>
                <?php endif; ?>
            </div>
            <div class="space-4"></div>
            <div class="form-group <?php echo!empty($error['status']) ? ' has-error' : '' ?>">
                <label class="col-sm-3 control-label no-padding-right" for="status"> Status </label>
                <div class="col-sm-9">
                    <input name="status" <?php echo (!isset($link['status']) || $link['status'] == 1 ) ? 'checked' : '' ?> class="ace ace-switch" type="checkbox" />
                    <span class="lbl"></span>
                </div>
                <?php if (!empty($error['status'])): ?>
                    <label class="col-sm-3 control-label no-padding-right" for="">  </label>
                    <div class="help-block col-xs-12 col-sm-reset inline"> <?php echo $error['status'] ?> </div>
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
