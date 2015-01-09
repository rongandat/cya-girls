<!-- START PAGE -->
<div id="page">

    <!-- start page title -->
    <div class="page-title">
        <div style="z-index: 830;" class="in">
            <div class="titlebar">	
                <h2>PERMISSION</h2>
            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="content" style="z-index: 730;">
        <?php if (!empty($msg)) { ?>
            <div class="albox <?php echo $msg['status'] ?>" style="z-index: 290;">
                <?php echo $msg['message'] ?>
                <a class="close tips" href="#" original-title="close">close</a>
            </div>
        <?php } ?>
        <!-- START SIMPLE FORM -->
        <div class="simplebox grid740" style="z-index: 720;">
            <div class="titleh" style="z-index: 710;">
                <h3>Simple Form</h3>
                <div class="shortcuts-icons" style="z-index: 700;"></div>
            </div>
            <div class="body" style="z-index: 690;">
                <?php echo form_open() ?>
                <div class="st-form-line" style="z-index: 680;">	
                    <span class="st-labeltext">Permission Name</span>	
                    <?php echo form_input($textbox_input) ?> 
                    <div class="clear" style="z-index: 670;"></div>
                </div>

                <div class="st-form-line" style="z-index: 600;">	
                    <span class="st-labeltext">Access permission</span>	
                    <div class="input-area">
                        <?php foreach ($checkbox_access_input as $access_input) { ?>
                            <label class="margin-right10">
                                <div class="checker" id="uniform-checkbox1"><span><?php echo form_checkbox($access_input['input']) ?></span></div> <?php echo form_label($access_input['label']) ?>
                            </label><br/>
                        <?php } ?>
                    </div>
                    <div class="clear" style="z-index: 590;"></div> 
                </div>
                <div class="st-form-line" style="z-index: 600;">	
                    <span class="st-labeltext">Modify permission</span>	
                    <div class="input-area">
                        <?php foreach ($checkbox_modify_input as $modify_input) { ?>
                            <label class="margin-right10">
                                <div class="checker" id="uniform-checkbox1"><span><?php echo form_checkbox($modify_input['input']) ?></span></div> <?php echo form_label($modify_input['label']) ?>
                            </label><br/>
                        <?php } ?>
                    </div>
                    <div class="clear" style="z-index: 590;"></div> 
                </div>

                <div class="button-box" style="z-index: 460;">
                    <?php echo form_submit($input_submit) ?>
                    <?php echo form_reset($input_reset) ?>
                </div>

                <?php echo form_close() ?>
            </div>
        </div>
        <!-- END SIMPLE FORM -->


    </div>
</div>
<!-- END PAGE -->