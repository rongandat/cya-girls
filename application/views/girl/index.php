<div class="col-md-9 main">
    <div class="row">
        <div class="col-sm-6 images-block">
            <p>
                <a class="portfolio-zoom" rel="prettyPhoto[pp_girl]" href="<?php echo base_url('public/images/' . $girl['image']) ?>">
                    <img onerror="this.src='<?php echo base_url() . 'public/images/girl-512.gif' ?>'" class="img-responsive thumbnail" alt="<?php $girl['image'] ?>" src="<?php echo base_url('public/images/medium/' . $girl['image']) ?>">
                </a>
            </p>
            <ul id="list_thumb" class="list-unstyled list-inline">
                <?php foreach ($images as $image): ?>
                    <li>
                        <a class="portfolio-zoom" rel="prettyPhoto[pp_girl]" href="<?php echo base_url('public/images/' . $image['image']) ?>">
                            <img class="img-responsive thumbnail" width="100" alt="Image" src="<?php echo base_url('public/images/small/' . $image['image']) ?>">
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
            <div class="control-nav">
                <span id="portfolio-prev-thumb" class="prev black"><i class="fa fa-angle-left"></i></span>
                <span id="portfolio-next-thumb" class="next black"><i class="fa fa-angle-right"></i></span>
            </div>
        </div>
        <div class="col-md-6">
            <ul class="social-links flr">
                <li><a target="_blank" href="<?php echo!empty($girl['facebook']) ? $girl['facebook'] : '#' ?>" class="facebook"><i class="fa fa-facebook"></i></a></li>
                <li><a target="_blank" href="<?php echo!empty($girl['google_plus']) ? $girl['google_plus'] : '#' ?>" class="google-plus"><i class="fa fa-google-plus"></i></a></li>
                <li><a target="_blank" href="<?php echo!empty($girl['twitter']) ? $girl['twitter'] : '#' ?>" class="twitter"><i class="fa fa-twitter"></i></a></li>
                <li><a target="_blank" href="<?php echo!empty($girl['pinterest']) ? $girl['pinterest'] : '#' ?>" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
                <li><a target="_blank" href="<?php echo!empty($girl['home_page']) ? $girl['home_page'] : '#' ?>" class="rss"><i class="fa fa-rss"></i></a></li>
            </ul>
            <div class="clearfix"></div>
            <div class="pad-25">
                <div class="subpage-title">
                    <h5>Details</h5>
                </div>
                <ul class="project-details-list">
                    <li>
                        <h6>Phone number:</h6>
                        <div class="project-terms">
                            <?php echo $girl['phone'] ?>
                        </div>
                    </li>
                    <li>
                        <h6>Location:</h6>
                        <?php foreach ($locations as $location): ?>
                            <div class="project-terms">
                                <a href="<?php echo site_url('location/index/' . $location['id']) ?>"><i class="fa fa-map-marker"></i> <?php echo $location['name'] ?></a>
                            </div>
                        <?php endforeach; ?>
                    </li>
                    <?php if (!empty($girl['birthday'])): ?>
                        <li>
                            <h6>Age:</h6>
                            <div class="project-terms">
                                <?php
                                $cYear = date('Y', time());
                                $bYear = date('Y', strtotime($girl['birthday']));
                                echo $cYear - $bYear;
                                ?>
                            </div>
                        </li>
                    <?php endif; ?>
                    <?php foreach ($optionValue as $value): ?>
                        <li>
                            <h6><?php echo $value['name'] ?></h6>
                            <div class="project-terms">
                                <?php echo $value['value'] ?>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php if (!empty($tags)): ?>
                <div class="pad-25">
                    <div class="subpage-title">
                        <h5>Tags</h5>
                    </div>
                    <ul class="tagcloud-list">
                        <?php foreach ($tags as $tag): ?>
                            <li><a href="<?php echo site_url('girls/tag/' . $tag['id']); ?>"><?php echo $tag['name'] ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </div>
        <div class="clearfix"></div>
        <div class="pad-25">
            <div class="subpage-title">
                <h5>Description</h5>
            </div>
            <div class="content">
                <?php echo $girl['content'] ?>
            </div>

        </div>
        <div class="clearfix"></div>
        <?php if (!empty($girl['map'])): ?>
            <div class="pad-25">
                <div id="map_canvas" style="width:100%; height:240px; margin: 5px 10px 0px 0px;"></div>
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
                    geocoder.geocode({"address": "<?php echo $girl['map'] ?>"}, function(results, status) {
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
        <?php endif; ?>
        <div class="clearfix"></div>
        <?php if (!empty($locationGirls)): ?>
            <div class="pad-25">
                <div class="subpage-title">
                    <h5>Releted Location</h5>
                    <!-- Controls -->
                    <div class="controls">
                        <span id="portfolio-prev" class="prev black"><i class="fa fa-angle-left"></i></span>
                        <span id="portfolio-next" class="next black"><i class="fa fa-angle-right"></i></span>
                    </div>
                </div>
                <div class="row flush">
                    <div id="caroufredsel-portfolio-container">
                        <?php foreach ($locationGirls as $locGirl): ?>
                            <div class="col-xs-12 col-sm-6 col-md-4 portfolio-item-wrapper">
                                <div class="portfolio-item">
                                    <div class="portfolio-thumb">
                                        <a href="<?php echo site_url('girls/index/' . $locGirl['id']) ?>">
                                            <img src="<?php echo base_url('public/images/small/' . $locGirl['image']) ?>" class="img-responsive">
                                        </a>
                                    </div>
                                    <div class="portfolio-details">
                                        <h5><a href="<?php echo site_url('girls/index/' . $locGirl['id']) ?>"><?php echo $locGirl['fullname'] ?></a></h5>
                                        <p><?php echo '$' . $girl['cost'] ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <!-- /.portfolio-item-wrapper -->
                    </div>
                    <!-- /.caroufredsel-portfolio-container -->
                </div>

            </div>
        <?php endif; ?>
    </div>

</div>