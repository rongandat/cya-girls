<h1 class="title"><?php echo $header_title; ?></h1>
<?php if (!empty($error)): ?>
    <div class="alert alert-warning">
        <strong>Oh snap! </strong> <?php echo $error; ?>
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
<!-- Login Form Starts -->
<form role="form" class="form-inline" method="post" action="">

    <div class="inputcount bottomBder">
        <div class="inputLeft rightGap">
            <div class="inputTxt">Username <span>*</span></div>
            <div class="inputTxtbox"><input type="text" value="" id="username" name="username"></div>
        </div>
        <div class="clb"></div>
    </div>

    <div class="createLogin">
        <input type="submit" value="Forgot password" class="btn btn-danger">
    </div>
</form>
<div class="submitbutton">
    <div class="rightbox"><a class="btn btn-danger" href="<?php echo site_url('session/login') ?>">Login</a></div>
    <div class="flbox"><a class="btn btn-danger" href="<?php echo site_url('session/register') ?>">Register</a></div>
    <div class="clb"></div>
</div>
<!-- Login Form Ends -->