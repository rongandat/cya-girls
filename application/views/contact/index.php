<div class="contact-us" style="">
    <p>
        <strong><i class="fa fa-compass"></i> Visit Us:</strong> 
        <?php echo $configs['company'] ?>, <?php echo $configs['address'] ?>
    </p>
    <p> <strong><i class="fa fa-phone"></i> Phone:</strong> <?php echo $configs['phone'] ?></p>
    <p> <strong><i class="fa fa-fax"></i> Fax:</strong> <?php echo $configs['fax'] ?></p>
    <p> <strong><i class="fa fa-inbox"></i> Contact:</strong> <a href="mailto:<?php echo $configs['email_config'] ?>"><?php echo $configs['email_config'] ?></a></p>
</div>

<form class="contact-form " action="" method="post">
    <div class="row">
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger alert-dismissable">
                <h4>Oh snap! You got an error!</h4>
                <p>Change this and that and try again.</p>
                <ul>
                    <?php foreach ($errors as $key => $error): ?>
                        <li><strong><?php echo $key ?> field: </strong><?php echo $error ?></li>
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

        <div class="searchingNum">Get In Touch</div>
        <div class="inputcount">
            <div class="inputLeft rightGap">
                <div class="inputTxt">Name <span>*</span></div>
                <div class="inputTxtbox"><input type="text" value="<?php echo!empty($post['name']) ? $post['name'] : '' ?>" id="name" name="name"></div>
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
            <div class="inputfull">
                <div class="inputTxt">Subject</div>
                <div class="inputTxtbox"><input type="text" value="<?php echo!empty($post['subject']) ? $post['subject'] : '' ?>" id="subject" name="subject"></div>
            </div>
            <div class="clb"></div>
        </div>
        <div class="inputcount bottomBder">
            <div class="inputfull">
                <div class="inputTxt">Message <span>*</span></div>
                <div class="inputTxtbox">
                    <textarea class="form-control" name="message" rows="3"><?php echo!empty($post['message']) ? $post['message'] : '' ?></textarea>
                </div>
            </div>
            <div class="clb"></div>
        </div>
        <div class="createLogin">
            <input type="submit" value="Submit Message" class="btn btn-danger">
        </div>
    </div>
    <!-- row-fluid -->

</form>

<section id="google-map" class="section google-map">
    <div class="container">
        <div class="pad-25">
            <div id="map_canvas" style="width:100%; height:350px; margin: 5px 10px 0px 0px;"></div>
        </div>
        <div class="clearfix"></div>
        <script>
            (function($) {
                var map;
                var lat;
                var lng;
                var mapOptions;
                var geocoder;
                var address;
                var myLatlng;
                geocoder = new google.maps.Geocoder();
                geocoder.geocode({"address": "<?php echo $configs['address'] ?>"}, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        //lng = results[0].geometry.location.lng();
                        //lat = results[0].geometry.location.lat();
                        //myLatlng = new google.maps.LatLng(lat,lng);
                        myLatlng = results[0].geometry.location;
                        mapOptions = {
                            center: myLatlng,
                            zoom: 15,
                            mapTypeId: google.maps.MapTypeId.ROADMAP
                        };
                        map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
                        var marker = new google.maps.Marker({
                            position: myLatlng,
                            title: address
                        });
                        marker.setMap(map);
                    }
                    else {
                        alert("Address not found");
                    }
                });
                //Wait until the DOM is fully loaded
                $(document).ready(function() {
                    //Listen for the form submit
                    $(".showError").html("");
                });
            })(jQuery);
        </script>
    </div>
</section>