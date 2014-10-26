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
    <li><a href="#">Biodata Pegawai <?php echo $peg->peg_nama; ?></a></li>
</ul>
<div class="portlet box blue">
    <div class="portlet-title">
        <div class="caption"><i class="icon-reorder"></i><?php echo $peg->nama_lengkap; ?> - <?php echo $peg->peg_nip_baru; ?></div>
    </div>
    <div class="portlet-body form">
        <!-- BEGIN FORM-->
        <form class="form-horizontal" role="form">
            <div class="form-body">
                <div class="col-md-12">
                    <div class="col-md-4">                      
                    </div> 
                    <div class="col-md-4">
                        <img src="<?php echo PATH_FOTO; ?>/<?php echo $peg->peg_id; ?>.jpg" class="img-responsive img-rounded" />
                    </div>  
                    <div class="col-md-4">                      
                    </div>
                </div>               
                <div class="row"></div>
                <h4 class="form-section">Biodata Pegawai</h4>
                <div class="row">                    
                    <div class="form-group">
                        <label class="control-label col-md-4">Nama Lengkap:</label>
                        <div class="col-md-8">
                            <p class="form-control-static"><?php echo $peg->nama_lengkap; ?></p>
                        </div>
                    </div> 
                </div>
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-md-4">Nip:</label>
                        <div class="col-md-8">
                            <p class="form-control-static"><?php echo isset($peg->peg_nip_baru) && !empty($peg->peg_nip_baru) ? $peg->peg_nip_baru : $peg->peg_nip; ?></p>
                        </div>
                    </div>

                </div>                       
                <div class="row"> 
                    <div class="form-group">
                        <label class="control-label col-md-4">Tempat, Tanggal Lahir:</label>
                        <div class="col-md-8">
                            <p class="form-control-static"><?php echo $peg->peg_lahir_tempat; ?>, <?php echo strftime("%d-%m-%Y", strtotime($peg->peg_lahir_tanggal)); ?></p>
                        </div>
                    </div> 
                </div>
                <div class="row"> 
                    <div class="form-group">
                        <label class="control-label col-md-4">Jenis Kelamin:</label>
                        <div class="col-md-8">
                            <p class="form-control-static"><?php echo $peg->peg_jenis_kelamin == 'L' ? "Laki-laki" : "Perempuan"; ?></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-md-4">Status Perkawinan:</label>
                        <div class="col-md-8">
                            <p class="form-control-static">
                                <?php echo $peg->peg_status_perkawinan == '2' ? "Belum Kawin" : ""; ?>
                                <?php echo $peg->peg_status_perkawinan == '3' ? "Janda" : ""; ?>
                                <?php echo $peg->peg_status_perkawinan == '4' ? "Duda" : ""; ?>
                                <?php echo $peg->peg_status_perkawinan == '1' ? "Kawin" : ""; ?>
                            </p>
                        </div>
                    </div>
                </div>          
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-md-4">Pendidikan Akhir:</label>
                        <div class="col-md-8">
                            <p class="form-control-static"><?php echo $peg->nm_pend_akhir; ?> (<?php echo $peg->peg_pend_akhir_th; ?>)</p>
                        </div>
                    </div>                     
                </div>
                <div class="row"> 
                    <div class="form-group">
                        <label class="control-label col-md-4">Golongan Akhir:</label>
                        <div class="col-md-8">
                            <p class="form-control-static"><?php echo $peg->nm_gol_akhir; ?> / <?php echo $peg->nm_pkt_akhir; ?>
                                (<?php echo strftime("%d-%m-%Y", strtotime($peg->peg_gol_akhir_tmt)); ?>)
                            </p>
                        </div>
                    </div>                     
                </div>                
                <div class="row">                    
                    <div class="form-group">
                        <label class="control-label col-md-4">Nama Jabatan:</label>
                        <div class="col-md-8">
                            <p class="form-control-static"><?php echo $peg->jabatan_nama; ?> (<?php echo strftime("%d-%m-%Y", strtotime($peg->peg_jabatan_tmt)); ?>)</p>
                        </div>
                    </div>                     
                </div>
                <div class="row"> 
                    <div class="form-group">
                        <label class="control-label col-md-4">Satuan Kerja :</label>
                        <div class="col-md-8">
                            <p class="form-control-static"> <?php echo $peg->satuan_kerja_nama; ?>
                            </p>
                        </div>
                    </div>                    
                </div>
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-md-4"> Unit Kerja:</label>
                        <div class="col-md-8">
                            <p class="form-control-static">  <?php echo $peg->tempat_kerja; ?></p>
                        </div>
                    </div>
                </div>
                <div class="row"> 
                    <div class="form-group">
                        <label class="control-label col-md-4">Golongan Darah:</label>
                        <div class="col-md-8">
                            <p class="form-control-static"> <?php echo $peg->nm_goldar; ?></p>
                        </div>
                    </div> 
                </div> 
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-md-4">Alamat Rumah:</label>
                        <div class="col-md-8">
                            <p class="form-control-static"> <?php echo $peg->peg_rumah_alamat; ?></p>
                        </div>
                    </div> 
                </div>
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-md-4">Kel./Desa:</label>
                        <div class="col-md-8">
                            <p class="form-control-static"><?php echo $peg->peg_kel_desa; ?></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-md-4">Kec:</label>
                        <div class="col-md-8">
                            <p class="form-control-static"><?php echo $peg->kecamatan_nm; ?></p>
                        </div>
                    </div> 
                </div>                 
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-md-4">Kab./Kota:</label>
                        <div class="col-md-8">
                            <p class="form-control-static"><?php echo $peg->kabupaten_nm; ?></p>
                        </div>
                    </div> 
                </div> 
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-md-4">Kode Pos:</label>
                        <div class="col-md-8">
                            <p class="form-control-static"><?php echo $peg->peg_kodepos; ?></p>
                        </div>
                    </div>
                </div> 
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-md-4">Tinggi (cm):</label>
                        <div class="col-md-8">
                            <p class="form-control-static"> <?php echo is_object($ketbadan) ? $ketbadan->tinggi : ''; ?></p>
                        </div> 
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-md-4">Berat (Kg):</label>
                        <div class="col-md-8">
                            <p class="form-control-static"> <?php echo is_object($ketbadan) ? $ketbadan->berat : ''; ?></p>
                        </div> 
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-md-4">Rambut:</label>
                        <div class="col-md-8">
                            <p class="form-control-static"> <?php echo is_object($ketbadan) ? $ketbadan->rambut : "-"; ?></p>
                        </div>
                    </div> 
                </div>
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-md-4">Bentuk Muka:</label>
                        <div class="col-md-8">
                            <p class="form-control-static"> <?php echo is_object($ketbadan) ? $ketbadan->bentuk_muka : "-"; ?></p>
                        </div> 
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-md-4">Warna Kulit:</label>
                        <div class="col-md-8">
                            <p class="form-control-static"> <?php echo is_object($ketbadan) ? $ketbadan->warna_kulit : "-"; ?></p>
                        </div>
                    </div> 
                </div>
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-md-4">Ciri-ciri Khas:</label>
                        <div class="col-md-8">
                            <p class="form-control-static"> <?php echo is_object($ketbadan) ? $ketbadan->ciri_khas : "-"; ?></p>
                        </div> 
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <label class="control-label col-md-4">Cacat Tubuh:</label>
                        <div class="col-md-8">
                            <p class="form-control-static"> <?php echo is_object($ketbadan) ? $ketbadan->cacat_tubuh : "-"; ?></p>
                        </div> 
                    </div>
                </div>



            </div> 
        </form>
        <!-- END FORM-->  
    </div>
</div>

<script src="<?php echo base_url(); ?>/static/js/personil/alamatriwayat.js" type="text/javascript"></script> 
<script type="text/javascript">
    $(document).ready(function() {
        linkriwayat("<?php echo $jenisjabatan; ?>", "<?php echo $peg->peg_id; ?>", "<?php echo base_url(); ?>");
    });

</script>