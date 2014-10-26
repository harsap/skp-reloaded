<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8" />
        <title>EIS | BKPP Kabupaten Bandung</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="" name="eis" />
        <meta content="" name="bkpp kab bandung" /> 
        <?php $this->load->view('includelib'); ?>
        <link rel="shortcut icon" href="<?php echo base_url(); ?>/static/assets/img/korpri.ico" />
    </head>    
    <body class="page-header-fixed page-full-width">
        <div id='header' class="header navbar navbar-inverse navbar-fixed-top">
            
        </div>
        <div class="clearfix"></div>
        <div class="page-container" >
            <div class="page-content">
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-1">
                            <img src="<?php echo base_url(); ?>static/assets/img/logokabbdg.png" alt="logo" class="img-responsive" />
                        </div>
                        <div class="col-md-11">
                            <h4>Sistem Informasi Eksekutif </h4>
                            <small>
                                BKPP Kabupaten Bandung<br><br>
                            </small>
                        </div>
                    </div>
                </div>
                <div class="form-section"></div>
                <?php echo $contents; ?> 
            </div>
        </div>
        <div class="footer">
            <div class="footer-inner">
                2014 &copy; BKPP Kabupaten Bandung.
            </div>
            <div class="footer-tools">
                <a class="go-top" href="#">
                    <i class="icon-angle-up"></i>
                </a>
            </div>
        </div>
        <?php $this->load->view('includelibbawah'); ?>  
    </body> 
</html>