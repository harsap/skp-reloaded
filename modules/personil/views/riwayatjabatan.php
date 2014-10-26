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
    <li><a href="#">Riwayat Jabatan <?php echo $peg->peg_nama; ?></a></li>
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
                    <th rowspan="2" width="20%">Nama Jabatan</th>
                    <th rowspan="2" width="17%">Unit Kerja</th>
                    <th rowspan="2" width="10%">TMT</th>
                    <th colspan="2">Surat Keputusan</th>
                    <th rowspan="2" width="15%">Pejabat Yang Menetapkan</th> 
                </tr>
                <tr align="center">
                    <th width="10%">Nomor</th>
                    <th width="10%">Tanggal</th>
                </tr>
                </thead>
                <tbody>
                     <?php
                $i = 0;
                foreach ($pendfor as $item) {
                    ?>
                    <tr id="baris<?php echo $i; ?>" >
                        <td align="center">
						 <input type='hidden'  name='riw_jabatan_id<?php echo $i; ?>' id='riw_jabatan_id<?php echo $i; ?>' value='<?php echo $item->riw_jabatan_id; ?>' />
                            <input type='hidden'  name='jabatan_id<?php echo $i; ?>' id='jabatan_id<?php echo $i; ?>' value='<?php echo $item->jabatan_id; ?>' />
                            <?php echo ($i + 1); ?>
                        </td>
                        <td>
                            <input type='hidden'  name='riw_jabatan_nm<?php echo $i; ?>' id='riw_jabatan_nm<?php echo $i; ?>' value='<?php echo $item->riw_jabatan_nm; ?>' />
                            <span id="span_riw_jabatan_nm">  <?php echo $item->riw_jabatan_nm; ?></span>
                        </td>
                        <td>
                            <input type='hidden'  name='riw_jabatan_unit<?php echo $i; ?>' id='riw_jabatan_unit<?php echo $i; ?>' value='<?php echo $item->riw_jabatan_unit; ?>' />
                            <?php echo $item->riw_jabatan_unit; ?>
                        </td>
                        <td>
                            <input type='hidden'  name='riw_jabatan_tmt<?php echo $i; ?>' id='riw_jabatan_tmt<?php echo $i; ?>' value='<?php echo strftime("%d-%m-%Y", strtotime($item->riw_jabatan_tmt)); ?>' />
                             <?php echo(isset($item->riw_jabatan_tmt) && $item->riw_jabatan_tmt != ''?  strftime("%d-%m-%Y", strtotime($item->riw_jabatan_tmt)):"-"); ?>
                        </td>
                        <td>
                            <input type='hidden'  name='riw_jabatan_no<?php echo $i; ?>' id='riw_jabatan_no<?php echo $i; ?>' value='<?php echo $item->riw_jabatan_no; ?>' />
                            <?php echo $item->riw_jabatan_no; ?>
                        </td>
                        <td align="center">
                            <input type='hidden'  name='riw_jabatan_tgl<?php echo $i; ?>' id='riw_jabatan_tgl<?php echo $i; ?>' value='<?php echo strftime("%d-%m-%Y", strtotime($item->riw_jabatan_tgl)); ?>' />
                            <?php echo (isset($item->riw_jabatan_tgl) && $item->riw_jabatan_tgl != '' && strlen(trim($item->riw_jabatan_tgl)) > 1 ?  strftime("%d-%m-%Y", strtotime($item->riw_jabatan_tgl)):"-"); ?>
                        </td>
                        <td>
                            <input type='hidden'  name='riw_jabatan_pejabat<?php echo $i; ?>' id='riw_jabatan_pejabat<?php echo $i; ?>' value='<?php echo $item->riw_jabatan_pejabat; ?>' />
                            <?php echo $item->riw_jabatan_pejabat; ?>
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