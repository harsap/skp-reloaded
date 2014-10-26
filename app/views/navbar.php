
<!-- BEGIN HORIZANTAL MENU -->
<div class="hor-menu hidden-sm hidden-xs">
    <ul class="nav navbar-nav"  >
        <li>
            <a class="navbar-brand" href="<?php echo base_url(); ?>">   
                <span class="glyphicon glyphicon-home"></span> Beranda SKP
            </a>
        </li>

        <li  >
            <a       href="<?php echo base_url('formskp/formskpcontroller/index'); ?>">
                <span class="selected"></span>
                Sasaran Kerja Pegawai
               <?php /*    <i class="icon-angle-down"></i>   */ ?>  
            </a>
          <?php /*  <ul class="dropdown-menu">
                <li  ><a tabindex="-1" href="<?php echo base_url('skp/cetak'); ?>">Cetak Formulir SKP  </a> </li>
                <li  ><a tabindex="-1" href="<?php echo base_url('skp/pembuatan'); ?>">Pembuatan SKP  </a> </li>
                <li  ><a tabindex="-1" href="<?php echo base_url('skp/penilaian'); ?>">Penilaian SKP  </a> </li>               
            </ul>*/ ?>
        </li>

        <li>
            <a data-toggle="dropdown" data-hover="dropdown" data-close-others="true" class="dropdown-toggle" href="javascript:;">
                <span class="selected"></span>
                Perilaku Kerja 
                <i class="icon-angle-down"></i>     
            </a>
            <ul class="dropdown-menu">
                <li  ><a tabindex="-1" href="">Log Book  </a> </li>
                <li  ><a tabindex="-1" href="<?php echo base_url('ppk/penilaian') ?>">Penilaian Perilaku Kerja  </a> </li>  
            </ul>
        </li>

        <li>
            <a data-toggle="dropdown" data-hover="dropdown" data-close-others="true" class="dropdown-toggle" href="javascript:;">
                <span class="selected"></span>
                Cetak Hasil Penilaian 
                <i class="icon-angle-down"></i>     
            </a>
            <ul class="dropdown-menu">
                <li  ><a tabindex="-1" href="javascript:;">Log Book  </a> </li>
                <li  ><a tabindex="-1" href="javascript:;">Penilaian Perilaku Kerja  </a> </li>  
            </ul>
        </li>
    </ul>
</div>
<!-- END HORIZANTAL MENU -->
<!-- BEGIN RESPONSIVE MENU TOGGLER -->
<a href="javascript:;" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
    <img src="<?php echo base_url(); ?>/static/assets/img/menu-toggler.png" alt="" />  
</a>          
<!-- END RESPONSIVE MENU TOGGLER -->     
<!-- BEGIN TOP NAVIGATION MENU -->
<ul class="nav navbar-nav pull-right">
    <!-- BEGIN NOTIFICATION DROPDOWN -->


    <!-- BEGIN USER LOGIN DROPDOWN -->

    <?php $user = $this->ion_auth->get_data_user_by_id(); ?>
    <li class="dropdown user">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
            <span class="username"><?php echo $user->peg_nama; ?><span>/<span class="username"><?php echo $user->peg_nip_baru; ?></span>/<span class="username"><?php echo $user->name; ?></span>
                    <i class="icon-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url(); ?>auth/change_password"><i class="icon-key"></i> Ganti Password</a></li>
                        <li><a href="<?php echo base_url(); ?>auth/logout"><i class="icon-key"></i> Log Out</a></li> 
                    </ul>
                    </li> 
                    </ul>
                    <!-- END TOP NAVIGATION MENU -->
