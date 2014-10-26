<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="<?php echo base_url(); ?>">Sistem Informasi Penilaian KInerja</a> 
        <span class="icon-angle-right"></span>
    </li>    
    <li><a href="#">  Ubah Password</a></li>
</ul> 
<div id="infoMessage"><?php echo $message; ?></div>
 
<div class="portlet box red">
    <div class="portlet-title">
        <div class="caption"><i class="icon-cogs"></i>Ubah Password</div>         
    </div>
    <div class="portlet-body flip-scroll">
        <?php echo form_open("auth/change_password",array("class"=>"form-horizontal")); ?>
            <div class="form-group">
                <label class="col-md-3 control-label"> <?php echo lang('change_password_old_password_label', 'old_password'); ?> </label>
                <div class="col-md-4">
                     <?php echo form_input($old_password); ?>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3 control-label"><?php echo sprintf(lang('change_password_new_password_label'), $min_password_length); ?> </label>
                <div class="col-md-4">
                    <div class="input-group">
                       <?php echo form_input($new_password); ?>
                    </div>
                </div>
            </div>
         <div class="form-group">
                <label class="col-md-3 control-label">
                    <?php echo lang('change_password_new_password_confirm_label', 'new_password_confirm'); ?> </label>
                <div class="col-md-4">
                    <div class="input-group">
                       <?php echo form_input($new_password_confirm); ?>
                    </div>
                </div>
            </div>
            <div class="form-actions fluid">
                <div class="col-md-offset-3 col-md-9">
                   <?php echo form_input($user_id); ?>
                    <button class="btn blue" type="submit">Ubah</button>
                </div>
            </div>

        <?php echo form_close(); ?>
    </div>
</div> 