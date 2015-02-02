<h1 class="title"><?php echo $header_title; ?></h1>
<div class="inputcount bottomBder">
    <div class="submitbutton">
        <div class="flbox"><a class="btn btn-danger" href="<?php echo site_url('manager/form') ?>">Add new girl</a></div>
        <div class="clb"></div>
    </div>
</div>
<table id="list-orders" class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Image</th>
            <th>Name</th>   
            <th>$Cost</th>
            <th>Date Add</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>
<div class="submitbutton">
    <div class="rightbox">
        <a class="btn btn-danger" href="<?php echo site_url('manager/profile') ?>">Profile</a>
    </div>
    <div class="clb"></div>
</div>
<script>

    var list_orders = $('#list-orders').dataTable({
        "bLengthChange": "table-header",
        "bProcessing": true,
        "bServerSide": true,
        "sAjaxSource": '<?php echo site_url('ajax/managerGirlList') ?>',
        "aoColumns": [
            {"sTitle": "Id", "iDataSort": "id", "mData": "id", "bSearchable": false},
            {"sTitle": "Image", "bSortable": false, "mData": "image", "bSearchable": false, "mRender": render_image},
            {"sTitle": "Name", "bSortable": false, "iDataSort": "fullname", "mData": "fullname", "bSearchable": false},
            {"sTitle": "$Cost", "bSortable": false, "iDataSort": "cost", "mData": "cost"},
            {"sTitle": "Date Add", "bSortable": false, "iDataSort": "date_added", "mData": "date_added"},
            {"sTitle": "Action", "bSortable": false, "mData": "action", "bSearchable": false, "mRender": render_action_orders},
        ],
    });

    /**
     * render_image
     */
    function render_image(data, type, full) {
        var html = '';
        html = '<img height=80 src="<?php echo base_url() ?>/public/images/small/' + data + '"/>';
        return html;
    }
    /**
     * render_status_orders
     */
    function render_status_orders(data, type, full) {
        var html = '';
        if (full.status == 1) {
            html = '<span class="pending-order">Pendding</span>';
        }
        if (full.status == 2) {
            html = '<span class="complate-order">Completed</span><i class="fa fa-check icon-complate"></i>';
        }
        if (full.status == 3) {
            html = '<span class="pending-order">Rejected</span>';
        }
        return html;
    }


    /**
     * render_action
     */
    function render_action_orders(data, type, full) {
        var html = '';
        html = '<div class="action-buttons">';
        html += '<a href="' + base_url + '/manager/form/' + full.id + '/' + full.user_id + '" class="red"><i class="fa fa-edit bigger-130"></i></a>';
        html += '</div>';


        return html;
    }


</script>