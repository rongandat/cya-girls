<div class="sidebar">
    <h1 class="title">
        Web cams
    </h1>
    <?php if (!empty($sbbanners)): ?>
        <div class="webcam">
            <?php foreach ($sbbanners as $banner): ?>
                <div class="wc-img">
                    <a target="__blank" href="<?php echo $banner['url'] ?>" title="<?php echo $banner['name'] ?>">
                        <?php if (!empty($banner['image'])): ?>
                            <img border="0" width="220" src="<?php echo base_url('public/images/banners/' . $banner['image']) ?>">
                        <?php elseif (!empty($banner['image_link'])): ?>
                            <img border="0" width="220" src="<?php echo $banner['image_link'] ?>">
                        <?php endif; ?>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <div class="locations">
        <div class="header">Location area link space</div>
        <div class="location-area">
            <?php foreach ($tab_locations as $location): ?>
                <a href="<?php echo site_url('location/' . $location['id'] . '-' . convertTitle($location['name'])) ?>"><?php echo $location['name'] ?></a>
            <?php endforeach; ?>
            <div class="clb"></div>
        </div>
    </div>
</div><!-- /.sidebar -->