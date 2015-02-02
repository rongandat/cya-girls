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

<!-- Login Form Starts -->
<form role="form" class="form-horizontal" action="" method="post" enctype="multipart/form-data">
    <div class="searchingNum">Account Details</div>
    <div class="inputcount">
        <div class="inputLeft rightGap">
            <div class="inputTxt">Username <span>*</span></div>
            <div class="inputTxtbox"><input type="text" value="<?php echo!empty($post['username']) ? $post['username'] : '' ?>" id="username" name="username"></div>
        </div>
        <div class="inputLeft">
            <div class="inputTxt">Email <span>*</span></div>
            <div class="inputTxtbox">
                <input type="text" value="<?php echo!empty($post['email']) ? $post['email'] : '' ?>" id="email" name="email">
            </div>
        </div>

        <div class="clb"></div>
    </div>
    <div class="inputcount">
        <div class="inputLeft rightGap">
            <div class="inputTxt">First Name <span>*</span></div>
            <div class="inputTxtbox">
                <input type="text" value="<?php echo!empty($post['firstname']) ? $post['firstname'] : '' ?>" id="firstname" name="firstname">
            </div>
        </div>
        <div class="inputLeft ">
            <div class="inputTxt">Last Name <span>*</span></div>
            <div class="inputTxtbox"><input type="text" value="<?php echo!empty($post['lastname']) ? $post['lastname'] : '' ?>" id="lastname" name="lastname"></div>
        </div>

        <div class="clb"></div>
    </div>
    <div class="inputcount  bottomBder">
        <div class="inputLeft rightGap">
            <div class="inputTxt">Phone</div>
            <div class="inputTxtbox"><input type="text" value="<?php echo!empty($post['phone']) ? $post['phone'] : '' ?>" id="phone" name="phone"></div>
        </div>
        <div class="inputLeft">
            <div class="inputTxt">Mobile</div>
            <div class="inputTxtbox">
                <input type="text" value="<?php echo!empty($post['mobile']) ? $post['mobile'] : '' ?>" id="mobile" name="mobile">
            </div>
        </div>
        <div class="clb"></div>
    </div>
    
    <div class="createLogin">
        <input type="submit" value="Update" class="btn btn-danger">
    </div>
    
    <div class="submitbutton">
        <div class="flbox">
            <a class="btn btn-danger" href="<?php echo site_url('manager') ?>">Manager girls</a>
        </div>
        <div class="rightbox">
            <a class="btn btn-danger" href="<?php echo site_url('manager/changepassword') ?>">Change Password</a>
        </div>
        <div class="clb"></div>
    </div>
</form>