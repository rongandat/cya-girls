<div class="page-header">
    <h1>
        User Permission
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
                <label class="col-sm-3 control-label no-padding-right" for="name"> Username group</label>
                <div class="col-sm-9">
                    <input type="text" id="name" name="name" placeholder="Username group" value="<?php echo!empty($user_group_info['name']) ? $user_group_info['name'] : '' ?>" class="col-xs-10 col-sm-5" />
                </div>
                <?php if (!empty($error['name'])): ?>
                    <label class="col-sm-3 control-label no-padding-right" for="">  </label>
                    <div class="help-block col-xs-12 col-sm-reset inline"> <?php echo $error['name'] ?> </div>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="access"> Access permission </label>
                <div class="col-sm-9">
                    <select name="permission[access][]" class="col-xs-10 col-sm-5" id="access" multiple="multiple" >
                        <?php foreach ($files as $file) : ?>
                            <?php
                            $permission = basename($file, '.php');
                            ?>
                            <?php if (!in_array($permission, $ignore)): ?>
                                <option value="<?php echo $permission ?>" <?php echo in_array($permission, $access) ? 'selected=selected' : '' ?>><?php echo $permission ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="modify"> Modify permission </label>
                <div class="col-sm-9">
                    <select name="permission[modify][]" class="col-xs-10 col-sm-5" id="modify" multiple="multiple" >
                        <?php foreach ($files as $file) : ?>
                            <?php
                            $permission = basename($file, '.php');
                            ?>
                            <?php if (!in_array($permission, $ignore)): ?>
                                <option value="<?php echo $permission ?>" <?php echo in_array($permission, $modify) ? 'selected' : '' ?>><?php echo $permission ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
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

            <div class="hr hr-24"></div>
        </form>

        <div class="hr hr-18 dotted hr-double"></div>


    </div><!-- /.col -->
</div><!-- /.row -->

