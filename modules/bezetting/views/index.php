<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="<?php echo base_url(); ?>">Home</a> 
    </li> 
    <li><a href="#">bezetting</a></li>
</ul>
<div class="col-md-12">
    <div class="col-md-2">                      
    </div> 
    <div class="col-md-8">
        <div class="tiles">
            <a class="more" href="<?php echo base_url(); ?>index.php/bezetting/komposisicontroller/rekappegbyusia">
                <div class="tile double double-down bg-yellow"  id='divskpd'>
                    <div class="tile-body">
                        <i class="icon-bar-chart"></i>
                    </div>
                    <div class="tile-object">
                        <div class="name">
                            Bezetting Berdasarkan Usia
                        </div>
                    </div> 
                </div>
            </a>
            
            
             <a class="more" href="<?php echo base_url(); ?>index.php/bezetting/komposisicontroller/rekappetaeselon">
                <div class="tile bg-purple double-down">
                    <div class="tile-body">
                        <i class="icon-bar-chart"></i>
                    </div>
                    <div class="tile-object">
                        <div class="name">
                            Peta Eselon
                        </div>

                    </div>
                </div>    
            </a>
            
            
            <a class="more" href="<?php echo base_url(); ?>index.php/bezetting/komposisicontroller/rekappegbypangkat">
                <div class="tile   selected bg-red"  id='divpegawai'>
                    <div class="tile-body">
                        <i class="icon-bar-chart"></i>
                    </div>
                    <div class="tile-object">
                        <div class="name" >
                            Bezetting Pangkat
                        </div>

                    </div>
                </div>
            </a>
            <a class="more" href="<?php echo base_url(); ?>index.php/bezetting/komposisicontroller/rekappegbypendidikan">
                <div class="tile   bg-green">
                    <div class="tile-body">
                        <i class="icon-bar-chart"></i>
                    </div>
                    <div class="tile-object">
                        <div class="name">
                            Bezeting Pendidikan
                        </div>
                        <div class="number"></div>
                    </div>
                </div>
            </a>
            <a class="more" href="<?php echo base_url(); ?>index.php/bezetting/komposisicontroller/rekappegbyeselon">
                <div class="tile double bg-purple">
                    <div class="tile-body">
                        <i class="icon-bar-chart"></i>
                    </div>
                    <div class="tile-object">
                        <div class="name">
                            Bezeting Eselon
                        </div>

                    </div>
                </div>    
            </a>
            <a class="more" href="<?php echo base_url(); ?>index.php/bezetting/komposisicontroller/rekappegbyagama">
                <div class="tile   double bg-blue"  id='divskpd'>
                    <div class="tile-body">
                        <i class="icon-bar-chart"></i>
                    </div>
                    <div class="tile-object">
                        <div class="name">
                            Bezetting Agama
                        </div>
                    </div> 
                </div>
            </a>
            <a class="more" href="<?php echo base_url(); ?>index.php/bezetting/komposisicontroller/rekappegbykelamin">
                <div class="tile      bg-dark"  id='divpegawai'>
                    <div class="tile-body">
                        <i class="icon-bar-chart"></i>
                    </div>
                    <div class="tile-object">
                        <div class="name" >
                            Bezetting Jenis Kelamin
                        </div>

                    </div>
                </div>
            </a>
            <a class="more" href="<?php echo base_url(); ?>index.php/bezetting/komposisicontroller/rekappegbyjabatan">
                <div class="tile double  bg-red">
                    <div class="tile-body">
                        <i class="icon-bar-chart"></i>
                    </div>
                    <div class="tile-object">
                        <div class="name">
                            Bezeting Jenis Jabatan
                        </div>
                        <div class="number"></div>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-md-2">                      
    </div> 
</div> 
<div   id="popover_personil" style="display: none"   >
    <i class="icon-bar-chart"></i>
    <div class="tile-body details">                  
        <p>
            Jumlah Struktural:<span id='jstruk' class="number"></span>
        </p>
        <p>
            Jumlah Fungsional Umum:<span id='jfu' class="number" ></span>
        </p>
        <p>
            Jumlah Fungsional Khusus:<span id='jumlahft' class="number" ></span>
        </p>
    </div>
    <a class="more" style="color:white"  href="#">
        View more <i class="m-icon-swapright m-icon-white"></i>
    </a> 


</div>
<div id="popover_skpd" style="display: none" >
    <i class="icon-bar-chart"></i>
    <div>Jumlah SKPD : <span id='jumlahskpd'></span></div>
    <a class="more" style="color:white"   href="<?php echo base_url(); ?>index.php/sotk/sotkdata/index">
        View more <i class="m-icon-swapright m-icon-white"></i>
    </a> 
</div>