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
    	<a href="<?php echo base_url('ppk/penilaian') ?>">Penilaian Perilaku Kerja</a>
        <i class="icon-angle-right"></i>
    </li>
    <li>
        Form Entry Formulir Perilaku Kerja
    </li>
</ul>
<div class="row">
	<div class="col-sm-12">
	    <h3>
	    	Form Entry Formulir Perilaku Kerja
	    </h3><br>
	    <div class='col-sm-12'>
	    	<div class="panel panel-default">
	    		<table border=0 class="table">
	    			<tr>
	    				<td width="20%">Nama</td><td>: -</td>
	    			</tr>
	    			<tr>
	    				<td>NIP</td><td>: -</td>
	    			</tr>
	    			<tr>
	    				<td>Pangkat / Gol.Ruang</td><td>: -</td>
	    			</tr>
	    			<tr>
	    				<td>Jabatan</td><td>: -</td>
	    			</tr>
	    			<tr>
	    				<td>Unit Kerja</td><td>: -</td>
	    			</tr>
	    			<tr>
	    				<td>Jangka Waktu Penilaian</td><td>: -</td>
	    			</tr>
	    		</table>
	    		<table class="table text-center">
	    			<thead>
	    				<tr>
		    				<th>NO</th>
		    				<th>UNSUR PENILAIAN</th>
		    				<th>NILAI</th>
		    				<th>KETERANGAN</th>
		    			</tr>
	    			</thead>
	    			<tbody>
	    				<tr class="active">
	    					<td>1</td><td>2</td><td>3</td><td>4</td>
	    				</tr>
	    				<tr>
	    					<td>1</td>
	    					<td>Orientasi Pelayanan</td>
	    					<td><input type="numeric" class="form-control"></td>
	    					<td><input type="text" class="form-control" disabled="disabled"></td>
	    				</tr>
	    				<tr>
	    					<td>2</td>
	    					<td>Integritas</td>
	    					<td><input type="numeric" class="form-control"></td>
	    					<td><input type="text" class="form-control" disabled="disabled"></td>
	    				</tr>
	    				<tr>
	    					<td>3</td>
	    					<td>Komitmen</td>
	    					<td><input type="numeric" class="form-control"></td>
	    					<td><input type="text" class="form-control" disabled="disabled"></td>
	    				</tr>
	    				<tr>
	    					<td>4</td>
	    					<td>Disiplin</td>
	    					<td><input type="numeric" class="form-control"></td>
	    					<td><input type="text" class="form-control" disabled="disabled"></td>
	    				</tr>
	    				<tr>
	    					<td>5</td>
	    					<td>Kerjasama</td>
	    					<td><input type="numeric" class="form-control"></td>
	    					<td><input type="text" class="form-control" disabled="disabled"></td>
	    				</tr>
	    				<tr>
	    					<td>6</td>
	    					<td>Kepemimpinan</td>
	    					<td><input type="numeric" class="form-control"></td>
	    					<td><input type="text" class="form-control" disabled="disabled"></td>
	    				</tr>
	    				<tr>
	    					<td colspan="6">
	    						<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Simpan</button>
	    						<button type="reset" class="btn btn-default">Ulangi</button>
	    					</td>
	    				</tr>
	    			</tbody>
	    		</table>
	    	</div>
	    </div>
	</div>
</div>

<script src="../static/assets/plugins/bootstrap/js/bootstrap2-typeahead.js"></script>
