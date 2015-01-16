<div class="col-md-3 sidebar">
    <div class="widget search">
        <form class="search-form" action="<?php echo site_url('search') ?>">
            <input type="text" placeholder="Search ..." class="form-control" name="search" value="<?php echo!empty($search_text) ? $search_text : '' ?>">
        </form>
    </div>
    <!-- /.search -->                        
    <div class="widget sample-pages">
        <div class="subpage-title">
            <h5>Webcams</h5>
        </div>
        <a target="_blank" href="http://www.shemale.com/services/directlinkhandler.ashx?WID=124642885005&amp;ptype=5&amp;promocode=SM230gal">
            <img src="<?php echo base_url('public/images/190_230_bb1_tranny.gif') ?>"/>
        </a>
    </div>
    <?php if(!empty($tab_locations)): ?>
    <div class="widget sample-pages">
        <div class="subpage-title">
            <h5>Locations</h5>
        </div>
        <ul class="widget-list">
            <?php foreach ($tab_locations as $location): ?>
            <li><a href="<?php echo site_url('location/'.$location['id'].'-'.  convertTitle($location['name'])) ?>"><?php echo $location['name'] ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php endif; ?>
    <?php if(!empty($tab_tags)): ?>
    <div class="widget tagcloud">
        <div class="subpage-title">
            <h5>Some Tags</h5>
        </div>
        <ul class="tagcloud-list">
            <?php foreach ($tab_tags as $tag): ?>
            <li><a href="<?php echo site_url('girls/tag/'.$tag['id'].'-'.  convertTitle($tag['name'])) ?>"><?php echo $tag['name'] ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php endif; ?>
    <!-- /.sample-pages -->
</div>