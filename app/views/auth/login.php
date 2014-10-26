<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>SPK | BKPP Kabupaten Bandung</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="BKPP Kabupaten Bandung" /> 
        <!-- Le styles -->
        <link href="<?php echo base_url(); ?>/static/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>/static/assets/css/style-metronic.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>/static/assets/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>/static/assets/css/style-responsive.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>/static/assets/css/pages/login-soft.css" rel="stylesheet" type="text/css"/>          
        <script src="<?php echo base_url(); ?>/static/assets/plugins/jquery-1.10.2.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>/static/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>/static/assets/plugins/jquery-validation/dist/jquery.validate.min.js"></script> 
        <script type="text/javascript" src="<?php echo base_url(); ?>/static/assets/plugins/jquery-validation/dist/additional-methods.min.js"></script> 

        <!--[if lt IE 9]>
          <script src="<?php echo base_url(); ?>/static/assets/js/html5shiv.js"></script>
        <![endif]-->
    <body class='login'>  
        <div class="col-md-4">                      
        </div> 
        <div class="col-md-4"> 
            <div class="logo"   >
                <img style="text-align: center" src="<?php echo base_url(); ?>/static/assets/img/logologin.png" alt="logo" class="img-responsive" />  
            </div>
            <div class="content">
                <?php echo form_open("auth/login"); ?>
                <div class="form-group"> 
                    <label class="control-label visible-ie8 visible-ie9">Username</label>
                    <div class="input-icon">
                        <i class="icon-user"></i>
                        <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" style="width: 100%;height: 35px;" name="identity"  id="identity"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <div class="input-icon">
                        <i class="icon-lock"></i>
                        <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password"  id="password" style="width: 100%;height: 35px;" />
                    </div>
                </div>

                <div class="form-actions">                     
                    <button type="submit" class="btn  blue pull-right">
                        Login <i class="m-icon-swapright m-icon-white"></i>
                    </button>               
                </div>

                <?php echo form_close(); ?>  
            </div>  
            <div class="copyright">
                2014 &copy; Sistem Informasi Penilaian Kinerja - BKPP Kabupaten Bandung.
            </div>
        </div>
        <div class="col-md-4">                      
        </div> 

    </body>
</html>