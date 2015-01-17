<div class="col-md-9 main">
    <div id="isotope-portfolio-container" class="row">
        <?php foreach ($webcamps as $webcamp): ?>
            <div class="col-xs-12 col-sm-6 col-md-3">
                <div class="portfolio-item">
                    <div class="portfolio-thumb">
                        <a href="<?php echo $webcamp['link']; ?>">
                            <img alt="1st Portfolio Thumb" class="img-responsive" src="<?php echo $webcamp['image_link']; ?>">
                        </a>
                    </div>
                    <div class="portfolio-details webcamp">
                        <a href="<?php echo $webcamp['link']; ?>">
                            <h5><?php echo $webcamp['name']; ?></h5>
                        </a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- /.isotope-portfolio-container -->
    <!-- /.row -->
</div>

