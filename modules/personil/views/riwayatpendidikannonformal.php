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
     <li>
        <a href="<?php echo base_url(); ?>index.php/personil/personildata/indexperjenis/<?php echo $jenisjabatan; ?>">Daftar Pegawai Per Jenis Jabatan <?php echo get_nama_jenisjabatan($jenisjabatan); ?></a>
        <i class="icon-angle-right"></i>
    </li>
    <li>
        <a href="<?php echo base_url(); ?>index.php/personil/personildata/detailpersonil/<?php echo $jenisjabatan; ?>/<?php echo $peg->peg_id; ?>">Detail Pegawai </a>
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">Riwayat Pendidikan Non Formal <?php echo $peg->peg_nama; ?></a></li>
</ul>
<div class="portlet box ">
    <div class="portlet-title"> 
    </div>
    <div class="portlet-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">
                 
                <thead>
                    <tr align="center">
                    <th width="3%">NO.</th>
                    <th width="27%">Nama Kursus/Seminar/LokaKarya</th>
                    <th width="10%">Tanggal Mulai</th>
                    <th width="10%">Tanggal Selesai</th>
                    <th width="15%">Ijazah/Tanda Lulus/Surat Keterangan</th>
                    <th width="10%">Penyelenggara</th>
                    <th width="10%">Tempat</th> 
                </tr>
                </thead>
                <tbody>
              <?php
                $i = 0;
                foreach ($pendfor as $item) {
                    ?>
                    <tr id="baris<?php echo $i; ?>">
                        <td align="center"><?php echo ($i + 1); ?></td>
                        <td>
                            <span id='span_non_nama<?php echo $i; ?>'><?php echo $item->non_nama; ?></span>
                            <input type='hidden' name='non_nama<?php echo $i; ?>' id='non_nama<?php echo $i; ?>'
                                   value='<?php echo $item->non_nama; ?>'/>
                        </td>
                        <td align="center">
                            <span id='span_non_tgl_mulai<?php echo $i; ?>'><?php echo (isset($item->non_tgl_mulai) && $item->non_tgl_mulai != '' ? strftime("%d-%m-%Y", strtotime($item->non_tgl_mulai)) : ''); ?></span>
                            <input type='hidden' name='non_tgl_mulai<?php echo $i; ?>' id='non_tgl_mulai<?php echo $i; ?>'
                                   value='<?php echo (isset($item->non_tgl_mulai) && $item->non_tgl_mulai != '' ? strftime("%d-%m-%Y", strtotime($item->non_tgl_mulai)) : ''); ?>'/>
                        </td>
                        <td align="center">
                            <span id='span_non_tgl_selesai<?php echo $i; ?>'>
                                <?php echo (isset($item->non_tgl_selesai) && $item->non_tgl_selesai != '' ? strftime("%d-%m-%Y", strtotime($item->non_tgl_selesai)) : ''); ?>
                            </span>
                            <input type='hidden' name='non_tgl_selesai<?php echo $i; ?>' id='non_tgl_selesai<?php echo $i; ?>'
                                   value='<?php echo (isset($item->non_tgl_selesai) && $item->non_tgl_selesai != '' ? strftime("%d-%m-%Y", strtotime($item->non_tgl_selesai)) : ''); ?>'/>
                        </td>
                        <td>
                            <span id='span_non_sttp<?php echo $i; ?>'>
                                <?php echo $item->non_sttp; ?>
                            </span>
                            <input type='hidden' name='non_sttp<?php echo $i; ?>' id='non_sttp<?php echo $i; ?>'
                                   value='<?php echo $item->non_sttp; ?>'/>
                        </td>
                        <td>
                            <span id='span_non_penyelenggara<?php echo $i; ?>'>
                                <?php echo $item->non_penyelenggara; ?>
                            </span>
                            <input type='hidden' name='non_penyelenggara<?php echo $i; ?>'
                                   id='non_penyelenggara<?php echo $i; ?>' value='<?php echo $item->non_penyelenggara; ?>'/>
                        </td>
                        <td>
                            <span id='span_non_tempat<?php echo $i; ?>'>
                                <?php echo $item->non_tempat; ?>
                            </span>
                            <input type='hidden' name='non_tempat<?php echo $i; ?>' id='non_tempat<?php echo $i; ?>'
                                   value='<?php echo $item->non_tempat; ?>'/>
                        </td>                        
                    </tr>
                    <?php
                    $i++;
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="<?php echo base_url(); ?>/static/js/personil/alamatriwayat.js" type="text/javascript"></script> 
<script type="text/javascript">
                    $(document).ready(function() {
                       linkriwayat("<?php echo $jenisjabatan; ?>","<?php echo $peg->peg_id; ?>", "<?php echo base_url(); ?>");
                    });
                    
</script>