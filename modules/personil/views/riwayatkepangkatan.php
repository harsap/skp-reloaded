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
        <a href="<?php echo base_url(); ?>index.php/personil/personildata/indexperjenis/<?php echo $jenisjabatan; ?>">Daftar Pegawai Per Jenis Jabatan <?php echo get_nama_jenisjabatan($jenisjabatan); ?> </a>
        <i class="icon-angle-right"></i>
    </li>
    <li>
        <a href="<?php echo base_url(); ?>index.php/personil/personildata/detailpersonil/<?php echo $jenisjabatan; ?>/<?php echo $peg->peg_id; ?>">Detail Pegawai </a>
        <i class="icon-angle-right"></i>
    </li>
    <li><a href="#">Riwayat Kepangkatan <?php echo $peg->peg_nama; ?></a></li>
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
                        <th rowspan="2" width="20%">Pangkat/Golongan</th>
                        <th rowspan="2" width="10%">TMT</th>
                        <th colspan="2">SK</th>
                        <th colspan="2">Masa Kerja</th>
                        <th rowspan="2" width="15%">Pejabat Yang Menetapkan</th> 
                    </tr>
                    <tr align="center">
                        <th width="17%">Nomor</th>
                        <th width="10%">Tanggal</th>
                        <th width="5%">Tahun</th>
                        <th width="5%">Bulan</th>
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
                                <input type='hidden' name='riw_pangkat_id<?php echo $i; ?>' id='riw_pangkat_id<?php echo $i; ?>'
                                       value='<?php echo $item->riw_pangkat_id; ?>'/>
                                <input type='hidden' name='gol_id<?php echo $i; ?>' id='gol_id<?php echo $i; ?>'
                                       value='<?php echo $item->gol_id; ?>'/>
                                <span id='span_nm_pkt<?php echo $i; ?>'><?php echo $item->nm_gol; ?> (<?php echo $item->nm_pkt; ?>
                                    )</span>
                            </td>
                            <td align="center">
                                <input type='hidden' name='riw_pangkat_tmt<?php echo $i; ?>' id='riw_pangkat_tmt<?php echo $i; ?>'
                                       value='<?php echo(isset($item->riw_pangkat_tmt) && $item->riw_pangkat_tmt != '' ? strftime("%d-%m-%Y", strtotime($item->riw_pangkat_tmt)) : ''); ?>'/>
                                <span id='span_riw_pangkat_tmt<?php echo $i; ?>'><?php echo(isset($item->riw_pangkat_tmt) && $item->riw_pangkat_tmt != '' ? strftime("%d-%m-%Y", strtotime($item->riw_pangkat_tmt)) : ''); ?></span>
                            </td>
                            <td>
                                <input type='hidden' name='riw_pangkat_sk<?php echo $i; ?>' id='riw_pangkat_sk<?php echo $i; ?>'
                                       value='<?php echo $item->riw_pangkat_sk; ?>'/>
                                <span id='span_riw_pangkat_sk<?php echo $i; ?>'><?php echo $item->riw_pangkat_sk; ?></span>
                            </td>
                            <td>
                                <span id='span_riw_pangkat_sktgl<?php echo $i; ?>'><?php echo(isset($item->riw_pangkat_sktgl) && $item->riw_pangkat_sktgl != '' ? strftime("%d-%m-%Y", strtotime($item->riw_pangkat_sktgl)) : ''); ?></span>
                                <input type='hidden' name='riw_pangkat_sktgl<?php echo $i; ?>'
                                       id='riw_pangkat_sktgl<?php echo $i; ?>'
                                       value='<?php echo(isset($item->riw_pangkat_sktgl) && $item->riw_pangkat_sktgl != '' ? strftime("%d-%m-%Y", strtotime($item->riw_pangkat_sktgl)) : ''); ?>'/>

                            </td>
                            <td>
                                <input type='hidden' name='riw_pangkat_thn<?php echo $i; ?>' id='riw_pangkat_thn<?php echo $i; ?>'
                                       value='<?php echo $item->riw_pangkat_thn; ?>'/>
                                <span id='span_riw_pangkat_thn<?php echo $i; ?>'><?php echo $item->riw_pangkat_thn ?></span>
                            </td>
                            <td>
                                <input type='hidden' name='riw_pangkat_bln<?php echo $i; ?>' id='riw_pangkat_bln<?php echo $i; ?>'
                                       value='<?php echo $item->riw_pangkat_bln; ?>'/>
                                <span id='span_riw_pangkat_bln<?php echo $i; ?>'><?php echo $item->riw_pangkat_bln; ?></span>
                            </td>
                            <td>
                                <input type='hidden' name='riw_pangkat_pejabat<?php echo $i; ?>'
                                       id='riw_pangkat_pejabat<?php echo $i; ?>' value='<?php echo $item->riw_pangkat_pejabat; ?>'/>
                                <span id='span_riw_pangkat_pejabat<?php echo $i; ?>'><?php echo $item->riw_pangkat_pejabat; ?></span>
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