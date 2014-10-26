<ul class="page-breadcrumb breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="#">Home</a> 
        <i class="icon-angle-right"></i>
    </li>     
    <li><a href="#">Daftar Pejabat</a></li>
</ul>
<h5 class="text-center title">Daftar Pejabat Struktural Pemerintah Kabupaten Bandung Satuan Kerja <?php echo $satker[0]->satuan_kerja_nama; ?></h5> 
<div class="row ">
    <table id='pejabattable' class="table table-bordered table-striped table-condensed flip-content ">       
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
            </tr>
            <tr>                 
                <th>Nama</th>
                <th>NIP</th>
                <th>Jabatan</th>
                <th>Golongan</th>
                <th>Eselon</th>
                <th>Instansi</th> 
                <th>Pilih</th>
            </tr>
        </thead>
        <tbody>             
        </tbody> 
    </table>
</div>

<script src="<?php echo base_url(); ?>static/js/aplikasi/formskp/listpejabat.js" type="text/javascript"></script> 
