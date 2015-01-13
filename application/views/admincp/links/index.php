<div class="page-header">
    <h1>
        Link
    </h1>
</div><!-- /.page-header -->

<div class="row">
    <?php if (!empty($success)): ?>
        <div class="alert alert-block alert-success">
            <button data-dismiss="alert" class="close" type="button">
                <i class="ace-icon fa fa-times"></i>
            </button>

            <p>
                <strong>
                    <i class="ace-icon fa fa-check"></i>
                    Well done!
                </strong>
                <?php echo $success; ?>
            </p>
        </div>
    <?php endif; ?>
    <?php if (!empty($error)): ?>
        <div class="alert alert-danger">
            <button data-dismiss="alert" class="close" type="button">
                <i class="ace-icon fa fa-times"></i>
            </button>
            <?php echo $error ?>
            <br>
        </div>
    <?php endif; ?>
    <div class="col-xs-12">
        <div class="clearfix">
            <div class="pull-right tableTools-container">
                <div class="btn-group btn-overlap">
                    <div class="ui-jqgrid ColVis btn-group" title="" data-original-title="Show/hide columns">
                        <a href="<?php echo admin_url('links/update/') ?>" class="ui-pg-div ColVis_Button ColVis_MasterButton btn btn-white btn-info btn-bold"><span><i class="ui-icon ace-icon fa fa-plus-circle purple"></i></span></a>
                        <a href="javascript:void(0)" class="delete_all ui-pg-div ColVis_Button ColVis_MasterButton btn btn-white btn-info btn-bold"><span><i class="ui-icon ace-icon fa fa-trash-o red"></i></span></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-header">
            Results for "Link"
        </div>
        <table id="link_list" class="ui-jqgrid table table-striped table-bordered table-hover">
            <thead>

                <tr>

                    <th><input type="checkbox" id="checkall"></th>

                    <th>Name</th>

                    <th>Status</th>

                    <th>Action</th>

                </tr>

            </thead>
            <tbody>

                <?php foreach ($links as $link): ?>

                    <tr>

                        <td><input type="checkbox" name="link" value="<?php echo $link['id'] ?>"></td>
                        <td><?php echo $link['name'] ?></td>
                        <td>
                            <?php if ($link['status'] == 1): ?>
                                <span class="label label-sm label-success">Active</span>
                            <?php else: ?>
                                <span class="label label-sm label-warning">DeActive</span>
                            <?php endif; ?>
                        </td>

                        <td>
                            <a href="<?php echo admin_url('links/update/' . $link['id']) ?>" class="ui-pg-div ui-inline-edit"><i class="ui-icon ui-icon-pencil"></i></a>
                            <a rel="<?php echo $link['id'] ?>" href="javascript:void(0)" class="delete ui-pg-div ui-inline-del"><i class="ui-icon ui-icon-trash"></i></span></a>

                        </td>

                    </tr>

                <?php endforeach; ?>

            </tbody>
        </table>
        <div id="grid-pager"></div>

        <!-- PAGE CONTENT ENDS -->
    </div><!-- /.col -->
</div><!-- /.row -->
<script>
    $('#link_list').dataTable();

    /**
     * delete_item
     */
    function delete_all_item() {
        var checkedValues = $('input[name=link]:checked').map(function() {
            return this.value;
        }).get();
        var ids = checkedValues.join(',');
        window.link = '<?php echo admin_url('links/delete?ids=') ?>' + ids;
    }
    /**
     * delete_item
     */
    function delete_item(id) {
        window.link = '<?php echo admin_url('links/delete?ids=') ?>' + id;
    }
    $(document).ready(function() {
        //override dialog's title function to allow for HTML titles
        $.widget("ui.dialog", $.extend({}, $.ui.dialog.prototype, {
            _title: function(title) {
                var $title = this.links.title || '&nbsp;'
                if (("title_html" in this.links) && this.links.title_html == true)
                    title.html($title);
                else
                    title.text($title);
            }
        }));
        $(".delete").on('click', function(e) {
            e.preventDefault();
            var id = $(this).attr('rel');
            $("#dialog-confirm").removeClass('hide').dialog({
                resizable: false,
                width: '320',
                modal: true,
                title: "<div class='widget-header'><h4 class='smaller'><i class='ace-icon fa fa-exclamation-triangle red'></i> Empty the recycle bin?</h4></div>",
                title_html: true,
                buttons: [
                    {
                        html: "<i class='ace-icon fa fa-trash-o bigger-110'></i>&nbsp; Delete link",
                        "class": "btn btn-danger btn-minier",
                        click: function() {
                            delete_item(id);
                            $(this).dialog("close");
                        }
                    }
                    ,
                    {
                        html: "<i class='ace-icon fa fa-times bigger-110'></i>&nbsp; Cancel",
                        "class": "btn btn-minier",
                        click: function() {
                            $(this).dialog("close");
                        }
                    }
                ]
            });
        });
        $(".delete_all").on('click', function(e) {
            e.preventDefault();
            $("#dialog-confirm").removeClass('hide').dialog({
                resizable: false,
                width: '320',
                modal: true,
                title: "<div class='widget-header'><h4 class='smaller'><i class='ace-icon fa fa-exclamation-triangle red'></i> Empty the recycle bin?</h4></div>",
                title_html: true,
                buttons: [
                    {
                        html: "<i class='ace-icon fa fa-trash-o bigger-110'></i>&nbsp; Delete all select links",
                        "class": "btn btn-danger btn-minier",
                        click: function() {
                            delete_all_item();
                            $(this).dialog("close");
                        }
                    }
                    ,
                    {
                        html: "<i class='ace-icon fa fa-times bigger-110'></i>&nbsp; Cancel",
                        "class": "btn btn-minier",
                        click: function() {
                            $(this).dialog("close");
                        }
                    }
                ]
            });
        });
    })
</script>