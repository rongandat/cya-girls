<div class="col-md-9 main">
    <div id="isotope-portfolio-container" class="row">
        <?php foreach ($webcams as $webcam): ?>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="portfolio-item">
                    <div class="portfolio-thumb">
                        <a href="<?php echo $webcam['link']; ?>">
                            <img alt="1st Portfolio Thumb" class="img-responsive" src="<?php echo $webcam['image_link']; ?>">
                        </a>
                    </div>
                    <div class="portfolio-details webcam">
                        <a href="<?php echo $webcam['link']; ?>">
                            <h5><?php echo $webcam['name']; ?></h5>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- /.isotope-portfolio-container -->
    <!-- /.row -->
</div>

