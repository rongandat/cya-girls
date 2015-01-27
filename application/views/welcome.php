<h1 class="title">Japan schemale escort</h1>
<ul class="grid-view">
    <?php foreach ($girls as $girl): ?>
        <li>
            <div class="inimgbox">
                <a href="<?php echo site_url('girls/' . $girl['id'] . '-' . convertTitle($girl['title'])) ?>">
                    <img height="210"  alt="Member Image" onerror="this.src='<?php echo base_url() . 'public/images/girl-512.gif' ?>'"  src="<?php echo base_url('public/images/medium/' . $girl['image']) ?>">
                </a>
            </div>
            <div class="inimagetext"><a href="<?php echo site_url('girls/' . $girl['id'] . '-' . convertTitle($girl['title'])) ?>"><?php echo $girl['fullname'] ?></a></div>
            <div class="inimagetext"><a href="<?php echo site_url('girls/' . $girl['id'] . '-' . convertTitle($girl['title'])) ?>">$<?php echo $girl['cost'] ?></a></div>
            <?php foreach ($girl['locations'] as $location): ?>
                <div class="inimagetext">
                    <a href="<?php echo site_url('location/' . $location['id'] . '-' . convertTitle($location['name'])) ?>"><i class="fa fa-map-marker red"></i>
                        <?php echo $location['name'] ?>
                    </a>
                </div>
            <?php endforeach; ?>

        </li>
    <?php endforeach; ?>
</ul>