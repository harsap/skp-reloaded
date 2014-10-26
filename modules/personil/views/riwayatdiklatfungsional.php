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
    <li><a href="#">Riwayat Diklat Fungsional <?php echo $peg->peg_nama; ?></a></li>
</ul>
<div class="portlet box ">
    <div class="portlet-title"> 
    </div>
    <div class="portlet-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">

                <thead>
                    <tr align="center">
                        <th rowspan="2" width="3%">NO.</th>
                        <th rowspan="2" width="17%">Nama Diklat</th>
                        <th colspan="2">Tanggal</th>
                        <th rowspan="2" width="15%">Instansi Penyelenggara</th>
                        <th rowspan="2" width="10%">Tempat</th>
                        <th rowspan="2" width="3%">Jumlah Jam</th>
                        <th colspan="3">STTP</th> 
                    </tr>
                    <tr align="center">
                        <th width="10%">Mulai</th>
                        <th width="10%">Selesai</th>
                        <th width="7%">No</th>
                        <th width="10%">Tanggal</th>
                        <th width="10%">Nama Pejabat</th>
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
                                <input type='hidden' name='diklat_id<?php echo $i; ?>' id='diklat_id<?php echo $i; ?>'
                                       value='<?php echo $item->diklat_id; ?>'/>
                                <input type='hidden' name='diklat_fungsional_id<?php echo $i; ?>'
                                       id='diklat_fungsional_id<?php echo $i; ?>'
                                       value='<?php echo $item->diklat_fungsional_id; ?>'/>
                                <input type='hidden' name='diklat_fungsional_nm<?php echo $i; ?>'
                                       id='diklat_fungsional_nm<?php echo $i; ?>'
                                       value='<?php echo $item->diklat_fungsional_nm; ?>'/>
                                <span id='span_diklat_fungsional_nm<?php echo $i; ?>'><?php echo $item->diklat_fungsional_nm; ?></span>
                            </td>
                            <td align="center">
                                <input type='hidden' name='diklat_mulai<?php echo $i; ?>' id='diklat_mulai<?php echo $i; ?>'
                                       value='<?php echo(isset($item->diklat_mulai) && $item->diklat_mulai != '' ? strftime("%d-%m-%Y", strtotime($item->diklat_mulai)) : ''); ?>'/>
                                <span id='span_diklat_mulai<?php echo $i; ?>'><?php echo(isset($item->diklat_mulai) && $item->diklat_mulai != '' ? strftime("%d-%m-%Y", strtotime($item->diklat_mulai)) : ''); ?></span>
                            </td>
                            <td align="center">
                                <input type='hidden' name='diklat_selesai<?php echo $i; ?>' id='diklat_selesai<?php echo $i; ?>'
                                       value='<?php echo(isset($item->diklat_selesai) && $item->diklat_selesai != '' ? strftime("%d-%m-%Y", strtotime($item->diklat_selesai)) : ''); ?>'/>
                                <span id='span_diklat_selesai<?php echo $i; ?>'><?php echo(isset($item->diklat_selesai) && $item->diklat_selesai != '' ? strftime("%d-%m-%Y", strtotime($item->diklat_selesai)) : ''); ?></span>
                            </td>
                            <td>
                                <span id='span_diklat_penyelenggara<?php echo $i; ?>'><?php echo $item->diklat_penyelenggara; ?></span>
                                <input type='hidden' name='diklat_penyelenggara<?php echo $i; ?>'
                                       id='diklat_penyelenggara<?php echo $i; ?>'
                                       value='<?php echo $item->diklat_penyelenggara; ?>'/>

                            </td>
                            <td>
                                <input type='hidden' name='diklat_tempat<?php echo $i; ?>' id='diklat_tempat<?php echo $i; ?>'
                                       value='<?php echo $item->diklat_tempat; ?>'/>
                                <span id='span_diklat_tempat<?php echo $i; ?>'><?php echo $item->diklat_tempat ?></span>
                            </td>
                            <td>
                                <input type='hidden' name='diklat_jumlah_jam<?php echo $i; ?>'
                                       id='diklat_jumlah_jam<?php echo $i; ?>' value='<?php echo $item->diklat_jumlah_jam; ?>'/>
                                <span id='span_diklat_jumlah_jam<?php echo $i; ?>'><?php echo $item->diklat_jumlah_jam; ?></span>
                            </td>
                            <td>
                                <input type='hidden' name='diklat_sttp_no<?php echo $i; ?>' id='diklat_sttp_no<?php echo $i; ?>'
                                       value='<?php echo $item->diklat_sttp_no; ?>'/>
                                <span id='span_diklat_sttp_no<?php echo $i; ?>'><?php echo $item->diklat_sttp_no; ?></span>
                            </td>
                            <td align="center">
                                <input type='hidden' name='diklat_sttp_tgl<?php echo $i; ?>' id='diklat_sttp_tgl<?php echo $i; ?>'
                                       value='<?php echo(isset($item->diklat_sttp_tgl) && $item->diklat_sttp_tgl != '' ? strftime("%d-%m-%Y", strtotime($item->diklat_sttp_tgl)) : ''); ?>'/>
                                <span id='span_diklat_sttp_tgl<?php echo $i; ?>'><?php echo(isset($item->diklat_sttp_tgl) && $item->diklat_sttp_tgl != '' ? strftime("%d-%m-%Y", strtotime($item->diklat_sttp_tgl)) : ''); ?></span>
                            </td>
                            <td>
                                <input type='hidden' name='diklat_sttp_pej<?php echo $i; ?>' id='diklat_sttp_pej<?php echo $i; ?>'
                                       value='<?php echo $item->diklat_sttp_pej; ?>'/>
                                <span id='span_diklat_sttp_pej<?php echo $i; ?>'><?php echo $item->diklat_sttp_pej; ?></span>
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