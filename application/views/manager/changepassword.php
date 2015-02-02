<h1 class="title"><?php echo $header_title; ?></h1>
<?php if (!empty($errors)): ?>
    <div class="alert alert-danger alert-dismissable">
        <h4>Oh snap! You got an error!</h4>
        <p>Change this and that and try again.</p>
        <ul>
            <?php foreach ($errors as $key => $error): ?>
                <li><strong><?php echo $key ?> fields: </strong><?php echo $error ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<?php if (!empty($success)): ?>
    <div class="alert alert-block alert-success">
        <p>
            <strong>
                <i class="ace-icon fa fa-check"></i>
                Well done!
            </strong>
            <?php echo $success; ?>
        </p>
    </div>
<?php endif; ?>
<form role="form" class="form-horizontal" action="" method="post" enctype="multipart/form-data">
    <div class="inputcount bottomBder">
        <div class="inputLeft rightGap">
            <div class="inputTxt">Old password <span>*</span></div>
            <div class="inputTxtbox"><input autocomplete="off" type="password" value="" id="oldpassword" name="oldpassword"></div>
        </div>

        <div class="clb"></div>
    </div>
    <div class="inputcount bottomBder">
        <div class="inputLeft rightGap">
            <div class="inputTxt">password <span>*</span></div>
            <div class="inputTxtbox"><input autocomplete="off" type="password" value="" id="password" name="password"></div>
        </div>
        <div class="inputLeft">
            <div class="inputTxt"> Re-Password <span>*</span></div>
            <div class="inputTxtbox">
                <input type="password" autocomplete="off" value="" id="repassword" name="repassword">
            </div>
        </div>
        <div class="clb"></div>
    </div>

    <div class="createLogin">
        <input type="submit" value="Change" class="btn btn-danger">
    </div>
    <div class="submitbutton">
        <div class="flbox">
            <a class="btn btn-danger" href="<?php echo site_url('manager') ?>">Manager girls</a>
        </div>
        <div class="rightbox">
            <a class="btn btn-danger" href="<?php echo site_url('manager/profile') ?>">Profile</a>
        </div>
        <div class="clb"></div>
    </div>
</form>