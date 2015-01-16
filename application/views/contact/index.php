<section id="google-map" class="section google-map pad-top-50">
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
<!-- /#google-map -->
<section id="contact-us" class="pad-25">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="visit-us pad-top-25">
                    <div class="subpage-title">
                        <h5><i class="fa fa-compass"></i> Visit Us</h5>
                    </div>
                    <address>
                        <strong><?php echo $configs['company'] ?></strong><br>
                        <?php echo $configs['address'] ?>
                    </address>
                </div>
                <div class="contact-numbers pad-top-25">
                    <div class="subpage-title">
                        <h5><i class="fa fa-phone"></i> Contact</h5>
                    </div>
                    <address>
                        Phone: <?php echo $configs['phone'] ?><br>
                        Fax: <?php echo $configs['fax'] ?><br>
                        <a href="mailto:<?php echo $configs['email_config'] ?>"><?php echo $configs['email_config'] ?></a>
                    </address>
                </div>
            </div>
            <div class="col-md-8">
                <form class="contact-form pad-25">
                    <div class="subpage-title">
                        <h5>Get In Touch</h5>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <input class="form-control" placeholder="Name (required)" type="text">
                        </div>
                        <div class="col-md-4">
                            <input class="form-control" placeholder="Email (required)" type="text">
                        </div>
                        <div class="col-md-4">
                            <input class="form-control" placeholder="Subject (Optional)" type="text">
                        </div>
                    </div>
                    <!-- row-fluid -->
                    <textarea class="form-control" placeholder="Your Message (required)" rows="3"></textarea>
                    <button class="btn btn-flat flat-color btn-rounded">Submit Message</button>
                </form>
                <!-- /.contact-form -->
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
<!-- /#contact-us -->