<script src="<?php echo base_url(); ?>/static/js/bezeting/grafikkomposisi.js" type="text/javascript"></script> 
<script   type="text/javascript">
    $(document).ready(function() {
        grafikkomposisiagama(3,"<?php echo base_url(); ?>index.php/bezetting/komposisicontroller/rekappegbyjabatanjson/<?php echo $idsatker[0]->satuan_kerja_id; ?>", "container", "Komposisi Pegawai Satker <?php echo $idsatker[0]->satuan_kerja_nama; ?> Tahun <?php echo date('Y'); ?>", "Jenis Jabatan","<?php echo base_url(); ?>","<?php echo $idsatker[0]->satuan_kerja_id; ?>");
            });
</script> 
<ul class="page-breadcrumb breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="<?php echo base_url(); ?>">Home</a> 
        <i class="icon-angle-right"></i>
    </li>     
    <li>
        <a href="<?php echo base_url(); ?>index.php/bezetting/komposisicontroller/index">bezetting </a>
        <i class="icon-angle-right"></i>
    </li>
     <li>
        <a href="<?php echo base_url(); ?>index.php/bezetting/komposisicontroller/rekappegbyjabatan">bezetting berdasar jabatan </a>
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">grafik bezetting jabatan</a></li>
</ul>
<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
<div style="display:none;">
    <a  id="various1" class="fancybox  fancybox.iframe" href="<?php echo base_url(); ?>index.php/personil/personildata/popuppegbysatkerjabatan/<?php echo $idsatker[0]->satuan_kerja_id; ?>" title="Data pegawai <?php echo $idsatker[0]->satuan_kerja_nama; ?> berdasarkan Jenis Jabatan"></a>
</div>