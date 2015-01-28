<h1 class="title"><?php echo $girl['title']; ?></h1>
<div class="profiletopbg">
    <span>
        <i class="fa fa-info red"></i>
        $<?php echo $girl['cost'] ?>
    </span>
    <span>
        <i class="fa fa-user red"></i>
        <?php echo $girl['views'] ?>  Views
    </span>

    <ul class="social-links flr">
        <li><a target="_blank" href="<?php echo!empty($girl['facebook']) ? $girl['facebook'] : '#' ?>" class="facebook"><i class="fa fa-facebook"></i></a></li>
        <li><a target="_blank" href="<?php echo!empty($girl['google_plus']) ? $girl['google_plus'] : '#' ?>" class="google-plus"><i class="fa fa-google-plus"></i></a></li>
        <li><a target="_blank" href="<?php echo!empty($girl['twitter']) ? $girl['twitter'] : '#' ?>" class="twitter"><i class="fa fa-twitter"></i></a></li>
        <li><a target="_blank" href="<?php echo!empty($girl['pinterest']) ? $girl['pinterest'] : '#' ?>" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
        <li><a target="_blank" href="<?php echo!empty($girl['home_page']) ? $girl['home_page'] : '#' ?>" class="rss"><i class="fa fa-rss"></i></a></li>
    </ul>
</div>
<div id="gallery" class="ad-gallery">
    <div class="ad-image-wrapper">
    </div>
    <div class="ad-controls">
    </div>
    <div class="ad-nav">
        <div class="ad-thumbs">
            <ul class="ad-thumb-list">
                <?php foreach ($images as $key => $image): ?>
                    <li>
                        <a href="<?php echo base_url('public/images/' . $image['image']) ?>">
                            <img height="100"  src="<?php echo base_url('public/images/small/' . $image['image']) ?>" class="image<?php echo $key ?>">
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>

<div>
    <table cellspacing="1" cellpadding="0" border="0" width="100%" class="profiletablebox">
        <tbody>
            <tr>
                <td>Phone number</td>
                <td><?php echo $girl['phone'] ?></td>
            </tr>
            <tr>
                <td>Location</td>
                <td>
                    <?php foreach ($locations as $location): ?>
                        <div class="project-terms">
                            <a href="<?php echo site_url('location/' . $location['id'] . '-' . convertTitle($location['name'])) ?>"><i class="fa fa-map-marker"></i> <?php echo $location['name'] ?></a>
                        </div>
                    <?php endforeach; ?>
                </td>
            </tr>
            <?php if (!empty($girl['birthday'])): ?>
                <tr>
                    <td>Age</td>
                    <td>
                        <?php
                        $cYear = date('Y', time());
                        $bYear = date('Y', strtotime($girl['birthday']));
                        echo $cYear - $bYear;
                        ?>
                    </td>
                </tr>
            <?php endif; ?>
            <?php foreach ($optionValue as $value): ?>
                <tr>
                    <td><?php echo $value['name'] ?></td>
                    <td>
                        <?php echo $value['value'] ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="lineheight">
    <?php echo $girl['content'] ?>
</div>


<script>

    $(function() {
        var galleries = $('.ad-gallery').adGallery({slideshow: {
                enable: true,
                autostart: true,
                speed: 5000,
                start_label: '',
                stop_label: '',
                // Should the slideshow stop if the user scrolls the thumb list?
                stop_on_scroll: true,
                // Wrap around the countdown
                countdown_prefix: '(',
                countdown_sufix: ')',
                onStart: function() {
                    // Do something wild when the slideshow starts
                },
                onStop: function() {
                    // Do something wild when the slideshow stops
                }
            }, });

        $('#switch-effect').change(
                function() {
                    galleries[0].settings.effect = $(this).val();
                    return false;
                }
        );
        $('#toggle-slideshow').click(
                function() {
                    galleries[0].slideshow.toggle();
                    return false;
                }
        );
        $('#toggle-description').click(
                function() {
                    if (!galleries[0].settings.description_wrapper) {
                        galleries[0].settings.description_wrapper = $('#descriptions');
                    } else {
                        galleries[0].settings.description_wrapper = false;
                    }
                    return false;
                }
        );
    });
</script>
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


<div class="tageskeyhd">Tags/Keywords:</div>

<?php if (!empty($tags)): ?>
    <div>
        <ul class="tagskeylink">
            <?php foreach ($tags as $tag): ?>
                <li><a href="<?php echo site_url('girls/tag/' . $tag['id'] . '-' . convertTitle($tag['name'])); ?>"><?php echo $tag['name'] ?></a></li>
            <?php endforeach; ?>
        </ul>
        <div class="clr"></div>
    </div>
<?php endif; ?>