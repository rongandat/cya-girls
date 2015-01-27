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
<!-- Login Form Starts -->
<form role="form" class="form-inline" method="post" action="">

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
        <input type="submit" value="Reset password" class="btn btn-danger">
    </div>
</form>
<div class="submitbutton">
    <div class="rightbox"><a class="btn btn-danger" href="<?php echo site_url('session/login') ?>">Login</a></div>
    <div class="flbox"><a class="btn btn-danger" href="<?php echo site_url('session/register') ?>">Register</a></div>
    <div class="clb"></div>
</div>
<!-- Login Form Ends -->