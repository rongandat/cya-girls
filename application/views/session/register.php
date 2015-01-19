<section class="registration-area">
    <div class="row">
        <div class="col-sm-6">
            <!-- Registration Block Starts -->
            <div class="panel panel-smart">
                <div class="panel-heading">
                    <h3 class="panel-title">Personal Information</h3>
                </div>
                <div class="panel-body">
                    <!-- Registration Form Starts -->
                    <form role="form" class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                        <?php if(!empty($errors)): ?>
                        <div class="alert alert-danger alert-dismissable">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <h4>Oh snap! You got an error!</h4>
                            <p>Change this and that and try again.</p>
                            <ul>
                                <?php foreach ($errors as $key => $error): ?>
                                <li><strong><?php echo $key ?> fields: </strong><?php echo $error ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <?php endif; ?>
                        <!-- Personal Information Starts -->
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="username">Username :</label>
                            <div class="col-sm-9">
                                <input type="text" name="username" placeholder="Username" value="<?php echo!empty($post['username']) ? $post['username'] : '' ?>" id="username" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="firstname">First Name :</label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="First Name" id="firstname" name="firstname" value="<?php echo!empty($post['firstname']) ? $post['firstname'] : '' ?>" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="lastname">Last Name :</label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="Last Name" name="lastname" value="<?php echo!empty($post['lastname']) ? $post['lastname'] : '' ?>" id="lastname" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="email">Email :</label>
                            <div class="col-sm-9">
                                <input type="email" placeholder="Email" name="email" value="<?php echo!empty($post['email']) ? $post['email'] : '' ?>"  id="email" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="phone">Phone :</label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="Phone" name="phone" value="<?php echo!empty($post['phone']) ? $post['phone'] : '' ?>" id="phone" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="mobile">Mobile :</label>
                            <div class="col-sm-9">
                                <input type="text" placeholder="Mobile" name="mobile" value="<?php echo!empty($post['mobile']) ? $post['mobile'] : '' ?>"  id="mobile" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="mobile">Avatar :</label>
                            <div class="col-sm-9">
                                <input type="file" placeholder="avatar" name="avatar"  id="avatar" class="form-control">
                            </div>
                        </div>

                        <!-- Delivery Information Ends -->
                        <h3 class="panel-heading inner">
                            Password
                        </h3>
                        <!-- Password Area Starts -->
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="password">Password :</label>
                            <div class="col-sm-9">
                                <input type="password" placeholder="Password"  id="password" name="password" autocomplete="off" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="repassword">Re-Password :</label>
                            <div class="col-sm-9">
                                <input type="password" placeholder="Re-Password" id="repassword" name="repassword" autocomplete="off" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="agree"> I'v read and agreed on Conditions
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button class="btn btn-brown" type="submit">
                                    Register
                                </button>
                            </div>
                        </div>
                        <!-- Password Area Ends -->
                    </form>
                    <!-- Registration Form Starts -->
                </div>							
            </div>
            <!-- Registration Block Ends -->
        </div>
        <div class="col-sm-6">
            <!-- Conditions Panel Starts -->
            <div class="panel panel-smart">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Conditions
                    </h3>
                </div>
                <div class="panel-body">
                    <p>
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including  versions of Lorem Ipsum.
                    </p>
                    <ol>
                        <li>Lorem ipsum dolor sit amet</li>
                        <li>Consectetur adipiscing elit</li>
                        <li>Integer molestie lorem at massa</li>
                        <li>Facilisis in pretium nisl aliquet</li>
                        <li>Nulla volutpat aliquam velit</li>
                        <li>Faucibus porta lacus fringilla vel</li>
                        <li>Aenean sit amet erat nunc</li>
                        <li>Eget porttitor lorem</li>
                    </ol>
                    <p>
                        HTML Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. 
                    </p>
                    <p>
                        Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum consequat mi. Donec fermentum. Pellentesque malesuada nulla a mi. Duis sapien sem, aliquet nec, commodo eget, consequat quis, neque. 
                    </p>
                    <p>
                        Aliquam faucibus, elit ut dictum aliquet, felis nisl adipiscing sapien, sed malesuada diam lacus eget erat. Cras mollis scelerisque nunc. Nullam arcu. Aliquam consequat. Curabitur augue lorem, dapibus quis, laoreet et, pretium ac, nisi. 
                    </p>
                    <p>
                        Aenean magna nisl, mollis quis, molestie eu, feugiat in, orci. In hac habitasse platea dictumst. 
                    </p>
                </div>
            </div>
            <!-- Conditions Panel Ends -->
        </div>
    </div>
</section>