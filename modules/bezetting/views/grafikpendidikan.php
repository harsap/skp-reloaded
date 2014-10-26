<script src="<?php echo base_url(); ?>/static/js/bezeting/grafikkomposisi.js" type="text/javascript"></script> 
<script   type="text/javascript">
    $(document).ready(function() {
        grafikkomposisiagama(6,"<?php echo base_url(); ?>index.php/bezetting/komposisicontroller/rekappegbypendidikajson/<?php echo $idsatker[0]->satuan_kerja_id; ?>", "container", "Komposisi Pegawai Satker <?php echo $idsatker[0]->satuan_kerja_nama; ?> Tahun <?php echo date('Y'); ?>", "Pendidikan","<?php echo base_url(); ?>","<?php echo $idsatker[0]->satuan_kerja_id; ?>");
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
        <a href="<?php echo base_url(); ?>index.php/bezetting/komposisicontroller/rekappegbypendidikan">bezetting berdasar Pendidikan </a>
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">grafik bezetting Pendidikan</a></li>
</ul>
<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
<div style="display:none;">
    <a  id="various1" class="fancybox  fancybox.iframe" href="#" title="Data pegawai <?php echo $idsatker[0]->satuan_kerja_nama; ?> berdasarkan Pendidikan"></a>
</div>