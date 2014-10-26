<html>
  <head>
    <title>Cetak Data "Kegiatan Tugas Pokok Jabatan"</title>
    <link rel="stylesheet" href="<?php echo base_url();?>static/assets/plugins/bootstrap/css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
  </head>
  <body onload="window.print()">
    <div class="container">
      <?php $pegawai_result = $pegawai->row(); ?>
      <h1>Pegawai Negeri Sipil Yang Dinilai</h1>
      <div class="row">
    <form role="form" enctype='multipart/form-data'  action="<?php echo base_url();?>skp/penilaian/tambahrealisasi" method="post">
    <div class="col-sm-12">
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

            <?php if($this->input->post('select_c_nik_pgw')) {
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
        <?php if($this->input->post('select_c_nik_pgw')) { ?>
        <table class="table table-bordered table-stripped" id="tblJabatan">
          <tr>
            <th width="1%" rowspan="2">No.</th>
            <th rowspan="2" width="30%">Kegiatan Tugas Pokok Jabatan</th>
            <th rowspan="2">AK</th>
            <th colspan="4">Target</th>
            <th rowspan="2">AK</th>
            <th colspan="4">Realisasi</th>
            <th rowspan="2">Perhitungan</th>
            <th rowspan="2">Nilai Capaian SKP</th>
          </tr>
          <tr>
            <td>Kuant / Output</td>
            <td>Kual / Mutu</td>
            <td>Waktu</td>
            <td>Biaya</td>
            <td>Kuant / Output</td>
            <td>Kual / Mutu</td>
            <td>Waktu</td>
            <td>Biaya</td>
          </tr>
          <?php $i = 0; foreach ($realisasi_pokok->result() as $result) { ?>
          <input type="hidden" name="preal[<?php echo $i ?>][id_pengajuan]" value="<?php echo $result->id_pengajuan ?>">
            <tr>
              <td><?php echo $result->nomor_kegiatan; ?><input type="hidden" name="preal[<?php echo $i ?>][nomor_kegiatan] ?>" value="<?php echo $result->nomor_kegiatan; ?>"></td>
              <td><?php echo $result->deskripsi_kegiatan; ?></td>
              <td><?php echo $result->nilai_angka_kredit; ?><input type="hidden" id="preal[<?php echo $i ?>][sat_kuant]" value="<?php echo $result->satuan_target_kuantitatif ?>"></td>
              <td><input name="preal[<?php echo $i; ?>][target_kuantitatif]" id ="preal[<?php echo $i; ?>][target_kuantitatif]" type="hidden" class="form-control" style="width: 100px;" value="<?php echo $result->target_kuantitatif; ?>">
          <?php echo $result->target_kuantitatif; ?>
                <input type="hidden" id="preal[<?php echo $i ?>][sat_kual]" value="<?php echo $result->satuan_target_kualitas ?>"></td>
              <td><input name="preal[<?php echo $i; ?>][target_kualitas]" type="hidden" class="form-control" style="width: 100px;" value="<?php echo $result->target_kualitas; ?>">
          <?php echo $result->target_kualitas; ?>
              </td>
              <td><input name="preal[<?php echo $i; ?>][target_waktu]" type="hidden" class="form-control" style="width: 100px;" value="<?php echo $result->waktu; ?>"><?php echo $result->waktu; ?></td>
              <td><input name="preal[<?php echo $i; ?>][target_biaya]" type="hidden" class="form-control" style="width: 100px;" value="<?php echo $result->biaya; ?>"><?php echo $result->biaya; ?></td>
              <td><?php echo $result->nilai_angka_kredit*$result->target_kuantitatif ?>
          <input name="preal[<?php echo $i; ?>][ak_realisasi]" type="hidden" value="<?php echo $result->nilai_angka_kredit*$result->target_kuantitatif ?>">
              </td>
              <td><?php echo $result->realisasi_kuantitatif ?></td>
              <td><?php echo $result->realisasi_kualitas ?></td>
              <td><?php echo $result->r_waktu ?></td>
              <td><?php echo $result->r_biaya ?></td>
              <td id="penghitungan">
                <input type="hidden" name="preal[<?php echo $i ?>][hitungan]" value="<?php echo round(((($result->realisasi_kuantitatif/$result->target_kuantitatif)*100) + (($result->realisasi_kualitas/$result->target_kualitas)*100) + ((1.76*$result->waktu)-$result->r_waktu)/$result->r_waktu * 100)) ?>">
                <?php 
                  $sum_total[$i] =  round(((($result->realisasi_kuantitatif/$result->target_kuantitatif)*100) + (($result->realisasi_kualitas/$result->target_kualitas)*100) + ((1.76*$result->waktu)-$result->r_waktu)/$result->r_waktu * 100));
                  echo $sum_total[$i];
                ?>
              </td>
              <td id="capskp">
                <input type="hidden" name="preal[<?php echo $i ?>][capskp]" value="<?php echo round(((($result->realisasi_kuantitatif/$result->target_kuantitatif)*100) + (($result->realisasi_kualitas/$result->target_kualitas)*100) + ((1.76*$result->waktu)-$result->r_waktu)/$result->r_waktu * 100)/3) ?>">
                <?php 

                $sum_total2[$i] = round(((($result->realisasi_kuantitatif/$result->target_kuantitatif)*100) + (($result->realisasi_kualitas/$result->target_kualitas)*100) + ((1.76*$result->waktu)-$result->r_waktu)/$result->r_waktu * 100)/3);
                echo $sum_total2[$i]; ?>
              </td>
            </tr>
            <!-- <script type="text/javascript">          
            var tkuant = $('#preal[$i][target_kuantitatif]').val();
            var tkual = $('#preal[$i][target_kualitas]').val();
            var twaktu = $('#preal[$i][target_waktu]').val();
            var rkuant = $('#preal[$i][kuant]').val();
            var rkual = $('#preal[$i][kual]').val();
            var rwaktu = $('preal[$i][waktu]').val();

            $('input').keyup(function(){
              var penghitungan = (((rkuant / tkuant) * 100)+((rkual / tkual) * 100)+((1.76 * twaktu)-rwaktu)/rwaktu*100);
              $('#penghitungan').append(penghitungan);
            });
            </script> -->
          <?php $i++; } ?>
          <tr>
            <td colspan=13></td>
            <td><?php echo round(array_sum($sum_total2)/count($sum_total2)); ?></td>
          </tr>
        </table>
        <?php } else { ?>
        <i>Silahkan pilih pegawai terlebih dahulu</i>
      <?php } ?>
      </div>
    <div class="col-sm-12">
        <h3>Kegiatan Tugas Pokok Tambahan</h3>
        <hr>
        <?php if($this->input->post('select_c_nik_pgw')) { ?>
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
          <button type="submit" class="btn btn-primary btn-lg"><i class="glyphicon glyphicon-floppy-saved"></i> Simpan Data</button>
          <a target="_blank" href="<?php echo base_url('skp/cetak/print_data/') . '/' . $pegawai_result->peg_nip_baru;?>"class="btn btn-success btn-lg"><i class="glyphicon glyphicon-print"></i> Cetak</a>
        </div>
      </div>
      <?php } else { ?>
        <i>Silahkan pilih pegawai terlebih dahulu</i>
      <?php } ?>
    </form>
  </div>

  <script src="../static/assets/plugins/bootstrap/js/bootstrap2-typeahead.js"></script>
