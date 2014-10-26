<ul class="page-breadcrumb breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="<?php echo base_url(); ?>">Home</a>
        <i class="icon-angle-right"></i>
    </li>
    <li>
        Pembuatan SKP
    </li>
</ul>
<div class="row">
    <form role="form" enctype='multipart/form-data'  action="<?php echo base_url(); ?>skp/pembuatan/tambahkegiatan" method="post">
        <div class="col-sm-12">
            <h3>
                Form Entry Formulir Sasaran Kinerja Pegawai (SKP)
                <a class="fancybox fancybox.iframe btn btn-md btn-primary pull-right" href="<?php echo base_url(); ?>formskp/pejabatcontroller/index"    ><i class="glyphicon glyphicon-user"></i> Pilih Pejabat Penilai</a>
            </h3>
             <div class="row col-sm-12">
                Tahun : 
                <select name="tahun"  id="tahun" >
                    <option value="<?php echo date('Y'); ?>" ><?php echo date('Y'); ?></option>
                    <option value="<?php echo date('Y') + 1; ?>"><?php echo date('Y') + 1; ?></option>
                    <option value="<?php echo date('Y') + 2; ?>"><?php echo date('Y') + 2; ?></option>
                </select></div><br/>
            <br>
            <div class='col-sm-6'>
                <table class="col-sm-12 table table-bordered" id="tblPenilai">
                    <tr>
                        <th width="10%">No</th>
                        <th colspan="2">I. Pejabat Penilai</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td width="20%">Nama</td>
                        <td>
                            <input type="hidden" id="hiddenidpjabatpenilai"  name="hiddenidpjabatpenilai" />
                            <span id="txtnamapejabatpenilai"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>NIP</td>
                        <td> <span id="txtnippejabatpenilai"></span> </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Jabatan</td>
                        <td><span id="txtjabatan"></span></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Pangkat</td>
                        <td><span id="txtpangkat"></span></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Unit Kerja</td>
                        <td><span id="txtunitkerja"></span></td>
                    </tr>
                </table>
            </div>
            <div class='col-sm-6'>


                <table class="col-sm-12 table table-bordered" id="tblDinilai">
                    <tr>
                        <th width="10%">No</th>
                        <th colspan="2">II. Pegawai Negeri Sipil Yang Dinilai</th>

                    </tr>
                    <tr>
                        <td>1</td>
                        <td width="20%">Nama</td>
                        <td id="dinilaiName"><?php echo $pegawai->peg_nama; ?></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>NIK</td>
                        <td id="dinilaiNik"><?php echo $pegawai->peg_nip_baru; ?><input type="hidden" name="nikPegawai"  id="nikPegawai"  value="<?php echo $pegawai->peg_id; ?>"></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Jabatan</td>
                        <td id="dinilaiJab"><?php echo $pegawai->jabatan_nama; ?></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Pangkat</td>
                        <td id="dinilaiPan"><?php echo $pegawai->nm_gol_akhir; ?>/<?php echo $pegawai->nm_pkt_akhir; ?></td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Unit Kerja</td>
                        <td id="dinilaiUK"><?php echo $pegawai->cabang_dinas; ?> - <?php echo $pegawai->satuan_kerja_nama; ?></td>
                    </tr>
                </table>

            </div>
        </div>
    </form>
</div>
<div class='row'>
    <div class='col-sm-12'>
        <h3>
            Kegiatan Tugas Pokok Jabatan
        </h3>
        <hr>

        <table class="table table-bordered table-stripped" id="tblJabatan">
            <thead>
                <tr>
                    <th width="1%" rowspan="2">No.</th>
                    <th rowspan="2" width="50%">Kegiatan Tugas Pokok Jabatan</th>
                    <th rowspan="2">Angka Kredit</th>
                    <th colspan="4">Target</th>
                    <th rowspan="2" width="5%">Aksi</th>
                </tr>
                <tr>
                    <th>Kuantitas <br><i>Output/Satuan</i></th>
                    <th>Kual / Mutu</th>
                    <th>Waktu <br><i>Satuan Waktu</i></th>
                    <th>Biaya</th>
                </tr>
            </thead>
            <tbody id="bodykpi"></tbody>
            <tfoot>
                <tr>
                    <th colspan="8">
            <div class='form-group pull-right'>
                <button  onclick="tugaspokok(1)" data-toggle="modal" data-target="#modal_pokok_jabatan" type="reset" class="btn btn-success btn-sm "><i class="glyphicon glyphicon-plus"></i> Tambah Kegiatan</button>
            </div>
            </th>
            </tr>
            </tfoot>
        </table>

    </div>
    <div class="col-sm-12">
        <h3>Kegiatan Tugas Pokok Tambahan</h3>
        <hr>       
        <table class="table table-bordered table-stripped" id="tblTambahan">
            <thead>
                <tr>
                    <th width="20px" rowspan="2">No.</th>
                    <th rowspan="2" width="50%">Kegiatan Tugas Pokok Tambahan</th>
                    <th rowspan="2">Angka Kredit</th>
                    <th colspan="4">Target</th>
                    <th rowspan="2">Aksi</th>
                </tr>
                <tr>
                    <th>Kuantitas <br><i>Output/Satuan</i></th>
                    <th>Kual / Mutu</th>
                    <th>Waktu <br><i>Satuan Waktu</i></th>
                    <th>Biaya</th>
                </tr>
            </thead>
            <tbody id="bodykpitambahan">                
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="8">
            <div class='form-group pull-right'>
                <button onclick="tugaspokok(2)" data-toggle="modal" data-target="#modal_pokok_jabatan" type="reset" class="btn btn-success btn-sm "><i class="glyphicon glyphicon-plus"></i> Tambah Kegiatan Tugas Tambahan</button>
            </div>
            </th>
            </tr>
            </tfoot>
        </table>
    </div>
    <div class="col-sm-12">
        <div class="form-group pull-right">
            <button type="submit" class="btn btn-primary btn-lg"><i class="glyphicon glyphicon-floppy-saved"></i> Simpan Data</button>
            <button type="reset" class="btn btn-danger btn-lg"><i class="glyphicon glyphicon-trash"></i> Ulangi</button>
        </div>
    </div> 
</div>
<div id="modal_pokok_jabatan" class="modal fade in" style="display: none;" >  
    <div class="modal-dialog modal-dialog-center modal-wide"  style="background-color:#eee;">
        <div class="modal-header" >   
            <h5>Form Isian Target</h5>  
        </div>  
        <div class="modal-body"  >  
            <form class="form-horizontal"   >
                <input type="hidden" name="id_kegiatan" id="id_kegiatan"  />

                <div class="form-group">
                    <label for="inputTahun" class=" control-label col-xs-3">Nama Kegiatan</label>
                    <div class="col-xs-5">
                        <input type="text" name="deskripsi_kegiatan"  id="deskripsi_kegiatan" size="45" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputUnit" class="control-label col-xs-3">Angka Kredit</label> 
                    <div class="col-xs-2">
                        <input type="text" name="nilai_angka_kredit"  id="nilai_angka_kredit" size="15" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputUnit" class="control-label col-xs-3">Kuantitas/Output</label> 
                    <div class="col-xs-2">
                        <input type="text" name="target_kuantitatif"  id="target_kuantitatif" size="25" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputUnit" class="control-label col-xs-3">Satuan Kuantitas/Output</label> 
                    <div class="col-xs-3">
                        <input type="text" name="satuan_target_kuantitatif"  id="satuan_target_kuantitatif" size="35" />
                    </div>
                </div>


                <div class="form-group">
                    <label for="inputUnit" class="control-label col-xs-3">Kualitas/Mutu</label> 
                    <div class="col-xs-3">
                        <input type="text" name="target_kualitas"  id="target_kualitas"  />%
                    </div>
                </div> 
                <div class="form-group">
                    <label for="inputUnit" class="control-label col-xs-3">Waktu</label> 
                    <div class="col-xs-4">
                        <input type="text" name="waktu"  id="waktu"   />
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputUnit" class="control-label col-xs-3">Satuan Waktu</label> 
                    <div class="col-xs-4">
                        <input type="text" name="satuan_waktu"  id="satuan_waktu"   value="Bulan" />
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputUnit" class="control-label col-xs-3">Biaya</label> 
                    <div class="col-xs-5">
                        <input type="text" name="biaya"  id="biaya"   />&nbsp;rupiah
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputUnit" class="control-label col-xs-3">Status</label> 
                    <div class="col-xs-3">
                        <select id="status"  name="status">
                            <option value="0">-</option>
                            <option value="1">Tugas Pokok</option>
                            <option value="2">Tugas Tambahan</option>
                        </select>
                    </div>
                </div>
            </form>           
        </div>  
        <div class="modal-footer"  >  
            <button class="btn btn-primary btn-large" onclick="submitdata( )">Tambah</button>  
            <a href="#" class="btn btn-primary btn-large" data-dismiss="modal">Close</a>  
        </div>  
    </div>  
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>static/js/aplikasi/formskp/createskp.js" ></script>
