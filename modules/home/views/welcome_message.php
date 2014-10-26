<script src="<?php echo base_url(); ?>/static/js/home/dashboard.js"></script>   
<script type="text/javascript">
    $(document).ready(function() {
        gettotalskpd("<?php echo base_url(); ?>index.php/home/welcome/gettotalskpd", "jumlahskpd");
        gettotalskpd("<?php echo base_url(); ?>index.php/home/welcome/gettotalpegawaibyjenisjabatan?ft=3", "jumlahft");
        gettotalskpd("<?php echo base_url(); ?>index.php/home/welcome/gettotalpegawaibyjenisjabatan?struk=2", "jstruk");
        gettotalskpd("<?php echo base_url(); ?>index.php/home/welcome/gettotalpegawaibyjenisjabatan?fu=4", "jfu");
        tampilpopover();

    });
</script>
<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="#">Home</a> 

    </li> 
</ul>
<div class="col-md-12">
    <div class="col-md-3">                      
    </div> 
    <div class="col-md-6">
        <div class="tiles">
            <a class="more" href="<?php echo base_url(); ?>index.php/sotk/sotkdata/index">
                <div class="tile double double-down bg-blue"  id='divskpd'>
                    <div class="tile-body">
                        <i class="icon-cogs"></i>
                    </div>
                    <div class="tile-object">
                        <div class="name">
                            SOTK
                        </div>
                    </div> 
                </div>
            </a>

            <a class="more" href="<?php echo base_url(); ?>index.php/personil/personildata/index">
                <div class="tile   selected bg-red"  id='divpegawai'>
                    <div class="tile-body">
                        <i class="icon-user"></i>
                    </div>
                    <div class="tile-object">
                        <div class="name" >
                            Pegawai
                        </div>

                    </div>
                </div>
            </a>


            <a href="<?php echo base_url(); ?>index.php/bezetting/komposisicontroller/index"> 
                <div class="tile   bg-green">
                    <div class="tile-body">
                        <i class="icon-bar-chart"></i>
                    </div>
                    <div class="tile-object">
                        <div class="name">
                            Bezeting
                        </div>
                        <div class="number"></div>
                    </div>
                </div>
            </a>

            <a href="<?php echo base_url(); ?>index.php/jabatan/jabatancontroller/index"> 
                <div class="tile double bg-purple">
                    <div class="tile-body">
                        <i class="icon-briefcase"></i>
                    </div>
                    <div class="tile-object">
                        <div class="name">
                            Jabatan
                        </div>

                    </div>
                </div>    
            </a>
        </div>
    </div>
    <div class="col-md-3">                      
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