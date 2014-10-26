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
    <li><a href="#"> Data Pegawai Per Jenis Jabatan <?php echo get_nama_jenisjabatan($jenisjabatan); ?></a></li>
</ul>
<input type="hidden" name="jenisjabatan"  id="jenisjabatan" value="<?php echo $jenisjabatan; ?>" />
<h4 class=" text-center title">Daftar Pegawai Pemerintah Kabupaten Bandung</h4>
<div class="row ">
    <table id='stattable' class="table table-bordered table-striped table-condensed flip-content ">       
        <thead  >
            <tr>                 
                <th><input type="text" id="namafilter" class="noborder"   /></th>
                <th><input type="text"  id="nipfilter" class="noborder"   /></th>
                <th><input type="text"  id="jabatanfilter" class="noborder" /></th>
                <th><select  id="golonganfilter" class="noborder" multiple="true" onchange="tampil()" >
                        <?php foreach ($listgol as $gol) {
                            ?>
                            <option value="<?php echo $gol->gol_id; ?>"><?php echo $gol->nm_gol; ?></option>
                        <?php } ?>
                    </select></th>
                <th><select  id="eselonfilter" class="noborder" multiple="true" onchange="tampil()" >
                        <?php foreach ($listeselon as $es) {
                            ?>
                            <option value="<?php echo $es->eselon_id; ?>"><?php echo $es->eselon_nm; ?></option>
                        <?php } ?>
                    </select></th>
                <th><input type="text"  id="instansifilter" class="noborder" /></th>
            </tr>
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
                        cari();
                    });
                    $(document).keypress(function(event) {
                        var keycode = (event.keyCode ? event.keyCode : event.which);
                        if (keycode == '13') {
                            tampil();
                        }
                    });

                    function tampil() {
                        grid('<?php echo base_url(); ?>index.php/personil/personildata/caripegjson', '<?php echo base_url(); ?>');
                    }
</script>