<ul class="page-breadcrumb breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="<?php echo base_url(); ?>">Home</a> 
        <i class="icon-angle-right"></i>
    </li>     
    <li><a href="#">Target/Sasaran Kerja Pegawai</a></li>
</ul>
<h5 class="text-center title">Daftar Pegawai Pemerintah Kabupaten Bandung</h5> 
<div class="row ">
    <table id='stattable' class="table table-bordered table-striped table-condensed flip-content ">       
        <thead  >
            <tr>                 
                <th><input type="text" id="namafilter" class="noborder"   /></th>
                <th><input type="text"  id="nipfilter" class="noborder"   /></th>
                <th><input type="text"  id="jabatanfilter" class="noborder" /></th>
                <th><select  id="golonganfilter" class="noborder"  multiple="true" onchange="tampil()" >
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
                <th><input type="text"  style="display: none"  /></th>
                <th><input type="text" style="display: none"    /></th>
            </tr>
            <tr>                 
                <th>Nama</th>
                <th>NIP</th>
                <th>Jabatan</th>
                <th>Golongan</th>
                <th>Eselon</th>
                <th>Instansi</th>
                <th>Entry Target</th>
                <th >Cetak</th>
            </tr>
        </thead>
        <tbody>             
        </tbody> 
    </table>
</div>

<script src="<?php echo base_url(); ?>static/js/aplikasi/formskp/skpjs.js" type="text/javascript"></script> 
