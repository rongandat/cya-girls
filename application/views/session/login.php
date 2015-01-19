<section class="login-area pad-25">
    <div class="row">
        <div class="col-sm-6">
            <!-- Login Panel Starts -->
            <div class="panel panel-smart">
                <div class="panel-heading">
                    <h3 class="panel-title">Login</h3>
                </div>
                <div class="panel-body">
                    <?php if (!empty($error)): ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <strong>Oh snap! </strong> <?php echo $error; ?>
                        </div>
                    <?php endif; ?>
                    <p>
                        Please login using your existing account
                    </p>
                    <!-- Login Form Starts -->
                    <form role="form" class="form-inline" method="post" action="">

                        <div class="form-group">
                            <label for="username" class="sr-only">Username</label>
                            <input type="text" name="username" placeholder="Username" id="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" placeholder="Password" id="password" class="form-control">
                        </div>
                        <button class="btn btn-brown" type="submit">
                            Login
                        </button>
                    </form>
                    <!-- Login Form Ends -->
                </div>
            </div>
            <!-- Login Panel Ends -->
        </div>
        <div class="col-sm-6">
            <!-- Account Panel Starts -->
            <div class="panel panel-smart">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Create new account
                    </h3>
                </div>
                <div class="panel-body">
                    <p>
                        Registration allows you to avoid filling in billing and shipping forms every time you checkout on this website
                    </p>
                    <a class="btn btn-brown" href="<?php echo site_url('session/register') ?>">
                        Register
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>