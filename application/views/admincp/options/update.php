<div class="page-header">
    <h1>
        Options
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
                    <input type="text" id="name" name="name" placeholder="Name" value="<?php echo!empty($option['name']) ? $option['name'] : '' ?>" class="col-xs-10 col-sm-5" />
                </div>
                <?php if (!empty($error['name'])): ?>
                    <label class="col-sm-3 control-label no-padding-right" for="">  </label>
                    <div class="help-block col-xs-12 col-sm-reset inline"> <?php echo $error['name'] ?> </div>
                <?php endif; ?>
            </div>
            <div class="space-4"></div>
            <div class="form-group <?php echo!empty($error['order']) ? ' has-error' : '' ?>">
                <label class="col-sm-3 control-label no-padding-right" for="order"> Order </label>
                <div class="col-sm-9">
                    <input type="text" id="order" name="order" placeholder="Order" value="<?php echo!empty($option['order']) ? $option['order'] : '' ?>" class="col-xs-10 col-sm-5" />
                </div>
                <?php if (!empty($error['order'])): ?>
                    <label class="col-sm-3 control-label no-padding-right" for="">  </label>
                    <div class="help-block col-xs-12 col-sm-reset inline"> <?php echo $error['order'] ?> </div>
                <?php endif; ?>
            </div>
            <div class="space-4"></div>
            <div class="form-group <?php echo!empty($error['type']) ? ' has-error' : '' ?>">
                <label class="col-sm-3 control-label no-padding-right" for="type"> Type </label>
                <div class="col-sm-9">
                    <select id="type" class="input-sm" name='type'>
                        <option value="text">text</option>
                        <option value="checkbox">checkbox</option>
                        <option value="radio">radio</option>
                        <option value="select">select</option>
                        <option value="textarea">textarea</option>
                        <option value="file">file</option>
                        <option value="date">date</option>
                        <option value="time">time</option>
                        <option value="datetime">datetime</option>
                    </select>
                </div>
                <?php if (!empty($error['type'])): ?>
                    <label class="col-sm-3 control-label no-padding-right" for="">  </label>
                    <div class="help-block col-xs-12 col-sm-reset inline"> <?php echo $error['type'] ?> </div>
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
