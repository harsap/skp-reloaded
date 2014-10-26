<script src="<?php echo base_url(); ?>/static/js/bezeting/grafikkomposisi.js" type="text/javascript"></script> 
<script   type="text/javascript">
    $(document).ready(function() {
        grafikkomposisiagama(5,"<?php echo base_url(); ?>index.php/bezetting/komposisicontroller/rekappegbypangkatjson/<?php echo $idsatker[0]->satuan_kerja_id; ?>", "container", "Komposisi Pegawai Satker <?php echo $idsatker[0]->satuan_kerja_nama; ?> Tahun <?php echo date('Y'); ?>", "Pangkat","<?php echo base_url(); ?>","<?php echo $idsatker[0]->satuan_kerja_id; ?>");
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
        <a href="<?php echo base_url(); ?>index.php/bezetting/komposisicontroller/rekappegbypangkat">bezetting berdasar Pangkat </a>
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">grafik bezetting Pangkat</a></li>
</ul>
<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
<div style="display:none;">
    <a  id="various1" class="fancybox  fancybox.iframe" href="#" title="Data pegawai <?php echo $idsatker[0]->satuan_kerja_nama; ?> berdasarkan Pangkat"></a>
</div>