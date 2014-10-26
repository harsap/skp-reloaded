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

<script src="<?php echo base_url(); ?>/static/js/personil/pegawaijs.js" type="text/javascript"></script> 
<script type="text/javascript">
    $(document).ready(function() {
        tampil();
    });
    $(document).keypress(function(event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            tampil();
        }
    });

    function tampil() {
        gridpopupjabatan('<?php echo base_url(); ?>index.php/personil/personildata/caripegjson', '<?php echo base_url(); ?>', '<?php echo $idjabatan; ?>');
    }
</script>