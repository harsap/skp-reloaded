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
    <li><a href="#">Riwayat Organisasi <?php echo $peg->peg_nama; ?></a></li>
</ul>
<div class="portlet box ">
    <div class="portlet-title"> 
    </div>
    <div class="portlet-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover">

                <thead>
                    <tr align="center">
                        <th>NO.</th>
                        <th>Nama</th>
                        <th>Kedudukan</th>
                        <th>Tahun Mulai</th>
                        <th>Tahun Akhir</th>
                        <th>Tempat</th>
                        <th>Nama Pimpinan</th> 
                    </tr>
                </thead>
                <tbody>
                      <?php
                $i = 0;
                foreach ($org as $item) {
                    ?>
                    <tr id="baris<?php echo $i; ?>" >
                        <td align="center">
                            <input type="hidden"  name='riwayat_org_id<?php echo $i; ?>' id='riwayat_org_id<?php echo $i; ?>'  value='<?php echo $item->riwayat_org_id ?>' />
                            <?php echo ($i + 1); ?>
                        </td>
                        <td>
                            <input type="hidden"  name='nama<?php echo $i; ?>' id='nama<?php echo $i; ?>'  value='<?php echo $item->nama ?>' />
                            <?php echo $item->nama; ?>
                        </td>
                        <td>
                            <input type="hidden"  name='kedudukan<?php echo $i; ?>' id='kedudukan<?php echo $i; ?>'  value='<?php echo $item->kedudukan ?>' />
                            <?php echo $item->kedudukan; ?>
                        </td>
                        <td>
                            <input type="hidden"  name='tahun_mulai<?php echo $i; ?>' id='tahun_mulai<?php echo $i; ?>'  value='<?php echo $item->tahun_mulai ?>' />
                            <?php echo $item->tahun_mulai; ?>
                        </td>
                        <td>
                            <input type="hidden"  name='tahun_akhir<?php echo $i; ?>' id='tahun_akhir<?php echo $i; ?>'  value='<?php echo $item->tahun_akhir ?>' />
                            <?php echo $item->tahun_akhir; ?>
                        </td>
                        <td>
                            <input type="hidden"  name='tempat<?php echo $i; ?>' id='tempat<?php echo $i; ?>'  value='<?php echo $item->tempat ?>' />
                            <?php echo $item->tempat; ?> 
                        </td>
                        <td>
                            <input type="hidden"  name='nama_pimpinan<?php echo $i; ?>' id='nama_pimpinan<?php echo $i; ?>'  value='<?php echo $item->nama_pimpinan ?>' />
                            <?php echo $item->nama_pimpinan; ?> 
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