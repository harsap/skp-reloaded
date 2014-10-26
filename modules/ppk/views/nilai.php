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
            <option name="select_c_nik_pgw" value="<?php echo $list_pegawai_result->peg_nip_baru ?>"><?php echo $list_pegawai_result->peg_nama ?> <?php echo $list_pegawai_result->peg_nip_baru ?></option>
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
        Penilaian Perilaku Kerja
    </li>
</ul>
<div class="row">
	<div class="col-sm-12">
	    <h3>
	    	Pencarian Data Perilaku Kerja
	    </h3><br>
	    <div class='col-sm-6 col-sm-push-3'>
	    	<table class="table table-bordered table-stripped" valign="center">
	    		<tr>
	    			<td>
	    				Instansi Bekerja
	    			</td>
	    			<td>
	    				<input class="form-control full-width" type="text" name="instansi" placeholder="Instansi Bekerja">
	    			</td>
	    		</tr>
	    		<tr>
	    			<td>
	    				Organisasi Kerja
	    			</td>
	    			<td>
	    				<select name="org" id="org" class="form-control full-width">
	    					<option value="-">-= Silahkan Pilih Organisasi Kerja =-</option>
	    				</select>
	    			</td>
	    		</tr>
	    		<tr>
	    			<td>
	    				Satuan Kerja
	    			</td>
	    			<td>
	    				<select name="org" id="org" class="form-control full-width">
	    					<option value="-">-= Silahkan Pilih Satuan Kerja =-</option>
	    				</select>
	    			</td>
	    		</tr>
	    		<tr>
	    			<td>
	    				Satuan Organisasi
	    			</td>
	    			<td>
	    				<select name="org" id="org" class="form-control full-width">
	    					<option value="-">-= Silahkan Pilih Satuan Organisasi =-</option>
	    				</select>
	    			</td>
	    		</tr>
	    		<tr>
	    			<td>
	    				Unit Organisasi
	    			</td>
	    			<td>
	    				<select name="org" id="org" class="form-control full-width">
	    					<option value="-">-= Silahkan Pilih Unit Organisasi =-</option>
	    				</select>
	    			</td>
	    		</tr>
	    		<tr>
	    			<td>
	    				Unit Kerja
	    			</td>
	    			<td>
	    				<select name="org" id="org" class="form-control full-width">
	    					<option value="-">-= Silahkan Pilih Unit Kerja =-</option>
	    				</select>
	    				<br>
	    				<select name="opsi" id="opsi" class="form-control full-width">
	    					<option value="-">-= Silahkan Pilih Opsi =-</option>
	    				</select><br>
	    				<input type="text" class="form-control full-width" placeholder="Pilih Opsi Terlebih Dahulu">
	    			</td>
	    		</tr>
	    		<tr>
	    			<td>&nbsp;</td>
	    			<td>
	    				<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span> Tampilkan Data</button>
	    			</td>
	    		</tr>
	    	</table>
	    </div>
	</div>
</div>
<div class='row'>
	<div class='col-sm-12'>
	    <hr>
	    <a href="<?php echo base_url('ppk/tambah') ?>"><button class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Tambah Data Baru</button></a>
	    <hr>
	    <table class="table table-bordered table-stripped" valign="center">
	      <tr>
	        <th>No</th>
	        <th>NIP</th>
	        <th>Nama</th>
	        <th>Jabatan</th>
	        <th>Nilai Capaian</th>
	        <th>Tindakan</th>
	      </tr>
	      <tr>
	        <td></td>
	        <td></td>
	        <td></td>
	        <td></td>
	        <td></td>
	        <td></td>
	      </tr>
	    </table>
  	</div>
</div>

<script src="../static/assets/plugins/bootstrap/js/bootstrap2-typeahead.js"></script>
