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
    <li><a href="#">Riwayat Penghargaan <?php echo $peg->peg_nama; ?></a></li>
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
                    <th rowspan="2" width="20%">Penghargaan</th>
                    <th colspan="2">SK</th>
                    <th rowspan="2" width="7%">Tahun</th>
                    <th rowspan="2" width="15%">Jabatan</th>
                    <th rowspan="2" width="15%">Instansi Penyelenggara</th> 
                </tr>
                </thead>
                <tbody>
                       <?php
                $i = 0;
                foreach ($pendfor as $item) {
                    ?>
                    <tr id="baris<?php echo $i; ?>" >
                        <td align="center"><?php echo ($i + 1); ?></td>
                        <td>
                            <?php echo $item->penghargaan_nm; ?>
                            <input type='hidden'  name='penghargaan_nm<?php echo $i; ?>' id='penghargaan_nm<?php echo $i; ?>' value='<?php echo $item->penghargaan_nm; ?>' />
                            <input type='hidden'  name='penghargaan_id<?php echo $i; ?>' id='penghargaan_id<?php echo $i; ?>' value='<?php echo $item->penghargaan_id; ?>' />
                        </td>
                        <td>
                            <?php echo $item->riw_penghargaan_sk; ?>
                            <input type='hidden'  name='riw_penghargaan_sk<?php echo $i; ?>' id='riw_penghargaan_sk<?php echo $i; ?>' value='<?php echo $item->riw_penghargaan_sk; ?>' />
                        </td>
                        <td align="center">
                            <?php echo ( isset($item->riw_penghargaan_tglsk) && $item->riw_penghargaan_tglsk != '' ? strftime("%d-%m-%Y", strtotime($item->riw_penghargaan_tglsk)) : '' ); ?>
                            <input type='hidden'  name='riw_penghargaan_tglsk<?php echo $i; ?>' id='riw_penghargaan_tglsk<?php echo $i; ?>' value='<?php echo ( isset($item->riw_penghargaan_tglsk) && $item->riw_penghargaan_tglsk != '' ? strftime("%d-%m-%Y", strtotime($item->riw_penghargaan_tglsk)) : '' ); ?>' />
                        </td>
                        <td align="center">
                            <?php echo $item->riw_penghargaan_thn; ?>
                            <input type='hidden'  name='riw_penghargaan_thn<?php echo $i; ?>' id='riw_penghargaan_thn<?php echo $i; ?>' value='<?php echo $item->riw_penghargaan_thn; ?>' />
                        </td>
                        <td>
                            <?php echo $item->riw_penghargaan_pejabat; ?>
                            <input type='hidden'  name='riw_penghargaan_pejabat<?php echo $i; ?>' id='riw_penghargaan_pejabat<?php echo $i; ?>' value='<?php echo $item->riw_penghargaan_pejabat; ?>' />
                        </td>
                        <td>
                            <?php echo $item->riw_penghargaan_instansi; ?>
                            <input type='hidden'  name='riw_penghargaan_instansi<?php echo $i; ?>' id='riw_penghargaan_instansi<?php echo $i; ?>' value='<?php echo $item->riw_penghargaan_instansi; ?>' />
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