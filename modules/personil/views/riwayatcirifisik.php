<ul class="page-breadcrumb breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="<?php echo base_url(); ?>">Home</a> 
        <i class="icon-angle-right"></i>
    </li>     
    <li>
        <a href="<?php echo base_url(); ?>index.php/personil/personildata/index">Daftar Pegawai </a>
        <i class="icon-angle-right"></i>
    </li>
     <li>
        <a href="<?php echo base_url(); ?>index.php/personil/personildata/indexperjenis/<?php echo $jenisjabatan; ?>">Daftar Pegawai Per Jenis Jabatan <?php echo get_nama_jenisjabatan($jenisjabatan); ?></a>
        <i class="icon-angle-right"></i>
    </li>
    <li>
        <a href="<?php echo base_url(); ?>index.php/personil/personildata/detailpersonil/<?php echo $jenisjabatan; ?>/<?php echo $peg->peg_id; ?>">Detail Pegawai </a>
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">Ciri-ciri fisik <?php echo $peg->peg_nama; ?></a></li>
</ul>
<div class="portlet box ">
    <div class="portlet-title"> 
    </div>
    <div class="portlet-body form">
        <form class="form-horizontal" role="form">
            <div class="row"></div>
            <h3 class="form-section">Ciri-ciri fisik pegawai</h3>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-3">Tinggi (cm):</label>
                        <div class="col-md-9">
                            <p class="form-control-static"> <?php echo is_object($ketbadan)? $ketbadan->tinggi:''; ?></p>
                        </div>
                    </div>
                </div>
            </div>
             <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-3">Berat (Kg):</label>
                        <div class="col-md-9">
                            <p class="form-control-static"> <?php echo is_object($ketbadan)?$ketbadan->berat:''; ?></p>
                        </div>
                    </div>
                </div>
            </div>
             <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-3">Rambut:</label>
                        <div class="col-md-9">
                            <p class="form-control-static"> <?php echo is_object($ketbadan)?$ketbadan->rambut:"-"; ?></p>
                        </div>
                    </div>
                </div>
            </div>
             <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-3">Bentuk Muka:</label>
                        <div class="col-md-9">
                            <p class="form-control-static"> <?php echo is_object($ketbadan)?$ketbadan->bentuk_muka:"-";  ?></p>
                        </div>
                    </div>
                </div>
            </div>
             <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-3">Warna Kulit:</label>
                        <div class="col-md-9">
                            <p class="form-control-static"> <?php echo  is_object($ketbadan)?$ketbadan->warna_kulit:"-"; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-3">Ciri-ciri Khas:</label>
                        <div class="col-md-9">
                            <p class="form-control-static"> <?php echo  is_object($ketbadan)?$ketbadan->ciri_khas:"-"; ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label col-md-3">Cacat Tubuh:</label>
                        <div class="col-md-9">
                            <p class="form-control-static"> <?php echo  is_object($ketbadan)?$ketbadan->cacat_tubuh:"-"; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script src="<?php echo base_url(); ?>/static/js/personil/alamatriwayat.js" type="text/javascript"></script> 
<script type="text/javascript">
    $(document).ready(function() {
          linkriwayat("<?php echo $jenisjabatan; ?>","<?php echo $peg->peg_id; ?>", "<?php echo base_url(); ?>");
    });

</script>