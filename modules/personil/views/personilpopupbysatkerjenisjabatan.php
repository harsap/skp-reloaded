<ul class="page-breadcrumb breadcrumb">
    <li>
        <i class="icon-home"></i>
        Home  
        <i class="icon-angle-right"></i>
    </li>     
    <li>
        Daftar Pegawai   
    </li>   
</ul> 
<h4 class=" text-center title">Daftar Pegawai Pemerintah Kabupaten Bandung</h4>
<div class="row ">
    <table id='stattable' class="table table-bordered table-striped table-condensed flip-content ">       
        <thead  >            
            <tr>                 
                <th>Nama</th>
                <th>NIP</th>
                <th>Jabatan</th>
                <th>Golongan</th>
                <th>Eselon</th>
                <th>Instansi</th>
            </tr>
        </thead>
        <tbody>             
        </tbody> 
    </table>
</div>

<script src="<?php echo base_url(); ?>/static/js/personil/pegawabysatkerjenisjabatan.js" type="text/javascript"></script> 
<script type="text/javascript">
    $(document).ready(function() {
        tampil();
    }); 
    function tampil() {
        gridpopupjenisjabatan('<?php echo base_url(); ?>index.php/personil/personildata/caripegjson', '<?php echo $idsatker; ?>', '<?php echo $idjabatan; ?>');
    }
</script>