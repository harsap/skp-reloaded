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
    <li><a href="#">Riwayat Pendidikan Formal <?php echo $peg->peg_nama; ?></a></li>
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
                        <th rowspan="2" width="15%">Tingkat Pendidikan</th>
                        <th rowspan="2" width="15%">Jurusan</th>
                        <th rowspan="2" width="27%">Nama Sekolah/Akademi/Perguruan Tinggi</th>
                        <th colspan="2">STTB/Ijazah</th> 
                    </tr>
                    <tr align="center">
                        <th width="15%">Nomor</th>
                        <th width="10%">Tanggal</th>
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
                                <input type='hidden' name='nm_tingpend<?php echo $i; ?>' id="nm_tingpend<?php echo $i; ?>"
                                       value="<?php echo $item->tingpend_id; ?>"/>
                                <span id="span_nm_tingpend<?php echo $i; ?>"> <?php echo $item->nm_tingpend; ?> </span>
                            </td>
                            <td>
                                <input type='hidden' name='nm_pend<?php echo $i; ?>' id="nm_pend<?php echo $i; ?>"
                                       value="<?php echo $item->nm_pend; ?>"/>
                                <span id="span_nm_pend<?php echo $i; ?>"> <?php echo $item->nm_pend; ?></span>
                            </td>
                            <td>
                                <span id="span_riw_pendidikan_nm<?php echo $i; ?>"><?php echo $item->riw_pendidikan_nm; ?></span>
                                <input type='hidden' name='riw_pendidikan_nm<?php echo $i; ?>'
                                       id="riw_pendidikan_nm<?php echo $i; ?>" value="<?php echo $item->riw_pendidikan_nm; ?>"/>
                            </td>
                            <td>
                                <span id="span_riw_pendidikan_sttb_ijazah<?php echo $i; ?>"><?php echo $item->riw_pendidikan_sttb_ijazah; ?></span>
                                <input type='hidden' name='riw_pendidikan_sttb_ijazah<?php echo $i; ?>'
                                       id="riw_pendidikan_sttb_ijazah<?php echo $i; ?>"
                                       value="<?php echo $item->riw_pendidikan_sttb_ijazah; ?>"/>
                            </td>
                            <td align="center">
                                <input type='hidden' name='riw_pendidikan_tgl<?php echo $i; ?>'
                                       id="riw_pendidikan_tgl<?php echo $i; ?>"
                                       value="<?php echo(isset($item->riw_pendidikan_tgl) && $item->riw_pendidikan_tgl != '' ? strftime("%d-%m-%Y", strtotime($item->riw_pendidikan_tgl)) : ''); ?>"/>
                                <span id="span_riw_pendidikan_tgl<?php echo $i; ?>">
                                    <?php echo (isset($item->riw_pendidikan_tgl) && $item->riw_pendidikan_tgl != '' ? strftime("%d-%m-%Y", strtotime($item->riw_pendidikan_tgl)) : ''); ?>
                                </span>
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