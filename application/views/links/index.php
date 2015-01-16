<div class="col-md-9 main">
    <div id="isotope-portfolio-container" class="row">
        <p class="padding-25">
            Greetings, if you would like to link with our website, simply provide us with your banner 468×60.

            Please note that you must link back to us with one of our banners, which we will provide you. For more information please contact <?php echo $configs['email_config']; ?>
        </p>
        <?php foreach ($links as $link): ?>
            <p class="padding-25">
                <?php if (!empty($link['name'])): ?>
                    <a target="_blank" href="<?php echo $link['url'] ?>"><?php echo $link['name'] ?></a>
                    <br>
                <?php endif; ?>
                <?php if (!empty($link['image']) || !empty($link['image_link'])): ?>
                    <a target="_blank" href="<?php echo $link['url'] ?>">
                        <?php if (!empty($link['image'])): ?>
                            <img border="0" src="<?php echo base_url('public/images/links/' . $link['image']) ?>" alt="<?php echo $link['name'] ?>" title="<?php echo $link['name'] ?>">
                        <?php elseif (!empty($link['image_link'])): ?>
                            <img border="0" src="<?php echo $link['image_link'] ?>" alt="<?php echo $link['name'] ?>" title="<?php echo $link['name'] ?>">
                        <?php endif; ?>
                    </a>
                <?php endif; ?>
            </p>
        <?php endforeach; ?>
    </div>
    <!-- /.isotope-portfolio-container -->
    <!-- /.row -->
</div>

