<div class="col-md-9 main">
    <div id="isotope-portfolio-container" class="row">
        <?php foreach ($girls as $girl): ?>
            <div class="col-sm-6 col-md-4 team-member-wrap">
                <div class="team-member">
                    <div class="member-thumb">
                        <a href="<?php echo site_url('girls/index/' . $girl['id']) ?>">
                            <img alt="Member Image" class="img-responsive" src="<?php echo base_url('public/images/medium/' . $girl['image']) ?>">
                        </a>
                    </div>
                    <div class="member-details">
                        <a href="<?php echo site_url('girls/index' . $girl['id']) ?>">
                            <h4 class="member-name"><?php echo $girl['fullname'] ?></h4>
                        </a>
                        <span class="position">$<?php echo $girl['cost'] ?></span>
                        <?php foreach ($girl['locations'] as $location): ?>
                            <p>
                                <a href="<?php echo site_url('location/index/' . $location['id']) ?>"><i class="fa fa-map-marker"></i>
                                    <?php echo $location['name'] ?>
                                </a>
                            </p>
                        <?php endforeach; ?>
                        <ul class="social-links">
                            <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="pinterest"><i class="fa fa-pinterest"></i></a></li>
                            <li><a href="#" class="rss"><i class="fa fa-rss"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- /.isotope-portfolio-container -->
    <!-- /.row -->
</div>

