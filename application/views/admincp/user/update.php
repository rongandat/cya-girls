<div class="page-header">
    <h1>
        Form Elements
        <small>
            <i class="ace-icon fa fa-angle-double-right"></i>
            Common form elements and layouts
        </small>
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
            <div class="form-group <?php echo!empty($error['username']) ? ' has-error' : '' ?>">
                <label class="col-sm-3 control-label no-padding-right" for="username"> Username </label>
                <div class="col-sm-9">
                    <input type="text" id="username" name="username" placeholder="Username" value="<?php echo!empty($user['username']) ? $user['username'] : '' ?>" class="col-xs-10 col-sm-5" />
                </div>
                <?php if (!empty($error['username'])): ?>
                    <label class="col-sm-3 control-label no-padding-right" for="">  </label>
                    <div class="help-block col-xs-12 col-sm-reset inline"> <?php echo $error['username'] ?> </div>
                <?php endif; ?>
            </div>
            <div class="space-4"></div>
            <div class="form-group <?php echo!empty($error['firstname']) ? ' has-error' : '' ?>">
                <label class="col-sm-3 control-label no-padding-right" for="firstname"> Firstname </label>
                <div class="col-sm-9">
                    <input type="text" id="firstname" name="firstname" placeholder="Firstname" value="<?php echo!empty($user['firstname']) ? $user['firstname'] : '' ?>" class="col-xs-10 col-sm-5" />
                </div>
                <?php if (!empty($error['firstname'])): ?>
                    <label class="col-sm-3 control-label no-padding-right" for="">  </label>
                    <div class="help-block col-xs-12 col-sm-reset inline"> <?php echo $error['firstname'] ?> </div>
                <?php endif; ?>
            </div>
            <div class="space-4"></div>
            <div class="form-group  <?php echo!empty($error['lastname']) ? ' has-error' : '' ?>">
                <label class="col-sm-3 control-label no-padding-right" for="lastname"> Lastname </label>
                <div class="col-sm-9">
                    <input type="text" id="lastname" name="lastname" placeholder="Lastname" value="<?php echo!empty($user['lastname']) ? $user['lastname'] : '' ?>" class="col-xs-10 col-sm-5" />
                </div>
                <?php if (!empty($error['lastname'])): ?>
                    <label class="col-sm-3 control-label no-padding-right" for="">  </label>

                    <div class="help-block col-xs-12 col-sm-reset inline"> <?php echo $error['lastname'] ?> </div>
                <?php endif; ?>
            </div>
            <div class="space-4"></div>
            <div class="form-group  <?php echo!empty($error['email']) ? ' has-error' : '' ?>">
                <label class="col-sm-3 control-label no-padding-right" for="email"> Email </label>
                <div class="col-sm-9">
                    <input type="text" id="email" name="email" placeholder="Email" value="<?php echo!empty($user['email']) ? $user['email'] : '' ?>" class="col-xs-10 col-sm-5" />
                </div>
                <?php if (!empty($error['email'])): ?>
                    <label class="col-sm-3 control-label no-padding-right" for="">  </label>
                    <div class="help-block col-xs-12 col-sm-reset inline"> <?php echo $error['email'] ?> </div>
                <?php endif; ?>
            </div>
            <div class="space-4"></div>
            <div class="form-group  <?php echo!empty($error['password']) ? ' has-error' : '' ?>">
                <label class="col-sm-3 control-label no-padding-right" for="password"> Password </label>
                <div class="col-sm-9">
                    <input type="password" name="password" autocomplete="off" id="password" placeholder="Password" class="col-xs-10 col-sm-5" />
                </div>
                <?php if (!empty($error['password'])): ?>
                    <label class="col-sm-3 control-label no-padding-right" for="">  </label>
                    <div class="help-block col-xs-12 col-sm-reset inline"> <?php echo $error['password'] ?> </div>
                <?php endif; ?>
            </div>
            <div class="space-4"></div>
            <div class="form-group  <?php echo!empty($error['confirmPassword']) ? ' has-error' : '' ?>">
                <label class="col-sm-3 control-label no-padding-right" for="confirmPassword"> Confirm Password </label>
                <div class="col-sm-9">
                    <input type="password" name="confirmPassword" autocomplete="off" id="confirmPassword" placeholder="Confirm Password" class="col-xs-10 col-sm-5" />
                </div>
                <?php if (!empty($error['confirmPassword'])): ?>
                    <label class="col-sm-3 control-label no-padding-right" for="">  </label>
                    <div class="help-block col-xs-12 col-sm-reset inline"> <?php echo $error['confirmPassword'] ?> </div>
                <?php endif; ?>
            </div>
            <div class="space-4"></div>
            <div class="form-group  <?php echo!empty($error['phone']) ? ' has-error' : '' ?>">
                <label class="col-sm-3 control-label no-padding-right" for="phone"> Phone </label>
                <div class="col-sm-9">
                    <input type="text" id="phone" name="phone" placeholder="Phone" value="<?php echo!empty($user['phone']) ? $user['phone'] : '' ?>" class="col-xs-10 col-sm-5" />
                </div>
                <?php if (!empty($error['phone'])): ?>
                    <label class="col-sm-3 control-label no-padding-right" for="">  </label>
                    <div class="help-block col-xs-12 col-sm-reset inline"> <?php echo $error['phone'] ?> </div>
                <?php endif; ?>
            </div>
            <div class="space-4"></div>
            <div class="form-group  <?php echo!empty($error['mobile']) ? ' has-error' : '' ?>">
                <label class="col-sm-3 control-label no-padding-right" for="mobile"> Mobile </label>
                <div class="col-sm-9">
                    <input type="text" id="mobile" name="mobile" placeholder="Mobile" value="<?php echo!empty($user['mobile']) ? $user['mobile'] : '' ?>" class="col-xs-10 col-sm-5" />
                </div>
                <?php if (!empty($error['mobile'])): ?>
                    <label class="col-sm-3 control-label no-padding-right" for="">  </label>
                    <div class="help-block col-xs-12 col-sm-reset inline"> <?php echo $error['mobile'] ?> </div>
                <?php endif; ?>
            </div>
            <div class="space-4"></div>

            <div class="form-group  <?php echo!empty($error['role']) ? ' has-error' : '' ?>">
                <label class="col-sm-3 control-label no-padding-right" for="role"> Role </label>
                <div class="col-sm-9">

                    <select id="role" name="role" class="col-xs-10 col-sm-5">
                        <?php foreach ($roles as $role): ?>
                            <option value="<?php echo $role['id'] ?>" <?php echo ($user['role'] == $role['id']) ? 'selected' : '' ?>><?php echo $role['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <?php if (!empty($error['role'])): ?>
                    <label class="col-sm-3 control-label no-padding-right" for="">  </label>
                    <div class="help-block col-xs-12 col-sm-reset inline"> <?php echo $error['role'] ?> </div>
                <?php endif; ?>
            </div>
            <div class="space-4"></div>
            <div class="form-group  <?php echo!empty($error['avatar']) ? ' has-error' : '' ?>">
                <label class="col-sm-3 control-label no-padding-right" for="avatar"> Avatar </label>
                <div class="col-xs-10 col-sm-3">
                    <input type="file" class="" name="avatar" id="id-input-file-2" />
                </div>
                <div class="clearfix"></div>
                <?php if (!empty($error['avatar'])): ?>
                    <label class="col-sm-3 control-label no-padding-right" for="">  </label>
                    <div class="help-block col-xs-12 col-sm-reset inline"> <?php echo $error['avatar'] ?> </div>
                <?php endif; ?>
            </div>
            <div class="space-4"></div>
            <div class="form-group">
                <label class="col-sm-3 control-label no-padding-right" for="avatar">  </label>
                <div class="col-xs-10 col-sm-3">
                    <span class="profile-picture">
                        <?php $avatar = !empty($user['avatar']) ? $user['avatar'] : ''; ?>
                        <img onerror="this.src='<?php echo base_url() . 'public/avatars/profile-pic.jpg' ?>'" src="<?php echo base_url() . 'public/avatars/' . $avatar ?>" alt="<?php echo!empty($user['username']) ? $user['username'] : '' ?>'s Avatar" class="editable img-responsive editable-click editable-empty" id="avatar"></img>
                    </span>
                </div>

            </div>
            <div class="space-4"></div>


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
