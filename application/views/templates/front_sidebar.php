<div class="sidebar">
    <h1 class="title">
        Web cams
    </h1>
    <div class="webcam">
        <div class="wc-img">
            <img border="0" width="220" src="<?php echo base_url('public/images/34-LondonTS220.jpg') ?>">
        </div>

        <div class="wc-img">
            <img border="0" width="220" src="<?php echo base_url('public/images/45-riorelax_220x318-eng.gif') ?>">
        </div>
    </div>

    <div class="locations">
        <div class="header">Location area link space</div>
        <div class="location-area">
            <?php foreach ($tab_locations as $location): ?>
            <a href="<?php echo site_url('location/'.$location['id'].'-'.  convertTitle($location['name'])) ?>"><?php echo $location['name'] ?></a>
            <?php endforeach; ?>
            <div class="clb"></div>
        </div>
    </div>
</div><!-- /.sidebar -->