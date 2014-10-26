<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en" class="no-js"> <!--<![endif]--> 
    <head>
        <meta charset="utf-8" />
        <title>SPK | BKPP Kabupaten Bandung</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="" name="sistem penilaian kinerja" />
        <meta content="" name="BKPP Kabupaten Bandung" /> 
        <?php $this->load->view('includelib'); ?>
        <link rel="shortcut icon" href="<?php echo base_url(); ?>static/assets/ico/favicon.ico" />
    </head> 
    <body class="page-header-fixed page-full-width" >

        <div id='header' class="header navbar navbar-inverse navbar-fixed-top"  >
            <!-- BEGIN TOP NAVIGATION BAR -->
            <div class="header-inner">
                <?php $this->load->view('navbar'); ?> 
            </div>
            <!-- END TOP NAVIGATION BAR -->
        </div>
        <!-- END HEADER -->
        <div class="clearfix"></div>
        <!-- BEGIN CONTAINER -->   
        <div class="page-container" >
            <!-- BEGIN PAGE -->
            <div class="page-content">
                <?php $this->load->view('sidebar'); ?>   
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-1">
                            <img src="<?php echo base_url(); ?>static/assets/img/logo_kab_bdg.png" alt="logo" class="img-responsive">
                        </div>
                        <div class="col-md-11">
                            <h3 class="page page-title">Sistem Informasi Penilaian Kinerja </h3>   
                             <h5 >BKPP Kabupaten Bandung</h5>   
                        </div>
                    </div>
                </div>
                <p>&nbsp;</p>
                <?php echo $contents; ?>  
            </div>     
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN FOOTER -->
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