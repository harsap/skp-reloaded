<!-- Modal -->
<div class="modal fade" id="pilih_pegawai" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Pilih Pegawai</h4>
      </div>
      <div class="modal-body">
        <form role="form" action="<?php echo base_url();?>skp/cetak" method="post">
        <select name="select_c_nik_pgw" width="350px" class="pegawai-select col-sm-12">
        <?php
          foreach ($list_pegawai->result() as $list_pegawai_result) {  ?>
            <option name="select_c_nik_pgw" value="<?php echo $list_pegawai_result->peg_id; ?>"><?php echo $list_pegawai_result->peg_nama ?> <?php echo $list_pegawai_result->peg_nip_baru ?></option>
          <?php } ?>
        </select>
        <script charset="utf-8">
        $(window).load(function(){
           $(".pegawai-select").chosen();
         });
        </script>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Pilih Pegawai</button>
      	</form>
      </div>
    </div>
  </div>
</div>


<ul class="page-breadcrumb breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="<?php echo base_url(); ?>">Home</a>
        <i class="icon-angle-right"></i>
    </li>
    <li>
        Cetak SKP
    </li>
</ul>
<div class="row">
	<form role="form" enctype='multipart/form-data'  action="<?php echo base_url();?>skp/pembuatan/tambahKegiatan" method="post">
	<div class="col-sm-12">
	    <h3>
	    	Cetak Formulir Sasaran Kinerja Pegawai (SKP)
	    	<button type="button" data-toggle="modal" data-target="#pilih_pegawai" class="btn btn-md btn-primary pull-right"><i class="glyphicon glyphicon-user"></i> Pilih Pegawai</button>
	    </h3><br>
	    	<div class='col-sm-6'>
	    		<?php $user = $this->ion_auth->get_data_user_by_id();
	    			  $listuser = $this->ion_auth->get_user_name_all();
	    		?>
	    		<table class="col-sm-12 table table-bordered" id="tblPenilai">
	    			<tr>
	    			   	<th width="10%">No</th>
	    			   	<th colspan="2">I. Pejabat Penilai</th>
	    			</tr>
	    			<tr>
	    				<td>1</td>
	    			    <td width="20%">Nama</td>
	    			    <td><?php echo $user->peg_nama; ?></td>
	    			</tr>
	    			<tr>
	    			    <td>2</td>
	    			    <td>NIK</td>
	    			    <td><?php echo $user->peg_nip_baru; ?><input type="hidden" name="nikAtasan" value="<?php echo $user->peg_nip_baru; ?>"></td>
	    			</tr>
	    			<tr>
	    			    <td>3</td>
	    			    <td>Jabatan</td>
	    			    <td><?php echo $user->jabatan_nama; ?></td>
	    			</tr>
	    			<tr>
	    			    <td>4</td>
	    			    <td>Pangkat</td>
	    			    <td></td>
	    			</tr>
	    			<tr>
	    			    <td>5</td>
	    			    <td>Unit Kerja</td>
	    			    <td><?php echo $user->unit_kerja_nama; ?></td>
	    			</tr>
	    		</table>
	    	</div>
	    	<div class='col-sm-6'>
          <?php if($this->input->post('select_c_nik_pgw') or $this->uri->segment(3)) {
            $pegawai_result = $pegawai->row();
            ?>
	    		<table class="col-sm-12 table table-bordered" id="tblDinilai">
	    			<tr>
	    			   	<th width="10%">No</th>
	    			   	<th colspan="2">II. Pegawai Negeri Sipil Yang Dinilai</th>

	    			</tr>
	    			<tr>
	    				<td>1</td>
	    			    <td width="20%">Nama</td>
	    			    <td id="dinilaiName"><?php echo $pegawai_result->peg_nama; ?></td>
	    			</tr>
	    			<tr>
	    			    <td>2</td>
	    			    <td>NIK</td>
	    			    <td id="dinilaiNik"><?php echo $pegawai_result->peg_nip_baru; ?><input type="hidden" name="nikPegawai" value="<?php echo $pegawai_result->peg_nip_baru; ?>"></td>
	    			</tr>
	    			<tr>
	    			    <td>3</td>
	    			    <td>Jabatan</td>
	    			    <td id="dinilaiJab"><?php echo $pegawai_result->jabatan_nama; ?></td>
	    			</tr>
	    			<tr>
	    			    <td>4</td>
	    			    <td>Pangkat</td>
	    			    <td id="dinilaiPan"></td>
	    			</tr>
	    			<tr>
	    			    <td>5</td>
	    			    <td>Unit Kerja</td>
	    			    <td id="dinilaiUK"><?php echo $pegawai_result->unit_kerja_nama; ?></td>
	    			</tr>
	    		</table>
          <?php } else { ?>
            <table class="col-sm-12 table table-bordered" id="tblDinilai">
              <tr>
                   <th width="10%">No</th>
                   <th colspan="2">II. Pegawai Negeri Sipil Yang Dinilai</th>

              </tr>
              <tr>
                <td>1</td>
                <td width="20%">Nama</td>
                <td rowspan="5">
                  <i>Pilih Pegawai Terlebih dahulu</i>
                </td>
              </tr>
              <tr>
                  <td>2</td>
                  <td>NIK</td>
              </tr>
              <tr>
                  <td>3</td>
                  <td>Jabatan</td>
              </tr>
              <tr>
                  <td>4</td>
                  <td>Pangkat</td>
              </tr>
              <tr>
                  <td>5</td>
                  <td>Unit Kerja</td>
              </tr>
            </table>
          <?php } ?>
	   		</div>
	</div>
</div>
<div class='row'>
	<div class='col-sm-12'>
	    <h3>
	    	Kegiatan Tugas Pokok Jabatan
	    </h3>
	    <hr>
      <?php if($this->input->post('select_c_nik_pgw') or $this->uri->segment(3)) { ?>
			<table class="table table-bordered table-stripped" id="tblJabatan">
			  <tr>
			    <th width="1%" rowspan="2">No.</th>
			    <th rowspan="2" width="50%">Kegiatan Tugas Pokok Jabatan</th>
			    <th rowspan="2">AK</th>
			    <th colspan="4">Target</th>
			  </tr>
			  <tr>
			    <td>Kuant / Output</td>
			    <td>Kual / Mutu</td>
			    <td>Waktu</td>
			    <td>Biaya</td>
			  </tr>
    		<?php foreach ($skp_pokok->result() as $kegiatan_result) {?>
          <tr>
            <td><?php echo $kegiatan_result->nomor_kegiatan; ?></td>
            <td><?php echo $kegiatan_result->deskripsi_kegiatan; ?></td>
            <td><?php echo $kegiatan_result->nilai_angka_kredit; ?></td>
            <td><?php echo $kegiatan_result->target_kuantitatif; ?></td>
            <td><?php echo $kegiatan_result->target_kualitas; ?></td>
            <td><?php echo $kegiatan_result->waktu; ?></td>
            <td><?php echo $kegiatan_result->biaya; ?></td>
          </tr>
        <?php } ?>
      </table>
      <?php } else { ?>
      <i>Silahkan pilih pegawai terlebih dahulu</i>
    <?php } ?>
  	</div>
	<div class="col-sm-12">
	    <h3>Kegiatan Tugas Pokok Tambahan</h3>
	    <hr>
      <?php if($this->input->post('select_c_nik_pgw') or $this->uri->segment(3)) { ?>
			<table class="table table-bordered table-stripped" id="tblTambahan">
			  <tr>
			    <th width="20px" rowspan="2">No.</th>
			    <th rowspan="2" width="50%">Kegiatan Tugas Pokok Tambahan</th>
			    <th rowspan="2">AK</th>
			    <th colspan="4">Target</th>
			  </tr>
			  <tr>
			    <td>Kuant / Output</td>
			    <td>Kual / Mutu</td>
			    <td>Waktu</td>
			    <td>Biaya</td>
			  </tr>
			 <?php foreach ($skp_tambahan->result() as $kegiatan_tambahan_result) {?>
          <tr>
            <td><?php echo $kegiatan_tambahan_result->nomor_kegiatan; ?></td>
            <td><?php echo $kegiatan_tambahan_result->deskripsi_kegiatan; ?></td>
            <td><?php echo $kegiatan_tambahan_result->nilai_angka_kredit; ?></td>
            <td><?php echo $kegiatan_tambahan_result->target_kuantitatif; ?></td>
            <td><?php echo $kegiatan_tambahan_result->target_kualitas; ?></td>
            <td><?php echo $kegiatan_tambahan_result->waktu; ?></td>
            <td><?php echo $kegiatan_tambahan_result->biaya; ?></td>
          </tr>
        <?php } ?>
			</table>
	</div>
		<div class="col-sm-12">
			<div class="form-group pull-right">
				<a target="_blank" href="<?php echo base_url('skp/cetak/print_data/') . '/' . $pegawai_result->peg_id;?>"class="btn btn-success btn-lg"><i class="glyphicon glyphicon-print"></i> Cetak</a>
			</div>
		</div>
    <?php } else { ?>
      <i>Silahkan pilih pegawai terlebih dahulu</i>
    <?php } ?>
	</form>
</div>

<script src="../static/assets/plugins/bootstrap/js/bootstrap2-typeahead.js"></script>
